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
                                <a href="catalogypage.php"><button type="button" class="btn btn-outline-primary">
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
                                        <form action="../controller/CatalogyController.php" method="post">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Catalogy Name</label>
                                                <div class="col-sm-10">
                                                    <input  name="txt_name" class="form-control" placeholder="Catalogy Name" required="true">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">URL</label>
                                                <div class="col-sm-10">
                                                    <input  name="txt_url" class="form-control" placeholder="URL" required="true" >
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <button type="submit" name ="cat_action" value="cat_create" class="btn btn-primary">Create</button>
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