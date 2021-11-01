<?php

namespace Jaroslavv\Cms\Controller;

use Jaroslavv\Framework\Http\Controller\ControllerInterface;
use Jaroslavv\Framework\Http\Request\Request;

class PageController implements ControllerInterface
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
        $page = $this->request->getParameter('page') . '.php';

        ob_start();
        require_once "../src/page.php";
        return ob_get_clean();
    }
}
