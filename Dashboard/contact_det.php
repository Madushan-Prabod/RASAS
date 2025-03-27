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

    <title>Contact Us</title>

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
                                <h1 class="h3 mb-2 text-gray-800">Contact Details</h1>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="modal-header">
                                    <h4 class="modal-title">Chairperson</h4>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">

                                            <form method="post" action="contact_det.php" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <?php
                                                        $sql = 'SELECT * FROM contact_us WHERE contact_id = 1 AND role = "Chairperson"';
                                                        $result = mysqli_query($con, $sql);
                                                        $row = mysqli_fetch_array($result);
                                                        ?>
                                                        <input type="text" name="name"
                                                            value="<?php echo $row['name']; ?>"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Profession</label>
                                                        <input type="text" name="profession"
                                                            value="<?php echo $row['profession']; ?>" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Department</label>
                                                        <input type="text" name="department"
                                                            value="<?php echo $row['department']; ?>"
                                                            class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Phone Number</label>
                                                        <input type="tel" name="phone" class="form-control"
                                                            placeholder="Enter phone number" minlength="10"
                                                            maxlength="10" value="<?php echo $row['phone_number']; ?>" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control"
                                                            placeholder="Enter email address" value="<?php echo $row['email']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Picture</label>
                                                        <input type="file" name="user_pic" class="form-control"
                                                            accept=".jpg, .jpeg, .png, .gif" required>
                                                        <img src="profile_pic_contact/<?php echo $row['user_pic']; ?>" alt=""
                                                            width="80" height="80">
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" name="update_chairperson" class="btn btn-success"
                                                        value="Update">
                                                    <input type="button" value="Cancel" class="btn btn-danger"
                                                        data-dismiss="modal">

                                                    <?php
                                                    if (isset($_POST['update_chairperson'])) {
                                                        $sql = 'UPDATE contact_us SET name = ?, profession = ?, department = ?, phone_number = ?, email = ?, user_pic = ? WHERE contact_id = 1 AND role = "Chairperson"';
                                                        $stmt = mysqli_prepare($con, $sql);
                                                        mysqli_stmt_bind_param($stmt, "ssssss", $name, $profession, $department, $phone, $email, $profile_pic);
                                                        $name = $_POST['name'];
                                                        $profession = $_POST['profession'];
                                                        $department = $_POST['department'];
                                                        $phone = $_POST['phone'];
                                                        $email = $_POST['email'];
                                                        $profile_pic = $_FILES['user_pic']['name'];
                                                        $profile_pic_tmp = $_FILES['user_pic']['tmp_name'];

                                                        // Create directory if it does not exist
                                                        if (!is_dir('profile_pic_contact')) {
                                                            mkdir('profile_pic_contact', 0777, true);
                                                        }
                                                        //not upload image then use old image
                                                        if (empty($profile_pic)) {
                                                            $profile_pic = 'chairperson.jpg';
                                                        } else {
                                                            //old image delete
                                                            $old_image = "profile_pic_contact/" . $row['user_pic'];
                                                            if (file_exists($old_image)) {
                                                                unlink($old_image);
                                                            }
                                                        }

                                                        move_uploaded_file($profile_pic_tmp, "profile_pic_contact/$profile_pic");
                                                        if (mysqli_stmt_execute($stmt)) {
                                                            echo '<div style="position: fixed; top: 0; right: 0;" class="alert alert-success alert-dismissible fade show" role="alert">Update Successful!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                            echo "<script>
                                                                setTimeout(function() {
                                                                    window.open('contact_det.php', '_self');
                                                                }, 2000);
                                                            </script>";
                                                        } else {
                                                            echo "<div style='position: absolute; top: 0; right: 0;' class='alert alert-danger alert-dismissible fade show' role='alert'>Update Successful!</div>";
                                                            echo "Error: " . mysqli_error($con);
                                                        }
                                                            
                                                        }
                                                      ?>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <div class="modal-header">
                                    <h4 class="modal-title">Secretary</h4>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">

                                            <form method="post" action="" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <?php
                                                        $sql = 'SELECT * FROM contact_us WHERE contact_id = 2 AND role = "Secretary"';
                                                        $result = mysqli_query($con, $sql);
                                                        $row = mysqli_fetch_array($result);
                                                        ?>
                                                        <input type="text" name="name"
                                                            value="<?php echo $row['name']; ?>"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Profession</label>
                                                        <input type="text" name="profession"
                                                            value="<?php echo $row['profession']; ?>" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Department</label>
                                                        <input type="text" name="department"
                                                            value="<?php echo $row['department']; ?>"
                                                            class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Phone Number</label>
                                                        <input type="tel" name="phone" class="form-control"
                                                            placeholder="Enter phone number" minlength="10"
                                                            maxlength="10" value="<?php echo $row['phone_number']; ?>" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control"
                                                            placeholder="Enter email address" value="<?php echo $row['email']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Picture</label>
                                                        <input type="file" name="user_pic" class="form-control"
                                                            accept=".jpg, .jpeg, .png, .gif">
                                                        <img src="profile_pic_contact/<?php echo $row['user_pic']; ?>" alt=""
                                                            width="80" height="80" required>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" name="update_secretary" class="btn btn-success"
                                                        value="Update">
                                                    <input type="button" value="Cancel" class="btn btn-danger"
                                                        data-dismiss="modal">
                                                </div>

                                                <?php
                                                if (isset($_POST['update_secretary'])) {
                                                    $name = $_POST['name'];
                                                    $profession = $_POST['profession'];
                                                    $department = $_POST['department'];
                                                    $phone = $_POST['phone'];
                                                    $email = $_POST['email'];  
                                                    $profile_pic = $_FILES['user_pic']['name'];
                                                    $profile_pic_tmp = $_FILES['user_pic']['tmp_name'];

                                                    $sql = 'UPDATE contact_us SET name = ?, profession = ?, department = ?, phone_number = ?, email = ?, user_pic = ? WHERE contact_id = 2 AND role = "Secretary"';
                                                    $stmt = mysqli_prepare($con, $sql);
                                                    mysqli_stmt_bind_param($stmt, "ssssss", $name, $profession, $department, $phone, $email, $profile_pic);

                                                    // Create directory if it does not exist
                                                    if (!is_dir('profile_pic_contact')) {
                                                        mkdir('profile_pic_contact', 0777, true);
                                                    }
                                                    // Use default image if not uploaded
                                                    if (empty($profile_pic)) {
                                                        $profile_pic = 'secretary.jpg';
                                                    } else {
                                                        // Old image deletion logic here if needed
                                                    }
                                                    // Move uploaded file or use default
                                                    if (!empty($profile_pic_tmp)) {
                                                        move_uploaded_file($profile_pic_tmp, "profile_pic_contact/$profile_pic");
                                                    }
                                                    if (mysqli_stmt_execute($stmt)) {
                                                        echo '<div style="position: fixed; top: 0; right: 0;" class="alert alert-success alert-dismissible fade show" role="alert">Update Successful!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                        echo "<script>
                                                            setTimeout(function() {
                                                                window.open('contact_det.php', '_self');
                                                            }, 2000);
                                                        </script>";
                                                    } else {
                                                        echo "<div style='position: absolute; top: 0; right: 0;' class='alert alert-danger alert-dismissible fade show' role='alert'>Update Successful!</div>";
                                                        echo "Error: " . mysqli_error($con);
                                                    }
                                                    }
                                                    ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <div class="modal-header">
                                    <h4 class="modal-title">Treasurer</h4>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">

                                            <form method="post" action="" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <?php
                                                        $sql = 'SELECT * FROM contact_us WHERE contact_id = 3 AND role = "Treasurer"';
                                                        $result = mysqli_query($con, $sql);
                                                        $row = mysqli_fetch_array($result);
                                                        ?>
                                                        <input type="text" name="name"
                                                            value="<?php echo $row['name']; ?>"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Profession</label>
                                                        <input type="text" name="profession"
                                                            value="<?php echo $row['profession']; ?>" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Department</label>
                                                        <input type="text" name="department"
                                                            value="<?php echo $row['department']; ?>"
                                                            class="form-control" minlength="8" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Phone Number</label>
                                                        <input type="tel" name="phone" class="form-control"
                                                            placeholder="Enter phone number" minlength="10"
                                                            maxlength="10" value="<?php echo $row['phone_number']; ?>" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control"
                                                            placeholder="Enter email address" value="<?php echo $row['email']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Picture</label>
                                                        <input type="file" name="user_pic" class="form-control"
                                                            accept=".jpg, .jpeg, .png, .gif">
                                                        <img src="profile_pic_contact/<?php echo $row['user_pic']; ?>" alt=""
                                                            width="80" height="80" required>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" name="update_treasurer" class="btn btn-success"
                                                        value="Update">
                                                    <input type="button" value="Cancel" class="btn btn-danger"
                                                        data-dismiss="modal">
                                                </div>

                                                <?php
                                                if (isset($_POST['update_treasurer'])) {
                                                    $name = $_POST['name'];
                                                    $profession = $_POST['profession'];
                                                    $department = $_POST['department'];
                                                    $phone = $_POST['phone'];
                                                    $email = $_POST['email'];
                                                    $profile_pic = $_FILES['user_pic']['name'];
                                                    $profile_pic_tmp = $_FILES['user_pic']['tmp_name'];

                                                    move_uploaded_file($profile_pic_tmp, 'profile_pic_contact/' . $profile_pic);
                                                    $sql = 'UPDATE contact_us SET name = ?, profession = ?, department = ?, phone_number = ?, email = ?, user_pic = ? WHERE contact_id = 3 AND role = "Treasurer"';
                                                    $stmt = mysqli_prepare($con, $sql);
                                                    mysqli_stmt_bind_param($stmt, "ssssss", $name, $profession, $department, $phone, $email, $profile_pic);
                                                    // Create directory if it does not exist
                                                    if (!is_dir('profile_pic_contact')) {
                                                        mkdir('profile_pic_contact', 0777, true);
                                                    }
                                                    // Use default image if not uploaded
                                                    if (empty($profile_pic)) {
                                                        $profile_pic = 'secretary.jpg';
                                                    } else {
                                                        // Old image deletion logic here if needed
                                                    }
                                                    // Move uploaded file or use default
                                                    if (!empty($profile_pic_tmp)) {
                                                        move_uploaded_file($profile_pic_tmp, "profile_pic_contact/$profile_pic");
                                                    }
                                                    if (mysqli_stmt_execute($stmt)) {
                                                        echo '<div style="position: fixed; top: 0; right: 0;" class="alert alert-success alert-dismissible fade show" role="alert">Update Successful!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                        echo "<script>
                                                            setTimeout(function() {
                                                                window.open('contact_det.php', '_self');
                                                            }, 2000);
                                                        </script>";
                                                    } else {
                                                        echo "<div style='position: absolute; top: 0; right: 0;' class='alert alert-danger alert-dismissible fade show' role='alert'>Update Successful!</div>";
                                                        echo "Error: " . mysqli_error($con);
                                                    }
                                                    }
                                                    ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <div class="modal-header">
                                    <h4 class="modal-title">General Contact</h4>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="post" action="contact_det.php" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <?php
                                                        $sql = "SELECT email FROM event WHERE event_date = (SELECT MAX(event_date) FROM event)";
                                                        $result = mysqli_query($con, $sql);
                                                        $row = mysqli_fetch_assoc($result);
                                                        ?>
                                                        
                                                        <input type="text" name="email"
                                                            value="<?php echo $row['email']; ?>"
                                                            class="form-control" required value = "<?php echo $row['email']; ?>">
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                        <input type="submit" name="update_gen_contact" class="btn btn-success"
                                                            value="Update">
                                                        <input type="button" value="Cancel" class="btn btn-danger"
                                                            data-dismiss="modal">
                                                    </div>
                                                    
                                                    <?php
                                                    if (isset($_POST['update_gen_contact'])) {
                                                        $email = $_POST['email'];

                                                        $sql = 'UPDATE event SET email = ? WHERE event_date = (SELECT MAX(event_date) FROM event)';
                                                        $stmt = mysqli_prepare($con, $sql);
                                                        mysqli_stmt_bind_param($stmt, "s", $email);
                                                        if (mysqli_stmt_execute($stmt)) {
                                                            echo '<div style="position: fixed; top: 0; right: 0;" class="alert alert-success alert-dismissible fade show" role="alert">Update Successful!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                            echo "<script>
                                                                setTimeout(function() {
                                                                    window.open('contact_det.php', '_self');
                                                                }, 2000);
                                                            </script>";
                                                        } else {
                                                            echo "<div style='position: absolute; top: 0; right: 0;' class='alert alert-danger alert-dismissible fade show' role='alert'>Update Successful!</div>";
                                                            echo "Error: " . mysqli_error($con);
                                                        }
                                                    }
                                                    ?>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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