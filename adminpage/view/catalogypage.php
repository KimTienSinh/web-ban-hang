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
                            <a href="../view/catalogycreatepage.php"><button type="button" class="btn btn-outline-primary">
                                    <i class="fa fa-plus-square-o"></i>&nbsp; New Catalogy</button></a>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Menu</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Catalogy</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->

                <div class="row">
                                      
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Catalogy Infomation</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle table-responsive-sm basic-form">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">NAME</th>
                                                <th scope="col">URL</th>
                                                <th scope="col">STATUS</th>
                                                <th scope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                include_once '../utils/MySQLUtils.php';
                                                $dbCon = new MySQLUtils();
                                                $query = "select * from danhmuc";
                                                $Cats = $dbCon->getALLData($query);
                                                foreach($Cats as $cat){
                                                    echo' <tr>';
                                                    echo'    <td>'.$cat['madanhmuc'].'</td>';
                                                    echo'    <td>'.$cat['catname'].'</td>';
                                                    echo'    <td>'.$cat['caturl'].'</td>';
                                                    echo'    <td> '.$cat['status'].'<td>';          
                                                    echo'           <span>';
                                                    echo' <a href="catalogyeditpage.php?id='.$cat['madanhmuc'].'"><button type="button" class="btn btn-outline-primary">&nbsp;<i class="fa fa-pencil color-muted"></i>&nbsp; Edit </button>&nbsp;&nbsp; </a>';
                                                    echo' <a href="../controller/DeleteCatalogyController.php?id='.$cat['madanhmuc'].'"<button type="button" class="btn btn-outline-danger" >&nbsp;<i class="fa fa-close color-danger"></i>&nbsp; Delete </button>&nbsp;&nbsp; </a>';
                                                    echo'            </span>';  
                                                    echo'        </td> ';
                                                    echo' </tr>';
                                                }

                                                $dbCon->disconnectDB();
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
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