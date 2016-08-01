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

namespace Vain\Value;

/**
 * Interface ValueObjectInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ValueObjectInterface
{
    const EQUAL = 0;
    const LESS = -1;
    const GREATER = 1;

    /**
     * @param ValueObjectInterface $to
     *
     * @return int
     */
    public function compare(ValueObjectInterface $to);

    /**
     * @param ValueObjectInterface $to
     *
     * @return ValueObjectInterface
     */
    public function diff(ValueObjectInterface $to);

    /**
     * @return string
     */
    public function __toString();
}