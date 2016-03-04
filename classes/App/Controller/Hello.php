<?php

namespace App\Controller;

class Hello extends \App\Page
{

    public function publicAction()
    {
        return $this->pixie->getDirectoryPublic();
    }

    public function defaultAction()
    {
        $this->view = 'main';

        $this->view->subview = 'hello';

        $this->view->title = $this->pixie->i18n->get('hello.title');
        $this->view->message = $this->pixie->i18n->get('hello.message');
    }

    public function jsonAction()
    {
        return [
            'title' => 'Hello',
            'body' => 'Have fun coding'
        ];
    }

}
