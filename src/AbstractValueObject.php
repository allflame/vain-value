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

use Vain\Value\Exception\IncomparableObjectsException;

/**
 * Class AbstractValueObject
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractValueObject implements ValueObjectInterface
{
    /**
     * @param ValueObjectInterface $to
     *
     * @return int
     */
    abstract protected function doComparison($to) : int;

    /**
     * @param ValueObjectInterface $to
     *
     * @return ValueObjectInterface
     */
    abstract protected function doDiff($to) : ValueObjectInterface;

    /**
     * @param ValueObjectInterface $to
     *
     * @return bool
     */
    protected function isComparable(ValueObjectInterface $to) : bool
    {
        return ($to instanceof $this);
    }

    /**
     * @param ValueObjectInterface $to
     *
     * @return int
     *
     * @throws IncomparableObjectsException
     */
    public function compare(ValueObjectInterface $to) : int
    {
        if (false === $this->isComparable($to)) {
            throw new IncomparableObjectsException($this, $to);
        }

        return $this->doComparison($to);
    }

    /**
     * @param ValueObjectInterface $to
     *
     * @return ValueObjectInterface
     *
     * @throws IncomparableObjectsException
     */
    public function diff(ValueObjectInterface $to) : ValueObjectInterface
    {
        if (false === $this->isComparable($to)) {
            throw new IncomparableObjectsException($this, $to);
        }

        return $this->doDiff($to);
    }
}