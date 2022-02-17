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
                            <a href="productpage.php"><button type="button" class="btn btn-outline-primary">
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
                                <h4 class="card-title">Product Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <?php 
                                        $masanpham = $_GET['id'];
                                        include_once '../utils/MySQLUtils.php';
                                        $dbCon = new MySQLUtils();
                                        $query = "select danhmuc.madanhmuc, title, price, catname, masanpham  from danhmuc
                                         inner  join sanpham on danhmuc.madanhmuc = sanpham.madanhmuc";
                                        $sanpham = null;
                                        $danhmucs=$dbCon->getALLData($query);
                                        foreach($danhmucs as $ten){
                                            if($ten['masanpham']==$masanpham){
                                                $sanpham = $ten;
                                            }
                                        }
                                    ?>
                                    <form action="../controller/ProductController.php" method="post">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">ID</label>
                                            <div class="col-sm-10">
                                                <input name="txt_id" readonly value="<?php echo $masanpham ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <input name="txt_title" class="form-control" value="<?php echo $sanpham['title']; ?>"  required="true">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Price</label>
                                            <div class="col-sm-10">
                                                <input name="txt_price" class="form-control" value="<?php echo $sanpham['price']; ?>" required="true">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-2">Catalogy</div>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="txt_catalogy">

                                                    <option value="0" disabled hidden>Chọn</option>
                                                    <?php
                                                   

                                                    if ($danhmucs) {
                                                        foreach ($danhmucs as $danhmuc) {
//                                                                if ($key == "bd") {
//                                                                    echo '<option value="' . $key . '" selected >' . $value . '</option>';
//                                                                } else {
//                                                                    echo '<option value="' . $key . '" >' . $value . '</option>';
//                                                                }

                                                            echo '<option value="' . $danhmuc['madanhmuc'] . '" selected >' . $danhmuc['catname'] . '</option>';
                                                        }
                                                    }

                                                    $dbCon->disconnectDB();
                                                    ?>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="row form-group">
                                            <div class="col col-md-3 fileinputpadding">
                                                <label for="file-input" class=" form-control-label ">Avatar</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="file" id="file_avatar" name="txt_image" class="form-control-file">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" name="product_action" value="product_update" class="btn btn-primary">Update</button>
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