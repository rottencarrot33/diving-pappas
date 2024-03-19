<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['honeypot'])) {
        echo "Spam submission detected.";
        exit;
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $to = "info@divingincorfu.com";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $message, $headers)) {
        header("Location: thankyou.html");
    } else {
        echo "There was a problem sending the message.";
    }
}
?>
