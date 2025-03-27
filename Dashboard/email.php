<?php
// Include necessary files
include 'db.php';

// Load PHPMailer
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Define email credentials
define('SMTP_EMAIL', 'testweblanka@gmail.com'); // Your Gmail ID
define('SMTP_PASSWORD', 'xpixhyjdhtljrbei'); // Gmail App Password

/**
 * Send an email with a custom message
 * 
 * @param string $toEmail Recipient email
 * @param string $subject Email subject
 * @param string $message Custom HTML message
 */
function sendEmail($toEmail, $subject, $message)
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
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body = $message;

        // Send email
        $mail->send();
    } catch (Exception $e) {
        error_log("Email sending failed: {$mail->ErrorInfo}");
    }
}
?>
