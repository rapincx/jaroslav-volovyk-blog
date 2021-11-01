<?php

declare(strict_types=1);

namespace Jaroslavv\Blog;

use Jaroslavv\Blog\Controller\CategoryController;
use Jaroslavv\Blog\Controller\ArticleController;
use Jaroslavv\Framework\Http\Request\Request;
use Jaroslavv\Framework\Http\Request\RouterInterface;

class Router implements RouterInterface
{
    private Request $request;

    /**
     * @param Request $request
     */
    public function __construct(
        Request $request
    )
    {
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        require_once '../src/data.php';

        if ($data = blogGetCategoryByUrl($requestUrl)) {
            $this->request->setParameter('category', $data);
            return CategoryController::class;
        }

        if ($data = blogGetArticleByUrl($requestUrl)) {
            $this->request->setParameter('article', $data);
            return ArticleController::class;
        }

        return '';
    }
}
