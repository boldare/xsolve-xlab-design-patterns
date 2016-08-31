<?php

/**
 * @author Adrian Zurek <adrian.zurek@xsolve.pl>
 */

namespace XSolve\Workshop\Kata\Service\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use XSolve\Workshop\Kata\Example\Service\ExampleService;

class ExampleServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $pimple
     */
    public function register(Container $pimple)
    {
        $pimple['service.example'] = function ($pimple) {
            return new ExampleService($pimple['config']['app.workshop.kata']['example.param']);
        };
    }
}
