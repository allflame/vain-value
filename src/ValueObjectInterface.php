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

namespace Vain\Value;

use Vain\Core\String\StringInterface;

/**
 * Interface ValueObjectInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ValueObjectInterface extends StringInterface
{
    const EQUAL = 0;
    const LESS = -1;
    const GREATER = 1;

    /**
     * @param ValueObjectInterface $to
     *
     * @return int
     */
    public function compare(ValueObjectInterface $to) : int;

    /**
     * @param ValueObjectInterface $to
     *
     * @return ValueObjectInterface
     */
    public function diff(ValueObjectInterface $to) : ValueObjectInterface;
}