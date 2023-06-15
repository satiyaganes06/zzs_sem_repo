<?php
    class consultationController {
        private $complaintModel;
        private $applicantModel;
        private $applicantOccupationModel;
        private $consultationModel;
        private $staffModel;
    

    //Consultation controller's constructor
    public function __construct($complaintModel, $applicantModel, $applicantOccupationModel, $consultationModel, $staffModel) {
        $this->complaintModel = $complaintModel;
        $this->applicantModel = $applicantModel;
        $this->applicantOccupationModel = $applicantOccupationModel;
        $this->consultationModel = $consultationModel;
        $this->staffModel = $staffModel;
    }

}
?>