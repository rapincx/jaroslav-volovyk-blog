<?php

namespace Jaroslavv\Blog\Block;

use Jaroslavv\Blog\Model\Post\Entity;
use Jaroslavv\Framework\Http\Request\Request;
use Jaroslavv\Framework\View\Block;

class PostBlock extends Block
{
    private Request $request;

    protected string $template = '../src/DVCampus/Catalog/view/product.php';

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
     * @return Entity
     */
    public function getPost(): Entity
    {
        return $this->request->getParameter('post');
    }
}
