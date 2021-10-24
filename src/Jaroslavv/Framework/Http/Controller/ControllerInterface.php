<?php

declare(strict_types=1);

namespace Jaroslavv\Framework\Http\Controller;

interface ControllerInterface
{
    public function execute(): string;
}
