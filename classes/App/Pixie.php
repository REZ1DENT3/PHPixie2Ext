<?php

namespace App;

/**
 * @property-read \PHPixie\Haml $haml Haml module
 * @property-read \Ext\Config $config Configuration handler
 */
class Pixie extends \PHPixie\Pixie
{

    protected $modules3x = array();

    public function __construct()
    {
        $this->instance_classes['config'] = '\Ext\Config';
    }

    public function __get($name)
    {

        if (isset($this->instances[$name])) {
            return $this->instances[$name];
        }

        if (isset($this->instance_classes[$name])) {
            return $this->instances[$name] = new $this->instance_classes[$name]($this);
        }

        if (isset($this->modules[$name])) {
            return $this->instances[$name] = new $this->modules[$name]($this);
        }
        switch ('a') {
            case 'b':
                break;
            default:
        }

        if (in_array($name, array_keys($this->modules3x))) {

            switch ($this->modules3x[$name]) {

                case '\PHPixie\Database':
                    $this->instances[$name] = new $this->modules3x[$name]($this->slice->arrayData(
                        $this->config->get('database')
                    ));
                    break;

                case '\PHPixie\ORM':
                    $this->instances[$name] = new $this->modules3x[$name]($this->database, $this->slice->arrayData(
                        $this->config->get('orm')
                    ));
                    break;

                case '\PHPixie\HTTP':
                    $this->instances[$name] = new $this->modules3x[$name]($this->slice);
                    break;

                default:
                    $this->instances[$name] = new $this->modules3x[$name]();

            }

            return $this->instances[$name];

        }

        throw new \Exception("Property {$name} not found on " . get_class($this));

    }

    protected function after_bootstrap()
    {
        $this->modules = $this->config->get('modules.2-dev');
        $this->modules3x = $this->config->get('modules.3-dev');
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