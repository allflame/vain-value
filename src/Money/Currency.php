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
declare(strict_types=1);

namespace Vain\Value\Money;

use Vain\Value\AbstractValueObject;
use Vain\Value\ValueObjectInterface;

/**
 * Class Currency
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class Currency extends AbstractValueObject
{
    private $code;

    private $precision;

    private $exponent;

    /**
     * @return string
     */
    public function getCode() : string
    {
        return $this->code;
    }

    /**
     * @return int
     */
    public function getPrecision() : int
    {
        return $this->precision;
    }

    /**
     * @return int
     */
    public function getExponent() : int
    {
        return $this->exponent;
    }

    /**
     * @param Currency $to
     *
     * @return int
     */
    protected function doComparison($to) : int
    {
        return strcmp($this->code, $to->getCode());
    }

    /**
     * @param Currency $to
     *
     * @return Currency
     */
    protected function doDiff($to) : ValueObjectInterface
    {
        return $to;
    }

    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        return $this->code;
    }
}