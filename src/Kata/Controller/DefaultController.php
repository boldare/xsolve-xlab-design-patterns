<?php

/**
 * @author Adrian Zurek <adrian.zurek@xsolve.pl>
 */

namespace XSolve\Workshop\Kata\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
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
     * @return JsonResponse
     */
    public function exampleAction()
    {
        return new JsonResponse(['service' => $this->exampleService->foo()]);
    }

    /**
     * @return JsonResponse
     */
    public function listAction()
    {
        return new JsonResponse(['products' => []]);
    }

    /**
     * @return JsonResponse
     */
    public function orderAction()
    {
        return new JsonResponse(['order' => []]);
    }
}
