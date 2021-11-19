<?php

declare(strict_types=1);

use Jaroslavv\Blog\Router as BlogRouter;
use Jaroslavv\Cms\Router as CmsRouter;
use Jaroslavv\ContactUs\Router as ContactUsRouter;
use Jaroslavv\Install\Router as InstallRouter;
use Jaroslavv\Framework\Database\Adapter\AdapterInterface;
use Jaroslavv\Framework\Database\Adapter\MySQL;
use Jaroslavv\Framework\Http\Request\RequestDispatcher;
use function DI\get;

return [
    AdapterInterface::class => DI\get(
        MySQL::class
    ),
    MySQL::class => DI\autowire()->constructorParameter(
        'connectionParams',
        [
            MySQL::DB_NAME => 'jaroslavv_blog',
            MySQL::DB_USER => 'jaroslavv_blog_user',
            MySQL::DB_PASSWORD => '45Ya!$""sT&P*C%RNSEhr',
            MySQL::DB_HOST => 'mysql',
            MySQL::DB_PORT => '3306'
        ]
    ),
    RequestDispatcher::class => DI\autowire()->constructorParameter(
        'routers',
        [
            get(BlogRouter::class),
            get(CmsRouter::class),
            get(ContactUsRouter::class),
            get(InstallRouter::class),
        ]
    ),
];
