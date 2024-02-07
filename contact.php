<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Set up email parameters
    $to = "deepak07chaganti@gmail.com"; // Replace this with your email address
    $subject = "New Contact Form Submission: $subject";
    $body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";

    // Send email
    if (mail($to, $subject, $body)) {
        // If email sent successfully, return success message
        echo json_encode(array('success' => true, 'message' => 'Your message has been sent successfully.'));
    } else {
        // If email failed to send, return error message
        echo json_encode(array('success' => false, 'message' => 'An error occurred. Please try again later.'));
    }
} else {
    // If request method is not POST, return error message
    echo json_encode(array('success' => false, 'message' => 'Invalid request method.'));
}
?>
