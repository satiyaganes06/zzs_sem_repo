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

            session_start();
            $_SESSION['userinfo'] = $user;
           
            // $url = '../app/View/ManageUserProfile/viewProfileDetailsView.php?' . http_build_query($user);
             //header('Location: ../app/View/ManageUserProfile/viewProfileDetailsView.php');
            
            ?>
                <script>
                    
                    window.location = "../app/View/ManageUserProfile/viewProfileDetailsView.php";
                </script>
            <?php
            
        }

        public function updateApplicantProfile($nama, $umur, $tarikhTL, $jantina, $bangsa, $email, $alamat, $noTel, $noTelRum, $trafPen, $jawatan, $pendapatan, $alamatKerja, $noTelPenjabat) {
            
            //Firstly, the updateApplicationProfileInfo will update the data in mySQL.
            if($this->applicantModel->updateApplicantProfileInfo($nama, $umur, $tarikhTL, $jantina, $bangsa, $email, $alamat, $noTel, $noTelRum, $trafPen, $jawatan, $pendapatan, $alamatKerja, $noTelPenjabat)){
                ?>
                    <script>
                        alert("Berjaya mengemas kini");
                    </script>
                <?php
                
                header("Location: index.php?action=viewProfile");

            }else{
                ?>
                    <script>
                        alert("Error updating record");
                        window.location = "../app/View/ManageUserProfile/editProfileDetailsView.php";
                    </script>
                <?php

            }
            
            
            
        }
    }
      
?>