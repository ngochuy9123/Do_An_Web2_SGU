<!-- Breadcrumb Section Begin -->

<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shop</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form id="search-form">
                            <input type="text" placeholder="Search..." name="tenSp">
                            <button onclick="filter(0)" type="button"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <div id="category-filter">

                                                <?php foreach($dsLoai as $l): ?>
                                                <input type="checkbox" name="categories" value="<?php echo $l['id'] ?>">
                                                <label><?php echo $l['name_category'] ?></label>
                                                <br>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__brand">
                                            <div id="brand-filter">

                                                <?php foreach($dsThuongHieu as $th): ?>
                                                <input type="checkbox" name="brands" value="<?php echo $th['id'] ?>">
                                                <label><?php echo $th['name_brand'] ?></label>
                                                <br>

                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                </div>
                                <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__price">
                                            <ul>
                                                <li><a href="#">$0.00 - $50.00</a></li>
                                                <li><a href="#">$50.00 - $100.00</a></li>
                                                <li><a href="#">$100.00 - $150.00</a></li>
                                                <li><a href="#">$150.00 - $200.00</a></li>
                                                <li><a href="#">$200.00 - $250.00</a></li>
                                                <li><a href="#">250.00+</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                                </div>
                                <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div id="size-filter" class="shop__sidebar__size">
                                            <?php foreach ($dsSize as $size): ?>
                                            <input type="checkbox" name="sizes" value="<?php echo $size['id'] ?>">
                                            <label><?php echo $size['name'] ?></label>
                                            <br>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                <p>Showing 1–12 of 126 results</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__right">
                                <p>Sort by Price:</p>
                                <select>
                                    <option value="1">Low To High</option>
                                    <option value="2">High To Low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="phanTrangSP" class="row">

                    <?php foreach($dssp as $sp):  ?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <a class="link-product" href="<?php echo _WEB_ROOT ?>/chi-tiet">
                                <div class="product__item__pic set-bg"
                                    data-setbg="<?php echo _WEB_ROOT; ?>/public/assets/client/img/product/<?php echo $sp['img'] ?>">
                                    <ul class="product__hover">
                                        <li><a href="#"><img
                                                    src="<?php echo _WEB_ROOT; ?>/public/assets/client/img/icon/heart.png"
                                                    alt=""></a></li>
                                        <li><a href="#"><img
                                                    src="<?php echo _WEB_ROOT; ?>/public/assets/client/img/icon/compare.png"
                                                    alt=""> <span>Compare</span></a>
                                        </li>
                                        <li><a href="#"><img
                                                    src="<?php echo _WEB_ROOT; ?>/public/assets/client/img/icon/search.png"
                                                    alt=""></a></li>
                                    </ul>
                                </div>
                            </a>
                            <div class="product__item__text">
                                <h6><?php echo $sp['name'] ?></h6>
                                <a href="#" class="add-cart">+ Add To Cart</a>
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5>$<?php echo $sp['price'] ?></h5>
                                <div class="product__color__select">
                                    <label for="pc-4">
                                        <input type="radio" id="pc-4">
                                    </label>
                                    <label class="active black" for="pc-5">
                                        <input type="radio" id="pc-5">
                                    </label>
                                    <label class="grey" for="pc-6">
                                        <input type="radio" id="pc-6">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;  ?>






                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="dsSoTrang" class="product__pagination">
                            <?php for($i=1;$i<=$tst;$i++): ?>
                            <a class="active"
                                onclick="pagination(<?php echo $i-1 ?>,`ajaxPhanTrang`)"><?php echo $i ?></a>
                            <?php endfor ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->