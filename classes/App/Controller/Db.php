<?php

namespace App\Controller;

use App\RESTful;

class Db extends RESTful
{
    public function defaultGet()
    {

        $this->view = 'main';
        $this->view->title = 'Test';
        $this->view->subview = 'hello';
        $this->view->message = 'Have fun coding';

        $orm = $this->pixie->orm;

        $newArticle = $orm->createEntity('article');
        $newArticle->title = 'Hello';
        $newArticle->content = 'Hello World';

        return $orm->query('article')
            ->find()
            ->asArray(true);

    }
}