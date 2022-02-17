<!DOCTYPE html>
<html lang="en">
    
    <head>
        <?php include 'layouts/headerpage.php' ?>
    </head>

    <body>

       
        <div id="main-wrapper">

          
          
            <?php include 'layouts/menupage.php' ?>
            <!--**********************************
                Sidebar end
            ***********************************-->

            <!--**********************************
                Content body start
            ***********************************-->
            <div class="content-body">
                <div class="container-fluid">
                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <a href="userpagelist.php"><button type="button" class="btn btn-outline-primary">
                                        <i class="fa fa-undo"></i>&nbsp; Back</button></a>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">User create</a></li>
                            </ol>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">User Information</h4>
                                </div>
                                <div class="card-body">   
                                    <div class="basic-form">
                                        <form action="../controller/UserController.php" method="post">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">User name</label>
                                                <div class="col-sm-10">
                                                    <input type="username" name="txt_name" class="form-control" placeholder="User name" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="txt_email" class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="txt_password" class="form-control" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-10">
                                                    <input  name="txt_address" class="form-control" placeholder="Address">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-10">
                                                    <input  name="txt_phone" class="form-control" placeholder="Phone">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Role</label>
                                                <div class="col-sm-10">
                                                <select class="form-control" name="cbx_role" >

                                                <option value="0" disabled  hidden>Chọn quyền</option>
                                                    <?php
                                                        $arrQuyen = array(false => "User", true => "Admin");
                                                        foreach ($arrQuyen as $key => $value) {
                                                            if ($key == false) {
                                                                echo '<option value="' . $key . '" selected >' . $value . '</option>';
                                                            } else {
                                                                echo '<option value="' . $key . '" >' . $value . '</option>';
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                </div>
                                            </div>

                                            <fieldset class="form-group">
                                                <div class="row">
                                                    <label class="col-form-label col-sm-2 pt-0">Sex</label>
                                                    <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label class="lbsRadio">
                                                                <input type="radio" name="rd_gioitinh" value="male"> Male</label>
                                                            <label class="lbsRadio">
                                                                <input type="radio" name="rd_gioitinh" value="female"> Female</label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-sm-2">Preference</div>
                                                <div class="col-sm-10">
                                                    
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
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3 fileinputpadding">
                                                    <label for="file-input" class=" form-control-label ">Avatar</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file_avatar" name="file_avatar" class="form-control-file">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <button type="submit" name ="user_action" value="user_create" class="btn btn-primary">Create</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- end row -->                    
                        </div>
                    </div>
                </div>
                <!--**********************************
                    Content body end
                ***********************************-->
                <!--**********************************
                    Footer start
                ***********************************-->
                <div class="footer">
                    <?php include 'layouts/footerpage.php' ?>
                </div>
                <!--**********************************
                    Footer end
                ***********************************-->

                <!--**********************************
                   Support ticket button start
                ***********************************-->

                <!--**********************************
                   Support ticket button end
                ***********************************-->
            </div>
            <!--**********************************
                Main wrapper end
            ***********************************-->

            <!--**********************************
                Scripts
            ***********************************-->
            <!-- Required vendors -->
            <?php include 'layouts/scrpage.php' ?>
    </body>
</html>