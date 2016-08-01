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
 * Class ConstantCoefficientMap
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ConstantCoefficientMap implements CoefficientProviderInterface
{
    /**
     * @param string $from
     * @param string $to
     *
     * @return float
     */
    public function getCoefficient($from, $to)
    {
        return 1;
    }
}