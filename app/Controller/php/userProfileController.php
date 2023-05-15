<?php
    class UserProfileController {
        private $accountModel;
        private $applicantModel;
        private $adminModel;
        private $staffModel;

        //Login controller's constructor
        public function __construct($accountModel, $applicantModel, $adminModel, $staffModel) {
            $this->accountModel = $accountModel;
            $this->applicantModel = $applicantModel;
            $this->adminModel = $adminModel;
            $this->staffModel = $staffModel;
        }

        public function viewApplicantProfileFunction() {
            
            session_start();
            $usertype = $_SESSION['currentUserType'] ;
            
           
            // $url = '../app/View/ManageUserProfile/viewProfileDetailsView.php?' . http_build_query($user);
             //header('Location: ../app/View/ManageUserProfile/viewProfileDetailsView.php');
            
            if($usertype === "Pemohon"){

                $ic = $_SESSION['currentUserIC'];
                $user = $this->applicantModel->getApplicantProfileInfo($ic);

                //Store the user details in session.
                $_SESSION['userinfo'] = $user;

                ?>
                    <script>
                        
                        window.location = "../app/View/ManageUserProfile/viewApplicantProfileDetailsView.php";
                    </script>
                <?php

            }elseif($usertype == "Kakitangan"){

                $ic = $_SESSION['currentUserIC'];
                $user = $this->applicantModel->getApplicantProfileInfo($ic);
                //Store the user details in session.
                $_SESSION['userinfo'] = $user;

                ?>
                    <script>
                        
                        window.location = "../app/View/ManageUserProfile/viewApplicantProfileDetailsView.php";
                    </script>
                <?php

            }elseif($usertype == "Admin"){

                $id = $_SESSION['accountId'];
                $user = $this->adminModel->getAdminProfileInfo($id);
                //Store the user details in session.
                $_SESSION['userinfo'] = $user;

                ?>
                    <script>
                        
                        window.location = "../app/View/ManageUserProfile/viewAdminProfileDetailsView.php";
                    </script>
                <?php
            }else{

                echo "Problem";
            }
            
            
        }

        public function viewStaffListFunction() {

            $listOfStaffs = $this->staffModel->getAllStaffInfo();

            session_start();
            $_SESSION['listOfStaffs'] = $listOfStaffs;

            ?>
                <script>
                    window.location = "../app/View/ManageUserProfile/viewStaffListView.php";
                </script>
            <?php

        }

        public function viewApplicantListFunction() {

            $listOfStaffs = $this->applicantModel->getAllApplicantInfo();

            session_start();
            $_SESSION['listOfApplicant'] = $listOfStaffs;

            ?>
                <script>
                    window.location = "../app/View/ManageUserProfile/viewApplicantListView.php";
                </script>
            <?php

        }

        //Update the applicant profile data 
        public function updateApplicantProfileFunction($nama, $umur, $tarikhTL, $jantina, $bangsa, $email, $alamat, $noTel, $noTelRum, $trafPen, $jawatan, $pendapatan, $alamatKerja, $noTelPenjabat) {
            
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
                        window.location = "../app/View/ManageUserProfile/editApplicantProfileDetailsView.php";
                    </script>
                <?php

            }
            
        }

        //Update the admin profile data
        public function updateAdminProfileFunction($nama, $email, $alamat, $noTel) {
            
            //Firstly, the updateApplicationProfileInfo will update the data in mySQL.
            if($this->adminModel->updateAdminProfileInfo($nama, $email, $alamat, $noTel)){
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
                        window.location = "../app/View/ManageUserProfile/editAdminProfileDetailsView.php";
                    </script>
                <?php

            }
            
        }

        public function viewDetailsById($ic,$type){
            
            if($type =="pemohon"){
                $pemohon = $this->applicantModel->getApplicantProfileInfo($ic);

                session_start();
                $_SESSION['viewProfileById'] = $pemohon;

                ?>
                    <script>
                        window.location = "../app/View/ManageUserProfile/viewApplicantInAdminProfileDetailsView.php";
                    </script>
                <?php

            }else if($type == 'staff'){

                $staff = $this->staffModel->getStaffProfileInfo($ic);
                $staffAccountInfo = $this->accountModel->getAccountInfo($staff['Account_Id']); 

                session_start();
                $_SESSION['viewProfileById'] = $staff;
                $_SESSION['viewAccountById'] = $staffAccountInfo;

                
                ?>
                    <script>
                        window.location = "../app/View/ManageUserProfile/viewStaffInAdminProfileDetailsView.php";
                    </script>
                <?php
                
            }

        }
    }
      
?>