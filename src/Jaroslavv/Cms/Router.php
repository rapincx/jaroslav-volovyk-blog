<?php

namespace Jaroslavv\Cms;

use Jaroslavv\Cms\Controller\PageController;
use Jaroslavv\Framework\Http\Request\Request;
use Jaroslavv\Framework\Http\Request\RouterInterface;

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
        $cmsPage = [
            '',
            'test-page',
            'test-page-2',
        ];

        if (in_array($requestUrl, $cmsPage)) {
            $this->request->setParameter('page', $requestUrl ?: 'home');

            return PageController::class;
        }

        return '';
    }
}
