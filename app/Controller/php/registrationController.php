<?php

class RegistrationController {
  private $accountModel;
  private $applicantModel;
  private $staffModel;

  //Registration controller's constructor
  public function __construct($accountModel, $applicantModel, $staffModel) {
    $this->accountModel = $accountModel;
    $this->applicantModel = $applicantModel;
    $this->staffModel = $staffModel;
  }

  //Applicant account register function
  public function applicantRegisterFunction($ic, $userType, $password, $userName, $userGender) {
    
    //Password Encrytion
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //Call create account function in Account Model
    $id = $this->accountModel->createAccount($ic, $userType, $hashed_password);

    $this->addApplicantInfo($ic, $id, $userName, $userGender);
  }

  //Add applicant's initial info function
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

  //Applicant account register function
  public function staffRegisterFunction($name, $ic, $email, $noTel, $typeOfStaff, $alamat, $password, $userType) {
    
    //Password Encrytion
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //Call create account function in Account Model
    $id = $this->accountModel->createAccount($ic, $userType, $hashed_password);

    $this->addStaffInfoFunction($name, $ic, $id, $email, $noTel, $typeOfStaff, $alamat);
  }

  //Add staff's initial info function
  public function addStaffInfoFunction($name, $ic, $id, $email, $noTel, $typeOfStaff, $alamat) {

    //Call create account function in Account Model
    $this->staffModel->addStaffInfo($name, $ic, $id, $email, $noTel, $typeOfStaff, $alamat);

    //End of the process this the system alert the applicant and redirect to user login page
    ?>
      <script>
        alert("Successfully Registered");
      </script>
    <?php
    header("Location: index.php?action=viewStaffList");
    //header("Location: ../app/View/ManageLogin/userLoginView.html");
    //header("Location: index.php?action=toLogin");
  }

}

?>