<?php


namespace Hewo\Common\Response;

use Hewo\Common\Enum\ResultCode;
use Hyperf\HttpServer\Response;
use Hyperf\Utils\Contracts\Arrayable;
use Hyperf\Utils\Contracts\Jsonable;
use Psr\Http\Message\ResponseInterface;

class Result extends Response
{
    /**
     * @var integer
     */
    private $code = -1;

    /**
     * @var string
     */
    private $message = "";

    /**
     * @var object|array|Jsonable|Arrayable
     */
    private $result;

    /**
     * @return int
     */
    protected function code(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function withCode(int $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    protected function message(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Result
     */
    public function withMessage(string $message): Result
    {
        $result = clone $this;
        $result->message = $message;
        return $result;
    }

    /**
     * @return array|Arrayable|Jsonable|object
     */
    protected function result()
    {
        return $this->result;
    }

    /**
     * @param array|Arrayable|Jsonable|object $result
     * @return Result
     */
    protected function withResult($result): Result
    {
        $instance = clone $this;
        $instance->result = $result;
        return $instance;
    }

    protected function successResponseBody()
    {
        return $this->json([
            "code" => $this->code(),
            "message" => $this->message(),
            "result" => $this->result() ?? new \stdClass(),
        ]);
    }

    protected function failResponseBody()
    {
        return $this->json([
            "code" => $this->code(),
            "message" => $this->message()
        ]);
    }

    /**
     * @param array $data
     * @return ResponseInterface
     */
    public function success($data = [])
    {
        $resultCode = ResultCode::success();
        $this->withCode($resultCode->value());
        $this->withMessage($resultCode->message());
        $this->withResult($data);
        return $this->successResponseBody();
    }

    /**
     * @param ResultCode $resultCode
     * @return ResponseInterface
     */
    public function fail(ResultCode $resultCode)
    {
        $this->withCode($resultCode->value());
        $this->withMessage($resultCode->message());
        return $this->failResponseBody();
    }
}