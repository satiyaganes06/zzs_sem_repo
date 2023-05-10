<?php
require_once '../app/Config/database.php';
require_once '../app/Model/accountModel.php';
require_once '../app/Model/applicantModel.php';
require_once '../app/Controller/php/registrationController.php';
require_once '../app/Controller/php/loginController.php';
require_once '../app/Controller/php/userProfileController.php';

// Create a new database connection
$db = (new Database())->connect();

// Create a new instance of the model
$accountModel = new AccountModel($db);
$applicantModel = new ApplicantModel($db);

// Create a new instance of the controller
$registrationController = new RegistrationController($accountModel, $applicantModel);
$loginController = new LoginController($accountModel);
$userProfileController = new UserProfileController($applicantModel, $accountModel);

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
  
    case 'createAccount':
        $ic = $_POST['ic'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];

        $registrationController->applicantRegister($ic, "applicant", $password, $name, $gender);
        
        break;
    
    case 'loginAccount':
        $ic = $_POST['ic'];
        $password = $_POST['password'];
        $userType = $_POST['userType'];

        $loginController->userLoginAccount($ic, $password, $userType);
        
        
        break;

    case 'viewProfile':
        session_start();
        $useric = $_SESSION['user_login'];

        $userProfileController->viewApplicantProfile($useric);
        
        break;

    default:
        include('../app/View/ManageRegistration/applicantRegisterView.html');
}

?>

