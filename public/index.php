<?php

require_once '../app/Config/database.php';
require_once '../app/Model/accountModel.php';
require_once '../app/Model/applicantModel.php';
require_once '../app/Model/adminModel.php';
require_once '../app/Model/staffModel.php';
require_once '../app/Controller/php/registrationController.php';
require_once '../app/Controller/php/loginController.php';
require_once '../app/Controller/php/userProfileController.php';
require_once '../app/Controller/php/resetPasswordController.php';

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
$resetPasswordController = new ResetPasswordController($accountModel, $applicantModel, $staffModel);


$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
  
    case 'createAccount':
        $ic = $_POST['Applicant_ic'];
        $password = $_POST['Applicant_password'];
        $name = $_POST['Applicant_name'];
        $gender = $_POST['Applicant_gender'];
        $phoneNume = $_POST['Applicant_phoneNum'];

        $registrationController->applicantRegisterFunction($ic, "Pemohon", $password, $name, $gender, $phoneNume);
        
        break;

    case 'registerStaff':
        $name = $_POST['Staff_nama'];
        $ic = $_POST['Staff_ic'];
        $email = $_POST['Staff_email'];
        $noTel = $_POST['Staff_noTel'];
        $typeOfStaff = $_POST['typeOfStaff'];
        $alamat = $_POST['Staff_alamat'];
        $password = $_POST['Staff_password'];
        

        $registrationController->staffRegisterFunction($name, $ic, $email, $noTel, $typeOfStaff, $alamat, $password, "Kakitangan");
        
        break;
    
    case 'loginAccount':
        $ic = $_POST['User_ic'];
        $password = $_POST['User_password'];
        $userType = $_POST['User_type'];

        $loginController->userLoginAccountFunction($ic, $password, $userType);
        
        break;

    case 'resetPassword':

        $ic = isset($_GET['ic']) ? $_GET['ic'] : '';
        $newPass = $_POST['newpassword'];
        
        $resetPasswordController->resetPassword($newPass, $ic);

        break;
    case 'sendOTP':

        $ic = $_POST['formIC'];
        $email = $_POST['formEmail'];
        
        $resetPasswordController->checkUserExists($ic, $email);

        break;
    case 'checkOTP':

        $otp = $_POST['formOTP'];
        $ic = isset($_GET['ic']) ? $_GET['ic'] : '';
        $resetPasswordController->checkOTP($ic, $otp);

        break;
    case 'adminLoginAccount':
        $id = $_POST['Admin_id'];
        $password = $_POST['Admin_password'];

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

        $userProfileController->viewApplicantListFunction('viewListApplicant');
        
        break;
    case 'adminIncentiveApplicantListView':

        $userProfileController->viewApplicantListFunction('adminIncentiveApplicantListView');
        
        break;

    case 'viewProfileById':
        //Applicant or staff id which help to view their profile
        $viewId = isset($_GET['viewID']) ? $_GET['viewID'] : '';
        $type = isset($_GET['type']) ? $_GET['type'] : '';

        $userProfileController->viewDetailsById($viewId,$type);
        
        break;

    case 'updateProfile':
        $nama = $_POST['Applicant_nama'];
        $umur = $_POST['Applicant_umur'];
        $tarikhTL = $_POST['Applicant_tarikhL'];

        $jantina = $_POST['Applicant_jantina'];
        $bangsa = $_POST['Applicant_bangsa'];
        $email = $_POST['Applicant_email'];

        $alamat = $_POST['Applicant_alamat'];
        $noTel = $_POST['Applicant_noTel'];
        $noTelRum = $_POST['Applicant_noTelRum'];

        $trafPen = $_POST['Applicant_trafPen'];
        $jawatan = $_POST['Applicant_jawatan'];
        $pendapatan = $_POST['Applicant_pendapatan'];

        $alamatKerja = $_POST['Applicant_alamatKerja'];
        $noTelPenjabat = $_POST['Applicant_noTelPenjabat'];

        

        $userProfileController->updateApplicantProfileFunction($nama, $umur, $tarikhTL, $jantina, $bangsa, $email, $alamat, $noTel, $noTelRum, $trafPen, $jawatan, $pendapatan, $alamatKerja, $noTelPenjabat);
        
        break;
    
    case 'updateStaffProfile':
        $name = $_POST['Staff_nama'];
        $email = $_POST['Staff_email'];
        $alamat = $_POST['Staff_alamat'];
        $noTel = $_POST['Staff_noTel'];


        $userProfileController->updateStaffProfileFunction($name, $email, $alamat, $noTel);
        
        break;

    case 'updateAdminProfile':
        $nama = $_POST['Admin_nama'];
        $email = $_POST['Admin_email'];

        $alamat = $_POST['Admin_alamat'];
        $noTel = $_POST['Admin_noTel'];


        $userProfileController->updateAdminProfileFunction($nama, $email, $alamat, $noTel);
        
        break;

    default:
        header('Location: ../app/View/ManageLogin/userLoginView.php');
        

}
