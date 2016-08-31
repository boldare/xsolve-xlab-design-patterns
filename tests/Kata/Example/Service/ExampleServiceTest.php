<?php

namespace XSolve\Workshop\Kata;

use XSolve\Workshop\Kata\Example\Service\ExampleService;

/**
 * @author Adrian Zurek <adrian.zurek@xsolve.pl>
 */
class ExampleServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    protected $param;

    /**
     * @var ExampleService
     */
    protected $service;

    public function setUp()
    {
        $this->param = 'test';
        $this->service = new ExampleService($this->param);
    }

    public function testFoo()
    {
        $this->assertEquals($this->param, $this->service->foo());
    }
}
