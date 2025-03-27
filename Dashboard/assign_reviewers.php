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

    <title>Assign Reviewers</title>

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
                            <h1 class="h3 mb-2 text-gray-800">Assign Reviewers</h1>

                        </div>
                    </div>
                    <!-- Page Heading -->

                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Abstract Title</th>
                                            <th>Keywords</th>
                                            <th>Assign Reviewer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        // Fetch abstracts that need reviewers
                                        $query = "SELECT abstract_id, title, keywords FROM abstracts WHERE status = 'submitted'";
                                        $result = mysqli_query($con, $query);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $abstract_id = $row['abstract_id'];
                                            $keywords = $row['keywords'];
                                            ?>
                                            <tr>
                                                <td><?php echo $row['title']; ?></td>
                                                <td><?php echo $keywords; ?></td>
                                                <td>
                                                    <form method="POST" action="assign_reviewers.php">
                                                        <input type="hidden" name="abstract_id"
                                                            value="<?php echo $abstract_id; ?>">
                                                        <select name="reviewer_id" required>
                                                            <option value="" class="text-muted shadow">Select Reviewer
                                                            </option>
                                                            <?php
                                                            // Fetch the keywords for the given abstract
                                                            $abstractQuery = "SELECT keywords FROM abstracts WHERE abstract_id = '$abstract_id'";
                                                            $abstractResult = mysqli_query($con, $abstractQuery);
                                                            $abstractRow = mysqli_fetch_assoc($abstractResult);
                                                            $keywords = $abstractRow['keywords'];

                                                            // Break keywords into an array
                                                            $keywordList = explode(',', $keywords);
                                                            $keywordConditions = [];

                                                            // Build WHERE clause dynamically for multiple keywords
                                                            foreach ($keywordList as $keyword) {
                                                                $keywordConditions[] = "theme LIKE '%" . trim($keyword) . "%'";
                                                            }

                                                            // Combine conditions with OR
                                                            $whereClause = implode(' OR ', $keywordConditions);

                                                            // Fetch reviewers with at least one matching theme
                                                            $reviewerQuery = "SELECT user_id, full_name, theme FROM users 
                                                            WHERE role = 'reviewer' AND ($whereClause)";
                                                            $reviewerResult = mysqli_query($con, $reviewerQuery);

                                                            while ($reviewer = mysqli_fetch_assoc($reviewerResult)) {
                                                                if ($reviewer['user_id'] != $_SESSION['user_id']) {
                                                                    // Find matching themes
                                                                    $reviewerThemes = explode(',', $reviewer['theme']);
                                                                    $matchingThemes = array_intersect($keywordList, $reviewerThemes);

                                                                    // Display reviewer with matching themes
                                                                    echo "<option value='" . $reviewer['user_id'] . "'>" .
                                                                        $reviewer['full_name'] . " ( " . implode(', ', $matchingThemes) . " ) " .
                                                                        "</option>";
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <button type="submit" class="btn btn-primary btn-sm"
                                                            name="assign" id="assign">Assign</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php }
                                        if (isset($_POST['assign'])) {
                                            $abstract_id = $_POST['abstract_id'];
                                            $reviewer_id = $_POST['reviewer_id'];
                                            $assigned_date = date('Y-m-d H:i:s');
                                            $query = "INSERT INTO reviewer_assignment (reviewer_id, abstract_id, assigned_date) 
                                            VALUES ('$reviewer_id', '$abstract_id', '$assigned_date')";

                                            $updateQuery = "UPDATE abstracts SET status = 'under review' WHERE abstract_id = '$abstract_id'";
                                            mysqli_query($con, $updateQuery);

                                            if (mysqli_query($con, $query)) {
                                                $reviewerQuery = "SELECT full_name, email FROM users WHERE user_id = '$reviewer_id'";
                                                $reviewerResult = mysqli_query($con, $reviewerQuery);
                                                $reviewerRow = mysqli_fetch_assoc($reviewerResult);
                                                
                                                $abstractDataQuery = "SELECT title, keywords FROM abstracts WHERE abstract_id = '$abstract_id'";
                                                $abstractDataResult = mysqli_query($con, $abstractDataQuery);
                                                $abstractData = mysqli_fetch_assoc($abstractDataResult);
                                                
                                                $subject = "New Abstract Assigned";
                                                $title = $abstractData['title'] ?? '';
                                                $keywords = $abstractData['keywords'] ?? '';
                                                
                                                $message = "
                                                <html>
                                                <body style='font-family: Arial, sans-serif; background-color: #f4f4f4; text-align: center; padding: 20px;'>
                                                    <div style='background-color: white; padding: 20px; border-radius: 10px; max-width: 500px; margin: auto; box-shadow: 0 4px 8px rgba(0,0,0,0.1);'>
                                                        <h2 style='color:rgb(205, 36, 36);'>New Abstract Assigned</h2>
                                                        <p>A new abstract has been assigned to you. Please log in to the system to review the abstract.</p><br>
                                                        <p>Abstract Title: <span style='font-weight: bold;'>$title</span></p>
                                                        <p>Keywords: <span style='font-weight: bold;'>$keywords</span></p>
                                                        <p>Thank you.</p>
                                                        <p style='margin-top: 5px; font-size: 14px; color: #555;'>
                                                            <b>Regards,</b><br>
                                                            <b>Ruhuna Arts Student's Annual Sessions - University of Ruhuna</b>
                                                        </p>
                                                    </div>
                                                </body>
                                                </html>
                                                ";
                                                
                                                sendEmail($reviewerRow['email'], $subject, $message);
                                                echo "<div class='alert alert-success'>Reviewer assigned successfully.</div>";
                                                echo "<div class='d-flex justify-content-center'>
                                                    <div class='spinner-border text-danger' role='status'>
                                                        <span class='sr-only'>Loading...</span>
                                                    </div>
                                                </div>";
                                                echo "<script>
                                                    setTimeout(function() {
                                                        window.location.href = 'assign_reviewers.php';
                                                    });
                                                </script>";
                                            } else {
                                                echo "Error: " . mysqli_error($con);
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-12 mb-4">

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Assigned Reviewers</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Keywords</th>
                                            <th>Reviewer</th>
                                            <th>Assigned Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT abstracts.title, abstracts.keywords, users.full_name, reviewer_assignment.assigned_date
                                        FROM abstracts
                                        JOIN reviewer_assignment ON abstracts.abstract_id = reviewer_assignment.abstract_id
                                        JOIN users ON reviewer_assignment.reviewer_id = users.user_id";
                                        $result = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['title'] . "</td>";
                                            echo "<td>" . $row['keywords'] . "</td>";
                                            echo "<td>" . $row['full_name'] . "</td>";
                                            echo "<td>" . $row['assigned_date'] . "</td>";
                                            echo "<td>";
                                            echo "<form method='POST' action='assign_reviewers.php'>";
                                            $abs_id = mysqli_query($con, "SELECT abstract_id FROM abstracts WHERE title = '" . $row['title'] . "'");
                                            $row1 = mysqli_fetch_assoc($abs_id);
                                            echo "<input type='hidden' name='abstract_id' value='" . $row1['abstract_id'] . "'>";
                                            echo "<button type='submit' class='btn btn-warning btn-sm' name='unassign'>Unassign</button>";
                                            echo "</form>";
                                            if (isset($_POST['unassign'])) {
                                                $abstract_id = $_POST['abstract_id'];
                                                if ($abstract_id == $row1['abstract_id']) {
                                                    $sql = "UPDATE abstracts SET status = 'submitted' WHERE abstract_id = '$abstract_id'";
                                                    mysqli_query($con, $sql);
                                                    $sql = "DELETE FROM reviewer_assignment WHERE abstract_id = '$abstract_id'";
                                                    mysqli_query($con, $sql);
                                                    echo "<div class='alert alert-success'>Abstract unassigned successfully!</div>";
                                                    echo "<script>
                                                        setTimeout(function() {
                                                            window.location.href = 'assign_reviewers.php';
                                                        }, 10);
                                                    </script>";
                                                }
                                            }
                                            echo "</td>";

                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

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