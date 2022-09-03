<?php


namespace cruds;
use database\Database;


class Base
{
    public function __construct($db)
    {
        $this->db = $db;
    }
}
