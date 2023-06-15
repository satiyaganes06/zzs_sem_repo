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

        //Retrieve profile data from model
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
                    
                }else if($from == 'specialIncentiveApplication'){
                    return $user; //ni satiya buat bukan salah aku
                    //header('Location: ../app/View/ManageSpecialIncentive/applicantIncentiveView.php?returnInfo='.  urlencode(serialize($user)));
                
                }else if($from == 'aduanPemohon'){
                    header('Location: ../app/View/ManageComplaint/viewApplicantDetailsView.php?returnInfo='.  urlencode(serialize($user)));
                 
                }else if($from == 'daftarNikah'){
                    header('Location: ../app/View/MarriageRegistration/marriageRegistrationView.php?returnInfo='. urlencode(serialize($user)));
                }
                

            }elseif($usertype == "Kakitangan"){

                $id = $_SESSION['accountId'];
                $user = $this->staffModel->getStaffProfileInfo($id);

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

        //Retrieve staff list from staff model
        public function viewStaffListFunction() {

            session_start();

            $listOfStaffs = $this->staffModel->getAllStaffInfo();

            $_SESSION['listOfStaffs'] = $listOfStaffs;

            ?>
                <script>
                    window.location = "../app/View/ManageUserProfile/viewStaffListView.php";
                </script>
            <?php

        }

        //Retrieve staff list from applicant model
        public function viewApplicantListFunction($from) {

            session_start();

            $listOfApplicant = $this->applicantModel->getAllApplicantInfo();

            $_SESSION['listOfApplicant'] = $listOfApplicant;
            
            if($from == 'viewListApplicant'){
                ?>
                    <script>
                        window.location = "../app/View/ManageUserProfile/viewApplicantListView.php";
                    </script>
                <?php
            

            }elseif($from == 'adminIncentiveListView'){
                ?>
                    <script>
                        window.location = "../app/View/ManageSpecialIncentive/adminIncentiveListView.php";
                    </script>
                <?php


            }elseif($from == 'viewComplaintListDetailsView'){
            ?>
                <script>
                    window.location = "../app/View/ManageComplaint/viewComplaintListDetailsView.php";
                </script>
            <?php
            }
        }

        //Update the applicant profile data 
        public function updateApplicantProfileFunction($nama, $umur, $tarikhTL, $jantina, $bangsa, $email, $alamat, $noTel, $noTelRum, $trafPen, $jawatan, $pendapatan, $alamatKerja, $noTelPenjabat) {
            
            //Firstly, the updateApplicationProfileInfo will update the data in mySQL.
            if($this->applicantModel->updateApplicantProfileInfo($nama, $umur, $tarikhTL, $jantina, $bangsa, $email, $alamat, $noTel, $noTelRum, $trafPen, $jawatan, $pendapatan, $alamatKerja, $noTelPenjabat)){

                // Display success message using JavaScript
                $_SESSION['alert-success'] = "Berjaya mengemas kini.";

                // Redirect the page using JavaScript
                echo '<script>window.location.href = "index.php?action=viewProfile&from=view";</script>';
                

            }else{

                // Display success message using JavaScript
                $_SESSION['alert-fail'] = "Kegagalan mengemas kini.";

                // Redirect the page using JavaScript
                echo '<script>window.location.href = "index.php?action=viewProfile&from=view";</script>';


            }
            
        }

        //Update the staff profile data 
        public function updateStaffProfileFunction($name, $email, $alamat, $noTel) {
            
            //Firstly, the updateApplicationProfileInfo will update the data in mySQL.
            if($this->staffModel->updateStaffProfileInfo($name, $email, $alamat, $noTel)){
               
                // Display success message using JavaScript
                $_SESSION['alert-success'] = "Berjaya mengemas kini.";

                // Redirect the page using JavaScript
                echo '<script>window.location.href = "index.php?action=viewProfile&from=view";</script>';

            }else{
              

                // Display success message using JavaScript
                $_SESSION['alert-fail'] = "Kegagalan mengemas kini.";

                // Redirect the page using JavaScript
                echo '<script>window.location.href = "index.php?action=viewProfile&from=view";</script>';

            }
            
        }

        //Update the admin profile data
        public function updateAdminProfileFunction($nama, $email, $alamat, $noTel) {
            
            //Firstly, the updateApplicationProfileInfo will update the data in mySQL.
            if($this->adminModel->updateAdminProfileInfo($nama, $email, $alamat, $noTel)){

                // Display success message using JavaScript
                $_SESSION['alert-success'] = "Berjaya mengemas kini.";

                // Redirect the page using JavaScript
                echo '<script>window.location.href = "index.php?action=viewProfile&from=view";</script>';

            }else{

                // Display success message using JavaScript
                $_SESSION['alert-fail'] = "Kegagalan mengemas kini.";

                // Redirect the page using JavaScript
                echo '<script>window.location.href = "../app/View/ManageUserProfile/editAdminProfileDetailsView.php";</script>';

                

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
                
            }else{
                echo "Problem 404";
                
            }

        }

        //Retrieve staff list from applicant model
        public function viewSearchListFunction($term, $from) {

            
            if($from == 'applicant'){
                
                $listOfApplicant = $this->applicantModel->getApplicantSearchInfo($term);

                session_start();
                $_SESSION['listOfApplicant'] = $listOfApplicant;
                ?>
                    <script>
                        window.location = "../app/View/ManageUserProfile/viewApplicantListView.php";
                    </script>
                <?php
            

            }elseif($from == 'staff'){

                $listOfStaff = $this->staffModel->getStaffSearchInfo($term);

                session_start();
                $_SESSION['listOfStaffs'] = $listOfStaff;

                ?>
                    <script>
                        window.location = "../app/View/ManageUserProfile/viewStaffListView.php";
                    </script>
                <?php
            }
        }
    }
      
?>