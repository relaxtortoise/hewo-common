<?php


namespace Hewo\Common\Exception\Handler;


use Hewo\Common\Exception\IllegalArgumentException;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class IllegalArgumentExceptionHandler extends ExceptionHandler
{

    /**
     * @param Throwable $throwable
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $this->stopPropagation();
        return $response;
    }

    /**
     * @inheritDoc
     */
    public function isValid(Throwable $throwable): bool
    {
        return $throwable instanceof IllegalArgumentException;
    }
}