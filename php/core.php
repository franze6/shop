<?php
function db_connect()
{
    include "cfg/cfg.inc.php";
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $db = new PDO($dsn, $user, $pass);
    return $db;
}

function get_logo()
{
    $db = db_connect();

    $query = $db->prepare("SELECT `value` FROM sys_values WHERE `name`='logo_img' LIMIT 0,1");
    $query->execute();
    return $query->fetch()['value'];
}