<?php

declare(strict_types=1);

namespace Jaroslavv\Blog\Repository;

use DI\DependencyException;
use DI\FactoryInterface;
use DI\NotFoundException;
use Jaroslavv\Blog\Model\Category\Entity;
use Jaroslavv\Framework\Repository\RepositoryInterface;

class CategoryRepository implements RepositoryInterface
{
    private FactoryInterface $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return Entity[]
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function getList(): array
    {
        return [
            1 => $this->makeEntity()
                ->setCategoryId(1)
                ->setName('PHP')
                ->setUrl('php')
                ->setPostIds([1, 2, 3]),
            2 => $this->makeEntity()
                ->setCategoryId(1)
                ->setName('Laravel')
                ->setUrl('laravel')
                ->setPostIds([4, 5, 6]),
            3 => $this->makeEntity()
                ->setCategoryId(1)
                ->setName('Symfony')
                ->setUrl('symfony')
                ->setPostIds([7, 8, 9]),
        ];
    }

    /**
     * @param string $url
     * @return Entity|null
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function getByUrl(string $url): ?Entity
    {
        $data = array_filter(
            $this->getList(),
            static function ($category) use ($url) {
                return $category->getUrl() === $url;
            }
        );

        return array_pop($data);
    }

    /**
     * @return Entity
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function makeEntity(): Entity
    {
        return $this->factory->make(Entity::class);
    }
}
