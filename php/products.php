<?php


if(isset($_REQUEST['do']))
{
    if($_REQUEST['do'] = "list")
    {
        products_list();
    }
}


function products_list() {
    $db = db_connect();

    $query = $db->prepare("SELECT * FROM products WHERE 1 limit 0,30");
    $query->execute();
    $products_data = $query->fetchAll();
    echo json_encode($products_data);

}

function add_product() {

}

function del_product() {

}

function edit_product() {

}

function db_connect()
{
    include "../cfg/cfg.inc.php";
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $db = new PDO($dsn, $user, $pass);
    return $db;
}