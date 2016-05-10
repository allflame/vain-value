<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/10/16
 * Time: 10:22 AM
 */

namespace Vain\Value\Weight;

use Vain\Value\AbstractValueObject;
use Vain\Value\ValueObjectInterface;
use Vain\Value\Weight\Coefficient\CoefficientProviderInterface;

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
     * @return int
     */
    protected function doComparison($to)
    {
        $diff = $this->quantity * $this->coefficientProvider->getCoefficient($this->units, $to->getUnits());

        if (abs($diff) < pow(10, self::PRECISION)) {
            return self::EQUAL;
        }

        if ($diff > 0) {
            return self::GREATER;
        } else {
            return self::LESS;
        }
    }
}