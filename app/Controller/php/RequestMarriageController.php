<?php
class RequestMarriageController
{

    private $marriageInfoModel;
    private $marriageRequestInfoModel;
    private $applicantModel;

    //Login controller's constructor
    public function __construct($marriageInfoModel, $marriageRequestInfoModel, $applicantModel)
    {
        // session_start();
        $this->marriageInfoModel = $marriageInfoModel;
        $this->marriageRequestInfoModel = $marriageRequestInfoModel;
        $this->applicantModel = $applicantModel;
    }

    public function getApplicantAndPartnerInfo($partnerIC, $applicantIC){

        // session_start();
        $partnerInfo = $this->applicantModel->getApplicantProfileInfo($partnerIC);
        $applicantInfo = $this->applicantModel->getApplicantProfileInfo($applicantIC);

        // echo $applicantInfo['ApplicantName'] ."<br>". $partnerInfo['ApplicantName'];
        header('Location: ../app/View/MarriageRequest/RequestMarriageView.php?display=1&partnerInfo='.urlencode(serialize($partnerInfo)).'&applicantInfo='.urlencode(serialize($applicantInfo)));


    }

    
}