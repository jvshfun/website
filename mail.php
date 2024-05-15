<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }
    
    // Set up the recipient email address
    $to = "hi@jvsh.fun";
    
    // Set up the email subject
    $subject = "Message from Website";
    
    // Set up the email message
    $body = "Name: " . $name . "\n";
    $body .= "Email: " . $email . "\n";
    $body .= "Message: " . $message;
     
    // Set up the email headers
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    
    // Attempt to send the email
    if (mail($to, $subject, $body, $headers)) {
        // Redirect user to a thank you page
        header("Location: thank_you.html");
        exit; // Ensure that script stops executing after redirection
    } else {
        echo "Sorry, there was an error sending your message.";
    }
} else {
    echo "Invalid request method";
}
?>

