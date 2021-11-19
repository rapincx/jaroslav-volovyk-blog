<?php

declare(strict_types=1);

namespace Jaroslavv\Blog\Controller;

use Jaroslavv\Blog\Block\PostBlock;
use Jaroslavv\Framework\Http\Controller\ControllerInterface;
use Jaroslavv\Framework\Http\Response\Raw;
use Jaroslavv\Framework\View\PageResponse;

class PostController implements ControllerInterface
{
    private PageResponse $pageResponse;

    /**
     * @param PageResponse $pageResponse
     */
    public function __construct(
        PageResponse $pageResponse
    )
    {
        $this->pageResponse = $pageResponse;
    }

    /**
     * @return Raw
     */
    public function execute(): Raw
    {
        return $this->pageResponse->setBody(PostBlock::class);
    }
}
