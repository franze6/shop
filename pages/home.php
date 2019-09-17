

<?php

$db = db_connect();

$query = $db->prepare("SELECT * FROM slider_items WHERE 1 LIMIT 0,3");
$query->execute();

$data = $query->fetchAll();
?>
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                            for($i=0;$i<count($data);$i++)
                                if ($i == 0)
                                    echo "<li data-target=\"#slider-carousel\" data-slide-to=\"$i\" class='active'></li>";
                                else
                                    echo "<li data-target=\"#slider-carousel\" data-slide-to=\"$i\"></li>";
                        ?>
                    </ol>

                    <div class="carousel-inner">
                    <?php
                    foreach ($data as $val) {
                        $name = $val['name'];
                        $subname = $val['subname'];
                        $descr = $val['descr'];
                        $button_text = $val['button_text'];
                        $img = $val['img'];
                        if($data[0]['id'] == $val['id'])
                            echo "<div class=\"item active\">";
                        else
                            echo "<div class=\"item\">";
                        echo"
                                <div class=\"col-sm-6\">
                                <h1>$name</h1>
                                <h2>$subname</h2>
                                <p>$descr</p>
                                <button type=\"button\" class=\"btn btn-default get\">$button_text</button>
                                </div>
                                <div class=\"col-sm-6\">
                                    <img src=\"$img\" class=\"girl img-responsive\" alt=\"\" />
                                </div>
                                </div>";

                    }
                    ?>
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>