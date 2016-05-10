<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/10/16
 * Time: 11:00 AM
 */

namespace Vain\Value\Weight\Coefficient;


interface CoefficientProviderInterface
{
    /**
     * @param string $from
     * @param string $to
     *
     * @return float
     */
    public function getCoefficient($from, $to);
}