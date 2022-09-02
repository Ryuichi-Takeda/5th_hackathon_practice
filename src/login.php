<?php
session_start();
require('./Config.php');

if(!empty($_POST)){
    $db = new Connect;
    $login = $db->prepare('SELECT * FROM users WHERE name=?');
    $login->execute(array(
        $_POST['name']
        // sha1($POST['pasword'])
    ));
    $user = $login->fetch();
    
    if($user){
        // $_SESSION = array();
        // $_SESSION['user_id'] = $user['id'];
        // $_SESSION['time'] = time();
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/index.php');
        exit();
    }else{
        $error = 'fail';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <div>
        <h1>
            <form action="" method="POST">
                <input type="name" name="name">
                <input type="submit" value="login">
            </form>
        </h1>
    </div>
</body>
</html>