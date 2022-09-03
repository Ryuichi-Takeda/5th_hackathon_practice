<?php

require_once __DIR__ . '/config.php';

class API
{
    function Select() {
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
        return json_encode($users);
    }
}

$api = new API;
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
echo $api->Select();
