<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $type = htmlspecialchars($_POST['type']);
    $message = htmlspecialchars($_POST['message']);

    $church_email = "endlessmercyglobal@gmail.com";

    if ($type == 'prayer_request') {
        // Send prayer request to church email
        $subject = "New Prayer Request from " . $name;
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        mail($church_email, $subject, $body);
        echo "Your prayer request has been sent.";
    } elseif ($type == 'testimonial') {
        // Save testimonial to a text file or database
        $file = 'testimonials.txt'; // or a database insertion
        $testimonial = "Name: $name\nEmail: $email\nMessage:\n$message\n\n";
        file_put_contents($file, $testimonial, FILE_APPEND | LOCK_EX);
        echo "Your testimonial has been submitted and will appear on our site.";
    }
}

$testimonials = file_get_contents('testimonials.txt');
echo nl2br($testimonials); // Converts newlines to <br> for HTML output
?>
