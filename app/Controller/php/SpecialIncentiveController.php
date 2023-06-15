<?php
class SpecialIncentiveController
{
    private $specialIncentiveModel;
    private $applicantModel;
    private $applicantOccupationModel;
    private $heirInfoModel;
    private $marriageInfoModel;
    private $incentiveDocModel;
    private $marriageRequestInfoModel;


    //SpecialIncentive controller's constructor
    public function __construct($specialIncentiveModel, $applicantModel, $applicantOccupationModel, $heirInfoModel, $marriageInfoModel, $incentiveDocModel, $marriageRequestInfoModel)
    {
        $this->specialIncentiveModel = $specialIncentiveModel;
        $this->applicantModel = $applicantModel;
        $this->applicantOccupationModel = $applicantOccupationModel;
        $this->heirInfoModel = $heirInfoModel;
        $this->marriageInfoModel = $marriageInfoModel;
        $this->incentiveDocModel = $incentiveDocModel;
        $this->marriageRequestInfoModel = $marriageRequestInfoModel;
    }

    //Applicant special incentive application function 
    //Retrieve special incentive list from special incentive model
    public function viewSpecialIncentiveListFunction($from)
    {

        $listOfSpecialIncentive = $this->specialIncentiveModel->getAllSpecialIncentiveInfo();

        session_start();
        $_SESSION['listOfSpecialIncentive'] = $listOfSpecialIncentive;

?>
        <script>
            window.location = "../app/View/ManageSpecialIncentive/adminIncentiveListView.php";
        </script>
<?php
    }

    public function getApplicantPartnerMarriageInfo($from)
    {

        session_start();

        $applicantIC = $_SESSION['currentUserIC'];
        $requestMarriageApplicationInfo = $this->marriageRequestInfoModel->requestMarriageApplicantInfo($applicantIC);

        echo $applicantIC . '<br>' . $requestMarriageApplicationInfo['Partner_IC'] ;
        // $partnerInfo = $this->applicantModel->getApplicantInfo($requestMarriageApplicationInfo['Partner_IC']);
        // $applicantInfo = $this->applicantModel->getApplicantInfo($applicantIC);
        // $marriageInfo = $this->marriageInfoModel->getMarriageInfo($requestMarriageApplicationInfo['Marriage_id']);

        //header('Location: ../app/View/ManageSpecialIncentive/applicantIncentiveView.php?partnerInfo=' . urlencode(serialize($partnerInfo)) . '&applicantInfo=' . urlencode(serialize($applicantInfo)) . '&marriageInfo=' . urlencode(serialize($marriageInfo)));
    }
}
?>