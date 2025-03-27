<?php
include 'db.php';

// Load PHPMailer
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Define email credentials directly (⚠️ Ensure to keep these secure)
define('SMTP_EMAIL', 'testweblanka@gmail.com'); // Your Gmail ID
define('SMTP_PASSWORD', 'xpixhyjdhtljrbei'); // Gmail App Password

// Function to send email
function sendEmail($toEmail, $password)
{
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_EMAIL;
        $mail->Password = SMTP_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email settings
        $mail->setFrom(SMTP_EMAIL, 'RASAS');
        $mail->addAddress($toEmail);
        $mail->Subject = 'Password Reset';
        $mail->isHTML(true);

        // Email body
        $mail->Body = "
<html>
<body style='font-family: Arial, sans-serif; background-color: #f4f4f4; text-align: center; padding: 20px;'>
    <div style='background-color: white; padding: 20px; border-radius: 10px; max-width: 500px; margin: auto; box-shadow: 0 4px 8px rgba(0,0,0,0.1);'>
        <h2 style='color:rgb(205, 36, 36);'>Welcome!</h2>
        <p>Your Email and Password are as follows:</p>
        <div style='background: #f9f9f9; padding: 10px; border-radius: 8px; margin: 20px 0; border: 1px solid #ddd;'>
            <p><b>Email :</b> $toEmail</p>
            <p><b>Password :</b> $password</p>
        </div>
        <p>You can now <a href='../login.php' style='background-color: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Log in</a> to your account.</p>
        <p><b>🔒 Please keep your credentials safe.</b></p>
        <p style='margin-top: 5px; font-size: 14px; color: #555;'><b>Regards,</b><br><b>Ruhuna Arts Student's Annual Sessions - University of Ruhuna</b></p>
    </div>
</body>
</html>
";

        // Send email
        $mail->send();
    } catch (Exception $e) {
        error_log("Email sending failed: {$mail->ErrorInfo}");
    }
}
?>
