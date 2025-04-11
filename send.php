<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['agree']) && $_POST['agree'] === 'yes') {
        // Get form inputs
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $programCode = $_POST['program'] ?? '';
        $date = $_POST['date'] ?? '';
        $message = $_POST['message'] ?? '';

        // Convert program code to readable name
        $programs = [
            'val1' => 'Garbhyog: Prenatal Yoga (For Pregnant Mothers)',
            'val2' => 'Shakti Yoga: Preconception (Conceive Naturally)'
        ];

        $program = $programs[$programCode] ?? 'Unknown Program';

        // Detect batch (support both sets)
        $batch = '';
        if (isset($_POST['batch'])) {
            $batch = $_POST['batch'];
        } elseif (isset($_POST['batch'])) {
            $batch = $_POST['batch'];
        }

        // Email setup
        $to = "pinakiyoga@gmail.com";  // change this to your real email
        $subject = "New Program Registration";
        $body = "Name: $name\n"
              . "Email: $email\n"
              . "Phone: $phone\n"
              . "Program: $program\n"
              . "Date: $date\n"
              . "Batch: $batch\n"
              . "Message: $message";
        $headers = "From: $email";

        // Send email
        if (mail($to, $subject, $body, $headers)) {
            echo "Email sent successfully!";
        } else {
            echo "Error sending email.";
        }
    } else {
        echo "Please agree to the T&C.";
    }
}
?>

