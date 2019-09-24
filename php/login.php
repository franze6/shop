<?php
if (isset($_REQUEST['do'])) {
    if ($_REQUEST['do'] == "login" && isset($_REQUEST['login']) && isset($_REQUEST['pass'])) {

        $db = db_connect();

        $login = md5($_REQUEST['login']);
        $pass = md5($_REQUEST['pass']);

        $query = $db->prepare("SELECT `id`, `first_name`, `last_name` FROM users WHERE `login`= :login and `password`= :pass limit 0,1");
        $query->execute(array('login' => $login, 'pass' => $pass));

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
        setcookie("token", $token, time() + 60 * 60);

        if ($db->exec("UPDATE `sessions` SET `token`='$token' WHERE `user_id`=$id") == 0) {
            $db->exec("INSERT INTO `sessions` (`id`, `token`, `user_id`) VALUES (NULL, '$token', '$id')");
        }

        echo 1;

    } elseif ($_REQUEST['do'] == "login") {
        echo json_encode(is_login());

    } elseif ($_REQUEST['do'] == "reg" && isset($_REQUEST['login']) && isset($_REQUEST['pass']) &&
        isset($_REQUEST['fst_name']) && isset($_REQUEST['lst_name'])) {
        add_user();
    }

}

function is_login() {
    $db = db_connect();

    session_start([
        'cookie_lifetime' => 86400,
    ]);

    if (!isset($_COOKIE['token'])) {
        return 0;
    }

    $query = $db->prepare("SELECT `user_id` FROM sessions WHERE `token`= :token limit 0,1");
    $query->execute(array('token'=>$_COOKIE['token']));

    $id = $query->fetch()['user_id'];
    if ($id == "") {
        return 0;
    }

    $query = $db->query("SELECT `first_name`, `last_name` FROM users WHERE `id` = $id limit 0,1");
    $user_data = $query->fetch();
    $user_data['id'] = $id;

    return $user_data;
}

function add_user() {
    $res = validate_reg_data();
    if($res != "") {
        echo $res;
        return;
    }

    $hlogin = md5($_REQUEST['login']);
    $hpass= md5($_REQUEST['pass']);

    $db = db_connect();

    $query = $db->prepare("SELECT `id` FROM `users` WHERE `login` = '$hlogin'");
    $query->execute();
    if (isset($query->fetch()['id'])) {
        echo "Пользователь с таким логином уже есть в базе";
        return;
    }

    $query = $db->prepare("INSERT INTO `users`(`id`, `login`, `password`, `first_name`, `last_name`) VALUES (NULL, '$hlogin', '$hpass', :fst_n, :lst_n)");
    $query->execute(array('fst_n'=>$_REQUEST['fst_name'], 'lst_n'=>$_REQUEST['lst_name']));
    echo "1";

}

function validate_reg_data() {
    $login_p = "/^[a-zA-Z][a-zA-Z0-9-_\.]{3,30}$/";
    $pass_p = "/(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";
    $name_p = "/^[а-яА-ЯёЁa-zA-Z0-9]+$/";

    if(!preg_match($login_p, $_REQUEST['login'])) return "Логин может содержать латинский алфавит, цифры, символы - и _, а так же точку. Длина от 3 до 30 символов.";
    if(!preg_match($pass_p, $_REQUEST['pass'])) return "Пароль может содержать латинский алфавит и спец. символы. Длина от 6 символов.";
    //if(!preg_match($name_p, $_REQUEST['fst_name'])) return "Имя может содержать кириллицу и латинские символы.";
    //if(!preg_match($name_p, $_REQUEST['lst_name'])) return "Фамилия может содержать кириллицу и латинские символы.";
}


