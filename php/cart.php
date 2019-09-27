<?php

if(isset($_REQUEST['do'])) {
    if ($_REQUEST['do'] == "cart") {
        if(isset($_REQUEST['type'])) {
            if($_REQUEST['type'] == "del") {
                if (isset($_REQUEST['id']))
                    echo del_from_cart();
            }
            elseif ($_REQUEST['type'] == "update") {
                if (isset($_REQUEST['id']) && isset($_REQUEST['value']))
                    echo update_item_count();
            }
            elseif ($_REQUEST['type'] == "add") {
                if (isset($_REQUEST['id']))
                    echo add_to_cart();
            }
        }
    }
}





function add_to_cart() {
    $data = is_login();
    if($data == 0) return 0;
    $u_id = $data['id'];
    $p_id = $_REQUEST['id'];

    $db = db_connect();
    $query = $db->prepare("INSERT INTO `cart_int` (`id`, `product_id`, `user_id`, `count_items`) VALUES (NULL, :p_id, :u_id, '1');");
    $query->execute(array('p_id'=>$p_id, 'u_id'=>$u_id));
    return 1;
}

function del_from_cart() {
    $data = is_login();
    if($data == 0) return 0;
    $u_id = $data['id'];
    $p_id = $_REQUEST['id'];

    $db = db_connect();
    $query = $db->exec("DELETE FROM `cart_int` WHERE `product_id` = $p_id AND `user_id` = $u_id;");
    if ($query>0) return 1;
    else return 0;
}

function update_item_count() {
    $data = is_login();
    if($data == 0) return 0;

    $db = db_connect();
    $query = $db->prepare("UPDATE `cart_int` SET `count_items` = :c_val WHERE `product_id` = :p_id AND `user_id` = :u_id");
    $query->execute(array('c_val'=>$_REQUEST['value'], 'p_id'=>$_REQUEST['id'], 'u_id'=>$data['id']));
    return 1;
}