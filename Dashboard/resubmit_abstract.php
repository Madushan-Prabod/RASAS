<?php
echo '<link href="css/bootstrap.css" rel="stylesheet">';

echo '<script src="js/bootstrap.bundle.min.js"></script>';

echo '<style>body { background-color:rgb(26, 28, 33); }</style>';

include 'db.php';
session_start();
if (isset($_POST['abstract_id'])) {
    $abstract_id = $_POST['abstract_id'];
    $file = $_FILES['abstract_file'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_type = $file['type'];
    $file_error = $file['error'];

    if ($file_error === 0) {
        if ($file_size > 0) {
            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
            $target_dir = 'resubmit_abstracts/';
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $target_file = $target_dir . $abstract_id . '.' . $file_extension;
            if (move_uploaded_file($file_tmp, $target_file)) {
                $query = "UPDATE abstracts SET rev_pdf_file='$target_file' WHERE abstract_id='$abstract_id'";
                if (mysqli_query($con, $query)) {
                    echo "<div style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);' class='alert alert-success'>Abstract resubmission successful! Your reviewer will be notified shortly, and you'll receive an update on the status of your abstract.</div>";
                    echo "<script>
                        setTimeout(function() {
                            window.history.back();
                        }, 3000);
                    </script>";
                } else {
                    echo "<div style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);' class='alert alert-danger'>Error: " . mysqli_error($con) . "</div>";
                    echo "<script>
                        setTimeout(function() {
                            window.history.back();
                        }, 3000);
                    </script>";
                }
            } else {
                echo "<div style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);' class='alert alert-danger'>Error uploading file! Redirecting in 3 seconds...</div>";
                echo "<script>
                    setTimeout(function() {
                        window.history.back();
                    }, 3000);
                </script>";
            }
        } else {
            echo "<div style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);' class='alert alert-danger'>File size is zero! Redirecting in 3 seconds...</div>";
            echo "<script>
                setTimeout(function() {
                    window.history.back();
                }, 3000);
            </script>";
        }
    } else {
        echo "<div style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);' class='alert alert-danger'>Error: " . $file_error . "<br>Redirecting in 3 seconds...</div>";
        echo "<script>
            setTimeout(function() {
                window.history.back();
            }, 3000);
        </script>";
    }
}
?>