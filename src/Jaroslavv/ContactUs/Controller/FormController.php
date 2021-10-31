<?php

namespace Jaroslavv\ContactUs\Controller;

use Jaroslavv\Framework\Http\Controller\ControllerInterface;

class FormController implements ControllerInterface
{
    public function execute(): string
    {
        $page = 'contact-us.php';

        ob_start();
        require_once "../src/page.php";
        return ob_get_clean();
    }
}