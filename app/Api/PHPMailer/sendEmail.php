<?php
    require '../PHPMailer/vendor/autoload.php';
    require_once '../../Config/database.php';
    require_once '../../Model/accountModel.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);

    $email = $_GET['email'];
    $ic = $_GET['ic'];

    //Generate OTP
    $generateOTP = generateOTP();
    
    try {
        // Server settings
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true; 
        $mail->Port = 200;

        // Recipients
        $mail->setFrom('sgdevelopercompany@gmail.com', 'SG Developers');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Account Inactivity Warning';
        $mail->Body = '
            <h1>One-Time Password (OTP)</h1>
            <p>Dear User,</p>
            <p>Your OTP is: <strong>' . $generateOTP . '</strong></p>
            <p>Please use this OTP to proceed with your request.</p>
            <p>Thank you,</p>
            <p>SourceLab</p>
        ';

        $mail->send();
        // echo "Email sent to $email.\n";

        $db = (new Database())->connect();
        $acount = new AccountModel($db);

        if($acount->storeOTP($generateOTP, $ic)){
            $message = "Check Your Email ...";
            header('Location: ../../View/ManageLogin/checkOTPView.php?ic='. $ic . '&message='.$message);
            
        }else{

        }
        
        
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}\n";

    }

    function generateOTP($length = 4){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $otp = '';

        $characterLength = strlen($characters);

        for ($i = 0; $i < $length; $i++) {
            $otp .= $characters[rand(0, $characterLength - 1)];
        }

        return $otp;
    }
    // $mail->isSMTP();
        // $mail->Host = 'smtp.gmail.com';
        // $mail->SMTPAuth = true; 
        // $mail->Username = 'sgdevelopercompany@gmail.com';
        // $mail->Password = 'tjgxtlddossrivuj';
        // $mail->SMTPSecure = 'ssl';
        // $mail->Port = 465;
?>