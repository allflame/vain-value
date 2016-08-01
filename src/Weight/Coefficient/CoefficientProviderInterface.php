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

namespace Vain\Value\Weight\Coefficient;

/**
 * Interface CoefficientProviderInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
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