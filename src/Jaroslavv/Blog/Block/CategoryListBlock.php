<?php

namespace Jaroslavv\Blog\Block;

use DI\DependencyException;
use DI\NotFoundException;
use Jaroslavv\Blog\Model\Category\Entity;
use Jaroslavv\Blog\Repository\CategoryRepository;
use Jaroslavv\Framework\View\Block;

class CategoryListBlock extends Block
{
    private CategoryRepository $categoryRepository;

    protected string $template = '../src/DVCampus/Catalog/view/category_list.php';

    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return Entity[]
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function getCategories(): array
    {
        return $this->categoryRepository->getList();
    }
}
