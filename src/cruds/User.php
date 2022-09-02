<?php

namespace cruds;

class User
{
    public function __construct($db)
    {
        $this->db = $db;
    }

    private function getuser($db,$user_id)
    {
        $stmt = $db->prepare("SELECT
        *
        FROM users
        WHERE id = :user_id
        ");
        $stmt->bindValue(":user_id",$user_id,\PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch();
        return $user;
    }
}