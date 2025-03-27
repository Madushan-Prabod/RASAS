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

    <title>View Submissions</title>

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
                                            <th>Title</th>
                                            <th>Keywords</th>
                                            <th>Submisson Date</th>
                                            <th>Comment</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>

                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $all_submissions = "SELECT a.abstract_id, a.title, a.rev_pdf_file, a.keywords, a.status, a.submit_date, u.email, u.full_name AS author_name
                                                                FROM reviewer_assignment ra
                                                                JOIN abstracts a ON ra.abstract_id = a.abstract_id
                                                                JOIN users u ON a.user_id = u.user_id
                                                                WHERE ra.reviewer_id = '$user_id' 
                                                                AND a.status = 'under review';";


                                            $objects = mysqli_query($con, $all_submissions);
                                            while ($row = mysqli_fetch_array($objects)) {
                                                ?>
                                                <?php
                                                if ($row['status'] == 'under review' || 
                                                    (($row['status'] == 'accepted_minor' || $row['status'] == 'accepted_major') && 
                                                     $row['rev_pdf_file'] != null)) {
                                                ?>
                                                <td>
                                                    <?php echo $row['abstract_id']; 
                                                    $email =$row['email'];?>
                                                </td>
                                                <td><?php echo $row['title']; ?></td>
                                                <td><?php echo $row['keywords']; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($row['submit_date'])); ?></td>
                                                <td>
                                                    <form action="view_submissions.php" method="post"
                                                        enctype="multipart/form-data">
                                                        <p><textarea name="comments_abs" rows="15" cols="50"
                                                                placeholder="Comment Section is Here." muted
                                                                required></textarea>
                                                        </p>
                                                </td>
                                                <td>
                                                    <p>
                                                        <a href="view_pdf.php?id=<?php echo $row['abstract_id']; ?>"
                                                            class="btn btn-info btn-sm" title="View" data-toggle="tooltip"
                                                            target="_blank"
                                                            style="padding : 8px;">&nbsp;&nbsp;&nbsp;&nbsp;<i
                                                                class="fas fa-fw fa-eye"></i>&nbsp; View Abstract
                                                            &nbsp;&nbsp;&nbsp;&nbsp;</a>
                                                    </p>
                                                    <p>
                                                        <a href="view_ex_abstract.php?id=<?php echo $row['abstract_id']; ?>"
                                                            class="btn btn-danger btn-sm" title="View" data-toggle="tooltip"
                                                            target="_blank"
                                                            style="padding : 8px;">&nbsp;&nbsp;&nbsp;&nbsp;<i
                                                                class="fas fa-fw fa-eye"></i>&nbsp; View Extended
                                                            Abstract &nbsp;&nbsp;&nbsp;&nbsp;</a>
                                                    </p>

                                                    <div class="input-group" width="100%" height="150%"
                                                        style="border: 1px solidrgb(10, 10, 10);">
                                                        <div class="custom-file">
                                                            <input type="file" name="rev_paper" id="rev_paper"
                                                                class="custom-file-input" accept=".pdf,.docx">
                                                            <label class="custom-file-label" for="inputGroupFile01"><i
                                                                    class="fas fa-upload"></i> Upload</label>
                                                        </div>
                                                    </div>
                                                    <p class="text-muted text-xs">Choose Reviewed Paper</p>

                                                    <input type="hidden" name="abstract_id"
                                                        value="<?php echo $row['abstract_id']; ?>">

                                                    <select name="status" class="form-control" required>
                                                        <option value="" disabled selected>Select Status</option>
                                                        <option value="accepted">Accepted</option>
                                                        <?php if ($row['status'] == 'under review') { ?>
                                                            <option value="accepted_minor">Accepted with Minor Corrections
                                                            </option>
                                                            <option value="accepted_major">Accepted with Major Corrections
                                                            </option>
                                                        <?php } ?>
                                                        <option value="rejected">Rejected</option>
                                                    </select>

                                                    <p><button type="submit" name="UpdateStatus" title="Update Status"
                                                            class="btn bg-primary btn-sm text-light"
                                                            style="margin-top: 4px; padding : 8px;"><i
                                                                class="fas fa-fw fa-save"></i> Update Status</button>
                                                    </p>
                                                    <?php
                                                    if (isset($_POST['UpdateStatus'])) {
                                                        $abstract_id = $_POST['abstract_id'];
                                                        if (isset($_FILES['rev_paper']['name']) && $_FILES['rev_paper']['size'] > 0) {
                                                            $rev_paper = $_FILES['rev_paper']['name'];
                                                            $rev_paper_tmp = $_FILES['rev_paper']['tmp_name'];

                                                            if (!file_exists('review_papers')) {
                                                                mkdir('review_papers', 0777, true);
                                                            }

                                                            if (move_uploaded_file($rev_paper_tmp, "review_papers/$rev_paper")) {
                                                                $rev_paper_upload = "INSERT INTO review_abstracts (abstract_id, rev_pdf_file) VALUES ($abstract_id, '$rev_paper')";
                                                                $upload = mysqli_query($con, $rev_paper_upload);
                                                                if ($upload) {
                                                                    echo "<div class='alert alert-success'>File uploaded successfully.</div>";
                                                                } else {
                                                                    echo "<div class='alert alert-danger'>File upload failed.</div>";
                                                                }
                                                            } else {
                                                                echo "<div class='alert alert-danger'>File move failed.</div>";
                                                            }
                                                        } else {
                                                            echo "<div class='alert alert-warning'>No file uploaded.</div>";
                                                        }

                                                        $comment_abs = (isset($_POST['comments_abs'])) ? $_POST['comments_abs'] : "";
                                                        $status = $_POST['status'];
                                                        $update_status = "UPDATE abstracts SET status = '$status' WHERE abstract_id = '$abstract_id'";
                                                        $update = mysqli_query($con, $update_status);
                                                        $comment = mysqli_real_escape_string($con, $comment_abs);
                                                        $submit_comments = "INSERT INTO review_comments (abstract_id, reviewer_id, comment, commented_at) VALUES ('$abstract_id', '$user_id', '$comment', NOW())";
                                                        $comments = mysqli_query($con, $submit_comments);
                                                        $subject = 'Abstract Reviewed';
                                                        $message = "
                                                            <html>
                                                            <body style='font-family: Arial, sans-serif; background-color: #f4f4f4; text-align: center; padding: 20px;'>
                                                                <div style='background-color: white; padding: 20px; border-radius: 10px; max-width: 500px; margin: auto; box-shadow: 0 4px 8px rgba(0,0,0,0.1);'>
                                                                    <h2 style='color:rgb(205, 36, 36);'>Abstract Reviewed</h2>
                                                                    <p>Your abstract has been reviewed. Please find the attached file.</p><br>
                                                                    <p>Abstract Title: <span style='font-weight: bold;'>{$row['title']}</span></p>
                                                                    <p>Status: <span style='font-weight: bold;'>{$status}</span></p>
                                                                    <p>Comments: <span style='font-weight: bold;'>{$comment_abs}</span></p><br>
                                                                    <p>Thank you.</p>
                                                                    <p style='margin-top: 5px; font-size: 14px; color: #555;'>
                                                                        <b>Regards,</b><br>
                                                                        <b>Ruhuna Arts Student's Annual Sessions - University of Ruhuna</b>
                                                                    </p>
                                                                </div>
                                                            </body>
                                                            </html>";
                                                        if ($comments && $update) {
                                                            sendEmail($email, $subject, $message);
                                                            echo "<div class='alert alert-success'>Comment submitted successfully.</div>";
                                                            echo "<div class='alert alert-success'>Status updated successfully.</div>";
                                                            echo "<script>setTimeout(\"location.href = 'view_submissions.php';\",);</script>";
                                                        } else {
                                                            echo "<div class='alert alert-danger'>Comment submission failed.</div>";
                                                            echo "<div class='alert alert-danger'>Status update failed.</div>";
                                                        }
                                                    }
                                                    ?>

                                                </td>
                                                
                                                </form>
                                            <?php } ?>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <br>
                <!--accepted submissions-->
                <div class="container-fluid">
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
                                            <th>Title</th>
                                            <th>Submisson Date</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>

                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $accepted_submissions = "SELECT a.abstract_id, a.title, a.keywords, a.status, a.submit_date, u.full_name AS author_name
                                                                FROM reviewer_assignment ra
                                                                JOIN abstracts a ON ra.abstract_id = a.abstract_id
                                                                JOIN users u ON a.user_id = u.user_id
                                                                WHERE ra.reviewer_id = '$user_id' AND a.status = 'accepted' or a.status = 'accepted_minor' or a.status = 'accepted_major'
                                                                ORDER BY a.submit_date DESC;
                                                                ";
                                            $objects = mysqli_query($con, $accepted_submissions);
                                            while ($row = mysqli_fetch_array($objects)) {
                                                ?>

                                                <td><?php echo $row['abstract_id']; ?></td>
                                                <td><?php echo $row['title']; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($row['submit_date'])); ?></td>
                                                <td style="text-transform: capitalize">
                                                    <?php
                                                    $status = $row['status'];
                                                    if ($status == 'accepted_minor') {
                                                        echo 'Accepted with Minor Corrections';
                                                    } else if ($status == 'accepted_major') {
                                                        echo 'Accepted with Major Corrections';
                                                    } else {
                                                        echo $status;
                                                    }
                                                    ?>

                                                </td>
                                                <td>
                                                    <form method="get" action="view_submission.php">
                                                    <a href="view_ex_abstract.php?id=<?php echo $row['abstract_id']; ?>"
                                                            class="btn btn-danger btn-sm" title="View" data-toggle="tooltip"
                                                            target="_blank"
                                                            style="padding : 8px;">&nbsp;&nbsp;&nbsp;&nbsp;<i
                                                                class="fas fa-fw fa-eye"></i>&nbsp; View Extended
                                                            Abstract &nbsp;&nbsp;&nbsp;&nbsp;</a>
                                                    </form>
                                                </td>


                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <!--rejected submissions-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-9">
                            <h1 class="h3 mb-2 text-gray-800">Rejected Submissions</h1>
                        </div>
                    </div>
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Abstract Id</th>
                                            <th>Title</th>
                                            <th>Submisson Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $rejected_submissions = "SELECT a.abstract_id, a.title, a.keywords, a.status, a.submit_date, u.full_name AS author_name
                                            FROM reviewer_assignment ra
                                            JOIN abstracts a ON ra.abstract_id = a.abstract_id
                                            JOIN users u ON a.user_id = u.user_id
                                            WHERE ra.reviewer_id = '$user_id' AND a.status = 'rejected'
                                            ORDER BY a.submit_date DESC;
                                            ";
                                            $objects = mysqli_query($con, $rejected_submissions);
                                            while ($row = mysqli_fetch_array($objects)) {
                                                ?>

                                                <td><?php echo $row['abstract_id']; ?></td>
                                                <td><?php echo $row['title']; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($row['submit_date'])); ?></td>
                                                <td style="text-transform: capitalize"><?php echo $row['status']; ?></td>


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