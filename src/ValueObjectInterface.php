<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/10/16
 * Time: 10:21 AM
 */

namespace Vain\Value;

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
     * @return string
     */
    public function __toString();
}