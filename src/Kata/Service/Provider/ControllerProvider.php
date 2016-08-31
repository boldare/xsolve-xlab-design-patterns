<?php

/**
 * @author Adrian Zurek <adrian.zurek@xsolve.pl>
 */

namespace XSolve\Workshop\Kata\Service\Provider;

use Silex\Api\ControllerProviderInterface;
use Silex\Application;
use Silex\ControllerCollection;
use XSolve\Workshop\Kata\Controller\DefaultController;

class ControllerProvider implements ControllerProviderInterface
{
    /**
     * @param Application $app
     *
     * @return ControllerCollection
     */
    public function connect(Application $app)
    {
        $app['controller.default'] = function() use($app) {
            return new DefaultController($app['service.example']);
        };

        /** @var ControllerCollection $controllers */
        $controllers = $app['controllers_factory'];

        $controllers->match('/example', [$app['controller.default'], 'exampleAction'])
            ->method('GET');

        $controllers->match('/products', [$app['controller.default'], 'listAction'])
            ->method('GET');

        $controllers->match('/order', [$app['controller.default'], 'orderAction'])
            ->method('POST');

        return $controllers;
    }
}
