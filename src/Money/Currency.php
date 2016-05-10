<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/10/16
 * Time: 10:27 AM
 */

namespace Vain\Value\Money;

use Vain\Value\AbstractValueObject;

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
}