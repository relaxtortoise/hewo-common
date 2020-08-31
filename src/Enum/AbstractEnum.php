<?php


namespace Hewo\Common\Enum;


use Exception;
use Hewo\Common\Exception\IllegalMethodException;
use Hyperf\Constants\ConstantsCollector;
use Hyperf\Utils\Arr;
use Hyperf\Utils\Str;
use RuntimeException;

/**
 * 常量需要大写
 * @package Hewo\Common\Contract
 */
abstract class AbstractEnum
{
    /**
     * 当前常量
     *
     * @var string
     */
    protected $currentConst;

    /**
     * @return string
     */
    protected function currentConst(): string
    {
        if (is_null($this->currentConst)) {
            throw new RuntimeException('Current const is null');
        }
        return $this->currentConst;
    }

    /**
     * @param string $currentConst
     */
    protected function setCurrentConst(string $currentConst): void
    {
        $this->currentConst = $currentConst;
    }

    /**
     * PHP 5 allows developers to declare constructor methods for classes.
     * Classes which have a constructor method call this method on each newly-created object,
     * so it is suitable for any initialization that the object may need before it is used.
     *
     * Note: Parent constructors are not called implicitly if the child class defines a constructor.
     * In order to run a parent constructor, a call to parent::__construct() within the child constructor is required.
     *
     * param [ mixed $args [, $... ]]
     * @link https://php.net/manual/en/language.oop5.decon.php
     * @param string|null $currentConst
     */
    final protected function __construct(?string $currentConst) {
        $this->setCurrentConst($currentConst);
    }

    /**
     * is triggered when invoking inaccessible methods in a static context.
     *
     * @param $name string
     * @param $arguments array
     * @return mixed
     * @throws Exception
     * @link https://php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.methods
     */
    final public static function __callStatic(string $name, array $arguments)
    {
        $rcs =  new \ReflectionClass(get_called_class());
        $name = Str::upper($name);
        if (! $rcs->hasConstant($name)) {
            throw new \RuntimeException("Const {$name} not yet defined");
        }
        return new static($name);
    }

    /**
     * is triggered when invoking inaccessible methods in an object context.
     *
     * @param $name string
     * @param $arguments array
     * @return mixed
     * @throws Exception
     * @link https://php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.methods
     */
    final public function __call(string $name, array $arguments)
    {
        $class = get_class($this);
        $rcs =  new \ReflectionClass($class);
        $name = strtolower($name);

        $annotations = ConstantsCollector::get($class, $rcs->getConstant($this->currentConst()));
        if (! Arr::exists($annotations, $name)) {
            throw new IllegalMethodException("Annotation {$name} no yet defined");
        }

        return ConstantsCollector::getValue($class, $rcs->getConstant($this->currentConst()), $name);
    }

    /**
     * @return mixed|void
     */
    final public function value()
    {
        try {
            $rcs =  new \ReflectionClass($this);
            return $rcs->getConstant($this->currentConst());
        } catch (\Throwable $throwable) {
        }
    }

}