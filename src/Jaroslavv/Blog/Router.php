<?php

declare(strict_types=1);

namespace Jaroslavv\Blog;

use DI\DependencyException;
use DI\NotFoundException;
use Jaroslavv\Blog\Controller\CategoryController;
use Jaroslavv\Blog\Controller\PostController;
use Jaroslavv\Blog\Repository\CategoryRepository;
use Jaroslavv\Blog\Repository\PostRepository;
use Jaroslavv\Framework\Http\Request\Request;
use Jaroslavv\Framework\Http\Request\RouterInterface;

class Router implements RouterInterface
{
    private Request $request;

    private CategoryRepository $categoryRepository;

    private PostRepository $postRepository;

    /**
     * @param Request            $request
     * @param CategoryRepository $categoryRepository
     * @param PostRepository     $postRepository
     */
    public function __construct(
        Request $request,
        CategoryRepository $categoryRepository,
        PostRepository $postRepository
    ) {
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * @param string $requestUrl
     *
     * @return string
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function match(string $requestUrl): string
    {
        if ($category = $this->categoryRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('category', $category);
            return CategoryController::class;
        }

        if ($post = $this->postRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('post', $post);
            return PostController::class;
        }

        return '';
    }
}
