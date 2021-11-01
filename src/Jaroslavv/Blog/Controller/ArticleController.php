<?php

namespace Jaroslavv\Blog\Controller;

use Jaroslavv\Framework\Http\Controller\ControllerInterface;
use Jaroslavv\Framework\Http\Request\Request;

class ArticleController implements ControllerInterface
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

    public function execute(): string
    {
        $data = $this->request->getParameter('article');
        $page = 'article.php';

        ob_start();
        require_once "../src/page.php";
        return ob_get_clean();
    }
}