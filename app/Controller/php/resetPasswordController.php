<?php

class ResetPasswordController{

    private $accountModel;
    private $applicantModel;
    private $staffModel;

        //Login controller's constructor
    public function __construct($accountModel, $applicantModel, $staffModel) {
        $this->accountModel = $accountModel;
        $this->applicantModel = $applicantModel;
        $this->staffModel = $staffModel;
    }
    
    function checkUserExists($ic, $email){
        session_start();
        $user = $this->accountModel->checkUserExistByIc($ic);

        if($user){
            
            if($user['UserType'] == "Pemohon"){

                $pemohon = $this->applicantModel->getApplicantProfileInfo($ic);

                if($pemohon['ApplicantEmail'] == $email){
                    header('Location: ../app/Api/PHPMailer/sendEmail.php?email='. $email . '&ic='. $ic);

                }else{
                    // Display success message using JavaScript
                    $_SESSION['alert-fail'] = "Pengguna Tidak Wujud";

                    // Redirect the page using JavaScript
                    echo '<script>window.location.href = "../app/View/ManageLogin/sendOTPView.php";</script>';
                }

            }elseif($user['UserType'] == "Kakitangan"){

                $staff = $this->staffModel->getStaffProfileInfo($user['Account_Id']);

                if($staff['StaffEmail'] == $email){
                    
                    header('Location: ../app/Api/PHPMailer/sendEmail.php?email='. $email . '&ic='. $user['User_IC']);

                }else{

                    // Display success message using JavaScript
                    $_SESSION['alert-fail'] = "Pengguna Tidak Wujud";

                    // Redirect the page using JavaScript
                    echo '<script>window.location.href = "../app/View/ManageLogin/sendOTPView.php";</script>';
                }

            }
            

        }else{
            
            // Display success message using JavaScript
            $_SESSION['alert-fail'] = "Pengguna Tidak Wujud";

            // Redirect the page using JavaScript
            echo '<script>window.location.href = "../app/View/ManageLogin/sendOTPView.php";</script>';
        }
        

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

    function checkOTP($ic, $otp){
        session_start();

        $account = $this->accountModel->checkUserExistByIc($ic);


        if($account['otp'] == $otp){
            // Display success message using JavaScript
            $_SESSION['alert-success'] = "OTP Dipadankan";

            // Redirect the page using JavaScript
            echo '<script>window.location.href = "../app/View/ManageLogin/userLoginView.php";</script>';
            header('Location: ../app/View/ManageLogin/resetForgotPasswordView.php?iC='. $ic);
        }else{
            $message = "Incorrent OTP";
            header('Location: ../app/View/ManageLogin/checkOTPView.php?ic='. $ic . '&message='. $message);
        }
    }

    function resetPassword($newPass, $ic){

        session_start();

        //Password Encrytion
        $hashed_password = password_hash($newPass, PASSWORD_DEFAULT);
        
        if($this->accountModel->resetToNewPassword($hashed_password, $ic)){
            // Display success message using JavaScript
            $_SESSION['alert-success'] = "Reset Password Successful ...";

            // Redirect the page using JavaScript
            echo '<script>window.location.href = "../app/View/ManageLogin/userLoginView.php";</script>';

        }else{

            // Display success message using JavaScript
            $_SESSION['alert-fail'] = "Reset Password Fail ...";

            // Redirect the page using JavaScript
            echo '<script>window.location.href = "../app/View/ManageLogin/userLoginView.php";</script>';
        }
    }
}
    
?>
