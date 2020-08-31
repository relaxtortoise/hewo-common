<?php


namespace Hewo\Common\Controller;


use Hewo\Common\Response\Result;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Psr\Container\ContainerInterface;

class AbstractController
{
    /**
     * @Inject()
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @Inject()
     * @var RequestInterface
     */
    protected $request;

    /**
     * @Inject()
     * @var Result
     */
    protected $response;

}