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

        //Retrieve data to view
        public function viewProfileFunction($from) {
            
            session_start();
            $usertype = $_SESSION['currentUserType'] ;
            
            if($usertype == "Pemohon"){

                $ic = $_SESSION['currentUserIC'];
                $user = $this->applicantModel->getApplicantProfileInfo($ic);

                if($from == 'view'){
                    header('Location: ../app/View/ManageUserProfile/viewApplicantProfileDetailsView.php?returnInfo='.  urlencode(serialize($user)));

                }else if($from == 'edit'){
                    header('Location: ../app/View/ManageUserProfile/editApplicantProfileDetailsView.php?returnInfo='.  urlencode(serialize($user)));
                    
                }
                

            }elseif($usertype == "Kakitangan"){

                $id = $_SESSION['accountId'];
                $user = $this->staffModel->getStaffProfileInfo($id);
                echo $user['StaffName'];

                if($from == 'view'){
                    header('Location: ../app/View/ManageUserProfile/viewStaffProfileDetailsView.php?returnInfo='.  urlencode(serialize($user)));

                }else if($from == 'edit'){
                    header('Location: ../app/View/ManageUserProfile/editStaffProfileDetailsView.php?returnInfo='.  urlencode(serialize($user)));
                    
                }

            }elseif($usertype == "Admin"){

                $id = $_SESSION['accountId'];

                //Get the data from admin model
                $adminInfo = $this->adminModel->getAdminProfileInfo($id);

                if($from == 'view'){
                    //Redirect the user to the admin view profile
                    header('Location: ../app/View/ManageUserProfile/viewAdminProfileDetailsView.php?returnInfo='.  urlencode(serialize($adminInfo)));

                }else if($from == 'edit'){
                    //Redirect the user to the admin edit profile
                    header('Location: ../app/View/ManageUserProfile/editAdminProfileDetailsView.php?returnInfo='.  urlencode(serialize($adminInfo)));
                }
                
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
                
                header("Location: index.php?action=viewProfile&from=view");

            }else{
                ?>
                    <script>
                        alert("Error updating record");
                    </script>
                <?php

                header("Location: index.php?action=viewProfile&from=view");

            }
            
        }

        //Update the staff profile data 
        public function updateStaffProfileFunction($name, $email, $alamat, $noTel) {
            
            //Firstly, the updateApplicationProfileInfo will update the data in mySQL.
            if($this->staffModel->updateStaffProfileInfo($name, $email, $alamat, $noTel)){
                ?>
                    <script>
                        alert("Berjaya mengemas kini");
                    </script>
                <?php
                
                header("Location: index.php?action=viewProfile&from=view");

            }else{
                ?>
                    <script>
                        alert("Error updating record");
                    </script>
                <?php

                header("Location: index.php?action=viewProfile&from=view");

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
                
                header("Location: index.php?action=viewProfile&from=view");

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