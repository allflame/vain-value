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
declare(strict_types=1);

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
    public function getCoefficient(string $from, string $to) : float
    {
        return 1.0;
    }
}