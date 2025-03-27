<?php
$conn = require 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// $user_id = $_SESSION['user_id'];
// $sql = "SELECT role FROM users WHERE user_id = '$user_id'";
// $result = mysqli_query($con, $sql);
// $row = mysqli_fetch_assoc($result);
// ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Madushan Prabod">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Submitted Abstracts -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Submitted Abstracts</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $user_id = $_SESSION['user_id'];
                                                $sql = "SELECT COUNT(*) as total FROM abstracts where user_id = '$user_id'";
                                                $result = mysqli_query($con, $sql);
                                                $row = mysqli_fetch_assoc($result);
                                                echo $row['total'];
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviewed Abstracts -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Reviewing Abstracts</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $sql = "SELECT COUNT(*) as total FROM abstracts WHERE status = 'under review' and user_id = '$user_id'";
                                                $result = mysqli_query($con, $sql);
                                                $row = mysqli_fetch_assoc($result);
                                                echo $row['total'];
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hourglass-half fa-2x text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Accepted Abstracts -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Accepted Abstracts</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $sql = "SELECT COUNT(*) as total FROM abstracts WHERE status = 'accepted' or status = 'accepted_major' or status = 'accepted_minor' and user_id = '$user_id'";
                                                $result = mysqli_query($con, $sql);
                                                $row = mysqli_fetch_assoc($result);
                                                echo $row['total'];
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check-circle fa-2x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Rejected Abstracts -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Rejected Abstracts</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $sql = "SELECT COUNT(*) as total FROM abstracts WHERE status = 'rejected' and user_id = '$user_id'";
                                                $result = mysqli_query($con, $sql);
                                                $row = mysqli_fetch_assoc($result);
                                                echo $row['total'];
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-times-circle fa-2x text-danger"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- notifications -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">

                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Public Notifications</h6>
                                </div>
                                <div class="card-body">
                                    <?php

                                    $sql = "SELECT event_notifications, created_at FROM event ORDER BY created_at DESC";
                                    $result = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '
                                            <div class="alert alert-info" role="alert">
                                                <div class="small text-gray-500">' . $row['created_at'] . '</div>
                                                <span class="font-weight-bold">' . $row['event_notifications'] . '</span>
                                            </div>
                                            ';
                                        }
                                    } else {
                                        echo '<div class="alert alert-secondary" role="alert">No new notifications.</div>';
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>

                        <!-- event -->
                        <?php
                        $sql = "SELECT * FROM event ORDER BY created_at DESC LIMIT 1";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Event Details</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="font-weight-bold">Event</h4>
                                            <p class="mb-0"><?php echo $row['title'] ."-" . date('Y', strtotime($row['event_date'])); ?></p>
                                        </div>
                                        <div class="col">
                                            <h4 class="font-weight-bold">Event Date</h4>
                                            <p class="mb-0"><?php 
                                            $date = strtotime($row['event_date']);
                                            echo date('jS \of F Y', $date); ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="font-weight-bold">Keynote Speacker</h4>
                                            <p class="mb-0"><?php echo $row['key_title'] . "  " . $row['keynote_speacker']; ?></p>
                                        </div>
                                        <div class="col">
                                            <h4 class="font-weight-bold">Event Location</h4>
                                            <p class="mb-0"><?php echo $row['department']; ?>,</p>
                                            <p class="mb-0">Faculty of Humanities and Social Sciences, University of Ruhuna</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Received Comments -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Received Comments</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            $user_id = $_SESSION['user_id'];
                            $sql = "SELECT r.comment, r.commented_at, u.full_name AS reviewer_name, a.title 
                                            FROM review_comments r
                                            JOIN abstracts a ON r.abstract_id = a.abstract_id
                                            JOIN users u ON r.reviewer_id = u.user_id
                                            WHERE a.user_id = '$user_id'
                                            ORDER BY r.commented_at DESC";
                            $result = $con->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="alert alert-info" role="alert">
                                                <div class="small text-gray-500">' . $row['commented_at'] . '</div>
                                                <span class="font-weight-bold">' . $row['title'] . ': ' . $row['comment'] . '</span>
                                            </div>';
                                }
                            } else {
                                echo '<div class="alert alert-secondary" role="alert">No new comments.</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Ruhuna Arts Student's Annual Sessions - <?php echo date('Y'); ?></span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>