<?php

namespace Jaroslavv\Blog\Block;

use DI\DependencyException;
use DI\NotFoundException;
use Jaroslavv\Blog\Model\Category\Entity as CategoryEntity;
use Jaroslavv\Blog\Model\Post\Entity as PostEntity;
use Jaroslavv\Blog\Repository\PostRepository;
use Jaroslavv\Framework\Http\Request\Request;
use Jaroslavv\Framework\View\Block;

class CategoryBlock extends Block
{
    private Request $request;

    private PostRepository $postRepository;

    protected string $template = 'category.php';

    /**
     * @param Request $request
     * @param PostRepository $postRepository
     */
    public function __construct(
        Request        $request,
        PostRepository $postRepository
    )
    {
        $this->request = $request;
        $this->postRepository = $postRepository;
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
     * @return CategoryEntity
     */
    public function getCategory(): CategoryEntity
    {
        return $this->request->getParameter('category');
    }

    /**
     * @return PostEntity[]
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function getCategoryPosts(): array
    {
        return $this->postRepository->getByIds(
            $this->getCategory()->getPostIds()
        );
    }
}
