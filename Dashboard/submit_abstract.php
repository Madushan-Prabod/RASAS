<?php
$con = require 'db.php';

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
                            <h1 class="h3 mb-2 text-gray-800">Submit Abstract</h1>

                        </div>
                    </div>
                    <!-- Page Heading -->

                    <div class="card shadow mb-4">
                        <div class="modal-body">
                            <div class="card-body">
                                <form action="submit_abstract.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="abstract">Abstract</label>
                                        <input type="file" class="form-control" id="abstract" name="content" accept=".pdf" required>
                                        <small id="fileHelp" class="form-text text-muted">Please upload your abstract in PDF format.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="Extended Abstracts">Extended Abstracts</label>
                                        <input type="file" class="form-control" id="extended_abstracts" name="extended_abstracts" accept=".pdf" required>
                                        <small id="fileHelp" class="form-text text-muted">Please upload your extended abstract in PDF format.</small>
                                    </div>
                                    <input type="hidden" name="conference_id" value="1">
                                    <div class="form-group">
                                        <label for="author">Author</label>
                                        <input type="text" class="form-control" id="author" name="author" required disabled value="<?php echo $row['full_name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="theme">Choose Theme</label>
                                        <select class="form-control keywords" id="theme" name="theme" required>
                                            <option value="" disabled selected>Select a Theme</option>
                                            <option value="Society, culture and education">Society, culture and education</option>
                                            <option value="Democracy, governance and Social movements">Democracy, governance and Social movements</option>
                                            <option value="Gender and women studies">Gender and women studies</option>
                                            <option value="Language and literacy studies">Language and literacy studies</option>
                                            <option value="Aesthetics and Folklore">Aesthetics and Folklore</option>
                                            <option value="Social work, Psychology and counseling">Social work, Psychology and counseling</option>
                                            <option value="Religion, politics and secularism">Religion, politics and secularism</option>
                                            <option value="Archaeology, History and Heritage">Archaeology, History and Heritage</option>
                                            <option value="Health, illness and society">Health, illness and society</option>
                                            <option value="Economy, Poverty and sustainable Development">Economy, Poverty and sustainable Development</option>
                                            <option value="Technology, media and social transformation">Technology, media and social transformation</option>
                                            <option value="Population, environment and disaster management">Population, environment and disaster management</option>
                                            <option value="Tourism and Hospitality">Tourism and Hospitality</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </form>
                                <?php	

                                if (isset($_POST['submit'])) {
                                    $user_id = $_SESSION['user_id'];
                                    $conference_id = $_POST['conference_id'];
                                    $title = $_POST['title'];
                                    $content = $_FILES['content']['name'];
                                    $content_tmp = $_FILES['content']['tmp_name'];
                                    $extended_abstracts = $_FILES['extended_abstracts']['name'];
                                    $extended_abstracts_tmp = $_FILES['extended_abstracts']['tmp_name'];
                                    $theme = $_POST['theme'];
                                    $submission_date = date('Y-m-d H:i:s');
                                    $status = 'submitted';
                                    $assign_date = 'Pending';
                                    $message = '
                                    <html>
                                    <body>
                                    <h2>Abstract Submission Notification</h2>
                                    <p>Title: ' . $title . '</p>
                                    <p>Author: ' . $row['full_name'] . '</p>
                                    <p>Theme: ' . $theme . '</p>
                                    <p>Submission Date: '. $submission_date. '</p>
                                    </body>
                                    </html>';

                                    
                                    if (!file_exists('abstracts')) {
                                        mkdir('abstracts', 0777, true);
                                    }
                                    if (!file_exists('extended_abstracts')) {
                                        mkdir('extended_abstracts', 0777, true);
                                    }
                                    
                                    $file_extension = pathinfo($content, PATHINFO_EXTENSION);
                                    $file_extension = pathinfo($extended_abstracts, PATHINFO_EXTENSION);
                                    $content = $title . '.' . $file_extension;
                                    $file_extension_content = pathinfo($content, PATHINFO_EXTENSION);
                                    $file_extension_extended = pathinfo($extended_abstracts, PATHINFO_EXTENSION);
                                    $content = $title . '.' . $file_extension_content;
                                    $extended_abstracts = $title . '_extended_abstract.' . $file_extension_extended;
                                    $target_file = 'abstracts/' . basename($content);
                                    $target_extended_abstracts = 'extended_abstracts/' . basename($extended_abstracts);
                                    if (move_uploaded_file($content_tmp, $target_file) && move_uploaded_file($extended_abstracts_tmp, $target_extended_abstracts)) {
                                        $query = "INSERT INTO abstracts (user_id, conference_id, title, pdf_file, extended_abstracts, keywords, status, submit_date, assigned_date) 
                                                  VALUES ('$user_id', '$conference_id', '$title', '$target_file', '$extended_abstracts', '$theme', '$status', '$submission_date', '$assign_date')";
                                        if (mysqli_query($con, $query)) {
                                            echo "<div style='position: absolute; top: 0; right: 0;' class='alert alert-success alert-dismissible fade show' role='alert'>Successfully Submitted!</div>";
                                            echo "<script>setTimeout(\"location.href = 'submit_abstract.php';\",2500);</script>";
                                        } else {
                                            echo "<div class='alert alert-danger'>Error: " . mysqli_error($con) . "</div>";
                                        }
                                    } else {
                                        echo "<div style='position: absolute; top: 0; right: 0;' class='alert alert-danger alert-dismissible fade show' role='alert'>Submission Failed!</div>";
                                    }

                                    
                                }
                                ?>
                            </div>

                        <!-- /.container-fluid -->

                    </div>
                    </div>
                    <br>
                    <!-- End of Main Content -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-9">
                                <h1 class="h3 mb-2 text-gray-800">Submitted Abstracts</h1>
                            </div>
                        </div>
                    </div>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $user_id = $_SESSION['user_id'];
                                        $get_abstracts = "SELECT * FROM abstracts WHERE user_id='$user_id'";
                                        $abstracts = mysqli_query($con, $get_abstracts);
                                        while ($row = mysqli_fetch_array($abstracts)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['keywords']; ?></td>
                                            <td><?php echo $row['submit_date']; ?></td>
                                            <td style="text-transform : capitalize">
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
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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