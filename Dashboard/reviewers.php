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

    <title>All Reviewers</title>

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
                            <h1 class="h3 mb-2 text-gray-800">All Reviewers</h1>
                        </div>
                        <div class="col-3 align-right">
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#registerModal">Add Reviewer</button>
                            <div class="modal fade" id="registerModal" tabindex="-1" role="dialog"
                                aria-labelledby="registerModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="registerModalLabel">Register Reviewer</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="add_reviewer.php" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="name">Full Name</label>
                                                    <input type="text" name="name" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" id="email" name="email" class="form-control"
                                                        required>
                                                    <small id="email_result"></small>
                                                </div>

                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function () {
                                                        const emailInput = document.getElementById("email");
                                                        const submitBtn = document.getElementById("submitBtn");
                                                        const emailResult = document.getElementById("email_result");

                                                        emailInput.addEventListener("blur", function () {
                                                            const email = emailInput.value.trim();
                                                            if (email === "") return; // Ignore empty input

                                                            fetch(`check_email.php?email=${encodeURIComponent(email)}`)
                                                                .then(response => response.text())
                                                                .then(result => {
                                                                    if (result.trim() === "exist") {
                                                                        emailResult.innerHTML = `<span style="color: red;">Email already exists. Please use a different email.</span>`;
                                                                        submitBtn.disabled = true;
                                                                    } else if (result.trim() === "invalid") {
                                                                        emailResult.innerHTML = `<span style="color: red;">Invalid email format.</span>`;
                                                                        submitBtn.disabled = true;
                                                                    } else {
                                                                        emailResult.innerHTML = `<span style="color: green;">Email is available.</span>`;
                                                                        submitBtn.disabled = false;
                                                                    }
                                                                })
                                                                .catch(error => console.error("Error checking email:", error));
                                                        });
                                                    });
                                                </script>

                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" class="form-control"
                                                        minlength="8" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="department">Department</label>
                                                    <select class="form-control" id="department" name="department"
                                                        required>
                                                        <option value="" disabled selected>Select a Department</option>
                                                        <option value="Department of Economics">Department of Economics
                                                        </option>
                                                        <option value="Department of English and Linguistics">Department
                                                            of English and Linguistics</option>
                                                        <option value="Department of English Language Teaching">
                                                            Department of English Language Teaching</option>
                                                        <option value="Department of Geography">Department of Geography
                                                        </option>
                                                        <option value="Department of History and Archaeology">Department
                                                            of History and Archaeology</option>
                                                        <option value="Department of Information Technology">Department
                                                            of Information Technology</option>
                                                        <option value="Department of Pali and Buddhist Studies">
                                                            Department of Pali and Buddhist Studies</option>
                                                        <option value="Department of Public Policy">Department of Public
                                                            Policy</option>
                                                        <option value="Department of Sinhala">Department of Sinhala
                                                        </option>
                                                        <option value="Department of Sociology">Department of Sociology
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="theme">Theme</label>
                                                    <select class="form-control keywords" id="theme" name="theme"
                                                        required>
                                                        <option value="" disabled selected>Select a Theme</option>
                                                        <option value="Society, culture and education">Society, culture
                                                            and education</option>
                                                        <option value="Democracy, governance and Social movements">
                                                            Democracy, governance and Social movements</option>
                                                        <option value="Gender and women studies">Gender and women
                                                            studies</option>
                                                        <option value="Language and literacy studies">Language and
                                                            literacy studies</option>
                                                        <option value="Aesthetics and Folklore">Aesthetics and Folklore
                                                        </option>
                                                        <option value="Social work, Psychology and counseling">Social
                                                            work, Psychology and counseling</option>
                                                        <option value="Religion, politics and secularism">Religion,
                                                            politics and secularism</option>
                                                        <option value="Archaeology, History and Heritage">Archaeology,
                                                            History and Heritage</option>
                                                        <option value="Health, illness and society">Health, illness and
                                                            society</option>
                                                        <option value="Economy, Poverty and sustainable Development">
                                                            Economy, Poverty and sustainable Development</option>
                                                        <option value="Technology, media and social transformation">
                                                            Technology, media and social transformation</option>
                                                        <option value="Population, environment and disaster management">
                                                            Population, environment and disaster management</option>
                                                        <option value="Tourism and Hospitality">Tourism and Hospitality
                                                        </option>
                                                    </select>
                                                </div>

                                            <button type="submit" id="submitBtn" name="add_reviewer"
                                                class="btn btn-danger">Register</button>
                                        </form>
                                        <div id="creativeLoader" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); z-index:9999; background:rgba(255,255,255,0.8); padding:20px; border-radius:5px;">
                                            <div class="spinner-border text-danger" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                        <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const form = document.querySelector('form[action="add_reviewer.php"]');
                                            const loader = document.getElementById("creativeLoader");

                                            if (form) {
                                                form.addEventListener("submit", function(event) {
                                                    loader.style.display = "block";
                                                });
                                            }
                                        });
                                        </script>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page Heading -->

                        <div class="card shadow" style="width: 100%;">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Department</th>
                                                <th>Theme</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>

                                                <?php
                                                $all_users = "SELECT * FROM users WHERE role = 'reviewer'";
                                                $objects = mysqli_query($con, $all_users);
                                                if (mysqli_num_rows($objects) == 0) {
                                                    echo "<tr><td colspan='100%' class='text-center'>No data found</td></tr>";
                                                }
                                                while ($row = mysqli_fetch_array($objects)) {

                                                    ?>


                                                    <td><?php echo $row['full_name']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['department']; ?></td>
                                                    <td><?php echo $row['theme']; ?></td>

                                                    <td>
                                                        <form action="all_users.php" method="post">
                                                            <p>
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <i class="fas fa-fw fa-trash"></i></a>&nbsp;Delete
                                                                </button>
                                                            </p>
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