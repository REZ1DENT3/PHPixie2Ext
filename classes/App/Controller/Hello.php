<?php

namespace App\Controller;

class Hello extends \App\Page
{

    public function defaultAction()
    {
        $this->view = 'main';
        $this->view->title = 'hello';
        $this->view->subview = 'hello';
        $this->view->message = 'Have fun coding';
    }

    public function jsonAction()
    {
        return [
            'title' => 'Hello',
            'body' => 'Have fun coding'
        ];
    }

}
