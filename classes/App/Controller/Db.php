<?php

namespace App\Controller;

use App\Page;

class Db extends Page
{
    public function defaultAction()
    {
        $this->view = 'main';
        $this->view->title = 'Test';
        $this->view->subview = 'hello';
        $this->view->message = 'Have fun coding';
    }
}