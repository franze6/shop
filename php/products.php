<?php


if(isset($_REQUEST['do']))
{
    if($_REQUEST['do'] = "list")
    {
        products_list();
    }
}


function products_list($start= 0, $count=30) {
    $db = db_connect();

    $query = $db->prepare("SELECT * FROM products WHERE 1 limit $start,$count;");
    $query->execute();
    $products_data = $query->fetchAll();
    return $products_data;

}

function products_rec_list() {
    $db = db_connect();

    $query = $db->prepare("SELECT * FROM products WHERE `rec` = 1 LIMIT 0, 6;");
    $query->execute();
    $products_data = $query->fetchAll();
    return $products_data;
}

function categories_list() {
    $db = db_connect();

    $query = $db->prepare("SELECT * FROM categories WHERE 1;");
    $query->execute();
    $products_data = $query->fetchAll();
    return $products_data;
}

function cart_list($id) {
    $db = db_connect();

    $query = $db->prepare("SELECT count_items, products.name, products.price, products.img FROM cart_int INNER JOIN products WHERE products.id = product_id AND user_id = $id");
    $query->execute();

    return $query->fetchAll();
}

function add_product() {

}

function del_product() {

}

function edit_product() {

}
