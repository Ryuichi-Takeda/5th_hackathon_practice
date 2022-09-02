<?php

namespace models;

class User
{
    public function __construct(
        $id,
        $name,
        $age
    ){
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }
}