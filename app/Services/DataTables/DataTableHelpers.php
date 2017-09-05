<?php

namespace App\Services\DataTables;

trait DataTableHelpers
{
    protected $getValue;

    /**
     * Set value from the controller to the Datatable constructor
     * @param string $value
     * @return object
     */
    public function setValue($value) {
        $this->getValue = $value;
        return $this;
    }

    /**
     * Get value from the controller to the Datatable constructor
     * @param string $value
     * @return object
     */
    public function getValue($value) {
        return $this->getValue;
    }

    /**
     * Set value from the controller to the Datatable constructor
     * @param string $value
     * @return object
     */
    public function getAction() {
        return $this->action 
            ? action_path($this->section) 
            : action_path();
    }
}