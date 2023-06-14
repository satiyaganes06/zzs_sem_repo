<?php
    class SpecialIncentiveController {
        private $specialIncentiveModel;
        private $applicantModel;
        private $applicantOccupationModel;
        private $heirInfoModel;
        private $marriageInfoModel;
        private $incentiveDocModel;
    

    //SpecialIncentive controller's constructor
    public function __construct($specialIncentiveModel, $applicantModel, $applicantOccupationModel, $heirInfoModel, $marriageInfoModel, $incentiveDocModel) {
        $this->specialIncentiveModel = $specialIncentiveModel;
        $this->applicantModel = $applicantModel;
        $this->applicantOccupationModel = $applicantOccupationModel;
        $this->heirInfoModel = $heirInfoModel;
        $this->marriageInfoModel = $marriageInfoModel;
        $this->incentiveDocModel = $incentiveDocModel;
    }

    //Applicant special incentive application function 
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
}
