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

    <title>User Profile Settings</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .register {
            margin: auto;
            width: 50%;
            margin-top: 20px;
        }
    </style>
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
                        <div class="col-12">
                            <div class="modal-header">
                                <h1 class="h3 mb-2 text-gray-800">Profile Updates</h1>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="post" action="" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" name="full_name"
                                                            value="<?php echo $row['full_name']; ?>"
                                                            class="form-control" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="email"
                                                            value="<?php echo $row['email']; ?>" class="form-control"
                                                            disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Picture</label>
                                                        <input type="file" name="user_pic" class="form-control"
                                                            accept=".jpg, .jpeg, .png, .gif">
                                                        <img src="profile_pic/<?php echo $row['user_pic']; ?>" alt=""
                                                            width="80" height="80">
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" name="update" class="btn btn-success"
                                                        value="Update">
                                                    <input type="button" value="Cancel" class="btn btn-danger"
                                                        data-dismiss="modal">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--change password-->
                    <div class="card shadow mb-4">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="modal-header">
                                        <h1 class="h3 mb-2 text-gray-800">Change Password</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <form method="post" action="user_profile_setting.php">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Current Password</label>
                                                <input type="password" class="form-control" id="current_password"
                                                    name="current_password" required>
                                            </div>
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" class="form-control" id="new_password"
                                                    name="new_password" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm New Password</label>
                                                <input type="password" class="form-control" id="confirm_password"
                                                    name="confirm_password" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="update_password" class="btn btn-success">Update
                                                Password</button>
                                        </div>
                                    </form>
                                    <?php
                                    if (isset($_POST['update_password'])) {
                                        $current_password = $_POST['current_password'];
                                        $new_password = $_POST['new_password'];
                                        $confirm_password = $_POST['confirm_password'];

                                        $sql = "SELECT * FROM users WHERE user_id = $id";
                                        $result = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_assoc($result);

                                        if (password_verify($current_password, $row['password_hash'])) {
                                            if ($new_password == $confirm_password) {
                                                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                                                $update_password = "UPDATE users SET password_hash = '$password_hash' WHERE user_id = $id";
                                                if (mysqli_query($con, $update_password)) {
                                                    echo '<div class="alert alert-success" role="alert">Password updated successfully.</div>';
                                                } else {
                                                    echo '<div class="alert alert-danger" role="alert">Error updating password: ' . mysqli_error($con) . '</div>';
                                                }
                                            } else {
                                                echo '<div class="alert alert-danger" role="alert">New password and confirm password do not match.</div>';  
                                            }
                                        }
                                        } else {
                                            echo '<div class="alert alert-danger" role="alert">Current password is incorrect.</div>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_POST['update'])) {
                    $profile_pic = $_FILES['user_pic']['name'];
                    $profile_pic_tmp = $_FILES['user_pic']['tmp_name'];

                    // Create directory if it does not exist
                    if (!is_dir('profile_pic')) {
                        mkdir('profile_pic', 0777, true);
                    }
                    //not upload image then use old image
                    if (empty($profile_pic)) {
                        $user_pic = $row['user_pic'];
                    } else {
                        //old image delete
                        $old_image = "profile_pic/" . $row['user_pic'];
                        if (file_exists($old_image)) {
                            unlink($old_image);
                        }
                    }

                    $update_user = "UPDATE users SET user_pic = '$profile_pic' WHERE user_id = $id";
                    if (mysqli_query($con, $update_user)) {
                        echo "<div style='position: absolute; top: 0; right: 0;' class='alert alert-success alert-dismissible fade show' role='alert'>Update Successful!</div>";
                        echo "<script>
                            setTimeout(function() {
                                window.open('user_profile_setting.php', '_self');
                            }, 2500);
                        </script>";
                    } else {
                        echo "<div style='position: absolute; top: 0; right: 0;' class='alert alert-danger alert-dismissible fade show' role='alert'>Update Successful!</div>";
                        echo "Error: " . mysqli_error($con);
                    }
                }
                ?>

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