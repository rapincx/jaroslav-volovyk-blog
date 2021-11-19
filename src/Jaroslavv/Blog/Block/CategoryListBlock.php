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

    protected string $template = 'category_list.php';

    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getView(): string
    {
        return __DIR__ . '/../view/';
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
