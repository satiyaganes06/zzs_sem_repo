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

        $user = $this->accountModel->checkUserExistByIc($ic);

        if($user){
            
            if($user['UserType'] == "Pemohon"){

                $pemohon = $this->applicantModel->getApplicantProfileInfo($ic);

                if($pemohon['ApplicantEmail'] == $email){
                    header('Location: ../app/Api/PHPMailer/sendEmail.php?email='. $email . '&ic='. $ic);

                }else{
                    ?>
                        <script>
                            alert("User Not Exists");
                            window.location = "../../View/ManageLogin/sendOTPView.php";
                        </script>
                    <?php
                }

            }elseif($user['UserType'] == "Kakitangan"){
                header('Location: ../app/Api/PHPMailer/sendEmail.php?email='. $email . '&ic='. $ic);
                ?>
                    <script>
                        alert("User Not Exists");
                        window.location = "../../View/ManageLogin/sendOTPView.php";
                    </script>
                <?php
            }
            

        }else{
            ?>
                <script>
                    alert("User Not Exists");
                </script>
            <?php
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

        $account = $this->accountModel->checkUserExistByIc($ic);


        if($account['otp'] == $otp){
            header('Location: ../app/View/ManageLogin/resetForgotPasswordView.php?iC='. $ic);
        }else{
            $message = "Incorrent OTP";
            header('Location: ../app/View/ManageLogin/checkOTPView.php?ic='. $ic . '&message='. $message);
        }
    }

    function resetPassword($newPass, $ic){

        //Password Encrytion
        $hashed_password = password_hash($newPass, PASSWORD_DEFAULT);
        
        if($this->accountModel->resetToNewPassword($hashed_password, $ic)){
            ?>
                <script>
                    alert("Reset Password Successful ...");
                    window.location = "../app/View/ManageLogin/userLoginView.php";
                </script>
            <?php

        }else{
            ?>
                <script>
                    alert("Reset Password Fail ...");
                    window.location = "../app/View/ManageLogin/userLoginView.php";
                </script>
            <?php
        }
    }
}
    
?>
