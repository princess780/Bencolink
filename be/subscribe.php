<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the email address
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    // Simple validation to check if the email is not empty
    if (!empty($email)) {
        // You can store the email in a database or send it to your email service provider
        // For simplicity, we'll just append it to a text file in this example
        $file = fopen("subscribers.txt", "a");
        fwrite($file, "$email\n");
        fclose($file);

        // Optionally, you can redirect the user to a thank you page
        header("Location: thank-you.html");
        exit;
    }
}
// If the form is not submitted or email is empty, redirect to the signup page
header("Location: index.html");
exit;
?>
