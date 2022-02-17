<?php
// session_start();
// initialize cart if not set or is unset
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

//unset qunatity
unset($_SESSION['qty_array']);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include 'layouts/headerpage.php' ?>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php include 'layouts/menupage.php' ?>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                            <li><a href="#">Men</a></li>
                            <li><a href="#">Women</a></li>
                            <li><a href="#">Kids</a></li>
                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Brand</h4>
                        <div class="fw-brand-check">
                            <div class="bc-item">
                                <label for="bc-calvin">
                                    Calvin Klein
                                    <input type="checkbox" id="bc-calvin">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-diesel">
                                    Diesel
                                    <input type="checkbox" id="bc-diesel">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-polo">
                                    Polo
                                    <input type="checkbox" id="bc-polo">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-tommy">
                                    Tommy Hilfiger
                                    <input type="checkbox" id="bc-tommy">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Price</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="33" data-max="98">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <a href="#" class="filter-btn">Filter</a>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Color</h4>
                        <div class="fw-color-choose">
                            <div class="cs-item">
                                <input type="radio" id="cs-black">
                                <label class="cs-black" for="cs-black">Black</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-violet">
                                <label class="cs-violet" for="cs-violet">Violet</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-blue">
                                <label class="cs-blue" for="cs-blue">Blue</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-yellow">
                                <label class="cs-yellow" for="cs-yellow">Yellow</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-red">
                                <label class="cs-red" for="cs-red">Red</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-green">
                                <label class="cs-green" for="cs-green">Green</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                            <div class="sc-item">
                                <input type="radio" id="s-size">
                                <label for="s-size">s</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="m-size">
                                <label for="m-size">m</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="l-size">
                                <label for="l-size">l</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="xs-size">
                                <label for="xs-size">xs</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
                            <a href="#">Towel</a>
                            <a href="#">Shoes</a>
                            <a href="#">Coat</a>
                            <a href="#">Dresses</a>
                            <a href="#">Trousers</a>
                            <a href="#">Men's hats</a>
                            <a href="#">Backpack</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <p>Show 01- 09 Of 36 Product</p>
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            <?php
                            include_once '../../adminpage/utils/MySQLUtils.php';
                            try {
                                $dbCon = new MySQLUtils();
                                $item_in_page = !empty($_GET['item_inpage']) ? $_GET['item_inpage']:6;
                                $curr_page = !empty($_GET['page']) ? $_GET['page']:1;
                                $offset = ($curr_page - 1) * $item_in_page;
                                $query = "SELECT masanpham, title, image, price, danhmuc.catname FROM sanpham
                                       INNER JOIN danhmuc ON sanpham.madanhmuc=danhmuc.madanhmuc LIMIT " . $item_in_page . " OFFSET " . $offset . "";
                                $products = $dbCon->getALLData($query);

                                $query1 = "SELECT * from sanpham ";
                                $pr = $dbCon->getALLData($query1);
                                $totalsp = count($pr);
                                $totalpage = ceil($totalsp/$item_in_page);

                                if ($products) {
                                    foreach ($products as $product) {
                                        echo '<div class="col-lg-4 col-sm-6">';
                                        echo '    <div class = "product-item" >';
                                        echo '        <div class = "pi-pic">';
                                        echo '            <img src = "img/products/' . $product['image'] . '" alt = "">';
                                        echo '            <div class = "sale pp-sale">Sale</div>';
                                        echo '            <div class = "icon">';
                                        echo '                <i class = "icon_heart_alt"></i>';
                                        echo '            </div>';
                                        echo '            <ul>';
                                        echo '                <li class = "w-icon active"><a href = "../controller/add_cart.php?id=' . $product["masanpham"] . '"><i class = "icon_bag_alt"></i></a></li>';
                                        echo '                <li class = "quick-view"><a href = "product-details.php?id=' . $product["masanpham"] . '">+ Quick View</a></li>';
                                        echo '                <li class = "w-icon"><a href = "../controller/SessionSave.php"><i class = "fa fa-random"></i></a></li>';
                                        echo '            </ul>';
                                        echo '        </div>';
                                        echo '        <div class = "pi-text">';
                                        echo '            <div class = "catagory-name">' . $product['catname'] . '</div>';
                                        echo '                <a href = "product-details.php?id=' . $product["masanpham"] . ' ">';
                                        echo '                       <h5>' . $product['title'] . '</h5>';
                                        echo '                 </a>';
                                        echo '            <div class = "product-price">';
                                        echo                  $product['price'];
                                        echo '                <span>$35.00</span>';
                                        echo '            </div>';
                                        echo '        </div>';
                                        echo '    </div>';
                                        echo '</div>';
                                    }
                                    //$arraySession  = array();
                                    //$_SESSION['masanpham']= $arraySession;
                                }
                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                            $dbCon->disconnectDB();
                            ?>



                            <!-- <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic" >
                                            <img src="img/products/product-9.jpg" alt="">
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name">Shoes</div>
                                            <a href="#">
                                                <h5>Converse Shoes</h5>
                                            </a>
                                            <div class="product-price">
                                                $34.00
                                                <span>$35.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                        </div>
                    </div>
                    
                   
                    <?php include '../controller/pagination.php' ?>

                    <div class="loading-more">
                        <i class="icon_loading"></i>
                        <a href="#">
                            Loading More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Partner Logo Section Begin -->

    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <?php include 'layouts/footerpage.php' ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->

</body>

</html>