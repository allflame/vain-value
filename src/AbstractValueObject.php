<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/10/16
 * Time: 10:32 AM
 */

namespace Vain\Value;

use Vain\Value\Exception\IncomparableObjectsException;

abstract class AbstractValueObject implements ValueObjectInterface
{
    /**
     * @param ValueObjectInterface $to
     *
     * @return int
     */
    abstract protected function doComparison($to);

    /**
     * @param ValueObjectInterface $to
     *
     * @return ValueObjectInterface
     */
    abstract protected function doDiff($to);
    
    /**
     * @param ValueObjectInterface $to
     *
     * @return bool
     */
    protected function isComparable(ValueObjectInterface $to)
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
    public function compare(ValueObjectInterface $to)
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
    public function diff(ValueObjectInterface $to)
    {
        if (false === $this->isComparable($to)) {
            throw new IncomparableObjectsException($this, $to);
        }

        return $this->doDiff($to);
    }
}