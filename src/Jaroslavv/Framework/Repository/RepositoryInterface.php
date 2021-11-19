<?php

namespace Jaroslavv\Framework\Repository;

use Jaroslavv\Framework\Model\BaseEntity;

interface RepositoryInterface
{
    public function makeEntity(): BaseEntity;
}