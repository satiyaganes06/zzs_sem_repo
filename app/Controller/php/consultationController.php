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

    public function viewConsultationListFunction($from) {

        $listOfConsultation = $this->consultationModel->getAllConsultationInfo();

        session_start();
        $_SESSION['listOfConsultation'] = $listOfConsultation;
        
            ?>
                <script>
                    window.location = "../app/View/ManageConsultation/viewConsutationListDetailsView.php";
                </script>
            <?php
    }



    }
?>