<?php

class ResetPassword{
    private $accountModel;
    private $connect;

    //Registration controller's constructor
    public function __construct($accountModel, $db) {
        $this->accountModel = $accountModel;
        $this->connect = $db;
    }

    function resetPassword($ic, $email){
        $query = "SELECT * FROM Account_Info WHERE User_IC = :ic";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':ic', $ic);
        $stmt->execute();
        

        if ($stmt->rowCount() > 0) {
            // Generate a random password
            $newPassword = $this->generateRandomPassword();

            // Update the user's password in the database
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateQuery = "UPDATE Account_Info SET UserPassword = :password WHERE User_IC = :ic";
            $stmt = $this->connect->prepare($updateQuery);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':ic', $ic);
            $stmt->execute();

            // Send the new password to the user's email address
            
            $subject = 'Password Reset';
            $message = 'Your new password is: ' . $newPassword;
            $headers = 'From: your-email@example.com' . "\r\n" .
                'Reply-To: your-email@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            $sent = mail($email, $subject, $message, $headers);
        
            if ($sent) {
                echo 'An email with the new password has been sent to your email address.';
            } else {
                echo 'Failed to send the email. Please try again later.';
            }
        } else {
            echo 'Email address not found. Please enter a valid email address.';
        }




    }

    // Function to generate a random password
    function generateRandomPassword() {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
        $length = 10;

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $password;
    }
}




?>
