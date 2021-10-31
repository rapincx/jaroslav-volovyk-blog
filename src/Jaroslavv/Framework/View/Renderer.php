<?php

declare(strict_types=1);

namespace Jaroslavv\Framework\View;

use DI\DependencyException;
use DI\FactoryInterface;
use DI\NotFoundException;

class Renderer
{
    private FactoryInterface $factory;

    private string $contentBlockClass;

    private string $contentBlockTemplate;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(
        FactoryInterface $factory
    )
    {
        $this->factory = $factory;
    }

    public function getContent(): string
    {
        return $this->contentBlockClass;
    }

    /**
     * @param string $contentBlockClass
     * @param string $template
     * @return Renderer
     */
    public function setContent(string $contentBlockClass, string $template = ''): Renderer
    {
        $this->contentBlockClass = $contentBlockClass;
        $this->contentBlockTemplate = $template;

        return $this;
    }

    /**
     * @return string
     */
    public function getContentBlockTemplate(): string
    {
        return $this->contentBlockTemplate;
    }

    /**
     * @param string $blockClass
     * @param string $template
     * @return string
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function render(string $blockClass, string $template = ''): string
    {
        /** @var Block $block */
        $block = $this->factory->make($blockClass);

        if ($template) {
            $block->setTemplate($template);
        }

        ob_start();
        require_once $block->getTemplate();
        return ob_get_clean();
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function __toString()
    {
        return $this->render(Block::class, '../src/page.php');
    }
}
