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
                        <span>Register</span>
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
                    <div class="register-form">
                        <h2>Register</h2>
                        <form action="../controller/RegisterController.php" method="post">
                            <div class="group-input">
                                <label for="username">Username *</label>
                                <input  class="form-control"  name="txt_name"  required="true">
                            </div>
                            <div class="group-input">
                                <label for="username">Email address *</label>
                                <input type="email" class="form-control"  name="txt_email"  required="true">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" class="form-control"  name="txt_password" required="true">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirm Password *</label>
                                <input type="password" id="con-pass">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Address *</label>
                                <input  id="con-pass" name="txt_address">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Phone *</label>
                                <input  id="con-pass" name="txt_phone">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Sex *</label>
                            </div>
                            
                            <label class="lbsRadio">
                                <input type="radio" name="rd_gioitinh" value="male"> Male</label>
                            <label class="lbsRadio">
                                <input type="radio" name="rd_gioitinh" value="female"> Female</label>

                            <div class="group-input">
                                <label for="con-pass">Preference *</label>
                                <select class="form-control" name="cbx_sothich" >

                                <option value="0" disabled  hidden>Chọn sở thích</option>
                                    <?php
                                        $arrSoThich = array("bd" => "Bóng đá", "cl" => "Cầu lông", "bc" => "Bóng chuyền");
                                        foreach ($arrSoThich as $key => $value) {
                                            if ($key == "bd") {
                                                echo '<option value="' . $key . '" selected >' . $value . '</option>';
                                            } else {
                                                echo '<option value="' . $key . '" >' . $value . '</option>';
                                            }
                                        }
                                    ?>
                            </select>
                            </div>

                            <button type="submit" class="site-btn register-btn">REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <a href="login.php" class="or-login">Or Login</a>
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