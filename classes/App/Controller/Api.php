<?php

namespace App\Controller;

//http://stackoverflow.com/questions/12806386/standard-json-api-response-format
//http://eax.me/rest/
//http://www.tutorialspoint.com/restful/restful_introduction.htm

class Api extends \App\RESTful
{

    public function usersGet($data)
    {
        return $data;
    }

    public function usersPost($data)
    {
        return $data;
    }

    public function usersDelete($data)
    {
        return $data;
    }

}