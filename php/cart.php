<?php
function add_to_cart($p_id) {
    $data = is_login();
    if($data == 0) return;
    $u_id = $data['id'];

    $db = db_connect();
    $query = $db->prepare("INSERT INTO `cart_int` (`id`, `product_id`, `user_id`, `count_items`) VALUES (NULL, :p_id, :u_id, '1');");
    $query->execute(array('p_id'=>$p_id, 'u_id'=>$u_id));


}

function del_from_cart() {

}

function update_item_count() {

}