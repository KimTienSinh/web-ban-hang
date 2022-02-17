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
                            <a href="productcreatepage.php"><button type="button" class="btn btn-outline-primary">
                                    <i class="fa fa-plus-square-o"></i>&nbsp; New Product</button></a>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Menu</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Product</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->

                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Product Infomation</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle table-responsive-sm basic-form">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">TITLE</th>
                                                <th scope="col">IMAGE</th>
                                                <th scope="col">PRICE</th>
                                                <th scope="col">STATUS</th>
                                                <th scope="col">CATALOGY</th>
                                                <th scope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once '../utils/MySQLUtils.php';
                                            $dbCon = new MySQLUtils();
                                            $item_in_page = !empty($_GET['item_inpage']) ? $_GET['item_inpage'] : 4;
                                            $page = !empty($_GET['page']) ? $_GET['page'] : 1;
                                            $offset = ($page - 1) * $item_in_page;

                                            $query = "SELECT masanpham,title,image,price,sanpham.status,catname FROM sanpham
                                                 inner join danhmuc on sanpham.madanhmuc =danhmuc.madanhmuc order by sanpham.masanpham LIMIT " . $item_in_page . " OFFSET " . $offset . " ";

                                            $query1 = "SELECT * from sanpham ";
                                            $pr = $dbCon->getALLData($query1);
                                            $totalsp = count($pr);
                                            $totalpage = ceil($totalsp / $item_in_page);
                                            $sanphams = $dbCon->getALLData($query);
                                            try {
                                                if ($sanphams) {
                                                    foreach ($sanphams as $sanpham) {
                                                        echo '    <tr>';
                                                        echo '        <td>' . $sanpham['masanpham'] . '</td> ';
                                                        echo '        <td> ' . $sanpham['title'] . '</td>';
                                                        echo '        <td><img src = "img/products/' . $sanpham['image'] . '" alt = ""> </td>';
                                                        echo '        <td> ' . $sanpham['price'] . "$" . ' </td>';
                                                        echo '        <td> ' . $sanpham['status'] . ' </td>';
                                                        echo '        <td> ' . $sanpham['catname'] . ' </td>';
                                                        echo '        <td>';
                                                        echo '           <span>';
                                                        echo ' <a href="producteditpage.php?id=' . $sanpham['masanpham'] . '"><button type="button" class="btn btn-outline-primary">&nbsp;<i class="fa fa-pencil color-muted"></i>&nbsp; Edit </button>&nbsp;&nbsp; </a>';
                                                        echo ' <a href="../controller/DeleteProductController.php?id=' . $sanpham['masanpham'] . '"><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#myModal">&nbsp;<i class="fa fa-close color-danger"></i>&nbsp; Delete </button>&nbsp;&nbsp; </a>';
                                                        echo '            </span>';
                                                        echo '        </td> ';
                                                        echo '    </tr>';

                                                        echo '   <div class="modal fade" id="myModal" role="dialog">';
                                                        echo '            <div class="modal-dialog modal-sm">';
                                                        echo '              <div class="modal-content">';
                                                        echo '                    <div class="modal-header">';
                                                        echo '                      <h4 class="modal-title">Bạn có muốn xóa</h4>';
                                                        echo '                      <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                                        echo '                    </div>';
                                                        echo '                    <div class="modal-body">';
                                                        echo '                      <a href="../controller/DeleteProductController.php?id=' . $sanpham['masanpham'] . '"><button type="button" class="btn btn-outline-danger">có</button></a>';
                                                        echo '                    </div>';
                                                        echo '                    <div class="modal-footer">';
                                                        echo '                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                                                        echo '                    </div>';
                                                        echo '              </div>';
                                                        echo '            </div>';
                                                        echo '        </div>';
                                                    }
                                                }
                                            } catch (PDOException $e) {
                                                echo "Error: " . $e->getMessage();
                                            }
                                            $conn = null;
                                            ?>

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
                            echo ' <li class="page__numbers"><a class="boiden" href="../view/productpage.php?item_inpage=' . $item_in_page . '&page=' . $numpage . '">' . $numpage . '</a></li>';
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