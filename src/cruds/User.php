<?php


namespace cruds;
use PDO;


class User
{
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function users() {
        $users = array();
        $data = $this->db->prepare('SELECT * from users ORDER BY id');
        $data->execute();
        while ($d = $data->fetch(PDO::FETCH_ASSOC)) {
            $users[$d['id']] = array(
                'id' => $d['id'],
                'name' => $d['name'],
                'age' => $d['age'],
            );
        }
        return json_encode($users);
    }
}
