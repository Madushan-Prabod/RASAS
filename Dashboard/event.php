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

    <title>Event</title>

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
                            <h1 class="h3 mb-2 text-gray-800">Event Details</h1>
                        </div>
                    </div>
                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="container-fluid">
                            <div class="container-fluid">
                                <div class="row register">
                                    <div class="col-12">
                                        <?php
                                        $query = "SELECT * FROM event WHERE event_id = 1";
                                        $result = mysqli_query($con, $query);
                                        $row = mysqli_fetch_assoc($result);
                                        ?>
                                        <form method="post" action="event.php" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Event Details Updation</h4>
                                            </div>
                                            <input type="hidden" name="event_id" value="1">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="title" value="<?php echo $row['title']; ?>"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="date" name="event_date" id="" class="form-control"
                                                        value="<?php echo $row['event_date']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="department">Department</label>
                                                    <select class="form-control" id="department" name="department"
                                                        value="<?php echo $row['department']; ?>" required>
                                                        <option value="" disabled selected>Select Department</option>
                                                        <option value="Department of Economics">Department of Economics
                                                        </option>
                                                        <option value="Department of English and Linguistics">Department
                                                            of
                                                            English and Linguistics</option>
                                                        <option value="Department of English Language Teaching">
                                                            Department
                                                            of English Language Teaching</option>
                                                        <option value="Department of Geography">Department of Geography
                                                        </option>
                                                        <option value="Department of History and Archaeology">Department
                                                            of
                                                            History and Archaeology</option>
                                                        <option value="Department of Information Technology">Department
                                                            of
                                                            Information Technology</option>
                                                        <option value="Department of Pali and Buddhist Studies">
                                                            Department
                                                            of Pali and Buddhist Studies</option>
                                                        <option value="Department of Public Policy">Department of Public
                                                            Policy</option>
                                                        <option value="Department of Sinhala">Department of Sinhala
                                                        </option>
                                                        <option value="Department of Sociology">Department of Sociology
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>About Event</label>
                                                    <textarea name="about_event" class="form-control" id=""
                                                        style="height: 150px;"
                                                        required><?php echo $row['about_event']; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Deadline for Submission of Extended Abstracts">Deadline
                                                        for
                                                        Submission of Extended Abstracts</label>
                                                    <input type="date" name="sub_date" id="" class="form-control"
                                                        value="<?php echo $row['deadline_submission']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Notification of Acceptance">Notification of
                                                        Acceptance</label>
                                                    <input type="date" name="acc_date" id="" class="form-control"
                                                        value="<?php echo $row['notification_acceptance']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Submissions of the Revised Abstracts">Submissions of the
                                                        Revised
                                                        Abstracts</label>
                                                    <input type="date" name="revi_date" id="" class="form-control"
                                                        value="<?php echo $row['submission_revised']; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="Early Bird Registration">Early Bird Registration</label>
                                                    <input type="date" name="reg_date" id="" class="form-control"
                                                        value="<?php echo $row['early_registeration']; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="keynote">Keynote Speacker</label>
                                                    <input type="text" name="key_name" class="form-control"
                                                        placeholder="Name"
                                                        value="<?php echo $row['keynote_speacker']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="key_title">Title</label>
                                                    <input type="text" name="key_title" class="form-control"
                                                        placeholder="Title" value="<?php echo $row['key_title']; ?>"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="key_position">Position</label>
                                                    <input type="text" name="key_position" class="form-control"
                                                        placeholder="Position"
                                                        value="<?php echo $row['key_position']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="key_affiliation">Affiliation</label>
                                                    <input type="text" name="key_affiliation" class="form-control"
                                                        placeholder="Affiliation"
                                                        value="<?php echo $row['key_affiliation']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="key_location">Location</label>
                                                    <input type="text" name="key_location" class="form-control"
                                                        placeholder="Location"
                                                        value="<?php echo $row['key_location']; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="keynote">Upload Keynote Speacker Image</label>
                                                    <input type="file" name="key_image" id="" class="form-control"
                                                        accept="image/*" required>
                                                    <img src="./key_image/<?php echo $row['key_image']; ?>" alt="keynote specker image" style="width: 100px; height: 100px; border: 1px solid black; margin: 1% ;">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="update" class="btn btn-success"
                                                    value="Update">
                                                <input type="button" value="Cancel" class="btn btn-danger"
                                                    data-dismiss="modal">
                                            </div>

                                            <?php
                                            if (isset($_POST['update'])) {
                                                $event_id = $_POST['event_id'];
                                                $title = $_POST['title'];
                                                $event_date = $_POST['event_date'];
                                                $department = $_POST['department'];
                                                $about_event = $_POST['about_event'];
                                                $sub_date = $_POST['sub_date'];
                                                $acc_date = $_POST['acc_date'];
                                                $revi_date = $_POST['revi_date'];
                                                $reg_date = $_POST['reg_date'];
                                                $key_name = $_POST['key_name'];
                                                $key_title = $_POST['key_title'];
                                                $key_position = $_POST['key_position'];
                                                $key_affiliation = $_POST['key_affiliation'];
                                                $key_location = $_POST['key_location'];
                                                $key_image = $_FILES['key_image']['name'];

                                                // Define the target directory for the uploaded image
                                                $target_dir = "key_image/";
                                                // Ensure the directory exists
                                                if (!is_dir($target_dir)) {
                                                    mkdir($target_dir, 0777, true);
                                                }
                                                // Define the target file path
                                                $target_file = $target_dir . basename($key_image);

                                                // Move the uploaded file to the target directory
                                                if (move_uploaded_file($_FILES['key_image']['tmp_name'], $target_file)) {
                                                    $query = "UPDATE event SET title = ?, event_date = ?, department = ?, about_event = ?, deadline_submission = ?, notification_acceptance = ?, submission_revised = ?, early_registeration = ?, keynote_speacker = ?, key_title = ?, key_position = ?, key_affiliation = ?, key_location = ?, key_image = ? WHERE event_id = ?";
                                                    $stmt = $con->prepare($query);
                                                    $stmt->bind_param("ssssssssssssssi", $title, $event_date, $department, $about_event, $sub_date, $acc_date, $revi_date, $reg_date, $key_name, $key_title, $key_position, $key_affiliation, $key_location, $key_image, $event_id);
                                                    if ($stmt->execute()) {
                                                        echo '<div style="position: fixed; top: 0; right: 0;" class="alert alert-success alert-dismissible fade show" role="alert">Update Successful!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                    } else {
                                                        echo "<div class='alert alert-danger'>Error: {$stmt->error}</div>";
                                                    }
                                                    $stmt->close();
                                                } else {
                                                    echo "<div class='alert alert-danger'>Error uploading image.</div>";
                                                }
                                            }
                                            ?>
                                            <!-- /.container-fluid -->

                                    </div>
                                    <!-- End of Main Content -->

                                </div>
                                <!-- End of Content Wrapper -->

                            </div>

                            <!-- End of Page Wrapper -->
                        </div>
                    </div>

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