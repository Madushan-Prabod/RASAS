<?php
session_start();
include 'db.php';
include 'email.php';

?>
<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="margin: 0; padding: 0; overflow: hidden;">

    <div class="main-content-video" style="position: relative; height: 100vh;">
        <video src="asserts/videos/42154-431423229_small.mp4" autoplay loop muted 
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; opacity: 40%;"></video>
        <!--form -->
        <div class="container-fluid d-flex justify-content-center align-items-center" style="position: relative; z-index: 1; height: 100vh;">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card border-warning shadow-lg">
                        <div class="card-header bg-warning text-white">
                            <h1 class="text-center">Forgot Password</h1>
                        </div>
                        <div class="card-body">
                            <form action="forget_password.php" method="POST">
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-bold">Email address</label>
                                    <input type="email" class="form-control form-control-lg" id="email" name="email" required>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-danger btn-lg" id="submitBtn">
                                        <span class="spinner-border spinner-border-sm me-2 d-none" id="loadingSpinner" role="status" aria-hidden="true"></span>
                                        <span id="buttonText">Reset Password</span></button>
                                    </button>
                                </div>
                                <script>
                                    document.querySelector('form').addEventListener('submit', function() {
                                        document.getElementById('loadingSpinner').classList.remove('d-none');
                                        document.getElementById('buttonText').textContent = 'Processing...';
                                        document.getElementById('submitBtn').disabled = true;
                                    });
                                    document.querySelector('form').addEventListener('submit', function(e) {
                                        e.preventDefault();
                                        const formData = new FormData(this);
                                        fetch('forget_password.php', {
                                            method: 'POST',
                                            body: formData
                                        })
                                            .then(res => res.json())
                                            .then(data => {
                                                if (data.success) {
                                                    alert(data.message);
                                                    window.location.href = "login.php";
                                                } else {
                                                    alert(data.message);
                                                }
                                                document.getElementById('loadingSpinner').classList.add('d-none');
                                                document.getElementById('buttonText').textContent = 'Reset Password';
                                                document.getElementById('submitBtn').disabled = false;
                                            })
                                            .catch(error => {
                                                console.log(error);
                                                alert('Something went wrong. Please try again later.');
                                                document.getElementById('loadingSpinner').classList.add('d-none');
                                                document.getElementById('buttonText').textContent = 'Reset Password';
                                                document.getElementById('submitBtn').disabled = false;
                                            });
                                    });
                                </script>
                            </form>
                            <div class="mt-4 text-center">
                                <a href="login.php" class="text-danger fw-bold">Back to Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Check if email exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // Generate a temporary password
        $temp_password = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 8);
        $hashed_temp_password = password_hash($temp_password, PASSWORD_DEFAULT);
        
        // Update database with new temporary password
        $update_sql = "UPDATE users SET password_hash = '$hashed_temp_password' WHERE email = '$email'";
        if (mysqli_query($con, $update_sql)) {
            // Send email with the temporary password
            sendEmail($email, $temp_password);
            echo "
            <div class='modal fade' id='modalResetPassword' tabindex='-1' role='dialog' aria-labelledby='modalResetPasswordLabel' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='modalResetPasswordLabel'>Password Reset</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            Your password has been reset. A temporary password has been sent to <b>$email</b>. Please check your inbox.
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                            <a href='login.php' class='btn btn-primary'>Login</a>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    var myModal = new bootstrap.Modal(document.getElementById('modalResetPassword'));
                    myModal.show();
                });
            </script>";
        } else {
            echo "
            <div class='alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3' role='alert' style='z-index: 1050'>
                Error updating password. Please try again later.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            <script>
                $(document).ready(function() {
                    $('.alert').delay(3000).fadeOut('slow', function() {
                        $(this).remove();
                    });
                });
            </script>";
        }
    } else {
        echo "
        <div class='alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3' role='alert' style='z-index: 1050'>
            Email not found. Please check again.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        <script>
            $(document).ready(function() {
                $('.alert').delay(3000).fadeOut('slow', function() {
                    $(this).remove();
                });
            });
        </script>";
    }
}
?>