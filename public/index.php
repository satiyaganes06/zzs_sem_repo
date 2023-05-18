<?php
require_once '../app/Config/database.php';
require_once '../app/Model/accountModel.php';
require_once '../app/Model/applicantModel.php';
require_once '../app/Model/adminModel.php';
require_once '../app/Model/staffModel.php';
require_once '../app/Controller/php/registrationController.php';
require_once '../app/Controller/php/loginController.php';
require_once '../app/Controller/php/userProfileController.php';
require_once '../app/Controller/php/reset_password.php';

// Create a new database connection
$db = (new Database())->connect();

// Create a new instance of the model
$accountModel = new AccountModel($db);
$applicantModel = new ApplicantModel($db);
$adminModel = new AdminModel($db);
$staffModel = new StaffModel($db);

// Create a new instance of the controller
$registrationController = new RegistrationController($accountModel, $applicantModel, $staffModel);
$loginController = new LoginController($accountModel);
$userProfileController = new UserProfileController($accountModel, $applicantModel, $adminModel, $staffModel);
$resetPassword = new ResetPassword($accountModel, $db);


$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
  
    case 'createAccount':
        $ic = $_POST['ic'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];

        $registrationController->applicantRegisterFunction($ic, "Pemohon", $password, $name, $gender);
        
        break;

    case 'registerStaff':
        $name = $_POST['nama'];
        $ic = $_POST['ic'];
        $email = $_POST['email'];
        $noTel = $_POST['noTel'];
        $typeOfStaff = $_POST['typeOfStaff'];
        $alamat = $_POST['alamat'];
        $password = $_POST['password'];
        

        $registrationController->staffRegisterFunction($name, $ic, $email, $noTel, $typeOfStaff, $alamat, $password, "Kakitangan");
        
        break;
    
    case 'loginAccount':
        $ic = $_POST['ic'];
        $password = $_POST['password'];
        $userType = $_POST['userType'];

        $loginController->userLoginAccountFunction($ic, $password, $userType);
        
        break;

    case 'forgotPassword':

        
        $ic = $_POST['formIC'];
        $email = $_POST['formEmail'];
        
        $resetPassword->resetPassword($ic, $email);

        break;

    case 'adminLoginAccount':
        $id = $_POST['id'];
        $password = $_POST['password'];

        $loginController->adminLoginAccountFunction($id, $password);
        
        
        break;

    case 'viewProfile':

        $from = isset($_GET['from']) ? $_GET['from'] : '';
        
        $userProfileController->viewProfileFunction($from);
        
        break;

    case 'viewStaffList':
    
        $userProfileController->viewStaffListFunction();
        
        break;

    case 'viewApplicantList':

        $userProfileController->viewApplicantListFunction();
        
        break;

    case 'viewProfileById':
        //Applicant or staff id which help to view their profile
        $viewId = isset($_GET['viewID']) ? $_GET['viewID'] : '';
        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $userProfileController->viewDetailsById($viewId,$type);
        
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

        

        $userProfileController->updateApplicantProfileFunction($nama, $umur, $tarikhTL, $jantina, $bangsa, $email, $alamat, $noTel, $noTelRum, $trafPen, $jawatan, $pendapatan, $alamatKerja, $noTelPenjabat);
        
        break;
    
    case 'updateStaffProfile':
        $name = $_POST['nama'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $noTel = $_POST['noTel'];


        $userProfileController->updateStaffProfileFunction($name, $email, $alamat, $noTel);
        
        break;

    case 'updateAdminProfile':
        $nama = $_POST['nama'];
        $email = $_POST['email'];

        $alamat = $_POST['alamat'];
        $noTel = $_POST['noTel'];


        $userProfileController->updateAdminProfileFunction($nama, $email, $alamat, $noTel);
        
        break;

    default:
        header('Location: ../app/View/ManageLogin/userLoginView.php');
        

}

?>

