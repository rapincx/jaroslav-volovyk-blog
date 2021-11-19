<?php

declare(strict_types=1);

namespace Jaroslavv\Framework\Http\Controller;

use Jaroslavv\Framework\Http\Response\Raw;

interface ControllerInterface
{
    public function execute(): Raw;
}
