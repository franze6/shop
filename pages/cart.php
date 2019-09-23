<?php
if($user_data == 0) {
    header("Location: /?page=login");
    return;
}
else
    $cart_list = cart_list($user_data['id']);

?>
<section id="cart_items">
    <div class="container">
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Товар</td>
                    <td class="description"></td>
                    <td class="price">Цена</td>
                    <td class="quantity">Кол-во</td>
                    <td class="total">Итого</td>
                    <td></td>
                </tr>
                </thead>
                <tbody id="cart_products">

                <?php
                foreach ($cart_list as $val) {
                    $img = $val['img'];
                    $price = $val['price'];
                    $name = $val['name'];
                    $count = $val['count_items'];
                    $id =$val['product_id'];
                    echo "<tr id=\"$id\">
                    <td class=\"cart_product\">
                        <a href=\"\"><img src=\"$img\" alt=\"\"></a>
                    </td>
                    <td class=\"cart_description\">
                        <h4><a href=\"\">$name</a></h4>
                        <p>Web ID: 1089772</p>
                    </td>
                    <td class=\"cart_price\">
                        <p>$price</p>
                    </td>
                    <td class=\"cart_quantity\">
                        <div class=\"cart_quantity_button\">
                            <a class=\"cart_quantity_up\" href=\"\"> + </a>
                            <input class=\"cart_quantity_input\" type=\"text\" name=\"quantity\" value=\"$count\" autocomplete=\"off\" size=\"2\">
                            <a class=\"cart_quantity_down\" href=\"\"> - </a>
                        </div>
                    </td>
                    <td class=\"cart_total\">
                        <p class=\"cart_total_price\">".$price*$count."</p>
                    </td>
                    <td class=\"cart_delete\">
                        <a class=\"cart_quantity_delete\" href=\"\"><i class=\"fa fa-times\"></i></a>
                    </td>
                </tr>";




                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
