<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = $_POST['email'];
    $program = $_POST['program'];
    $date = $_POST['date'];
    $batch = $_POST['batch'];

    // Admin Email (static or based on program if needed)
    $adminEmail = "satyarihand@gmail.com";

    // Dynamically set confirmation email subject & message for user
    switch ($program) {
        case 'Garbhyog':
            $subjectUser = "🌸 Garbhyog Registration Confirmed!";
            $messageUser = "
Dear Mom-to-be,

Thank you for registering for *Garbhyog: Prenatal Yoga*.

🧘‍♀️ Your Session Details:
• Program: Garbhyog  
• Date: $date  
• Batch: $batch  

We're excited to guide you through a safe and nourishing journey!

Warm wishes,  
Garbhyog Team";
            break;

        case 'Shakti Yoga':
            $subjectUser = "✨ Shakti Yoga Registration Confirmation";
            $messageUser = "
Namaste,

Thank you for registering for *Shakti Yoga: Preconception*.

🌼 Your Session Details:
• Program: Shakti Yoga  
• Date: $date  
• Batch: $batch  

Looking forward to empowering your journey to conception naturally.

With love,  
Shakti Yoga Team";
            break;

        default:
            $subjectUser = "Yoga Program Registration";
            $messageUser = "
Hello,

Thanks for registering!

Details:  
• Program: $program  
• Date: $date  
• Batch: $batch  

We'll get in touch soon!";
    }

    $headersUser = "From: no-reply@example.com";

    // Email to admin
    $subjectAdmin = "🧘 New $program Registration";
    $messageAdmin = "
New registration received:

📧 Email: $userEmail  
🧘 Program: $program  
📅 Date: $date  
🕒 Batch: $batch
";
    $headersAdmin = "From: no-reply@example.com";

    // Send emails
    $mailUser = mail($userEmail, $subjectUser, $messageUser, $headersUser);
    $mailAdmin = mail($adminEmail, $subjectAdmin, $messageAdmin, $headersAdmin);

    if ($mailUser && $mailAdmin) {
        echo "<script>alert('Form submitted and emails sent!'); window.history.back();</script>";
    } else {
        echo "<script>alert('Something went wrong.'); window.history.back();</script>";
    }
}
?>
