<?php
include_once "core.php";
if($_REQUEST['do']=="login" && isset($_REQUEST['login']) && isset($_REQUEST['pass'])) {

    $db = db_connect();

    $login = md5($_REQUEST['login']);
    $pass = md5($_REQUEST['pass']);

    $query = $db->prepare("SELECT `id`, `first_name`, `last_name` FROM users WHERE `login`= :login and `password`= :pass limit 0,1");
    $query->execute(array('login'=>$login, 'pass'=>$pass));

    $user_data = $query->fetch();

    $id = $user_data['id'];
    if ($id == "") {
        echo "0";
        return;
    }


    $token = md5(rand(0, 1000));

    session_start([
        'cookie_lifetime' => 86400,
    ]);
    setcookie("token", $token, time() + 60*60);

    if ($db->exec("UPDATE `sessions` SET `token`='$token' WHERE `user_id`=$id") == 0) {
        echo "3";
        $db->exec("INSERT INTO `sessions` (`id`, `token`, `user_id`) VALUES (NULL, $token, $id)");
    }

    echo json_encode($user_data);

} elseif ($_REQUEST['do']=="login") {
    $db = db_connect();

    session_start([
        'cookie_lifetime' => 86400,
    ]);

    if (!isset($_COOKIE['token'])) {
        echo "0";
        return;
    }

    $query = $db->prepare("SELECT `user_id` FROM sessions WHERE `token`= :token limit 0,1");
    $query->execute(array('token'=>$_COOKIE['token']));

    $id = $query->fetch()['user_id'];
    if ($id == "") {
        echo "0";
        return;
    }

    $query = $db->query("SELECT `first_name`, `last_name` FROM users WHERE `id` = $id limit 0,1");
    $user_data = $query->fetch();

    echo json_encode($user_data);

}

