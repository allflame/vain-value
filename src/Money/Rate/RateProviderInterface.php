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
     * @param Currency $from
     * @param Currency $to
     * @param \DateTime $date
     * 
     * @return float
     */
    public function getCurrencyRate(Currency $from, Currency $to, \DateTime $date = null);
}