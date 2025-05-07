<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // 📧 Send Email
    $to = "woodconnor100@gmail.com"; 
    $subject = "New Inquiry from Your Website";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";

    $headers = "From: $email";
    mail($to, $subject, $body, $headers);

    // 📱 Send SMS Notification
    $sid    = "your_account_sid";  
    $token  = "your_auth_token";   
    $twilio = new Client($sid, $token);

    $sms_message = "New Inquiry! Name: $name, Email: $email, Message: $message";

    $twilio->messages->create(
        "208-351-6086",
        ["from" => "twilio-phone-number", "body" => $sms_message]
    );

    echo "Message sent successfully!";
}
?>
