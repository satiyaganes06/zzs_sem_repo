<?php
session_start();
require_once '../app/Config/database.php';
require_once '../app/Model/accountModel.php';
require_once '../app/Model/applicantModel.php';
require_once '../app/Model/adminModel.php';
require_once '../app/Model/staffModel.php';
require_once '../app/Model/complaintModel.php';
require_once '../app/Model/consultationModel.php';
require_once '../app/Model/applicantOccupationModel.php';
require_once '../app/Model/heirInfoModel.php';
require_once '../app/Model/documentModel.php';
require_once '../app/Model/specialIncentiveModel.php';
require_once '../app/Model/marriageInfoModel.php';
require_once '../app/Model/paymentModel.php';
require_once '../app/Model/marriageCourseInfoModel.php';
require_once '../app/Model/marriageCourseApplicationModel.php';
require_once '../app/Model/marriageRequestInfoModel.php';
require_once '../app/Model/waliModel.php';
require_once '../app/Model/witnessModel.php';
require_once '../app/Model/marriageDocModel.php';
require_once '../app/Model/incentiveDocModel.php';
require_once '../app/Model/marriageVoluntaryModel.php';
require_once '../app/Model/voluntaryDocModel.php';
require_once '../app/Controller/php/registrationController.php';
require_once '../app/Controller/php/loginController.php';
require_once '../app/Controller/php/userProfileController.php';
require_once '../app/Controller/php/resetPasswordController.php';
require_once '../app/Controller/php/marriageRegistrationController.php';
require_once '../app/Controller/php/MarriagePreparationCourseController.php';
require_once '../app/Controller/php/RequestMarriageController.php';

// Create a new database connection
$db = (new Database())->connect();

// Create a new instance of the model
$accountModel = new AccountModel($db);
$applicantModel = new ApplicantModel($db);
$adminModel = new AdminModel($db);
$staffModel = new StaffModel($db);
$complaintModel = new ComplaintModel($db);
$consultationModel = new ConsultationModel($db);
$applicantOccupationModel = new ApplicantOccupationModel($db);
$heirInfoModel = new HeirInfoModel($db);
$documentModel = new DocumentModel($db);
$specialIncentiveModel = new SpecialIncentiveModel($db);
$marriageInfoModel = new MarriageInfoModel($db);
$paymentModel = new PaymentModel($db);
$marriageCourseInfoModel = new MarriageCourseInfoModel($db);
$marriageCourseApplicationModel = new MarriageCourseApplicationModel($db);
$marriageRequestInfoModel = new MarriageRequestInfoModel($db);
$waliModel = new WaliModel($db);
$witnessModel = new WitnessModel($db);
$marriageDocModel = new MarriageDocModel($db);
$incentiveDocModel = new IncentiveDocModel($db);
$marriageVoluntaryModel = new MarriageVoluntaryModel($db);
$voluntaryDocModel = new VoluntaryDocModel($db);

// Create a new instance of the controller
$registrationController = new RegistrationController($accountModel, $applicantModel, $staffModel);
$loginController = new LoginController($accountModel);
$userProfileController = new UserProfileController($accountModel, $applicantModel, $adminModel, $staffModel);
$resetPasswordController = new ResetPasswordController($accountModel, $applicantModel, $staffModel);
$marriageRegistrationController = new MarriageRegistrationController($accountModel, $applicantModel, $staffModel, $marriageInfoModel, $waliModel);
$marriagePreparationCourseController = new MarriagePreparationCourseController($marriageCourseInfoModel, $marriageCourseApplicationModel, $applicantModel, $paymentModel);
$requestMarriageController = new RequestMarriageController($marriageInfoModel, $marriageRequestInfoModel, $applicantModel);

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

        $userProfileController->viewDetailsById($viewId, $type);

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

        //Module 2 Section Start
    case 'viewlistOfMPC':
        $organize = isset($_GET['organize']) ? $_GET['organize'] : '';
        $from = isset($_GET['from']) ? $_GET['from'] : '';

        $marriagePreparationCourseController->viewListOfMPC($organize, $from);

        break;

    case 'viewListOfApplicantMPC':
        $from = isset($_GET['from']) ? $_GET['from'] : '';

        $marriagePreparationCourseController->viewListOfApplicantMPC($from);

        break;

    case 'getMPCApplicantInfo':
        $from = isset($_GET['from']) ? $_GET['from'] : '';

        if ($from = 'MPCView') {
            $organize = isset($_GET['organize']) ? $_GET['organize'] : '';
            $venue = isset($_GET['venue']) ? $_GET['venue'] : '';
            $dateStart = isset($_GET['dateStart']) ? $_GET['dateStart'] : '';
            $dateFinish = isset($_GET['dateFinish']) ? $_GET['dateFinish'] : '';


            $marriagePreparationCourseController->getMPCApplicantInfo($organize, $venue, $dateStart, $dateFinish);
        }
        break;

    case 'uploadProofOfPaymentMPC':
        $typeOfFee = isset($_GET['typeOfFee']) ? $_GET['typeOfFee'] : '';

        $marriagePreparationCourseController->uploadProofOfPaymentMPC($typeOfFee);

        break;

    case 'getApplicantAndPartnerInfo':

        $partnerIC = $_POST['partnerIC'];
        $applicantIC = $_SESSION["currentUserIC"];
        $requestMarriageController->getApplicantAndPartnerInfo($partnerIC, $applicantIC);

        break;

        //Module 2 Section End ^^

    case 'marriageRegistrationWithApproval':
        $marriageId = $_POST['noAkuan'];
        $waliIC = $_POST['waliIC'];
        $witnessIC = $_POST['witnessIC'];

        $marriageRegistrationController->marriageRegistrationWithApproval($marriageId, $waliIC, $witnessIC);

        break;

    case 'updateMarriageRegistrationDetail';
        $marriageId;
        $waliName = $_POST['waliName'];
        $partnerIC = $_POST['partnerIC'];
        $requestDate = $_POST['requestDate'];
        $marriageDate = $_POST['marriageDate'];
        $marriageAddress = $_POST['requestDate'];
        $dowryType = $_POST['dowryType'];
        $dowry = $_POST['dowry'];
        $gift = $_POST['gift'];
        $relation = $_POST['relation'];
        $waliIc;
        $witnessIC;
        $waliIC = $_POST['waliIC'];
        $waliAddress = $_['waliAddress'];
        $waliBirthDate = $_POST['waliBirthDate'];
        $waliAge = $_POST['waliAge'];
        $waliNumberPhone = $_POST['noTelWali'];
        $marriageCertificateNo = NULL;

        $marriageRegistrationController->updateMarriageInfo($marriageId, $waliIC, $witnessIC, $requestDate, $marriageDate, $marriageAddress, $dowryType, $dowry, $gift);

        $marriageRegistrationController->insertWaliInfo($waliIc, $waliAddress, $waliBirthDate, $waliAge, $waliName, $relation, $waliNumberPhone);


        break;
    case 'updateProfile':
        $occupationType = $_POST['OccupationType'];
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
    default:
        header('Location: ../app/View/ManageLogin/userLoginView.php');
}
