<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../view/layouts/headerpage.php' ?>

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
                            <a href="../view/usercreatepage.php"> <button type="button" class="btn btn-outline-primary">
                                    <i class="fa fa-plus-square-o"></i>&nbsp; New User</button></a>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Menu</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">User List</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->

                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">User Infomation</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered  table-responsive-sm basic-form">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>USERNAME</th>
                                                <th>EMAIL</th>
                                                <th>ADDRESS</th>
                                                <th>PHONE</th>
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            

                                            try {

                                               
                                                // $item_in_page = !empty($_GET['item_inpage']) ? $_GET['item_inpage'] : 4;
                                                // $page = !empty($_GET['page']) ? $_GET['page'] : 1;
                                                // $offset = ($page - 1) * $item_in_page;

                                                // $query = "SELECT * FROM khachhang LIMIT " . $item_in_page . " OFFSET  " . $offset . " ";
                                                // $users = $dbCon->getALLData($query);

                                                // $query1 = "SELECT * FROM khachhang";
                                                // $u = $dbCon->getALLData($query1);
                                                // $sumuser = count($u);
                                                // $totalpage = ceil($sumuser / $item_in_page);


                                                for ($i = 0; $i < count($data["lists"]); $i++) {
                                                    echo '    <tr>';
                                                    echo '        <td>' . $data["lists"][$i]['mauser'] . '</td> ';
                                                    echo '        <td> ' . $data["lists"][$i]['username'] . '</td>';
                                                    echo '        <td> ' . $data["lists"][$i]['email'] . ' </td>';
                                                    echo '        <td> ' . $data["lists"][$i]['address'] . ' </td>';
                                                    echo '        <td> ' . $data["lists"][$i]['phone'] . ' </td>';
                                                    echo '        <td> <button type="button" class="btn btn-outline-success"><i class="fa fa-magic"></i>&nbsp;Active</button> ';
                                                    echo '        <td>';
                                                    echo '           <span>';
                                                    echo ' <a href="../controller/UserController.php?action=edit&id=' . $data["lists"][$i]['mauser'] . '"><button type="button" class="btn btn-outline-primary">&nbsp;<i class="fa fa-pencil color-muted"></i>&nbsp; Edit </button>&nbsp;&nbsp; </a>';
                                                    echo ' <a href="../controller/UserController.php?action=delete&id=' . $data["lists"][$i]['mauser'] . '"<button type="button" class="btn btn-outline-danger" >&nbsp;<i class="fa fa-close color-danger"></i>&nbsp; Delete </button>&nbsp;&nbsp; </a>';
                                                    echo '            </span>';
                                                    echo '        </td> ';
                                                    echo '    </tr>';
                                                }
                                            } catch (PDOException $e) {
                                                echo "Error: " . $e->getMessage();
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end row -->
                </div>
                <!-- <div id="app" class="container">
                    <ul class="page">
                        <li class="page__btn"><span class="material-icons">chevron_left</span></li>
                        <?php
                        // for ($numpage = 1; $numpage <= $totalpage; $numpage++) {
                        //    echo ' <li class="page__numbers"><a class="boiden" href="../view/userpagelist.php?item_inpage=' . $item_in_page . '&page=' . $numpage . '">' . $numpage . '</a></li>';
                        // }
                        ?>
                        <li class="page__dots">...</li>
                        <li class="page__numbers"> 10</li>
                        <li class="page__btn"><span class="material-icons">chevron_right</span></li>
                    </ul>
                </div> -->
            </div>
        </div>
        <!--**********************************
                Content body end
            ***********************************-->

        <!--**********************************
                Footer start
            ***********************************-->
        <div class="footer">
            <?php include '../view/layouts/footerpage.php' ?>
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
    <?php include '../view/layouts/scrpage.php' ?>

</body>

</html>