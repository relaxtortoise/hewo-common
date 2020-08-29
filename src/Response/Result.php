<?php


namespace Hewo\Common\Response;

use Hewo\Common\Enum\ResultCode;
use Hyperf\HttpServer\Response;
use Hyperf\Utils\Contracts\Arrayable;
use Hyperf\Utils\Contracts\Jsonable;

class Result extends Response
{
    /**
     * @var integer
     */
    private $code;

    /**
     * @var string
     */
    private $message;

    /**
     * @var object|array|Jsonable|Arrayable
     */
    private $result;

    /**
     * @return int
     */
    protected function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    protected function setCode(int $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    protected function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    protected function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return array|Arrayable|Jsonable|object
     */
    protected function getResult()
    {
        return $this->result;
    }

    /**
     * @param array|Arrayable|Jsonable|object $result
     */
    protected function setResult($result): void
    {
        $this->result = $result;
    }



    public function success(?ResultCode $resultCode)
    {

    }
}