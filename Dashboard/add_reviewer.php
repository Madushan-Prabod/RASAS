<?php
include 'db.php';

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
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/sb-admin-2.css">
    <script src="js/bootstrap.js"></script>
</head>

<body class="bg-danger">

<?php
// Load PHPMailer
require 'C:/xampp/htdocs/RASAS/Dashboard/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Function to send email
function sendEmail($toEmail, $password) {
    $mail = new PHPMailer(true);
    
    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'testweblanka@gmail.com'; // Your email
        $mail->Password   = 'xpix hyjd htlj rbei'; // Your email password or App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Email settings
        $mail->setFrom('testweblanka@gmail.com', 'RASAS');
        $mail->addAddress($toEmail);
        $mail->Subject = 'Registration Successful';
        $mail->isHTML(true); // Enable HTML formatting
        $mail->Body    = "
            <html>
            <body style='font-family: Arial, sans-serif; background-color: #f4f4f4; text-align: center; padding: 20px;'>
                <div style='background-color: white; padding: 20px; border-radius: 10px; max-width: 500px; margin: auto; box-shadow: 0 4px 8px rgba(0,0,0,0.1);'>
                    <h2 style='color:rgb(205, 36, 36);'> Welcome!</h2>
                    <p>Your registration was successful.</p>
                    
                    <div style='background: #f9f9f9; padding: 10px; border-radius: 8px; margin: 20px 0; border: 1px solid #ddd;'>
                        <p><b>Email:</b> $toEmail</p>
                        <p><b>Password:</b> $password</p>
                    </div>

                    <p>You can now <a href='../login.php' style='background-color: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Log in</a> to your account.</p>
                    
                    <p><b>🔒 Please keep your credentials safe.</b></p>
                    
                    <p style='margin-top: 5px; font-size: 14px; color: #555;'>
                        <b>Regards,</b><br>
                        <b>Ruhuna Arts Student's Annual Sessions</b>
                    </p>
                </div>
            </body>
            </html>
        ";

        $mail->send();
    } catch (Exception $e) {
        echo "Email sending failed: {$mail->ErrorInfo}";
    }
}

if (isset($_POST['add_reviewer'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $department = $_POST['department'];
    $theme = $_POST['theme'];

    // Insert into DB
    $result = mysqli_query($con, "INSERT INTO users (full_name, email, password_hash, department, theme, role) VALUES ('$name', '$email', '$password', '$department', '$theme', 'Reviewer')");

    if ($result) {
        sendEmail($email, $_POST['password']); // Send email with actual password
        echo "
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modalSuccess = new bootstrap.Modal(document.getElementById('modalSuccess'));
                modalSuccess.show();

                document.getElementById('btnOk').addEventListener('click', function() {
                    window.location.href = 'reviewers.php';
                });
            });
        </script>
        <div class='modal fade' id='modalSuccess' tabindex='-1' aria-labelledby='modalTitle' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='modalTitle'>Reviewer added successfully!</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body '>
                        <p>
                        Redirecting to Reviewers page...</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' id='btnOk' class='btn btn-primary'>OK</button>
                    </div>
                </div>
            </div>
        </div>
        ";
        echo "
        <script>
            setTimeout(function() {
                window.location.href = 'reviewers.php';
            }, 2000);
        </script>
        ";
    } else {
        echo "<script>alert('Failed to add reviewer');</script>";
    }
}

$con->close();
?>
