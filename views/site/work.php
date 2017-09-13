<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Каталог</h2>
                        <div class="panel-group category-products">
                            <?php foreach ($categories as $categoryItem): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="/category/<?php echo $categoryItem['id']; ?>">
                                                <?php echo $categoryItem['name']; ?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Последние товары</h2>

                        <?php foreach ($latestProducts as $product): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="/template/images/shop/<?php echo $product['image']; ?>" alt=""/>
                                            <h2><?php echo $product['price']; ?>$</h2>
                                            <p>
                                                <a href="/product/<?php echo $product['id']; ?>">
                                                    <?php echo $product['name']; ?>
                                                </a>
                                            </p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                        <?php if ($product['is_new']): ?>
                                            <img src="/template/images/home/new.png" class="new" alt=""/>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>


                    </div><!--features_items-->

                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">Рекомендуемые товары</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">

                                <div class="item active">

                                    <?php $i = 1; ?>
                                    <?php while ($i <= 3) : ?>
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/template/images/shop/<?php echo $sliderProducts[$i]['image']; ?>"
                                                             alt=""/>
                                                        <h2><?php echo $sliderProducts[$i]['price']; ?>$</h2>
                                                        <p>
                                                            <a href="/product/<?php echo $sliderProducts[$i]['id']; ?>">
                                                                <?php echo $sliderProducts[$i]['name']; ?>
                                                            </a>
                                                        </p>
                                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                                    class="fa fa-shopping-cart"></i>В корзину</a>
                                                    </div>
                                                    <?php if ($sliderProducts[$i]['is_new']): ?>
                                                        <img src="/template/images/home/new.png" class="new" alt=""/>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $i++; ?>
                                    <?php endwhile; ?>

                                </div>


                                <div class="item">


                                    <?php $i = 4; ?>
                                    <?php while ($i <= 6) : ?>
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/template/images/shop/<?php echo $sliderProducts[$i]['image']; ?>"
                                                             alt=""/>
                                                        <h2><?php echo $sliderProducts[$i]['price']; ?>$</h2>
                                                        <p>
                                                            <a href="/product/<?php echo $sliderProducts[$i]['id']; ?>">
                                                                <?php echo $sliderProducts[$i]['name']; ?>
                                                            </a>
                                                        </p>
                                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                                    class="fa fa-shopping-cart"></i>В корзину</a>
                                                    </div>
                                                    <?php if ($sliderProducts[$i]['is_new']): ?>
                                                        <img src="/template/images/home/new.png" class="new" alt=""/>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $i++; ?>
                                    <?php endwhile; ?>


                                </div>

                                <div class="item">


                                    <?php $i = 7; ?>
                                    <?php while ($i <= 9) : ?>
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/template/images/shop/<?php echo $sliderProducts[$i]['image']; ?>"
                                                             alt=""/>
                                                        <h2><?php echo $sliderProducts[$i]['price']; ?>$</h2>
                                                        <p>
                                                            <a href="/product/<?php echo $sliderProducts[$i]['id']; ?>">
                                                                <?php echo $sliderProducts[$i]['name']; ?>
                                                            </a>
                                                        </p>
                                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                                    class="fa fa-shopping-cart"></i>В корзину</a>
                                                    </div>
                                                    <?php if ($sliderProducts[$i]['is_new']): ?>
                                                        <img src="/template/images/home/new.png" class="new" alt=""/>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $i++; ?>
                                    <?php endwhile; ?>


                                </div>


                            </div>

                            <a class="left recommended-item-control" href="#recommended-item-carousel"
                               data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel"
                               data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div><!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>