<?php

namespace App\Controller;

class Hello extends \App\Page
{

    public function getPathImageWithId($id)
    {
        return $this->getDirectoryPublic() . 'images/' . implode('/', str_split($id));
    }

    public function getDirectoryPublic()
    {
        return $this->pixie->root_dir . '/web/public/';
    }

    public function defaultAction()
    {
        $this->view = 'main';

        $this->view->subview = 'hello';

        $this->view->i18n = $this->pixie->i18n;

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
