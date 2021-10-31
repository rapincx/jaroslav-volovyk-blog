<?php

namespace Jaroslavv\Framework\View;

class PageResponse
{
    private Renderer $renderer;

    /**
     * @param Renderer $renderer
     */
    public function __construct(
        Renderer $renderer
    ) {
        $this->renderer = $renderer;
    }

    /**
     * @param string $contentBlocClass
     * @param string $template
     * @return PageResponse
     */
    public function setBody(string $contentBlocClass, string $template = ''): PageResponse
    {
        return parent::setBody($this->renderer->setContent($contentBlocClass, $template)->__toString());
    }
}
