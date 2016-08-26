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
namespace Vain\Value\Exception;

use Vain\Core\Exception\AbstractCoreException;
use Vain\Value\ValueObjectInterface;

/**
 * Class IncomparableObjectsException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class IncomparableObjectsException extends AbstractCoreException
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