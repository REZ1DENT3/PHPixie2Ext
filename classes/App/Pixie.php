<?php

namespace App;

/**
// * @property-read \PHPixie\DB $db Database module
// * @property-read \PHPixie\ORM $orm ORM module
// * @property-read \PHPixie\Auth $auth Auth module
// * @property-read \PHPixie\Email $email Email module
// * @property-read \PHPixie\Image $image Image module
// * @property-read \PHPixie\Cache $cache Cache module
 * @property-read \PHPixie\Haml $haml Haml module
 * @property-read \Ext\Config $config Configuration handler
 */
class Pixie extends \PHPixie\Pixie
{

    public function __construct()
    {
        $this->instance_classes['config'] = '\Ext\Config';
    }

    protected function after_bootstrap()
    {
        $this->modules = $this->config->get('modules.2-dev');
        date_default_timezone_set('Europe/Moscow');
        mb_internal_encoding('UTF-8');
    }

    public function controller($class)
    {
        if (!class_exists($class)) {
            throw new \PHPixie\Exception\PageNotFound("Class {$class} doesn't exist");
        }
        return new $class($this);
    }

}