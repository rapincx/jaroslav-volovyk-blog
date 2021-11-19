<?php

declare(strict_types=1);

namespace Jaroslavv\Framework\Database\Adapter;

interface AdapterInterface
{
    public function getConnection();
}