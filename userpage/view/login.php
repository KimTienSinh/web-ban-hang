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
                        <span>Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Login</h2>
                        <form action="../controller/LoginController.php" method="post">
                        <!-- <form action="../../adminpage/controller/UserController.php" method="post"> -->
                            <div class="group-input">
                                <label for="username">Username or email address *</label>
                                <input type="email" class="form-control"  name="userlogin_txt_email"  required="true">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" class="form-control"  name="userlogin_txt_password" required="true">
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Save Password
                                        <input type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="#" class="forget-pass">Forget your Password</a>
                                </div>
                            </div>
                            <button type="submit" name ="user_action" value="user_login" class="site-btn login-btn">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="register.php" class="or-login">Or Create An Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->

    <!-- Partner Logo Section Begin -->
    
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
     <?php include 'layouts/footerpage.php' ?>
</body>

</html>