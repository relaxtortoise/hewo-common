<?php


namespace Hewo\Common\Enum;

use Hyperf\Constants\Annotation\Constants;

/**
 * Class ResultCode
 * @package Hewo\Common\Enum
 * @Constants()
 * @method string message()
 * @method ResultCode success() static
 * @method ResultCode failed() static
 */
class ResultCode extends AbstractEnum
{
    /**
     * @Message("成功")
     */
    public const SUCCESS = 1;

    /**
     * @Message("失败")
     */
    public const FAILED = 0;
}