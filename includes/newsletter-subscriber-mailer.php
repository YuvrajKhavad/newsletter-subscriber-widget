<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // get post data
        $name = strip_tags(trim($_POST['name']));
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

        $recipient  = $_POST['recipient'];
        $subject  = $_POST['subject'];

        // validation

        if(empty($name) || empty($email))
        {
            // Send Error
            http_response_code(400);
            echo "Please fill our all filed";
            exit;
        }

        // Build Email
        $message = "Name: $name \n";
        $message .= "Email: $email \n \n";

        //Build Header
        $headers = "From: $name <$email>";

        // Send EMail
        if(mail($recipient, $subject, $message, $headers))
        {
            http_response_code(500);
            echo "You are now subscriber";
        }
        else
        {
            http_response_code(500);
            echo "There was a problem";    
        }
    }
    else
    {
        http_response_code(403);
        echo "There was a problem";
    }
?>