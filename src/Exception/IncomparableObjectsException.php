<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/10/16
 * Time: 10:37 AM
 */

namespace Vain\Value\Exception;


use Vain\Core\Exception\CoreException;
use Vain\Value\ValueObjectInterface;

class IncomparableObjectsException extends CoreException
{
    private $what;

    private $to;

    /**
     * IncomparableObjectsException constructor.
     * @param ValueObjectInterface $what
     * @param ValueObjectInterface $to
     */
    public function __construct(ValueObjectInterface $what, ValueObjectInterface $to)
    {
        $this->what = $what;
        $this->to = $to;
        parent::__construct(sprintf('Cannot compare object of class to object of class', get_class($what), get_class($to)), 0, null);
    }
}