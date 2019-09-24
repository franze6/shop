<?php

require_once 'php/products.php';

$rec = products_rec_list();


?>
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">

					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Рекомендованное</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
                                    <?php
									for($i=0;$i<3;$i++) {
									    $img = $rec[$i]['img'];
									    $price = $rec[$i]['price'];
									    $name = $rec[$i]['name'];
									    echo "<div class=\"col-sm-4\">
										<div class=\"product-image-wrapper\">
											<div class=\"single-products\">
												<div class=\"productinfo text-center\">
													<img src=\"/$img\" alt=\"\" />
													<h2>$price</h2>
													<p>$name</p>
													<a href=\"#\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Добавить в корзину</a>
												</div>

											</div>
										</div>
									</div>";

                                    }
									?>
                                </div>
								<div class="item">
                                    <?php
                                    for($i=3;$i<count($rec);$i++) {
                                        $img = $rec[$i]['img'];
                                        $price = $rec[$i]['price'];
                                        $name = $rec[$i]['name'];
                                        echo "<div class=\"col-sm-4\">
										<div class=\"product-image-wrapper\">
											<div class=\"single-products\">
												<div class=\"productinfo text-center\">
													<img src=\"/$img\" alt=\"\" />
													<h2>$price</h2>
													<p>$name</p>
													<a href=\"#\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Добавить в корзину</a>
												</div>

											</div>
										</div>
									</div>";

                                    }
                                    ?>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>
						</div>
					</div><!--/recommended_items-->

				</div>
			</div>
		</div>
	</section>
