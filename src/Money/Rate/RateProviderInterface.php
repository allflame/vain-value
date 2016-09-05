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

namespace Vain\Value\Money\Rate;

use Vain\Value\Money\Currency;

/**
 * Interface RateProviderInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface RateProviderInterface
{
    /**
     * @param Currency           $from
     * @param Currency           $to
     * @param \DateTimeInterface $date
     *
     * @return float
     */
    public function getCurrencyRate(Currency $from, Currency $to, \DateTimeInterface $date = null) : float;
}