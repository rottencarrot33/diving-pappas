<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Existing code for handling form submission
    $name = $_POST['full-name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $to = "info@divingincorfu.com";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Verify CAPTCHA
    $apiKey = '6Lc5OZ4pAAAAADmnYUdrUQWgTbdca4V1PODhCCv8'; 
    $token = $_POST['token'];
    $expectedAction = $_POST['expected_action'];
    $requestBody = json_encode([
        'event' => [
            'token' => $token,
            'expectedAction' => $expectedAction,
            'siteKey' => '6Lc5OZ4pAAAAADmnYUdrUQWgTbdca4V1PODhCCv8',
        ]
    ]);
    $apiUrl = 'https://recaptchaenterprise.googleapis.com/v1/projects/captcha-1710866346515/assessments?key=' . $apiKey;
    $headers = [
        'Content-Type: application/json',
        'Accept: application/json',
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if ($response === false) {
        echo 'Error: ' . curl_error($ch);
    } else {
        $responseData = json_decode($response, true);
        // Assuming $responseData contains the assessment result
        if ($responseData['conclusion'] === 'ACCEPT') {
            // CAPTCHA verification passed, proceed with sending email
            if (mail($to, $subject, $message, $headers)) {
                header("Location: thankyou.html");
            } else {
                echo "There was a problem sending the message.";
            }
        } else {
            // CAPTCHA verification failed
            echo "CAPTCHA verification failed.";
        }
    }
    curl_close($ch);
}
?>

