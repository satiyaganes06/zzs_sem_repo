<?php

class RegistrationController {
  private $accountModel;
  private $applicantModel;

  //Registration controller's constructor
  public function __construct($accountModel, $applicantModel) {
    $this->accountModel = $accountModel;
    $this->applicantModel = $applicantModel;
  }

  //Applicant account register function
  public function applicantRegister($ic, $userType, $password, $userName, $userGender) {
    
    //Password Encrytion
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //Call create account function in Account Model
    $id = $this->accountModel->createAccount($ic, $userType, $hashed_password);

    $this->addApplicantInfo($ic, $id, $userName, $userGender);
  }

  //Add Applicant initial info function
  public function addApplicantInfo($userIC, $accountId, $userName, $userGender) {

    //Call create account function in Account Model
    $this->applicantModel->addApplicantInfo($userIC, $accountId, $userName, $userGender);

    //End of the process this the system alert the applicant and redirect to user login page
    ?>
      <script>
        alert("Successfully Registered");
        window.location = "../app/View/ManageLogin/userLoginView.html";
      </script>
    <?php

    //header("Location: ../app/View/ManageLogin/userLoginView.html");
    //header("Location: index.php?action=toLogin");
  }

}

?>