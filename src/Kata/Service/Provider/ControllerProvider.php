<?php

/**
 * @author Adrian Zurek <adrian.zurek@xsolve.pl>
 */

namespace XSolve\Workshop\Kata\Service\Provider;

use Silex\Api\ControllerProviderInterface;
use Silex\Application;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\Request;
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
        $app->before(function(Request $request) {
            if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
                $data = json_decode($request->getContent(), true);
                $request->request->replace(is_array($data) ? $data : array());
            }
        });

        $app['controller.default'] = function() use($app) {
            return new DefaultController($app['service.example']);
        };

        /** @var ControllerCollection $controllers */
        $controllers = $app['controllers_factory'];

        $controllers->get('/products', 'controller.default:productsAction');
        $controllers->post('/order', 'controller.default:orderAction');
        $controllers->get('/example', 'controller.default:exampleAction');

        return $controllers;
    }
}
