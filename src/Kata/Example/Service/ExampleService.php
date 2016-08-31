<?php

/**
 * @author Adrian Zurek <adrian.zurek@xsolve.pl>
 */

namespace XSolve\Workshop\Kata\Example\Service;

class ExampleService
{
    /**
     * @var string
     */
    protected $param;

    /**
     * @param string $param
     */
    public function __construct(string $param)
    {
        $this->param = $param;
    }

    /**
     * @return string
     */
    public function foo()
    {
        return $this->param;
    }
}
