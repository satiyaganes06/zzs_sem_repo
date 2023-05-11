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
        $useric = $_SESSION['currentUserIC'];

        $userProfileController->viewApplicantProfile($useric);
        
        break;

    case 'updateProfile':
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $tarikhTL = $_POST['tarikhL'];

        $jantina = $_POST['jantina'];
        $bangsa = $_POST['bangsa'];
        $email = $_POST['email'];

        $alamat = $_POST['alamat'];
        $noTel = $_POST['noTel'];
        $noTelRum = $_POST['noTelRum'];

        $trafPen = $_POST['trafPen'];
        $jawatan = $_POST['jawatan'];
        $pendapatan = $_POST['pendapatan'];

        $alamatKerja = $_POST['alamatKerja'];
        $noTelPenjabat = $_POST['noTelPenjabat'];

        

        $userProfileController->updateApplicantProfile($nama, $umur, $tarikhTL, $jantina, $bangsa, $email, $alamat, $noTel, $noTelRum, $trafPen, $jawatan, $pendapatan, $alamatKerja, $noTelPenjabat);
        
        break;

    default:
        include('../app/View/ManageRegistration/applicantRegisterView.html');
}

?>

