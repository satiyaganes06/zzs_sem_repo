<?php
    class complaintController {
        private $complaintModel;
        private $applicantModel;
        private $applicantOccupationModel;
        private $consultationModel;
        private $staffModel;
    

    //Complaint controller's constructor
    public function __construct($complaintModel, $applicantModel, $applicantOccupationModel, $consultationModel, $staffModel) {
        $this->complaintModel = $complaintModel;
        $this->applicantModel = $applicantModel;
        $this->applicantOccupationModel = $applicantOccupationModel;
        $this->consultationModel = $consultationModel;
        $this->staffModel = $staffModel;
    }

    public function getAllComplaintInfo(){
        $complaintInfo = $this->complaintModel->getAllComplaintInfo();
        return $complaintInfo;
    }

    public function addComplaintInfo($complaintId, $consultationId, $adminId, $applicantIC, $purpose, $challenges, $solution, $complaintDate, $complaintStatus) {
        $result = $this->complaintModel->addComplaintInfo($complaintId, $consultationId, $adminId, $applicantIC, $purpose, $challenges, $solution, $complaintDate, $complaintStatus);

        if ($result) {
            echo "Complaint information added successfully!";
        } else {
            echo "Failed to add complaint information.";
        }
    }

}
?>