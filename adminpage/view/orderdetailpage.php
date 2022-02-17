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
                            <a href="orderpage.php"><button  type="button" class="btn btn-outline-primary">
                                    <i class="fa fa-undo"></i>&nbsp;Back</button></a>
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
                    <?php 
                         $madonhang = $_GET['id'];
                         include '../utils/MySQLUtils.php';
                         $dbCon = new MySQLUtils();
                         $query = "select * from chitietdonhang
                          inner join sanpham on chitietdonhang.masanpham = sanpham.masanpham
                          inner join donhang on donhang.madonhang = chitietdonhang.madonhang
                          inner join khachhang on donhang.mauser = khachhang.mauser 
                          where donhang.madonhang=:madonhang";
                         $param = array(":madonhang"=>$madonhang);
                         $orders = $dbCon->getData($query,$param);
                         $tmp = null;
                    ?>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Order Details Infomation</h4>
                            </div>
                            <div class="card-header">
                                <h4 class="card-title">
                                <?php 
                                    foreach($orders as $ten){
                                       if($ten['madonhang']==$madonhang)
                                        $tmp = $ten;
                                    }
                                    echo 'USER NAME:   ' . $tmp['username'] .'<br><br>';
                                    echo 'ADDRESS:   ' . $tmp['address'] .'<br><br>';
                                    echo 'PHONE:   ' . $tmp['phone'] .'<br><br>';
                                    echo 'CREATED ORDER:   ' . $tmp['updatedAt'] .'<br><br>';
                                    echo 'TOTAL ORDER:   ' . $tmp['totalprice'] ."$".'<br><br>';
                                ?>
                                </h4>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle table-responsive-sm basic-form">
                                        <thead>
                                            <tr>
                                                 <th scope="col">ID ORDER</th> 
                                                <th scope="col">PRODUCT</th>
                                                <th scope="col">PRICE SALE</th>
                                                <th scope="col">QUANTITY</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                <?php
                                                foreach($orders as $order){
                                                echo'    <tr>';
                                                echo'        <td>'.$order['madonhang'].'</td>';
                                                echo'        <td>'.$order['title'].'</td>';
                                                echo'        <td>'.$order['pricesale']."$".'</td>';
                                                echo'        <td> '.$order['quantity'].'</td>';
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