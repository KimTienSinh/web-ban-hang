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
                            <a href="postpage.php"><button type="button" class="btn btn-outline-primary">
                                    <i class="fa fa-undo"></i>&nbsp; Back</button></a>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Post</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->

                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Post Information</h4>
                            </div>

                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="../controller/PostController.php" method="post">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <input name="txt_title" class="form-control" required="true">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Catalogy</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="txt_catalogy">
                                                    <?php 
                                                        include_once '../utils/MySQLUtils.php';
                                                        $dbCon = new MySQLUtils();
                                                        $query = "select * from danhmuc";
                                                       $danhmucs =  $dbCon -> getALLData($query);
                                                    foreach($danhmucs as $danhmuc){
                                                        echo'   <option value="'.$danhmuc['madanhmuc'].'" selected>'.$danhmuc['catname'].'</option> ';
                                                    }
                                                     
                                                    ?>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <textarea name="mota" id="mota">Description</textarea>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" name="post_action" value="post_create" class="btn btn-primary">Create</button>
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

        <script>
            CKEDITOR.replace('mota');
        </script>

</body>

</html>