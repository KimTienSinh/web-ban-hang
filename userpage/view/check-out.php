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
                    <div class="breadcrumb-text product-more">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="shop.php">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->

    <section class="checkout-section spad">
        <div class="container">
            <form action="../controller/PlaceOrder.php" method="POST" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="login.php" class="content-btn">Click Here To Login</a>
                        </div>
                        <h4>Biiling Details</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="fir">Full Name<span>*</span></label>
                                <input type="text" name="txt_bill_name" id="fir">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Address<span>*</span></label>
                                <input type="text" id="street" name="txt_bill_address" class="street-first">

                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email Address<span>*</span></label>
                                <input type="text" id="email" name="txt_bill_email">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone<span>*</span></label>
                                <input type="text" id="phone" name="txt_bill_phone">
                            </div>
                            <div class="col-lg-12">
                                <div class="create-item">
                                    <label for="acc-create">
                                        Create an account?
                                        <input type="checkbox" id="acc-create">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <input type="text" placeholder="Enter Your Coupon Code">
                        </div>
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    <?php
                                    include_once '../../adminpage/utils/MySQLUtils.php';
                                    $total = 0;
                                    if (!empty($_SESSION['cart'])) {
                                        $dbCon = new MySQLUtils();
                                        $index = 0;
                                        // if (!isset($_SESSION['qty_array'])) {
                                        //     $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
                                        // }
                                        $query = "SELECT * FROM sanpham where masanpham in (" . implode(',', $_SESSION['cart']) . ")";
                                        $products = $dbCon->getALLData($query);
                                        foreach ($products as $product) {
                                            echo ' <li class="fw-normal">' . $product['title'] . ' x ' . $_SESSION['qty_array'][$index] . ' <span>' . $_SESSION['qty_array'][$index] * $product['price'] ."$". '</span></li> ';
                                            $total += $_SESSION['qty_array'][$index] * $product['price'];
                                            $index++;
                                        }
                                        $dbCon->disconnectDB();
                                    }
                                    ?>
                                    <li class="total-price">Total <span><?php echo $total . "$";
                                                                        $_SESSION['tongtien'] = $total; ?></span></li>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Cheque Payment
                                            <input type="checkbox" id="pc-check">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Paypal
                                            <input type="checkbox" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" onclick="checkEmail()" name="order_action" value="" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script>
        // function checkEmail() {
        //     if (empty($_SESSION["email"])) {
        //         alert("Hello! You should login or register to order !");
        //     }
        // }
    </script>
    }
    alert("Hello! I am an alert box!");
    }
    </script>
    <!-- Shopping Cart Section End -->

    <!-- Partner Logo Section Begin -->

    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <?php include 'layouts/footerpage.php' ?>
</body>

</html>