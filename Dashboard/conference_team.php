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

    <title>Conference Team</title>

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
                            <h1 class="h3 mb-2 text-gray-800">Conference Team</h1>
                        </div>
                    </div>
                    <!-- Page Heading -->
                    <div class="container-fluid">
                        <div class="container-fluid">
                            <div class="row register">
                                <div class="col-12">
                                    <!--advisory -->
                                    <form method="post" action="conference_team.php" enctype="multipart/form-data">
                                        <div class="card shadow mb-4">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Advisory Board</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Vice Chancellor</label>
                                                    <?php
                                                    $sql = "SELECT name, con_image, description FROM conference_team WHERE role='Vice Chancellor' AND u_id=1 AND team_id=1";
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="vc"
                                                                placeholder="Enter Vice Chancellor name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="vc_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_vc_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-10 offset-1">
                                                            <label for="vc_des">*Additional</label>
                                                            <input type="text" name="vc_des" class="form-control"
                                                                value="<?php echo $row['description']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Deputy Vice Chancellor</label>
                                                    <?php
                                                    $sql = "SELECT name, con_image, description FROM conference_team WHERE role='Deputy Vice Chancellor' AND u_id=2 AND team_id=1";
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="dvc"
                                                                placeholder="Enter Deputy Vice Chancellor name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="dvc_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_dvc_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-10 offset-1">
                                                            <label for="vc_des">*Additional</label>
                                                            <input type="text" name="dvc_des" class="form-control"
                                                                value="<?php echo $row['description']; ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Dean</label>
                                                    <?php
                                                    $sql = "SELECT name, con_image, description FROM conference_team WHERE role='Dean' AND u_id=3 AND team_id=1";
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="dean" placeholder="Enter Dean name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="dean_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_dean_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-10 offset-1">
                                                            <label for="vc_des">*Additional</label>
                                                            <input type="text" name="dean_des" class="form-control"
                                                                value="<?php echo $row['description']; ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Department Head</label>
                                                    <?php
                                                    $sql = "SELECT name, con_image, description FROM conference_team WHERE role='Department Head' AND u_id=4 AND team_id=1";
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="dhead"
                                                                placeholder="Enter Department Head name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="dhead_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_dhead_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-10 offset-1">
                                                            <label for="vc_des">*Additional</label>
                                                            <input type="text" name="dhead_des" class="form-control"
                                                                value="<?php echo $row['description']; ?>">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label>Additional Member</label>
                                                    <?php
                                                    $sql = "SELECT name, con_image, description FROM conference_team WHERE role='Additional Member' AND u_id=5 AND team_id=1";
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="amember1" placeholder="Enter name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="amember1_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_amember1_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-10 offset-1">
                                                            <label for="vc_des">*Additional</label>
                                                            <input type="text" name="amember1_des" class="form-control"
                                                                value="<?php echo $row['description']; ?>">
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Additional Member</label>
                                                        <?php
                                                        $sql = "SELECT name, con_image, description FROM conference_team WHERE role='Additional Member' AND u_id=6 AND team_id=1";
                                                        $result = mysqli_query($con, $sql);
                                                        $row = mysqli_fetch_assoc($result);
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <input type="text" name="amember2"
                                                                    placeholder="Enter name" class="form-control"
                                                                    value="<?php echo $row['name']; ?>">
                                                            </div>
                                                            <div class="col-4">
                                                                <input type="file" name="amember2_image"
                                                                    style="background-color: brown; width: 100px; height: 30px;"
                                                                    placeholder="Upload Image" accept="image/*">
                                                                <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                    alt="" width="50px" height="50px"
                                                                    style="object-fit: cover;">
                                                                <input type="hidden" name="before_amember2_image"
                                                                    value="<?php echo $row['con_image']; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-10 offset-1">
                                                                <label for="vc_des">*Additional</label>
                                                                <input type="text" name="amember2_des"
                                                                    class="form-control"
                                                                    value="<?php echo $row['description']; ?>">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" name="update_advisory" class="btn btn-success"
                                                        value="Update">
                                                    <input type="button" value="Cancel" class="btn btn-danger"
                                                        data-dismiss="modal">
                                                </div>

                                                <?php
                                                if (isset($_POST['update_advisory'])) {
                                                    $vc = $_POST['vc'];
                                                    $vc_des = $_POST['vc_des'];
                                                    $dvc = $_POST['dvc'];
                                                    $dvc_des = $_POST['dvc_des'];
                                                    $dean = $_POST['dean'];
                                                    $dean_des = $_POST['dean_des'];
                                                    $dhead = $_POST['dhead'];
                                                    $dhead_des = $_POST['dhead_des'];
                                                    $amember1 = $_POST['amember1'];
                                                    $amember1_des = $_POST['amember1_des'];
                                                    $amember2 = $_POST['amember2'];
                                                    $amember2_des = $_POST['amember2_des'];

                                                    $sql = "UPDATE conference_team SET u_id = 1, team_id = 1, name = ?, description = ? WHERE role = 'Vice Chancellor' AND u_id=1 AND team_id=1";
                                                    $stmt = mysqli_prepare($con, $sql);
                                                    mysqli_stmt_bind_param($stmt, "ss", $vc, $vc_des);
                                                    if (mysqli_stmt_execute($stmt)) {
                                                        $sql = "UPDATE conference_team SET u_id = 2, team_id = 1, name = ?, description = ? WHERE role = 'Deputy Vice Chancellor' AND u_id=2 AND team_id=1";
                                                        $stmt = mysqli_prepare($con, $sql);
                                                        mysqli_stmt_bind_param($stmt, "ss", $dvc, $dvc_des);
                                                        if (mysqli_stmt_execute($stmt)) {
                                                            $sql = "UPDATE conference_team SET u_id = 3, team_id = 1, name = ?, description = ? WHERE role = 'Dean' AND u_id=3 AND team_id=1";
                                                            $stmt = mysqli_prepare($con, $sql);
                                                            mysqli_stmt_bind_param($stmt, "ss", $dean, $dean_des);
                                                            if (mysqli_stmt_execute($stmt)) {
                                                                $sql = "UPDATE conference_team SET u_id = 4, team_id = 1, name = ?, description = ? WHERE role = 'Department Head' AND u_id=4 AND team_id=1";
                                                                $stmt = mysqli_prepare($con, $sql);
                                                                mysqli_stmt_bind_param($stmt, "ss", $dhead, $dhead_des);
                                                                if (mysqli_stmt_execute($stmt)) {
                                                                    $sql = "UPDATE conference_team SET u_id = 5, team_id = 1, name = ?, description = ? WHERE role = 'Additional Member' AND u_id = 5 AND team_id = 1";
                                                                    $stmt = mysqli_prepare($con, $sql);
                                                                    mysqli_stmt_bind_param($stmt, "ss", $amember1, $amember1_des);
                                                                    if (mysqli_stmt_execute($stmt)) {
                                                                        $sql = "UPDATE conference_team SET u_id = 6, team_id = 1, name = ?, description = ? WHERE role = 'Additional Member' AND u_id = 6 AND team_id = 1";
                                                                        $stmt = mysqli_prepare($con, $sql);
                                                                        mysqli_stmt_bind_param($stmt, "ss", $amember2, $amember2_des);
                                                                        if (mysqli_stmt_execute($stmt)) {
                                                                            echo '<div style="position: fixed; top: 0; right: 0;" class="alert alert-success alert-dismissible fade show" role="alert">Update Successful!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                                            echo "<script>
                                                                                setTimeout(function() {
                                                                                    window.location.href='conference_team.php';
                                                                                }, 2000); // Redirect after 2 seconds
                                                                            </script>";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }

                                                    if (mysqli_error($con)) {
                                                        echo "<div class='alert alert-danger'>Update Failed: " . mysqli_error($conn) . "</div>";
                                                    }

                                                    if ($_FILES['vc_image']['name']) {
                                                        $vc_image = $_FILES['vc_image']['name'];
                                                        $target = "profile_pic_contact/" . $vc_image;
                                                        if (move_uploaded_file($_FILES['vc_image']['tmp_name'], $target)) {
                                                            $sql = "UPDATE conference_team SET con_image = ? WHERE role = 'Vice Chancellor' AND u_id=1 AND team_id=1";
                                                            $stmt = $con->prepare($sql);
                                                            $stmt->bind_param("s", $vc_image);
                                                            $stmt->execute();
                                                        }
                                                    }

                                                    if ($_FILES['dvc_image']['name']) {
                                                        $dvc_image = $_FILES['dvc_image']['name'];
                                                        $target = "profile_pic_contact/" . $dvc_image;
                                                        if (move_uploaded_file($_FILES['dvc_image']['tmp_name'], $target)) {
                                                            $sql = "UPDATE conference_team SET con_image = ? WHERE role = 'Deputy Vice Chancellor' AND u_id=2 AND team_id=1";
                                                            $stmt = $con->prepare($sql);
                                                            $stmt->bind_param("s", $dvc_image);
                                                            $stmt->execute();
                                                        }
                                                    }

                                                    if ($_FILES['dean_image']['name']) {
                                                        $dean_image = $_FILES['dean_image']['name'];
                                                        $target = "profile_pic_contact/" . $dean_image;
                                                        if (move_uploaded_file($_FILES['dean_image']['tmp_name'], $target)) {
                                                            $sql = "UPDATE conference_team SET con_image = ? WHERE role = 'Dean' AND u_id=3 AND team_id=1";
                                                            $stmt = $con->prepare($sql);
                                                            $stmt->bind_param("s", $dean_image);
                                                            $stmt->execute();
                                                        }
                                                    }

                                                    if ($_FILES['dhead_image']['name']) {
                                                        $dhead_image = $_FILES['dhead_image']['name'];
                                                        $target = "profile_pic_contact/" . $dhead_image;
                                                        if (move_uploaded_file($_FILES['dhead_image']['tmp_name'], $target)) {
                                                            $sql = "UPDATE conference_team SET con_image = ? WHERE role = 'Department Head' AND u_id=4 AND team_id=1";
                                                            $stmt = $con->prepare($sql);
                                                            $stmt->bind_param("s", $dhead_image);
                                                            $stmt->execute();
                                                        }
                                                    }

                                                    if ($_FILES['amember1_image']['name']) {
                                                        $amember1_image = $_FILES['amember1_image']['name'];
                                                        $target = "profile_pic_contact/" . $amember1_image;
                                                        if (move_uploaded_file($_FILES['amember1_image']['tmp_name'], $target)) {
                                                            $sql = "UPDATE conference_team SET con_image = ? WHERE role = 'Additional Member' AND u_id = 5 AND team_id = 1";
                                                            $stmt = $con->prepare($sql);
                                                            $stmt->bind_param("s", $amember1_image);
                                                            $stmt->execute();
                                                        }
                                                    }

                                                    if ($_FILES['amember2_image']['name']) {
                                                        $amember2_image = $_FILES['amember2_image']['name'];
                                                        $target = "profile_pic_contact/" . $amember2_image;
                                                        if (move_uploaded_file($_FILES['amember2_image']['tmp_name'], $target)) {
                                                            $sql = "UPDATE conference_team SET con_image = ? WHERE role = 'Additional Member' AND u_id = 6 AND team_id = 1";
                                                            $stmt = $con->prepare($sql);
                                                            $stmt->bind_param("s", $amember2_image);
                                                            $stmt->execute();
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                    </form>
                                </div>
                                <!--organizing Committee-->
                                <div class="col-12">
                                    <form method="post" action="conference_team.php" enctype="multipart/form-data">
                                        <div class="card shadow mb-4">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Organizing Committee</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Chairperson</label>
                                                    <?php
                                                    $sql = "SELECT name, con_image FROM conference_team WHERE role='Chairperson' AND u_id=1 AND team_id=2";
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="Chairperson"
                                                                placeholder="Enter Chairperson name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="Chairperson_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_Chairperson_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Secretary</label>
                                                    <?php
                                                    $sql = "SELECT name, con_image FROM conference_team WHERE u_id=2 AND team_id=2";
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="Secretary"
                                                                placeholder="Enter Secretary name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">

                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="Secretary_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_Secretary_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label>Secretary</label>
                                                    <?php
                                                    $sql = "SELECT name, con_image FROM conference_team WHERE u_id=3 AND team_id=2";
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="Secretary2"
                                                                placeholder="Enter Secretary name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">

                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="Secretary2_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_Secretary2_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label>Treasurer</label>
                                                    <?php
                                                    $sql = "SELECT name, con_image FROM conference_team WHERE role='Treasurer' AND u_id=4 AND team_id=2";
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="Treasurer"
                                                                placeholder="Enter Treasurer name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">

                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="Treasurer_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_Treasurer_image"
                                                                value="<?php echo $row['con_image']; ?>">


                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="update_organizing" class="btn btn-success"
                                                    value="Update">
                                                <input type="button" value="Cancel" class="btn btn-danger"
                                                    data-dismiss="modal">

                                                <?php
                                                if (isset($_POST['update_organizing'])) {
                                                    $Chairperson = $_POST['Chairperson'];
                                                    $before_Chairperson_image = $_POST['before_Chairperson_image'];
                                                    if (!empty($_FILES['Chairperson_image']['name'])) {
                                                        $Chairperson_image = $_FILES['Chairperson_image']['name'];
                                                    } else {
                                                        $Chairperson_image = $before_Chairperson_image;
                                                    }

                                                    $Secretary = isset($_POST['Secretary']) ? $_POST['Secretary'] : '';
                                                    $before_Secretary_image = isset($_POST['before_Secretary_image']) ? $_POST['before_Secretary_image'] : '';
                                                    $Secretary_image = isset($_FILES['Secretary_image']['name']) ? $_FILES['Secretary_image']['name'] : '';
                                                    if (empty($Secretary_image)) {
                                                        $Secretary_image = $before_Secretary_image;
                                                    }

                                                    $Secretary2 = isset($_POST['Secretary2']) ? $_POST['Secretary2'] : '';
                                                    $before_Secretary2_image = isset($_POST['before_Secretary2_image']) ? $_POST['before_Secretary2_image'] : '';
                                                    $Secretary2_image = isset($_FILES['Secretary2_image']['name']) ? $_FILES['Secretary2_image']['name'] : '';
                                                    if (empty($Secretary2_image)) {
                                                        $Secretary2_image = $before_Secretary2_image;
                                                    }

                                                    $Treasurer = $_POST['Treasurer'];
                                                    $before_Treasurer_image = $_POST['before_Treasurer_image'];
                                                    $Treasurer_image = $_FILES['Treasurer_image']['name'];
                                                    if (empty($Treasurer_image)) {
                                                        $Treasurer_image = $before_Treasurer_image;
                                                    }

                                                    if (!empty($Chairperson_image)) {
                                                        $target = "profile_pic_contact/" . $Chairperson_image;
                                                        move_uploaded_file($_FILES['Chairperson_image']['tmp_name'], $target);
                                                    }

                                                    if (!empty($Secretary_image)) {
                                                        $target = "profile_pic_contact/" . $Secretary_image;
                                                        move_uploaded_file($_FILES['Secretary_image']['tmp_name'], $target);
                                                    }

                                                    if (!empty($Secretary2_image)) {
                                                        $target = "profile_pic_contact/" . $Secretary2_image;
                                                        move_uploaded_file($_FILES['Secretary2_image']['tmp_name'], $target);
                                                    }

                                                    if (!empty($Treasurer_image)) {
                                                        $target = "profile_pic_contact/" . $Treasurer_image;
                                                        move_uploaded_file($_FILES['Treasurer_image']['tmp_name'], $target);
                                                    }

                                                    $sql = "UPDATE conference_team SET name = ?, con_image = ? WHERE role = 'Chairperson' AND u_id=1 AND team_id=2";
                                                    $stmt = mysqli_prepare($con, $sql);
                                                    mysqli_stmt_bind_param($stmt, "ss", $Chairperson, $Chairperson_image);
                                                    mysqli_stmt_execute($stmt);

                                                    $sql = "UPDATE conference_team SET name = ?, con_image = ? WHERE u_id=2 AND team_id=2";
                                                    $stmt = mysqli_prepare($con, $sql);
                                                    mysqli_stmt_bind_param($stmt, "ss", $Secretary, $Secretary_image);
                                                    mysqli_stmt_execute($stmt);

                                                    $sql = "UPDATE conference_team SET name = ?, con_image = ? WHERE u_id=3 AND team_id=2";
                                                    $stmt = mysqli_prepare($con, $sql);
                                                    mysqli_stmt_bind_param($stmt, "ss", $Secretary2, $Secretary2_image);
                                                    mysqli_stmt_execute($stmt);

                                                    $sql = "UPDATE conference_team SET name = ?, con_image = ? WHERE role = 'Treasurer' AND team_id=2";
                                                    $stmt = mysqli_prepare($con, $sql);
                                                    mysqli_stmt_bind_param($stmt, "ss", $Treasurer, $Treasurer_image);
                                                    mysqli_stmt_execute($stmt);

                                                    if (!mysqli_error($con)) {
                                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Update Successful!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                        echo "<script>
                                                            setTimeout(function() {
                                                                window.location.href='conference_team.php';
                                                            }, 1000); // Redirect after 2 seconds
                                                        </script>";
                                                    } else {
                                                        echo "<div class='alert alert-danger'>Update Failed: " . mysqli_error($con) . "</div>";
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-12">
                                    <form method="post" action="conference_team.php" enctype="multipart/form-data">
                                        <div class="card shadow mb-4">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Editorial Board</h4>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                $sql = "SELECT name, con_image FROM conference_team WHERE role='Chief Editor' AND u_id=1 AND team_id=3";
                                                $result = mysqli_query($con, $sql);
                                                $row = mysqli_fetch_assoc($result);
                                                ?>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input type="text" name="Chief_Editor"
                                                            placeholder="Enter Chief Editor name" class="form-control"
                                                            value="<?php echo $row['name']; ?>">
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="file" name="Chief_Editor_image"
                                                            style="background-color: brown; width: 100px; height: 30px;"
                                                            placeholder="Upload Image" accept="image/*">
                                                        <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                            alt="" width="50px" height="50px"
                                                            style="object-fit: cover;">
                                                        <input type="hidden" name="before_Chief_Editor_image"
                                                            value="<?php echo $row['con_image']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 1</label>
                                                    <?php
                                                    $sql = "SELECT name, con_image FROM conference_team WHERE role='Member 1' AND u_id=2 AND team_id=3";
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member1" placeholder="Enter name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member1_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member1_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 2</label>
                                                    <?php
                                                    $sql = "SELECT name, con_image FROM conference_team WHERE role='Member 2' AND u_id=3 AND team_id=3";
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member2" placeholder="Enter name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member2_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member2_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 3</label>
                                                    <?php
                                                    $sql = "SELECT name, con_image FROM conference_team WHERE role='Member 3' AND u_id=4 AND team_id=3";
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member3" placeholder="Enter name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member3_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member3_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 4</label>
                                                    <?php
                                                    $sql = "SELECT name, con_image FROM conference_team WHERE role='Member 4' AND u_id=5 AND team_id=3";
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member4" placeholder="Enter name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member4_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member4_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 5</label>
                                                    <?php
                                                    $sql = "SELECT name, con_image FROM conference_team WHERE role='Member 5' AND u_id=6 AND team_id=3";
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member5" placeholder="Enter name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">

                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member5_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member5_image"
                                                                value="<?php echo $row['con_image']; ?>">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 6</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 6" AND u_id=7 AND team_id=3';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member6" placeholder="Enter name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member6_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member6_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 7</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 7" AND u_id=8 AND team_id=3';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member7" placeholder="Enter name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member7_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member7_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 8</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 8" AND u_id=9 AND team_id=3';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member8" placeholder="Enter name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member8_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member8_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 9</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 9" AND u_id=10 AND team_id=3';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member9" placeholder="Enter name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member9_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member9_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 10</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 10" AND u_id=11 AND team_id=3';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member10" placeholder="Enter name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member10_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member11_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 11</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 11" AND u_id=12 AND team_id=3';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member11" placeholder="Enter name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member11_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member11_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 12</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 12" AND u_id=13 AND team_id=3';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member12" placeholder="Enter name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member12_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member12_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="update_editorial" class="btn btn-success"
                                                    value="Update">
                                                <input type="button" value="Cancel" class="btn btn-danger"
                                                    data-dismiss="modal">
                                                <?php
                                                if (isset($_POST['update_editorial'])) {
                                                    $members = [];
                                                    $images = [];

                                                    for ($i = 0; $i <= 12; $i++) {
                                                        $index = $i == 0 ? 'Chief_Editor' : "member$i";
                                                        $members[$i] = $_POST[$index];
                                                        $images[$i] = $_FILES[$index . '_image']['name'];

                                                        if ($images[$i] == '') {
                                                            $images[$i] = $_POST['before_' . $index . '_image'];
                                                        }
                                                    }

                                                    $roles = ['Chief Editor', 'Member 1', 'Member 2', 'Member 3', 'Member 4', 'Member 5', 'Member 6', 'Member 7', 'Member 8', 'Member 9', 'Member 10', 'Member 11', 'Member 12'];

                                                    foreach ($members as $key => $member) {
                                                        $role = $roles[$key];
                                                        $u_id = $key + 1;
                                                        $sql = "UPDATE conference_team SET name = ? WHERE role = ? AND u_id = ? AND team_id = 3";
                                                        $stmt = $con->prepare($sql);
                                                        $stmt->bind_param("ssi", $member, $role, $u_id);
                                                        $stmt->execute();
                                                    }

                                                    if (!mysqli_error($con)) {
                                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Update Successful!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                        echo "<script>
                                                            setTimeout(function() {
                                                                window.location.href='conference_team.php';
                                                            }, 2000);
                                                        </script>";
                                                    } else {
                                                        echo "<div class='alert alert-danger'>Update Failed: " . mysqli_error($con) . "</div>";
                                                    }

                                                    foreach ($images as $key => $image) {
                                                        if ($image != '') {
                                                            $target = "profile_pic_contact/" . $image;
                                                            $index = $key == 0 ? 'Chief_Editor' : "member$key";
                                                            if (move_uploaded_file($_FILES[$index . '_image']['tmp_name'], $target)) {
                                                                $role = $roles[$key];
                                                                $u_id = $key + 1;
                                                                $sql = "UPDATE conference_team SET con_image = ? WHERE role = ? AND u_id = ? AND team_id = 3";
                                                                $stmt = $con->prepare($sql);
                                                                $stmt->bind_param("ssi", $image, $role, $u_id);
                                                                $stmt->execute();
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <form method="post" action="conference_team.php" enctype="multipart/form-data">
                                        <div class="card shadow mb-4">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Ceremonial Committee</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Chairman</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Chairman" AND u_id=1 AND team_id=4';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="Ceremonial_Chairman"
                                                                placeholder="Enter name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="Ceremonial_Chairman_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_Ceremonial_Chairman_image"
                                                                value="<?php echo $row['con_image']; ?>">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 1</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 1" AND u_id=2 AND team_id=4';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member1"
                                                                placeholder="Enter Member name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member1_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member1_image"
                                                                value="<?php echo $row['con_image']; ?>">

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label>Member 2</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 2" AND u_id=3 AND team_id=4';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member2" placeholder="Enter name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member2_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member2_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 3</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 3" AND u_id=4 AND team_id=4';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member3" placeholder="Enter name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member3_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member3_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 4</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 4" AND u_id=5 AND team_id=4';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member4" placeholder="Enter name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member4_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member4_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 5</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 5" AND u_id=6 AND team_id=4';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member5"
                                                                placeholder="Enter Member name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member5_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member5_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="update_ceremonial" class="btn btn-success"
                                                    value="Update">
                                                <input type="button" value="Cancel" class="btn btn-danger"
                                                    data-dismiss="modal">
                                                <?php
                                                if (isset($_POST['update_ceremonial'])) {
                                                    $Ceremonial_Chairman = $_POST['Ceremonial_Chairman'];
                                                    $Ceremonial_Chairman_image = $_FILES['Ceremonial_Chairman_image']['name'];
                                                    if ($Ceremonial_Chairman_image == '') {
                                                        $Ceremonial_Chairman_image = $_POST['before_Ceremonial_Chairman_image'];
                                                    }

                                                    $member1 = $_POST['member1'];
                                                    $member1_image = $_FILES['member1_image']['name'];
                                                    if ($member1_image == '') {
                                                        $member1_image = $_POST['before_member1_image'];
                                                    }

                                                    $member2 = $_POST['member2'];
                                                    $member2_image = $_FILES['member2_image']['name'];
                                                    if ($member2_image == '') {
                                                        $member2_image = $_POST['before_member2_image'];
                                                    }

                                                    $member3 = $_POST['member3'];
                                                    $member3_image = $_FILES['member3_image']['name'];
                                                    if ($member3_image == '') {
                                                        $member3_image = $_POST['before_member3_image'];
                                                    }

                                                    $member4 = $_POST['member4'];
                                                    $member4_image = $_FILES['member4_image']['name'];
                                                    if ($member4_image == '') {
                                                        $member4_image = $_POST['before_member4_image'];
                                                    }

                                                    $member5 = $_POST['member5'];
                                                    $member5_image = $_FILES['member5_image']['name'];
                                                    if ($member5_image == '') {
                                                        $member5_image = $_POST['before_member5_image'];
                                                    }

                                                    $sql = "UPDATE conference_team SET name = ?, con_image = ? WHERE role = 'Chairman' AND u_id=1 AND team_id=4";
                                                    $stmt = $con->prepare($sql);
                                                    $stmt->bind_param("ss", $Ceremonial_Chairman, $Ceremonial_Chairman_image);
                                                    $stmt->execute();

                                                    $sql = "UPDATE conference_team SET name = ?, con_image = ? WHERE role = 'Member 1' AND u_id=2 AND team_id=4";
                                                    $stmt = $con->prepare($sql);
                                                    $stmt->bind_param("ss", $member1, $member1_image);
                                                    $stmt->execute();

                                                    $sql = "UPDATE conference_team SET name = ?, con_image = ? WHERE role = 'Member 2' AND u_id=3 AND team_id=4";
                                                    $stmt = $con->prepare($sql);
                                                    $stmt->bind_param("ss", $member2, $member2_image);
                                                    $stmt->execute();

                                                    $sql = "UPDATE conference_team SET name = ?, con_image = ? WHERE role = 'Member 3' AND u_id=4 AND team_id=4";
                                                    $stmt = $con->prepare($sql);
                                                    $stmt->bind_param("ss", $member3, $member3_image);
                                                    $stmt->execute();

                                                    $sql = "UPDATE conference_team SET name = ?, con_image = ? WHERE role = 'Member 4' AND u_id=5 AND team_id=4";
                                                    $stmt = $con->prepare($sql);
                                                    $stmt->bind_param("ss", $member4, $member4_image);
                                                    $stmt->execute();

                                                    $sql = "UPDATE conference_team SET name = ?, con_image = ? WHERE role = 'Member 5' AND u_id=6 AND team_id=4";
                                                    $stmt = $con->prepare($sql);
                                                    $stmt->bind_param("ss", $member5, $member5_image);
                                                    $stmt->execute();

                                                    if (!mysqli_error($con)) {
                                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Update Successful!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                        echo "<script>
                                                            setTimeout(function() {
                                                                window.location.href='conference_team.php';
                                                            }, 2000); // Redirect after 2 seconds
                                                        </script>";
                                                    } else {
                                                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Update Failed!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                    }
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <form method="post" action="conference_team.php" enctype="multipart/form-data">
                                        <div class="card shadow mb-4">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Food and Accommodation Committee</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Chairman</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Chairman" AND u_id=1 AND team_id=5';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="food_Chairman"
                                                                placeholder="Enter name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="food_Chairman_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_food_Chairman_image"
                                                                value="<?php echo $row['con_image']; ?>">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 1</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 1" AND u_id=2 AND team_id=5';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member1" placeholder="Enter name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member1_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member1_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 2</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 2" AND u_id=3 AND team_id=5';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member2" placeholder="Enter name"
                                                                class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member2_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member2_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 3</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 3" AND u_id=4 AND team_id=5';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member3"
                                                                placeholder="Enter Member name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member3_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member3_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 4</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 4" AND u_id=5 AND team_id=5';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member4"
                                                                placeholder="Enter Member name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member4_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member4_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="update_food" class="btn btn-success"
                                                    value="Update">
                                                <input type="button" value="Cancel" class="btn btn-danger"
                                                    data-dismiss="modal">
                                                <?php
                                                if (isset($_POST['update_food'])) {
                                                    $roles = [
                                                        'Chairman' => ['u_id' => 1, 'field' => 'food_Chairman'],
                                                        'Member 1' => ['u_id' => 2, 'field' => 'member1'],
                                                        'Member 2' => ['u_id' => 3, 'field' => 'member2'],
                                                        'Member 3' => ['u_id' => 4, 'field' => 'member3'],
                                                        'Member 4' => ['u_id' => 5, 'field' => 'member4'],
                                                    ];

                                                    foreach ($roles as $role => $data) {
                                                        $name = $_POST[$data['field']];
                                                        $imageField = $data['field'] . '_image';
                                                        $beforeImageField = 'before_' . $imageField;

                                                        $image = $_FILES[$imageField]['name'];
                                                        if ($image == '') {
                                                            $image = $_POST[$beforeImageField];
                                                        } else {
                                                            $target = "profile_pic_contact/" . $image;
                                                            move_uploaded_file($_FILES[$imageField]['tmp_name'], $target);
                                                        }

                                                        $sql = 'UPDATE conference_team SET name = ?, con_image = ? WHERE role = ? AND u_id = ? AND team_id = 5';
                                                        $stmt = $con->prepare($sql);
                                                        $stmt->bind_param("sssi", $name, $image, $role, $data['u_id']);
                                                        $stmt->execute();
                                                    }

                                                    if (!mysqli_error($con)) {
                                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Update Successful!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                        echo "<script>
                                                            setTimeout(function() {
                                                                window.location.href='conference_team.php';
                                                            }, 2000);
                                                        </script>";
                                                    } else {
                                                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Update Failed!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-12">
                                    <form method="post" action="conference_team.php" enctype="multipart/form-data">
                                        <div class="card shadow mb-4">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Sessions Organizing Committee</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Chairman</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Chairman" AND u_id=1 AND team_id=6';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="sessions_Chairman"
                                                                placeholder="Enter name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="sessions_Chairman_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_sessions_Chairman_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 1</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 1" AND u_id=2 AND team_id=6';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member1"
                                                                placeholder="Enter Member name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member1_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member1_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 2</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 2" AND u_id=3 AND team_id=6';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member2"
                                                                placeholder="Enter Member name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member2_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member2_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label>Member 3</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 3" AND u_id=4 AND team_id=6';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member3"
                                                                placeholder="Enter Member name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member3_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member3_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label>Member 4</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 4" AND u_id=5 AND team_id=6';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member4"
                                                                placeholder="Enter Member name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member4_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member4_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="update_sessions" class="btn btn-success"
                                                    value="Update">
                                                <input type="button" value="Cancel" class="btn btn-danger"
                                                    data-dismiss="modal">

                                                <?php
                                                if (isset($_POST['update_sessions'])) {
                                                    $sessions_Chairman = $_POST['sessions_Chairman'];
                                                    $sessions_Chairman_image = $_FILES['sessions_Chairman_image']['name'];
                                                    if ($sessions_Chairman_image == '') {
                                                        $sessions_Chairman_image = $_POST['before_sessions_Chairman_image'];
                                                    }

                                                    $sessions_member1 = $_POST['member1'];
                                                    $sessions_member1_image = $_FILES['member1_image']['name'];
                                                    if ($sessions_member1_image == '') {
                                                        $sessions_member1_image = $_POST['before_member1_image'];
                                                    }

                                                    $sessions_member2 = $_POST['member2'];
                                                    $sessions_member2_image = $_FILES['member2_image']['name'];
                                                    if ($sessions_member2_image == '') {
                                                        $sessions_member2_image = $_POST['before_member2_image'];
                                                    }

                                                    $sessions_member3 = $_POST['member3'];
                                                    $sessions_member3_image = $_FILES['member3_image']['name'];
                                                    if ($sessions_member3_image == '') {
                                                        $sessions_member3_image = $_POST['before_member3_image'];
                                                    }

                                                    $sessions_member4 = $_POST['member4'];
                                                    $sessions_member4_image = $_FILES['member4_image']['name'];
                                                    if ($sessions_member4_image == '') {
                                                        $sessions_member4_image = $_POST['before_member4_image'];
                                                    }

                                                    $sql = "UPDATE conference_team SET name = ?, con_image = ? WHERE role = 'Chairman' AND u_id=1 AND team_id=6";
                                                    $stmt = $con->prepare($sql);
                                                    $stmt->bind_param("ss", $sessions_Chairman, $sessions_Chairman_image);
                                                    $stmt->execute();

                                                    $sql = "UPDATE conference_team SET name = ?, con_image = ? WHERE role = 'Member 1' AND u_id=2 AND team_id=6";
                                                    $stmt = $con->prepare($sql);
                                                    $stmt->bind_param("ss", $sessions_member1, $sessions_member1_image);
                                                    $stmt->execute();

                                                    $sql = "UPDATE conference_team SET name = ?, con_image = ? WHERE role = 'Member 2' AND u_id=3 AND team_id=6";
                                                    $stmt = $con->prepare($sql);
                                                    $stmt->bind_param("ss", $sessions_member2, $sessions_member2_image);
                                                    $stmt->execute();

                                                    $sql = "UPDATE conference_team SET name = ?, con_image = ? WHERE role = 'Member 3' AND u_id=4 AND team_id=6";
                                                    $stmt = $con->prepare($sql);
                                                    $stmt->bind_param("ss", $sessions_member3, $sessions_member3_image);
                                                    $stmt->execute();

                                                    $sql = "UPDATE conference_team SET name = ?, con_image = ? WHERE role = 'Member 4' AND u_id=5 AND team_id=6";
                                                    $stmt = $con->prepare($sql);
                                                    $stmt->bind_param("ss", $sessions_member4, $sessions_member4_image);
                                                    $stmt->execute();

                                                    if (!mysqli_error($con)) {
                                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Update Successful!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                        echo "<script>
                                                            setTimeout(function() {
                                                                window.location.href='conference_team.php';
                                                            }, 2000); // Redirect after 2 seconds
                                                        </script>";
                                                    } else {
                                                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Update Failed!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                    }

                                                    // Check if the file is uploaded
                                                    if ($_FILES['Chairman_image']['tmp_name']) {
                                                        $target = "profile_pic_contact/" . $sessions_Chairman_image;
                                                        if (move_uploaded_file($_FILES['Chairman_image']['tmp_name'], $target)) {
                                                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Chairman Image Uploaded Successfully!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                        } else {
                                                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Upload Failed!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                        }
                                                    }

                                                    if ($_FILES['member1_image']['tmp_name']) {
                                                        $target = "profile_pic_contact/" . $sessions_member1_image;
                                                        if (move_uploaded_file($_FILES['member1_image']['tmp_name'], $target)) {
                                                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Member 1 Image Uploaded Successfully!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                        } else {
                                                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Upload Failed!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                        }
                                                    }

                                                    if ($_FILES['member2_image']['tmp_name']) {
                                                        $target = "profile_pic_contact/" . $sessions_member2_image;
                                                        if (move_uploaded_file($_FILES['member2_image']['tmp_name'], $target)) {
                                                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Member 2 Image Uploaded Successfully!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                        } else {
                                                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Upload Failed!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                        }
                                                    }

                                                    if ($_FILES['member3_image']['tmp_name']) {
                                                        $target = "profile_pic_contact/" . $sessions_member3_image;
                                                        if (move_uploaded_file($_FILES['member3_image']['tmp_name'], $target)) {
                                                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Member 3 Image Uploaded Successfully!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                        } else {
                                                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Upload Failed!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                        }
                                                    }

                                                    if ($_FILES['member4_image']['tmp_name']) {
                                                        $target = "profile_pic_contact/" . $sessions_member4_image;
                                                        if (move_uploaded_file($_FILES['member4_image']['tmp_name'], $target)) {
                                                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Member 4 Image Uploaded Successfully!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                        } else {
                                                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Upload Failed!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-12">
                                    <form method="post" action="conference_team.php" enctype="multipart/form-data">
                                        <div class="card shadow mb-4">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Public Relations Committee</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Chairman</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Chairman" AND u_id=1 AND team_id=7';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="Chairman"
                                                                placeholder="Enter Chairman name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="Chairman_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_Chairman_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 1</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 1" AND u_id=2 AND team_id=7';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member1"
                                                                placeholder="Enter Member name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member1_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member1_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 2</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 2" AND u_id=3 AND team_id=7';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member2"
                                                                placeholder="Enter Member name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member2_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member2_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 3</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 3" AND u_id=4 AND team_id=7';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member3"
                                                                placeholder="Enter Member name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member3_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member3_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Member 4</label>
                                                    <?php
                                                    $sql = 'SELECT name, con_image FROM conference_team WHERE role="Member 4" AND u_id=5 AND team_id=7';
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" name="member4"
                                                                placeholder="Enter Member name" class="form-control"
                                                                value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="file" name="member4_image"
                                                                style="background-color: brown; width: 100px; height: 30px;"
                                                                placeholder="Upload Image" accept="image/*">
                                                            <img src="./profile_pic_contact/<?php echo $row['con_image']; ?>"
                                                                alt="" width="50px" height="50px"
                                                                style="object-fit: cover;">
                                                            <input type="hidden" name="before_member4_image"
                                                                value="<?php echo $row['con_image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="update_pr" class="btn btn-success"
                                                    value="Update">
                                                <input type="button" value="Cancel" class="btn btn-danger"
                                                    data-dismiss="modal">

                                                <?php
                                                if (isset($_POST['update_pr'])) {
                                                    $sql = 'UPDATE conference_team SET name = ? WHERE role = "Chairman" AND u_id=1 AND team_id=7';
                                                    $stmt = $con->prepare($sql);
                                                    $stmt->bind_param("s", $_POST['Chairman']);
                                                    $stmt->execute();

                                                    $sql = 'UPDATE conference_team SET name = ? WHERE role = "Member 1" AND u_id=2 AND team_id=7';
                                                    $stmt = $con->prepare($sql);
                                                    $stmt->bind_param("s", $_POST['member1']);
                                                    $stmt->execute();

                                                    $sql = 'UPDATE conference_team SET name = ? WHERE role = "Member 2" AND u_id=3 AND team_id=7';
                                                    $stmt = $con->prepare($sql);
                                                    $stmt->bind_param("s", $_POST['member2']);
                                                    $stmt->execute();

                                                    $sql = 'UPDATE conference_team SET name = ? WHERE role = "Member 3" AND u_id=4 AND team_id=7';
                                                    $stmt = $con->prepare($sql);
                                                    $stmt->bind_param("s", $_POST['member3']);
                                                    $stmt->execute();

                                                    $sql = 'UPDATE conference_team SET name = ? WHERE role = "Member 4" AND u_id=5 AND team_id=7';
                                                    $stmt = $con->prepare($sql);
                                                    $stmt->bind_param("s", $_POST['member4']);
                                                    $stmt->execute();

                                                    if ($_FILES['Chairman_image']['name']) {
                                                        $Chairman_image = $_FILES['Chairman_image']['name'];
                                                        $target = "profile_pic_contact/" . $Chairman_image;
                                                        if (move_uploaded_file($_FILES['Chairman_image']['tmp_name'], $target)) {
                                                            $sql = "UPDATE conference_team SET con_image = ? WHERE role = 'Chairman' AND u_id=1 AND team_id=7";
                                                            $stmt = $con->prepare($sql);
                                                            $stmt->bind_param("s", $Chairman_image);
                                                            $stmt->execute();
                                                        }
                                                    } else {
                                                        $sql = "UPDATE conference_team SET con_image = ? WHERE role = 'Chairman' AND u_id=1 AND team_id=7";
                                                        $stmt = $con->prepare($sql);
                                                        $stmt->bind_param("s", $_POST['before_Chairman_image']);
                                                        $stmt->execute();
                                                    }

                                                    if ($_FILES['member1_image']['name']) {
                                                        $member1_image = $_FILES['member1_image']['name'];
                                                        $target = "profile_pic_contact/" . $member1_image;
                                                        if (move_uploaded_file($_FILES['member1_image']['tmp_name'], $target)) {
                                                            $sql = "UPDATE conference_team SET con_image = ? WHERE role = 'Member 1' AND u_id=2 AND team_id=7";
                                                            $stmt = $con->prepare($sql);
                                                            $stmt->bind_param("s", $member1_image);
                                                            $stmt->execute();
                                                        }
                                                    } else {
                                                        $sql = "UPDATE conference_team SET con_image = ? WHERE role = 'Member 1' AND u_id=2 AND team_id=7";
                                                        $stmt = $con->prepare($sql);
                                                        $stmt->bind_param("s", $_POST['before_member1_image']);
                                                        $stmt->execute();
                                                    }

                                                    if ($_FILES['member2_image']['name']) {
                                                        $member2_image = $_FILES['member2_image']['name'];
                                                        $target = "profile_pic_contact/" . $member2_image;
                                                        if (move_uploaded_file($_FILES['member2_image']['tmp_name'], $target)) {
                                                            $sql = "UPDATE conference_team SET con_image = ? WHERE role = 'Member 2' AND u_id=3 AND team_id=7";
                                                            $stmt = $con->prepare($sql);
                                                            $stmt->bind_param("s", $member2_image);
                                                            $stmt->execute();
                                                        }
                                                    } else {
                                                        $sql = "UPDATE conference_team SET con_image = ? WHERE role = 'Member 2' AND u_id=3 AND team_id=7";
                                                        $stmt = $con->prepare($sql);
                                                        $stmt->bind_param("s", $_POST['before_member2_image']);
                                                        $stmt->execute();
                                                    }

                                                    if ($_FILES['member3_image']['name']) {
                                                        $member3_image = $_FILES['member3_image']['name'];
                                                        $target = "profile_pic_contact/" . $member3_image;
                                                        if (move_uploaded_file($_FILES['member3_image']['tmp_name'], $target)) {
                                                            $sql = "UPDATE conference_team SET con_image = ? WHERE role = 'Member 3' AND u_id=4 AND team_id=7";
                                                            $stmt = $con->prepare($sql);
                                                            $stmt->bind_param("s", $member3_image);
                                                            $stmt->execute();
                                                        }
                                                    } else {
                                                        $sql = "UPDATE conference_team SET con_image = ? WHERE role = 'Member 3' AND u_id=4 AND team_id=7";
                                                        $stmt = $con->prepare($sql);
                                                        $stmt->bind_param("s", $_POST['before_member3_image']);
                                                        $stmt->execute();
                                                    }

                                                    if ($_FILES['member4_image']['name']) {
                                                        $member4_image = $_FILES['member4_image']['name'];
                                                        $target = "profile_pic_contact/" . $member4_image;
                                                        if (move_uploaded_file($_FILES['member4_image']['tmp_name'], $target)) {
                                                            $sql = "UPDATE conference_team SET con_image = ? WHERE role = 'Member 4' AND u_id=5 AND team_id=7";
                                                            $stmt = $con->prepare($sql);
                                                            $stmt->bind_param("s", $member4_image);
                                                            $stmt->execute();
                                                        }
                                                    } else {
                                                        $sql = "UPDATE conference_team SET con_image = ? WHERE role = 'Member 4' AND u_id=5 AND team_id=7";
                                                        $stmt = $con->prepare($sql);
                                                        $stmt->bind_param("s", $_POST['before_member4_image']);
                                                        $stmt->execute();
                                                    }

                                                    if (!mysqli_error($con)) {
                                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Update Successful!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                        echo "<script>
                                                            setTimeout(function() {
                                                                window.location.href='conference_team.php';
                                                            }, 2000); // Redirect after 2 seconds
                                                        </script>";
                                                    } else {
                                                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; top: 0; right: 0;">Update Failed!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.container-fluid -->

                            </div>
                            <!-- End of Main Content -->

                        </div>
                        <!-- End of Content Wrapper -->

                    </div>

                    <!-- End of Page Wrapper -->

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