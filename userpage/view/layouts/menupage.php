<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}


//unset qunatity
//unset($_SESSION['qty_array']);
?>
<header class="header-section">

    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="./index.php">
                            <img src="img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="advanced-search">
                        <button type="button" class="category-btn">All Categories</button>
                        <div class="input-group">
                            <input type="text" placeholder="What do you need?">
                            <button type="button"><i class="ti-search"></i></button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">

                        <li class="cart-icon" >
                            <a href="../view/shopping-cart.php">
                                <i class="icon_bag_alt"></i>
                                <?php echo ' <span>' . count($_SESSION['cart']); '</span>'; ?>
                            </a>
                            <!--                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="si-pic"><img src="img/select-product-1.jpg" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="si-pic"><img src="img/select-product-2.jpg" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>$120.00</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>-->
                        </li>

                        <?php
                        if (isset($_SESSION["email"])) {
                            echo ' <li class="cart-price" style="font-size: 15px " >' . $_SESSION["email"]. '</li> ';
                           // echo ' <li class="cart-price">' . $_SESSION["mauser"] . '</li> ';
                           // var_dump($_SESSION["mauser"]);
                        }
                        ?>



                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-item">
        <div class="container">

            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>All departments</span>
                    <ul class="depart-hover">
                        <li class="active"><a href="#">Women’s Clothing</a></li>
                        <li><a href="#">Men’s Clothing</a></li>
                        <li><a href="#">Underwear</a></li>
                        <li><a href="#">Kid's Clothing</a></li>
                        <li><a href="#">Brand Fashion</a></li>
                        <li><a href="#">Accessories/Shoes</a></li>
                        <li><a href="#">Luxury Brands</a></li>
                        <li><a href="#">Brand Outdoor Apparel</a></li>
                    </ul>
                </div>
            </div>
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./shop.php">Shop</a></li>
                    <!-- <li><a href="#">Collection</a>
                                <ul class="dropdown">
                                    <li><a href="#">Men's</a></li>
                                    <li><a href="#">Women's</a></li>
                                    <li><a href="#">Kid's</a></li>
                                </ul>
                            </li> -->
                    <li><a href="./blog.php">Blog</a></li>
                    <li><a href="./contact.php">Contact</a></li>
                    <?php
                    if (isset($_SESSION["email"])) {
                        echo ' <li><a href="./logout.php">Logout</a></li> ';
                    } else {
                        echo ' <li><a href="./login.php">Login</a></li>';
                    }
                    ?>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>


</header>