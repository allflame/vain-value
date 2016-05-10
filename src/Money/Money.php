<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/10/16
 * Time: 10:24 AM
 */

namespace Vain\Value\Money;

use Vain\Value\AbstractValueObject;
use Vain\Value\Money\Rate\RateProviderInterface;

class Money extends AbstractValueObject
{

    private $intPart;

    private $decimalPart;

    private $currency;

    private $rateProvider;

    /**
     * Money constructor.
     * @param int $inPart
     * @param int $decimalPart
     * @param Currency $currency
     * @param RateProviderInterface $rateProvider
     */
    public function __construct($inPart, $decimalPart, Currency $currency, RateProviderInterface $rateProvider)
    {
        $this->intPart = $inPart;
        $this->decimalPart = $decimalPart;
        $this->currency = $currency;
        $this->rateProvider = $rateProvider;
    }

    /**
     * @return float
     */
    public function getIntPart()
    {
        return $this->intPart;
    }

    /**
     * @return float
     */
    public function getDecimalPart()
    {
        return $this->decimalPart * pow(10, -$this->getCurrency()->getExponent());
    }

    /**
     * @return Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param Money $to
     *
     * @return int
     */
    protected function doComparison($to)
    {
        $now = new \DateTime();
        $currencyRate = $this->rateProvider->getCurrencyRate($this->currency, $to->getCurrency(), $now);

        $difference = ($this->getIntPart() * $currencyRate - $to->getIntPart()) + ($this->getDecimalPart() * $currencyRate - $to->getDecimalPart());

        if (abs($difference) < pow(10, min($this->getCurrency()->getPrecision(), $to->getCurrency()->getPrecision()))) {
            return self::EQUAL;
        }

        if ($difference > 0) {
            return self::GREATER;
        } else {
            return self::LESS;
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%d.%d %s', $this->intPart, $this->decimalPart, $this->currency->getCode());
    }


}