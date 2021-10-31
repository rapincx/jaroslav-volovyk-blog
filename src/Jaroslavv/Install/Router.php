<?php

namespace Jaroslavv\Install;

use Jaroslavv\Framework\Http\Request\Request;
use Jaroslavv\Framework\Http\Request\RouterInterface;
use Jaroslavv\Install\Controller\IndexController;

class Router implements RouterInterface
{
    private Request $request;

    /**
     * @param Request $request
     */
    public function __construct(
        Request $request
    )
    {
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($this->request->getRequestUrl() === 'install') {
            return IndexController::class;
        }

        return '';
    }
}
