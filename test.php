<?php
$to = "safikbihari2@gmail.com";
$subject = "Test Email from PHP";
$message = "Hello! This is a test email.";
$headers = "From: shabbirmetar88@gmail.com";

if (mail($to, $subject, $message, $headers)) {
    echo "✅ Email sent successfully!";
} else {
    echo "❌ Failed to send email.";
}
?>
