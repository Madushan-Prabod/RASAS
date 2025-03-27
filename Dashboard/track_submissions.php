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

    <title>Submit Abstract</title>

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
                            <h1 class="h3 mb-2 text-gray-800">Track Abstracts</h1>
                        </div>
                    </div>
                </div>
                <!-- Page Heading -->

                <!--main content-->
                <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Theme</th>
                                        <th>Submission Date</th>
                                        <th>Status</th>
                                        <th>Comment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $user_id = $_SESSION['user_id'];
                                    $get_abstracts = "SELECT * FROM abstracts WHERE user_id='$user_id'";
                                    $abstracts = mysqli_query($con, $get_abstracts);
                                    if (mysqli_num_rows($abstracts) > 0) {
                                        while ($row = mysqli_fetch_array($abstracts)) {
                                            $abstract_id = $row['abstract_id'];
                                            $rev_paper = "SELECT * FROM review_abstracts WHERE abstract_id='$abstract_id'";
                                            $rev_paper_result = mysqli_query($con, $rev_paper);
                                            $rev_paper_row = mysqli_fetch_assoc($rev_paper_result);
                                            ?>
                                            <tr>
                                                <td><?php echo $row['title']; ?></td>
                                                <td><?php echo $row['keywords']; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($row['submit_date'])); ?></td>
                                                <td style="text-transform : capitalize"><?php echo $row['status']; ?></td>
                                                <td><?php
                                                    $abstract_id = $row['abstract_id'];
                                                    $comment_query = "SELECT comment FROM review_comments WHERE abstract_id='$abstract_id' ORDER BY comment_id DESC LIMIT 1";
                                                    $comment_result = mysqli_query($con, $comment_query);
                                                    if ($comment_row = mysqli_fetch_assoc($comment_result)) {
                                                        echo $comment_row['comment'].'<br>';
                                                    }
                                                ?></td>
                                                <td>
                                                    <?php
                                                    if ($row['rev_pdf_file'] == null){
                                                        if ($row['status'] == 'accepted_major' || $row['status'] == 'accepted_minor') {
                                                            echo '<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#resubmitModal' . $row['abstract_id'] . '"><i class="fas fa-fw fa-file-upload"></i> Resubmit Paper</button><br><br>
                                                            <div class="modal fade" id="resubmitModal' . $row['abstract_id'] . '" tabindex="-1" role="dialog" aria-labelledby="resubmitModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="resubmitModalLabel">Resubmit Abstract</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="resubmit_abstract.php" method="post" enctype="multipart/form-data">
                                                                                <input type="hidden" name="abstract_id" value="' . $row['abstract_id'] . '">
                                                                                <div class="form-group">
                                                                                    <label for="abstract_file">Select abstract file:</label>
                                                                                    <input type="file" class="form-control-file" id="abstract_file" name="abstract_file" required accept=".pdf">
                                                                                </div>
                                                                                <button type="submit" class="btn btn-warning">Resubmit</button>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                            echo isset($rev_paper_row['rev_pdf_file']) && $rev_paper_row['rev_pdf_file'] != null ? '<a href="view_rev_pdf.php?id='.$abstract_id.'" class="btn btn-danger btn-sm" title="View" data-toggle="tooltip" target="_blank"><i class="fas fa-fw fa-eye"></i> View Reviewed Paper &nbsp;&nbsp;</a>' : '<div style="display : none;"></div>';
                                                        }else{
                                                            echo '<a href="view_pdf.php?id=' . $row['abstract_id'] . '" class="btn btn-info btn-sm" title="View" data-toggle="tooltip" target="_blank"><i class="fas fa-fw fa-eye"></i> View Submitted Paper &nbsp;&nbsp;</a><br/><br/>';
                                                        }
                                                    }else{
                                                        if($row['status'] == 'rejected' || $row['status'] == 'accepted_major' || $row['status'] == 'accepted_minor' || $row['status'] == 'accepted'){
                                                            echo '<a href="view_pdf.php?id=' . $row['abstract_id'] . '" class="btn btn-info btn-sm" title="View Paper" data-toggle="tooltip" target="_blank"><i class="fas fa-fw fa-eye"></i> View Submitted Paper &nbsp;&nbsp;</a><br/><br/>';
                                                        }else{
                                                            echo '<a href="view_pdf.php?id=' . $row['abstract_id'] . '" class="btn btn-info btn-sm" title="View Paper" data-toggle="tooltip" target="_blank"><i class="fas fa-fw fa-eye"></i> View Submitted Paper &nbsp;&nbsp;</a><br/><br/>';
                                                        }

                                                    }
                                                    echo $row['rev_pdf_file'] != null ? '<a href="view_rev_pdf.php?id='.$abstract_id.'" class="btn btn-danger btn-sm" title="View" data-toggle="tooltip" target="_blank"><i class="fas fa-fw fa-eye"></i> View Reviewed Paper &nbsp;&nbsp;</a>' : '<div style="display : none;"></div>';
                                                    ?>
                                                </td>
                                                    

                                            </tr>
                                        <?php }
                                    } else {
                                        echo '<tr><td colspan="6"><div class="alert alert-danger" role="alert">No Submissions.</div></td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>

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