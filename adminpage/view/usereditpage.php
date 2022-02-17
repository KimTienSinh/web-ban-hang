<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'layouts/headerpage.php' ?>
</head>

<body>

    <!--*******************
            Preloader start
        ********************-->

    <!--*******************
            Preloader end
        ********************-->
    <!--**********************************
            Main wrapper start
        ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
                Nav header start
            ***********************************-->
        <!--**********************************
                Nav header end  
            ***********************************-->

        <!--**********************************
                Header start
            ***********************************-->

        <!--**********************************
                Header end ti-comment-alt
            ***********************************-->

        <!--**********************************
                Sidebar start
            ***********************************-->
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
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
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
                                    <?php
                                        // $mauser= $_GET['id'];
                                        // include_once '../utils/MySQLUtils.php';
                                        // $dbCon = new MySQLUtils();
                                        // $query = "select * from khachhang";
                                        // //$param = array(':mauser'=>$id);
                                        // $user = null;
                                        // $listuser = $dbCon->getALLData($query);
                                        // foreach($listuser as $ten){
                                        //     if($ten['mauser']==$mauser){
                                        //         $user = $ten;
                                        //     }
                                        // }
                                        // $dbCon->disconnectDB();
                                    
                                    ?>
                                    <form action="../controller/UserController.php" method="post">
                                    <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">ID </label>
                                            <div class="col-sm-10">
                                                <input  name="txt_id" readonly value="<?php echo $data['mauser']; ?>" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">User name</label>
                                            <div class="col-sm-10">
                                                <input  name="txt_name" value="<?php echo $data['username']; ?>"  class="form-control" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="txt_email" readonly value="<?php echo $data['email']; ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10">
                                                <input  name="txt_address" value="<?php echo $data['address']; ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Phone</label>
                                            <div class="col-sm-10">
                                                <input  name="txt_phone" value="<?php echo $data['phone']; ?>" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" name="user_action" value="user_update" class="btn btn-primary">Update</button>
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