<!DOCTYPE html>
<html lang="zxx">
<?php
//session_start();
?>

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
                    <div class="breadcrumb-text product-more">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="shop.php">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="../controller/save_cart.php" method="post" id="callform">
                                    <div class="row">
                                        <?php
                                        include_once '../../adminpage/utils/MySQLUtils.php';
                                        $total = 0;
                                        if (!empty($_SESSION['cart'])) {
                                            $dbCon = new MySQLUtils();
                                            $index = 0;
                                            if (!isset($_SESSION['qty_array'])) {
                                                $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
                                            }
                                            $query = "SELECT * FROM sanpham where masanpham in (" . implode(',', $_SESSION['cart']) . ")";
                                            $products = $dbCon->getALLData($query);
                                            foreach ($products as $product) {

                                                echo '    <tr>';
                                                echo '        <td class="cart-pic first-row"><img src="img/products/' . $product['image'] . '" alt=""></td>';
                                                echo '        <td class="cart-title first-row">';
                                                echo '            <h5>' . $product['title'] . '</h5>';
                                                echo '        </td>';
                                                echo '        <td class="p-price first-row">' . $product['price'] ."$". '</td>';
                                                echo '        <td class="qua-col first-row">';
                                                echo '            <div class="quantity">';
                                                echo '                <div class="pro-qty">';
                                                echo '                    <input type="hidden" name="indexes[]" value="' . $index . '">';
                                                echo '                    <input type="text" value="' . $_SESSION['qty_array'][$index] . '" name="sl_' . $index . '">';
                                                echo '                </div>';
                                                echo '            </div>';
                                                echo '        </td>';
                                                echo '        <td class="total-price first-row">' . $_SESSION['qty_array'][$index] * $product['price'] ."$".'</td>';
                                                echo '        <td class="close-td first-row"><a href="../controller/delete_item.php"><i style="color: black;" class="ti-close"></i></a></td>';
                                                echo '    </tr>';
                                                $total+= $_SESSION['qty_array'][$index] * $product['price'];
                                                $index++;

                                            }
                                            $dbCon->disconnectDB();
                                        }
                                        ?>
                                        
                                    </div>
                                </form>
                                <!--                                    <tr>
                                        <td class="cart-pic first-row"><img src="img/cart-page/product-1.jpg" alt=""></td>
                                        <td class="cart-title first-row">
                                            <h5>Pure Pineapple</h5>
                                        </td>
                                        <td class="p-price first-row">$60.00</td>
                                        <td class="qua-col first-row">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="1">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price first-row">$60.00</td>
                                        <td class="close-td first-row"><i class="ti-close"></i></td>
                                    </tr>-->


                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <form >
                                <div class="cart-buttons">
                                            <a href="#" class="primary-btn continue-shop">Shop</a>
                                            <input type="submit" class="primary-btn up-cart" name="save" value="update" form="callform">
                                            <a href="../controller/clear_cart.php" class="primary-btn up-cart">Clear Cart</a>
                                        </div>
                            </form>
                            <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                    
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <?php  
                                    echo'    <li class="cart-total">Total <span>'.$total. "$".'</span></li> ';
                                    ?>
                                </ul>
                                <a href="check-out.php" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Partner Logo Section Begin -->

    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <?php include 'layouts/footerpage.php' ?>
</body>

</html>