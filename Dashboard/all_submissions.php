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
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>All Submissions</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <div class="row">
                        <div class="col-9">
                            <h1 class="h3 mb-2 text-gray-800">All Submissions</h1>
                        </div>
                    </div>
                    <!-- Page Heading -->

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Abstract Id</th>
                                            <th>Author Email</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Keywords</th>
                                            <th>Submisson Date</th>
                                            <th>Last Update</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>

                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $all_submissions = "SELECT abstracts.*, users.email FROM abstracts INNER JOIN users ON abstracts.user_id = users.user_id";
                                            $objects = mysqli_query($con, $all_submissions);
                                            while ($row = mysqli_fetch_array($objects)) {
                                                ?>

                                                <td><?php echo $row['abstract_id']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['title']; ?></td>
                                                <td><?php echo $row['pdf_file']; ?></td>
                                                <td><?php echo $row['keywords']; ?></td>
                                                <td><?php echo $row['submit_date']; ?></td>
                                                <td style="text-transform: capitalize"><?php echo $row['status']; ?></td>
                                                <td>
                                                    <p>
                                                        <a href="view_pdf.php?id=<?php echo $row['abstract_id']; ?>" class="btn btn-info btn-sm" title="View" data-toggle="tooltip" target="_blank"><i class="fas fa-fw fa-eye"></i> View Abstract &nbsp;&nbsp;</a>
                                                    </p>
                                                </td>


                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-9">
                            <h1 class="h3 mb-2 text-gray-800">Accepted Submissions</h1>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Abstract Id</th>
                                            <th>Author Email</th>
                                            <th>Title</th>
                                            <th>Keywords</th>
                                            <th>Submisson Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>

                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $all_submissions = "SELECT abstracts.*, users.email FROM abstracts INNER JOIN users ON abstracts.user_id = users.user_id WHERE abstracts.status = 'accepted'";
                                            $objects = mysqli_query($con, $all_submissions);
                                            while ($row = mysqli_fetch_array($objects)) {
                                                ?>

                                                <td><?php echo $row['abstract_id']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['title']; ?></td>
                                                <td><?php echo $row['keywords']; ?></td>
                                                <td><?php echo $row['submit_date']; ?></td>
                                                <td style="text-transform: capitalize"><?php echo $row['status']; ?></td>
                                                <td>
                                                    <p>
                                                        <?php if ($row['rev_pdf_file'] != null) { ?>
                                                            <a href="view_resubmit_pdf.php?id=<?php echo $row['abstract_id']; ?>" class="btn btn-danger btn-sm" title="View" data-toggle="tooltip" target="_blank"><i class="fas fa-fw fa-eye"></i>&nbsp;&nbsp; View Abstract  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                                        <?php } else { ?>
                                                            <a href="view_pdf.php?id=<?php echo $row['abstract_id']; ?>" class="btn btn-info btn-sm" title="View" data-toggle="tooltip" target="_blank"><i class="fas fa-fw fa-eye"></i>&nbsp;&nbsp; View Abstract &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                                        <?php } ?>
                                                    </p>
                                                    <p>
                                                        <a href="view_ex_abstract.php?id=<?php echo $row['abstract_id']; ?>" class="btn btn-info btn-sm" title="View" data-toggle="tooltip" target="_blank"><i class="fas fa-fw fa-eye"></i> View Extended Abs.</a>
                                                    </p>
                                                </td>


                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>