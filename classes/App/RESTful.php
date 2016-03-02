<?php

namespace App;

abstract class RESTful extends Page
{

    public function actionDefault($data)
    {
        return $data;
    }

    public function run($action)
    {

        $action .= ucfirst(strtolower($this->request->method));

        if (!method_exists($this, $action)) {
            $action = 'actionDefault';
        }

        $data = null;
        $this->execute = true;

        $this->before();

        if ($this->execute) {
            $data = $this->$action(
                (in_array($this->request->method, ['GET', 'DELETE', 'HEAD']) ?
                    $this->request->get() :
                    $this->request->post()

                ) + $this->request->param()
            );
        }

        if ($this->execute) {
            $this->next($data);
        }

    }

}