<?php
/**
 * process-contact.php
 * Handles form submission from contact.php
 */

// 1. Only allow POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: contact.php");
    exit();
}

// 2. Configuration - REPLACE WITH YOUR ACTUAL INFO
$to_email = "sales@teslamechanicaldesigns.com"; // Your receiving email
$subject_prefix = "TMD Website Inquiry: ";
$recaptcha_secret = "YOUR_RECAPTCHA_SECRET_KEY_HERE"; // Replace with your secret key

// 3. Collect and Sanitize Inputs
$first_name = filter_var(trim($_POST["firstName"] ?? ""), FILTER_SANITIZE_STRING);
$last_name  = filter_var(trim($_POST["lastName"] ?? ""), FILTER_SANITIZE_STRING);
$email      = filter_var(trim($_POST["email"] ?? ""), FILTER_SANITIZE_EMAIL);
$inquiry_type = filter_var(trim($_POST["subject"] ?? ""), FILTER_SANITIZE_STRING);
$message    = filter_var(trim($_POST["message"] ?? ""), FILTER_SANITIZE_STRING);
$recaptcha_response = $_POST['g-recaptcha-response'] ?? "";

// 4. Basic Validation
if (empty($first_name) || empty($email) || empty($message)) {
    header("Location: contact.php?error=empty_fields");
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: contact.php?error=invalid_email");
    exit();
}

// 5. reCAPTCHA Validation (Optional but recommended)
/*
if (!empty($recaptcha_secret)) {
    $verify_url = "https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret}&response={$recaptcha_response}";
    $response = file_get_contents($verify_url);
    $response_data = json_decode($response);
    if (!$response_data->success) {
        header("Location: contact.php?error=captcha_failed");
        exit();
    }
}
*/

// 6. Build the Email
$full_name = $first_name . " " . $last_name;
$email_subject = $subject_prefix . ucfirst($inquiry_type);

$email_content = "You have received a new message from your website contact form.\n\n";
$email_content .= "Name: {$full_name}\n";
$email_content .= "Email: {$email}\n";
$email_content .= "Inquiry Type: " . ucfirst($inquiry_type) . "\n\n";
$email_content .= "Message:\n{$message}\n";

$headers = "From: {$full_name} <noreply@sheetmetal.teslamechanicaldesigns.com>\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// 7. Send the Email
if (mail($to_email, $email_subject, $email_content, $headers)) {
    // Success - Redirect to Thank-You page
    header("Location: thank-you.php");
} else {
    // Server-side mail failure
    header("Location: contact.php?error=mail_error");
}
exit();
?>
