<?php 
/**
 * Available methods: 
    * route()
 */

namespace App\Services\Html\Traits;

trait Pipeline
{
    /**
     * Set the route value
     * @return this
     */
    private function route($route)
    {
        $this->route = $route;

        return $this; 
    }

    /**
     * Set the class values
     * @return this
     */
    private function class($class)
    {
        $this->class = $class;

        return $this; 
    }

    /**
     * Set the target value
     * @return this
     */
    private function target($target)
    {
        $this->target = $target;

        return $this; 
    }

    /**
     * Set the type value
     * @return this
     */
    private function type($type)
    {
        $this->type = $type;

        return $this; 
    }

    /**
     * Set the width value
     * @return this
     */
    private function width($width)
    {
        $this->width = $width;

        return $this; 
    }

    /**
     * Set the folder value
     * @return this
     */
    private function folder($folder)
    {
        $this->folder = $folder;

        return $this; 
    }
}