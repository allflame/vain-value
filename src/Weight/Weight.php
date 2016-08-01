<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-comparator
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-comparator
 */

namespace Vain\Value\Weight;

use Vain\Value\AbstractValueObject;
use Vain\Value\ValueObjectInterface;
use Vain\Value\Weight\Coefficient\CoefficientProviderInterface;

/**
 * Class Weight
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class Weight extends AbstractValueObject implements ValueObjectInterface
{
    const PRECISION = 3;

    private $quantity;

    private $units;

    private $coefficientProvider;

    /**
     * Weight constructor.
     * @param float $quantity
     * @param string $units
     * @param CoefficientProviderInterface $coefficientProvider
     */
    public function __construct($quantity, $units, CoefficientProviderInterface $coefficientProvider)
    {
        $this->quantity = $quantity;
        $this->units = $units;
        $this->coefficientProvider = $coefficientProvider;
    }

    /**
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @param Weight $to
     * 
     * @return float
     */
    protected function getScaledDiff(Weight $to)
    {
        return $to->quantity * $this->coefficientProvider->getCoefficient($to->getUnits(), $this->units);
    }

    /**
     * @param Weight $to
     *
     * @return int
     */
    protected function doComparison($to)
    {
        $diff = $this->getScaledDiff($to);

        if (abs($diff) < pow(10, self::PRECISION)) {
            return self::EQUAL;
        }

        if ($diff > 0) {
            return self::GREATER;
        } else {
            return self::LESS;
        }
    }

    /**
     * @param Weight $to
     *
     * @return Weight
     */
    protected function doDiff($to)
    {
        return new Weight($this->getScaledDiff($to), $this->units, $this->coefficientProvider);
    }
    
    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s %s', $this->quantity, $this->units);
    }
}