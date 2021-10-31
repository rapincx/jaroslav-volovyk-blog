<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Jaroslavv\Framework\Http\Request\RequestDispatcher;

require_once '../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();

try {
    $containerBuilder->addDefinitions('../config/di.php');
    $container = $containerBuilder->build();
    /** @var RequestDispatcher $requestDispatcher */
    $requestDispatcher = $container->get(RequestDispatcher::class);
    $requestDispatcher->dispatch();
} catch (Exception $e) {
    echo "{$e->getMessage()} in file {$e->getFile()} at line {$e->getLine()}";
    exit(1);
}