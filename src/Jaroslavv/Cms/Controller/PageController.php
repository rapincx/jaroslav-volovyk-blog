<?php

declare(strict_types=1);

namespace Jaroslavv\Cms\Controller;

use Jaroslavv\Framework\Http\Controller\ControllerInterface;
use Jaroslavv\Framework\Http\Request\Request;
use Jaroslavv\Framework\Http\Response\Raw;
use Jaroslavv\Framework\View\Block;
use Jaroslavv\Framework\View\PageResponse;

class PageController implements ControllerInterface
{
    private Request $request;

    private PageResponse $pageResponse;

    /**
     * @param Request $request
     * @param PageResponse $pageResponse
     */
    public function __construct(
        Request      $request,
        PageResponse $pageResponse
    )
    {
        $this->pageResponse = $pageResponse;
        $this->request = $request;
    }

    /**
     * @return Raw
     */
    public function execute(): Raw
    {
        return $this->pageResponse->setBody(
            Block::class,
            '../src/Jaroslavv/Cms/view/' . $this->request->getParameter('page') . '.php'
        );
    }
}
