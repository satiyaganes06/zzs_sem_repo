<?php
    class SpecialIncentiveController {
        private $specialIncentiveModel;
        private $applicantModel;
        private $applicantOccupationModel;
        private $heirInfoModel;
        private $marriageInfoModel;
        private $incentiveDocModel;
        private $marriageRequestInfoModel;
    

    //SpecialIncentive controller's constructor
    public function __construct($specialIncentiveModel, $applicantModel, $applicantOccupationModel, $heirInfoModel, $marriageInfoModel, $incentiveDocModel, $marriageRequestInfoModel) {
        $this->specialIncentiveModel = $specialIncentiveModel;
        $this->applicantModel = $applicantModel;
        $this->applicantOccupationModel = $applicantOccupationModel;
        $this->heirInfoModel = $heirInfoModel;
        $this->marriageInfoModel = $marriageInfoModel;
        $this->incentiveDocModel = $incentiveDocModel;
        $this->marriageRequestInfoModel = $marriageRequestInfoModel;
    }

    //Retrieve marriage info from marriage request info model
    public function getMarriageInfo() {

        $userIC = $_SESSION['currentUserIC'];

        $marriageInfo = $this->marriageRequestInfoModel->getMarriageInfo($userIC);

       return $marriageInfo;
    }

    //Retrieve marriage info data from marriage info model
    public function getMarriageInfoData($marriageId) {

        $marriageInfo = $this->marriageInfoModel->getMarriageInfoData($marriageId);

       return $marriageInfo;
    }

    //Add the occupation info of the applicant
    public function addOccupation($occupationType, $companyName, $employerName, $employerPhoneNo) {

        //Call add occupation function in Applicant Occupation Model
        $this->applicantOccupationModel->addOccupation($occupationType, $companyName, $employerName, $employerPhoneNo);
    }

    public function getOccupationInfo() {

        $occupationInfo = $this->applicantOccupationModel->getOccupationInfo();

        return $occupationInfo;
    }

    public function addHeir($heirName, $heirRelationship, $heirPhoneNo, $heirEmail) {

        //Call add heir function in Heir Info Model
        $this->heirInfoModel->addHeir($heirName, $heirRelationship, $heirPhoneNo, $heirEmail);
    }

    public function getHeirInfo() {

        $heirInfo = $this->heirInfoModel->getHeirInfo();

        return $heirInfo;
    }

    public function addIncentiveDoc($doc) {

        $incentiveDocInfo = $this->incentiveDocModel->addIncentiveDoc();

        return $incentiveDocInfo;
    }

    //Retrieve special incentive list from special incentive model
    public function viewSpecialIncentiveListFunction($from) {

        $listOfSpecialIncentive = $this->specialIncentiveModel->getAllSpecialIncentiveInfo();

        session_start();
        $_SESSION['listOfSpecialIncentive'] = $listOfSpecialIncentive;
        
            ?>
                <script>
                    window.location = "../app/View/ManageSpecialIncentive/adminIncentiveListView.php";
                </script>
            <?php
    }

    
    public function getPartnerInfo($partner_IC) {

        $partner = $this->applicantModel->getApplicantProfileInfo($partner_IC);

        return $partner;
    }

}
