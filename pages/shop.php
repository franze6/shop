<?php

require_once 'php/products.php';

/*if(isset($_REQUEST['page'])) {
    $count = $_REQUEST['page'] - 1;
    $list = products_list(12*$count, 12);
}*/

$list = products_list();
$cat_list = categories_list();
$min_price = get_min_price();
$max_price = get_max_price();


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
                            $id = $val['id'];
                            echo "
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <h4 class=\"panel-title\"><a id=\"$id\" href=\"#\">$name</a></h4>
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
                            <input type="text" class="span2" value="" data-slider-min="<?=$min_price?>" data-slider-max="<?=$max_price?>" data-slider-step="5" data-slider-value="[<?=$min_price?>,<?=$max_price?>]" id="sl2" ><br />
                            <b><?=$min_price?></b> <b class="pull-right"><?=$max_price?></b>
                        </div>
                    </div><!--/price-range-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Товары</h2>
                    <div id="product_items">
                        <?php
                        require_once 'parts/product.php';
                        ?>
                    </div>
                </div><!--features_items-->
                <div id="more-items"><i class="fa fa-angle-down"></i></div>
            </div>
        </div>
    </div>
</section>
