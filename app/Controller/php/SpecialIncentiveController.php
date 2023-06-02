<?php
    class SpecialIncentiveController {
        private $specialIncentiveModel;
        private $applicantModel;
        private $applicantOccupationModel;
        private $heirInfoModel;
        private $marriageInfoModel;
        private $incentiveDocModel;
    }

    //SpecialIncentive controller's constructor
    public function __construct($specialIncentiveModel, $applicantModel, $applicantOccupationModel, $heirInfoModel, $marriageInfoModel, $incentiveDocModel) {
        $this->specialIncentiveModel = $specialIncentiveModel;
        $this->applicantModel = $applicantModel;
        $this->applicantOccupationModel = $applicantOccupationModel;
        $this->heirInfoModel = $heirInfoModel;
        $this->marriageInfoModel = $marriageInfoModel;
        $this->incentiveDocModel = $incentiveDocModel;
    }
?>