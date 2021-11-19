<?php

declare(strict_types=1);

namespace Jaroslavv\Framework\Http\Request;

interface RouterInterface
{
    /**
     * @param string $requestUrl
     *
     * @return string
     */
    public function match(string $requestUrl): string;
}
