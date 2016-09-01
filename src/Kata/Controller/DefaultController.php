<?php

/**
 * @author Adrian Zurek <adrian.zurek@xsolve.pl>
 */

namespace XSolve\Workshop\Kata\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Xsolve\Workshop\Kata\Example\Service\ExampleService;

class DefaultController
{
    /**
     * @var ExampleService
     */
    protected $exampleService;

    /**
     * @param ExampleService $service
     */
    public function __construct(ExampleService $service)
    {
        $this->exampleService = $service;
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function exampleAction(Request $request)
    {
        return new JsonResponse(['service' => $this->exampleService->foo()]);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function productsAction(Request $request)
    {
        $category = $request->query->get('category');

        return new JsonResponse(['products' => []]);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function orderAction(Request $request)
    {
        $clientId = $request->request->get('client_id');
        $items = $request->request->get('items');

        return new JsonResponse(['order' => []]);
    }
}
