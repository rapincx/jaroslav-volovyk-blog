<?php

declare(strict_types=1);

namespace Jaroslavv\ContactUs\Controller;

use Jaroslavv\Framework\Http\Controller\ControllerInterface;
use Jaroslavv\Framework\Http\Response\Raw;
use Jaroslavv\Framework\View\Block;
use Jaroslavv\Framework\View\PageResponse;

class FormController implements ControllerInterface
{
    private PageResponse $pageResponse;

    /**
     * @param PageResponse $pageResponse
     */
    public function __construct(PageResponse $pageResponse)
    {
        $this->pageResponse = $pageResponse;
    }

    /**
     * @return Raw
     */
    public function execute(): Raw
    {
        return $this->pageResponse->setBody(
            Block::class,
            '../src/Jaroslavv/ContactUs/view/contact-us.php'
        );
    }
}
