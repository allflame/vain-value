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

namespace Vain\Value\Money;

use Vain\Value\AbstractValueObject;

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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return int
     */
    public function getPrecision()
    {
        return $this->precision;
    }

    /**
     * @return int
     */
    public function getExponent()
    {
        return $this->exponent;
    }

    /**
     * @param Currency $to
     *
     * @return int
     */
    protected function doComparison($to)
    {
        return strcmp($this->code, $to->getCode());
    }

    /**
     * @param Currency $to
     *
     * @return Currency
     */
    protected function doDiff($to)
    {
        return $to;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->code;
    }
}