<?php

namespace Jaroslavv\Blog\Block;

use Jaroslavv\Blog\Model\Post\Entity;
use Jaroslavv\Framework\Http\Request\Request;
use Jaroslavv\Framework\View\Block;

class PostBlock extends Block
{
    private Request $request;

    protected string $template = 'post.php';

    /**
     * @param Request $request
     */
    public function __construct(
        Request $request
    )
    {
        $this->request = $request;
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
     * @return Entity
     */
    public function getPost(): Entity
    {
        return $this->request->getParameter('post');
    }
}
