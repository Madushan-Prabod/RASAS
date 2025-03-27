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

    <title>All Users</title>

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
                            <h1 class="h3 mb-2 text-gray-800">All Users Record</h1>
                        </div>
                    </div>
                    <!-- Page Heading -->

                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>

                                            <?php
                                            $all_users = "SELECT * FROM users ORDER BY role ASC";
                                            $objects = mysqli_query($con, $all_users);
                                            while ($row = mysqli_fetch_array($objects)) {

                                                ?>


                                                <td><?php echo $row['full_name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td style="text-transform : capitalize;"><?php echo $row['role']; ?></td>

                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#deleteModal<?php echo $row['user_id']; ?>">
                                                        <i class="fas fa-fw fa-trash"></i>&nbsp;Delete
                                                    </button>

                                                    <div class="modal fade" id="deleteModal<?php echo $row['user_id']; ?>"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                        User</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete this user?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <form action="all_users.php" method="post">
                                                                        <input type="hidden" name="user_id"
                                                                            value="<?php echo $row['user_id']; ?>">
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if (isset($_POST['user_id'])) {
                                                        $user_id = $_POST['user_id'];
                                                        $query = "DELETE FROM users WHERE user_id='$user_id'";
                                                        mysqli_query($con, $query);

                                                        $query2 = "DELETE FROM abstracts WHERE user_id='$user_id'";
                                                        mysqli_query($con, $query2);

                                                        $query3 = "DELETE FROM review_comments WHERE reviewer_id='$user_id'";
                                                        mysqli_query($con, $query3);

                                                        $query4 = "DELETE FROM notifications WHERE user_id='$user_id'";
                                                        mysqli_query($con, $query4);

                                                        $query5 = "DELETE FROM reviewer_assignment WHERE reviewer_id='$user_id'";
                                                        mysqli_query($con, $query5);

                                                        echo "<script><div class='alert alert-success'>User deleted successfully.</div></script>";
                                                    } else {
                                                        echo "<Script><div class='alert alert-danger'>User not deleted.</div></Script>";
                                                    }
                                                    ?>

                                                </td>


                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="container">
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Assign Role to User</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    required placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Select Role</label>
                                                <select class="form-control" id="role" name="role" required>
                                                    <option value="" disabled selected>Select a Role</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="reviewer">Reviewer</option>
                                                    <option value="researcher">Researcher</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary" name="assignRoleToUser">Assign
                                                Role</button>
                                        </form>
                                        <?php
                                        if (isset($_POST['assignRoleToUser'])) {
                                            $email = $_POST['email'];
                                            $role = $_POST['role'];
                                            $query = "UPDATE users SET role = '$role' WHERE email = '$email'";

                                            $result = mysqli_query($con, $query);
                                            if ($result) {
                                                echo "<div class='alert alert-success'>Role assigned successfully.</div>";
                                                echo "<script>setTimeout(\"location.href = 'all_users.php';\",2500);</script>";
                                            } else {
                                                echo "Error: " . mysqli_error($con);
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
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