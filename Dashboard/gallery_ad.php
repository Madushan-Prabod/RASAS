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

    <title>Gallery</title>

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
                                <h1 class="h3 mb-2 text-gray-800">Gallery Updates</h1>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="post" action="gallery_ad.php" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <?php for ($i = 1; $i <= 20; $i++): ?>
                                                        <div class="form-group">
                                                            <label>Picture <?php echo $i; ?></label>
                                                            <input type="file" name="user_pic_<?php echo $i; ?>" class="form-control" accept=".jpg, .jpeg, .png, .gif" onchange="showPreview(event, '<?php echo $i; ?>')">
                                                            <img id="preview_<?php echo $i; ?>" src="#" alt="" width="80" height="80" style="display: none;">
                                                        </div>
                                                    <?php endfor; ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" name="update" class="btn btn-success" value="Update">
                                                    <input type="button" value="Cancel" class="btn btn-danger" data-dismiss="modal">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_POST['update'])) {
                    for ($i = 1; $i <= 20; $i++) {
                        $media_url = $_FILES["user_pic_{$i}"]['name'];
                        $media_url_tmp = $_FILES["user_pic_{$i}"]['tmp_name'];
                        $media_type = $_FILES["user_pic_{$i}"]['type'];
                        

                        // Create directory if it does not exist
                        if (!is_dir('gallery')) {
                            mkdir('gallery', 0777, true);
                        }
                        //not upload image then use old image
                        if (empty($media_url)) {
                            $media_url = isset($row['media_url']) ? $row['media_url'] : '';
                        } else {
                            //old image delete
                            $old_image = isset($row['media_url']) ? "gallery/" . $row['media_url'] : '';
                            if (file_exists($old_image)) {
                                unlink($old_image);
                            }
                        }

                        move_uploaded_file($media_url_tmp, "gallery/$media_url");
                        $update_user = "UPDATE gallery SET media_url = '$media_url' WHERE media_id = $i";
                        if (mysqli_query($con, $update_user)) {
                            echo "<div style='position: absolute; top: 0; right: 0;' class='alert alert-success alert-dismissible fade show' role='alert'>Update Successful!</div>";
                            echo "<script>
                                setTimeout(function() {
                                    window.open('gallery_ad.php', '_self');
                                }, 2000);
                            </script>";
                        } else {
                            echo "<div style='position: absolute; top: 0; right: 0;' class='alert alert-danger alert-dismissible fade show' role='alert'>Update Successful!</div>";
                            echo "Error: " . mysqli_error($con);
                        }
                    }
                }
                ?>

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