<?php
    class UserProfileController {
        private $applicantModel;
        private $adminModel;

        //Login controller's constructor
        public function __construct($applicantModel, $adminModel) {
            $this->applicantModel = $applicantModel;
            $this->adminModel = $adminModel;
        }

        public function viewApplicantProfile($ic) {
            
            $user = $this->applicantModel->getApplicantProfileInfo($ic);

            
            $_SESSION['userinfo'] = $user;
           
            // $url = '../app/View/ManageUserProfile/viewProfileDetailsView.php?' . http_build_query($user);
             //header('Location: ../app/View/ManageUserProfile/viewProfileDetailsView.php');
            
             ?>
             <script>
                 
                 window.location = "../app/View/ManageUserProfile/viewProfileDetailsView.php";
             </script>
         <?php
            
        }
    }
      
?>