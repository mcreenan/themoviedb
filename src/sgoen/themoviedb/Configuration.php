<?php

namespace sgoen\themoviedb;

class Configuration
{
    public $images;
    public $change_keys;

    public function __construct($data)
    {
        $this->fromArray($data);
    }

    public function fromArray($arr)
    {
        foreach ($arr as $key => $value) {
            if (property_exists(__CLASS__, $key)) {
                $this->$key = $value;
            }
        }
    }
}
