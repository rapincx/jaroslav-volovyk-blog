<?php

declare(strict_types=1);

use Jaroslavv\Blog\Router as BlogRouter;
use Jaroslavv\Cms\Router as CmsRouter;
use Jaroslavv\ContactUs\Router as ContactUsRouter;
use Jaroslavv\Framework\Http\Request\RequestDispatcher;
use function DI\get;

return [
    RequestDispatcher::class => DI\autowire()->constructorParameter(
        'routers',
        [
            get(BlogRouter::class),
            get(CmsRouter::class),
            get(ContactUsRouter::class),
        ]
    ),
];
