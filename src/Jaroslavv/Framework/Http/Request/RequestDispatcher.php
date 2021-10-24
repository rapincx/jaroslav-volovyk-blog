<?php

declare(strict_types=1);

namespace Jaroslavv\Framework\Http\Request;

use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use InvalidArgumentException;
use Jaroslavv\Framework\Http\Controller\ControllerInterface;

class RequestDispatcher
{
    /**
     * @var RouterInterface[] $routers
     */
    private array $routers;

    private Request $request;

    private Container $container;

    /**
     * @param array     $routers
     * @param Request   $request
     * @param Container $container
     */
    public function __construct(
        array     $routers,
        Request   $request,
        Container $container
    )
    {
        foreach ($routers as $router) {
            if (!($router instanceof RouterInterface)) {
                throw new InvalidArgumentException('Routers must implement ' . RouterInterface::class);
            }
        }

        $this->routers = $routers;
        $this->request = $request;
        $this->container = $container;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function dispatch(): void
    {
        $requestUrl = $this->request->getRequestUrl();

        foreach ($this->routers as $router) {
            if ($controllerClass = $router->match($requestUrl)) {
                $controller = $this->container->get($controllerClass);

                if (!($controller instanceof ControllerInterface)) {
                    throw new InvalidArgumentException(
                        "Controller $controller must implement " . ControllerInterface::class
                    );
                }

                $html = $controller->execute();
            }
        }

        if (!isset($html)) {
            header("HTTP/1.0 404 Not Found");
            exit(0);
        }

        header('Content-Type: text/html; charset=utf-8');
        echo $html;
    }
}
