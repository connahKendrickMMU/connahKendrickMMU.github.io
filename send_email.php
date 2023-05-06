<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "user_email", FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, "user_message", FILTER_SANITIZE_STRING);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Replace with your email address
        $to = "connah.kendrick@mmu.ac.uk";
        $subject = "GithubPRofile";
        $headers = "From: " . $email . "\r\n" .
                   "Reply-To: " . $email . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Message sending failed!";
        }
    } else {
        echo "Invalid email address!";
    }
}
?>
