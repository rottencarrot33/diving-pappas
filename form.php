<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['full-name'];
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

    
$secretKey = "6Lc5OZ4pAAAAADmnYUdrUQWgTbdca4V1PODhCCv8";
$responseKey = $_POST['g-recaptcha-response'];
$userIP = $_SERVER['REMOTE_ADDR'];

$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
$response = file_get_contents($url);
$responseKeys = json_decode($response, true);

if (intval($responseKeys["success"]) !== 1) {
    // CAPTCHA verification failed
    // Handle the error here, maybe show an error message to the user
} else {
    // CAPTCHA verification passed
    // Proceed with your form submission
}


?>
