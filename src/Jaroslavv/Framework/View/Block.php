<?php

declare(strict_types=1);

namespace Jaroslavv\Framework\View;

class Block
{
    protected string $template = '';

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @param string $template
     * @return $this
     */
    public function setTemplate(string $template): Block
    {
        $this->template = $template;

        return $this;
    }
}
