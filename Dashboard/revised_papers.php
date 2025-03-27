<?php
$con = require 'db.php';
include 'email.php';
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
                            <h1 class="h3 mb-2 text-gray-800">Revised Submissions</h1>

                        </div>
                    </div>
                    <!-- Page Heading -->

                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">Abstract Id</th>
                                            <th style="width: 10%;">Title</th>
                                            <th>Theme</th>
                                            <th style="width: 50%;">Comments</th>
                                            <th>Status</th>
                                            <th style="width: 30%;">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $all_submissions = "SELECT a.abstract_id, a.title, a.keywords, a.status, u.email, rc.comment 
                                                                FROM abstracts a 
                                                                INNER JOIN users u ON a.user_id = u.user_id 
                                                                LEFT JOIN review_comments rc ON a.abstract_id = rc.abstract_id 
                                                                WHERE a.status IN ('accepted_minor', 'accepted_major') 
                                                                AND a.rev_pdf_file != '' 
                                                                ORDER BY a.abstract_id DESC";
                                            $objects = mysqli_query($con, $all_submissions);
                                            if (mysqli_num_rows($objects) <= 0) {
                                                echo '<tr><td colspan="6"><div class="alert alert-danger" role="alert">No Submissions.</div></td></tr>';
                                            } else {
                                                while ($row = mysqli_fetch_array($objects)) {
                                                    ?>
                                                    <td><?php echo $row['abstract_id']; ?></td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td><?php echo $row['keywords']; ?></td>
                                                    <td><?php echo $row['comment']; ?></td>
                                                    <td style="text-transform: capitalize">
                                                        <?php 
                                                        if ($row['status'] == 'accepted_minor') {
                                                            echo "Accepted with Minor Corrections";
                                                        } else if ($row['status'] == 'accepted_major') {
                                                            echo "Accepted with Major Corrections";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            <a href="view_pdf.php?id=<?php echo $row['abstract_id']; ?>" class="btn btn-info btn-sm" title="View" data-toggle="tooltip" target="_blank"><i class="fas fa-fw fa-eye"></i> View Paper</a>
                                                        </p>
                                                        <p>
                                                            <a href="view_rev_pdf.php?id=<?php echo $row['abstract_id']; ?>" class="btn btn-danger btn-sm" title="View Revised Paper" data-toggle="tooltip" target="_blank"><i class="fas fa-fw fa-eye"></i> View Reviewed Paper</a>
                                                        </p>
                                                        <p>
                                                            <form action="revised_papers.php" method="post">
                                                                <input type="hidden" name="abstract_id" value="<?php echo $row['abstract_id']; ?>">
                                                                <select name="status" class="form-control" required>
                                                                    <option value="" disabled selected>Select Status</option>
                                                                    <option value="accepted">Accepted</option>
                                                                    <option value="rejected">Reject</option>
                                                                </select>
                                                                <p>
                                                                    <button type="submit" name="submit" class="btn btn-success btn-sm" title="Submit" data-toggle="tooltip" style="margin-top: 1%;"><i class="fas fa-fw fa-check"></i> Update Status</button>
                                                                </p>
                                                            </form>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <?php 
                                                if (isset($_POST['submit'])) {
                                                    $status = $_POST['status'];
                                                    $abstract_id = $_POST['abstract_id'];
                                                    $subject = "Paper Reviewed";
                                                    $message = "
                                                    <html>
                                                        <body style='font-family: Arial, sans-serif; background-color: #f4f4f4; text-align: center; padding: 20px;'>
                                                            <div style='background-color: white; padding: 20px; border-radius: 10px; max-width: 500px; margin: auto; box-shadow: 0 4px 8px rgba(0,0,0,0.1);'>
                                                                <h2 style='color:rgb(205, 36, 36);'>Abstract Reviewed</h2>
                                                                <p>Your abstract has been reviewed. Please login to the website to view the file.</p><br>
                                                                <p>Abstract Title: <span style='font-weight: bold;'>{$row['title']}</span></p>
                                                                <p>Status: <span style='font-weight: bold;'>{$status}</span></p>
                                                                <p>Thank you.</p>
                                                                <p style='margin-top: 5px; font-size: 14px; color: #555;'>
                                                                    <b>Regards,</b><br>
                                                                    <b>Ruhuna Arts Student's Annual Sessions - University of Ruhuna</b>
                                                                </p>
                                                            </div>
                                                        </body>
                                                    </html>";
                                                    $update_status = "UPDATE abstracts SET status = '$status' WHERE abstract_id = '$abstract_id'";
                                                    if (mysqli_query($con, $update_status)) {
                                                        sendEmail($row['email'], $subject, $message);
                                                        echo "<script>alert('Status updated successfully.')</script>";
                                                        echo "<script>window.location.href='revised_papers.php'</script>";
                                                    } else {
                                                        echo "<script>alert('Failed to update status.')</script>";
                                                    }
                                                }
                                            }
                                        }
                                        ?>

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