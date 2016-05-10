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
    /**
     * @param ValueObjectInterface $to
     * 
     * @return int
     */
    public function compare(ValueObjectInterface $to);
}