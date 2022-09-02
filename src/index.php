<?php

require_once __DIR__ . '/Config.php';

class API
{
    function Select() {
        $db = new Connect;
        $users = array();
        $data = $db->prepare('SELECT * FROM users ORDER BY id');
        $data->execute();
        while ($d = $data->fetch(PDO::FETCH_ASSOC)) {
            $users[$d['id']] = array(
                'id' => $d['id'],
                'name' => $d['name'],
                'age' => $d['age'],
            );
        }
        return json_encode($users,JSON_UNESCAPED_UNICODE);
    }
}

$api = new API;
header('Content-Type: application/json;charset=utf-8');
echo $api->Select();
