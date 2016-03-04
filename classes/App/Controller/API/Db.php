<?php

namespace App\Controller\API;

use App\RESTful;

class Db extends RESTful
{
    public function defaultGet()
    {

        $orm = $this->pixie->orm;

        $newArticle = $orm->createEntity('article');
        $newArticle->title = 'Hello';
        $newArticle->content = 'Hello World';
        $newArticle->created = time();
        $newArticle->save();

        return $orm->query('article')
            ->orderDescendingBy('id')
            ->find()
            ->asArray(true);

    }
}