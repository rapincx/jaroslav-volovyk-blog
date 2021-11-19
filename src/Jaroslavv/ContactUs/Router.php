<?php

namespace Jaroslavv\ContactUs;

use Jaroslavv\ContactUs\Controller\FormController;
use Jaroslavv\Framework\Http\Request\RouterInterface;

class Router implements RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($requestUrl === 'contact-us') {
            return FormController::class;
        }

        return '';
    }
}