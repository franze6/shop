<?php
foreach ($list as $val)
{
    $id = $val['id'];
    $img = $val['img'];
    $price = $val['price'];
    $name = $val['name'];
    echo "<div class=\"col-sm-4\">
                        <div class=\"product-image-wrapper\">
                            <div class=\"single-products\">
                                <div class=\"productinfo text-center\">
                                    <img src=\"/$img\" alt=\"\" />
                                    <h2>$price</h2>
                                    <p>$name</p>
                                    <a id=\"$id\" href=\"#\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Добавить в козину</a>
                                </div>
                                <div class=\"product-overlay\">
                                    <div class=\"overlay-content\">
                                        <h2>$price</h2>
                                        <p>$name</p>
                                        <a id=\"$id\" href=\"#\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Добавить в козину</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
}
?>