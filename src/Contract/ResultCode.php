<?php


namespace Hewo\Common\Contract;

use Hyperf\Constants\Annotation\Constants;

/**
 * Class ResultCode
 * @package Hewo\Common\Contract
 * @method string message() 获取常量message注解值
 * @method int value() 获取常量值
 * @method static ResultCode success()
 * @method static ResultCode failed()
 */
class ResultCode extends AbstractEnum
{
    /**
     * @Message("成功")
     */
    public const SUCCESS = 1;

    /**
     *@Message("失败")
     */
    public const FAILED = 0;
}