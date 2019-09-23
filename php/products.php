<?php


if(isset($_REQUEST['do']))
{
    if($_REQUEST['do'] == "list")
    {
        products_list();
    }
    elseif($_REQUEST['do'] == "sort" && isset($_REQUEST['range']) && isset($_REQUEST['cat_id']) && isset($_REQUEST['count'])) {
        $data = explode(",", $_REQUEST['range']);
        $list = products_list($_REQUEST['cat_id'], $data[0], $data[1], 0, $_REQUEST['count']);
        require_once 'parts/product.php';
    }
}

function products_list($cat_id=0,$min=0, $max=0, $start= 0, $count=12) {
    $db = db_connect();
    if($min == 0 || $max == 0) {
        $min = get_min_price();
        $max = get_max_price();
    }

    if ($cat_id != 0) {
        $query = $db->prepare("SELECT * FROM products WHERE cat_id = :cat_id AND price BETWEEN :min AND :max LIMIT $start,$count;");
        $query->execute(array('cat_id' => $cat_id, 'min' => $min, 'max' => $max));
    }
    else {
        $query = $db->prepare("SELECT * FROM products WHERE `price` BETWEEN :min AND :max LIMIT $start,$count;");
        $query->execute(array('min' => $min, 'max' => $max));
    }
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

    $query = $db->prepare("SELECT product_id, count_items, products.name, products.price, products.img FROM cart_int INNER JOIN products WHERE products.id = product_id AND user_id = $id");
    $query->execute();

    return $query->fetchAll();
}

function get_min_price() {
    $db = db_connect();

    $query = $db->prepare("SELECT MIN(price) as pmin FROM `products` WHERE 1");
    $query->execute();

    return $query->fetch()['pmin'];
}

function get_max_price() {
    $db = db_connect();

    $query = $db->prepare("SELECT MAX(price) as pmax FROM `products` WHERE 1");
    $query->execute();

    return $query->fetch()['pmax'];
}

function count_pages() {
    $count =12;

    $db=db_connect();

    $query=$db->prepare("SELECT round(COUNT(id)/$count)+1 as val FROM products");
    $query->execute();

    return $query->fetch()['val'];
}

function add_product() {

}

function del_product() {

}

function edit_product() {

}
