<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/10/16
 * Time: 10:44 AM
 */

namespace Vain\Value\Money\Rate;

use Vain\Value\Money\Currency;

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