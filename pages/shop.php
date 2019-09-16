<?php

require_once 'php/products.php';

/*if(isset($_REQUEST['page'])) {
    $count = $_REQUEST['page'] - 1;
    $list = products_list(12*$count, 12);
}*/

$list = products_list(0, 12);
$cat_list = categories_list();


?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                        <?php
                        foreach ($cat_list as $val) {
                            $name = $val['name'];
                            echo "
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <h4 class=\"panel-title\"><a href=\"#\">$name</a></h4>
                            </div>
                        </div>";

                        }
                        ?>
                    </div><!--/category-productsr-->

                    <!--<div class="brands_products">
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div>-->

                    <div class="price-range"><!--price-range-->
                        <h2>Цена</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Товары</h2>

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
                                    <img src=\"$img\" alt=\"\" />
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
                    <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
