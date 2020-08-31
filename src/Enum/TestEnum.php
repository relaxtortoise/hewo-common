<?php


namespace Hewo\Common\Enum;

use Hyperf\Constants\Annotation\Constants;

/**
 * Class TestEnum
 * @package Hewo\Common\Enum
 * @Constants()
 * @method TestEnum test() static
 * @method string message()
 */
class TestEnum extends AbstractEnum
{
    /**
     * @Message("this is test message")
     */
    public const TEST = 0;
}