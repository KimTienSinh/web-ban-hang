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
                           
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Menu</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Order</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->

                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Order Infomation</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle table-responsive-sm basic-form">
                                        <thead>
                                            <tr>
                                                 <th scope="col">ID</th> 
                                                <th scope="col">USERNAME</th>
                                                <th scope="col">EMAIL</th>
                                                <th scope="col">STATUS ORDER</th>
                                                <th scope="col">CREATED ORDER</th>
                                                <th scope="col">ORDER DETAIL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                <?php
                                                include_once '../utils/MySQLUtils.php';
                                                $dbCon = new MySQLUtils();
                                                $item_in_page = !empty($_GET['item_inpage']) ? $_GET['item_inpage']:4;
                                                $page = !empty($_GET['page']) ? $_GET['page']:1;
                                                $offset = ($page - 1) * $item_in_page;
    
                                                $query = "SELECT madonhang, khachhang.username, khachhang.email, donhang.status, donhang.createdAt
                                                     FROM donhang INNER JOIN khachhang ON donhang.mauser = khachhang.mauser LIMIT ".$item_in_page." OFFSET ".$offset." ";
                                                $orders = $dbCon->getALLData($query);
    
                                                $query1 = "SELECT * from donhang";
                                                $dh = $dbCon->getALLData($query1);
                                                $soluongdh = count($dh);
                                                $totalpage = ceil($soluongdh/$item_in_page);


                                                foreach($orders as $order){
                                                echo'    <tr>';
                                                echo'        <td>'.$order['madonhang'].'</td>';
                                                echo'        <td>'.$order['username'].'</td>';
                                                echo'        <td>'.$order['email'].'</td>';
                                                echo'        <td> '.$order['status'].'</td>';
                                                echo'        <td> '.$order['createdAt'].'</td>';
                                                echo'        <td> <a href="orderdetailpage.php?id='.$order['madonhang'].'" > <button type="button" class="btn btn-outline-success"><i class="fa fa-magic"></i>&nbsp;View</button> </a>';
                                                echo'    </tr>';
                                               
                                                }
                                                $dbCon->disconnectDB();
                                                ?>
                                                <!-- <tr>
                                                <td>#1</td>
                                                <td>
                                                    NGUYENKIMHIEU
                                                </td>
                                                <td>nguyenkimhieu@gmail.com</td>
                                                <td> <button type="button" class="btn btn-outline-success"><i class="fa fa-magic"></i>&nbsp;Active</button>
                                                </td>
                                                <td>
                                                    <span>
                                                        <a href="javascript:void()" class="mr-4" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted"></i> </a>
                                                        <a href="javascript:void()" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-close color-danger"></i></a>
                                                    </span>
                                                </td>
                                            </tr> -->

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end row -->
                </div>
                <div id="app" class="container">
                    <ul class="page">
                        <li class="page__btn"><span class="material-icons">chevron_left</span></li>
                        <?php
                        for ($numpage = 1; $numpage <= $totalpage; $numpage++) {
                            echo ' <li class="page__numbers"><a class="boiden" href="../view/orderpage.php?item_inpage=' . $item_in_page . '&page=' . $numpage . '">' . $numpage . '</a></li>';
                        }
                        ?>
                        <li class="page__dots">...</li>
                        <li class="page__numbers"> 10</li>
                        <li class="page__btn"><span class="material-icons">chevron_right</span></li>
                    </ul>
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