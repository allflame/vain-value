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
declare(strict_types = 1);

namespace Vain\Value\Money;

use Vain\Value\AbstractValueObject;
use Vain\Value\Money\Rate\RateProviderInterface;
use Vain\Value\ValueObjectInterface;

/**
 * Class Money
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class Money extends AbstractValueObject
{

    private $intPart;

    private $decimalPart;

    private $currency;

    private $rateProvider;

    /**
     * Money constructor.
     * @param int                   $inPart
     * @param float                 $decimalPart
     * @param Currency              $currency
     * @param RateProviderInterface $rateProvider
     */
    public function __construct(int $inPart, float $decimalPart, Currency $currency, RateProviderInterface $rateProvider)
    {
        $this->intPart = $inPart;
        $this->decimalPart = $decimalPart;
        $this->currency = $currency;
        $this->rateProvider = $rateProvider;
    }

    /**
     * @return int
     */
    public function getIntPart() : int
    {
        return $this->intPart;
    }

    /**
     * @return float
     */
    public function getDecimalPart() : float
    {
        return $this->decimalPart * pow(10, -$this->getCurrency()->getExponent());
    }

    /**
     * @return Currency
     */
    public function getCurrency() : Currency
    {
        return $this->currency;
    }

    /**
     * @param Money $to
     *
     * @return float
     */
    protected function getScaledDiff(Money $to) : float
    {
        $currencyRate = $this->rateProvider->getCurrencyRate($to->getCurrency(), $this->currency, new \DateTime());

        return ($to->getIntPart() * $currencyRate - $this->getIntPart()) + ($to->getDecimalPart() * $currencyRate - $this->getDecimalPart());
    }

    /**
     * @param Money $to
     *
     * @return int
     */
    protected function doComparison($to) : int
    {
        $difference = $this->getScaledDiff($to);

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
     * @param Money $to
     *
     * @return Money
     */
    protected function doDiff($to) : ValueObjectInterface
    {
        $diff = $this->getScaledDiff($to);
        $intPart = intval($diff);

        return new Money($intPart, $diff - $intPart, $this->currency, $this->rateProvider);
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return sprintf('%d.%d %s', $this->intPart, $this->decimalPart, $this->currency->getCode());
    }
}