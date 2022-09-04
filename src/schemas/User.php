<?php


namespace schemas;

class User
{
    public function __construct(
        $name,
        $age
    )
    {
        $this->name = $name;
        $this->age = $age;
    }
}
