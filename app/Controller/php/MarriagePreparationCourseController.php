<?php
class MarriagePreparationCourseController
{

    private $marriageCourseInfoModel;
    private $marriageCourseApplicationModel;
    private $applicantModel;
    private $paymentModel;

    //Login controller's constructor
    public function __construct($marriageCourseInfoModel, $marriageCourseApplicationModel, $applicantModel, $paymentModel)
    {
        $this->marriageCourseInfoModel = $marriageCourseInfoModel;
        $this->marriageCourseApplicationModel = $marriageCourseApplicationModel;
        $this->applicantModel = $applicantModel;
        $this->paymentModel = $paymentModel;
    }

    public function viewListOfMPC($organize, $from)
    {
        session_start();
        $listOfMPC = $this->marriageCourseInfoModel->getListOfMPC($organize);

        $_SESSION['listOfMPC'] = $listOfMPC;

        if ($from == 'MPCView') {
?>
            <script>
                window.location = "../app/View/MarriageCourse/MPCView.php";
            </script>
        <?php


        } elseif ($from == 'manageMPC') {
        ?>
            <script>
                window.location = "../app/View/MarriageCourse/ManageMPCView.php";
            </script>
            <?php
        }
    }

    public function getMPCInfo($marriageCourseID)
    {

        $MPCInfo = $this->marriageCourseInfoModel->getMPCInfo($marriageCourseID);

        header('Location: ../app/View/MarriageCourse/EditMPCView.php?MPCInfo=' . urlencode(serialize($MPCInfo)));
    }

    public function viewListOfApplicantMPC($from)
    {
        session_start();
        $applicantNameList = [];

        if ($from == 'listOFApplicant') {

            $MPCApplicant = $this->marriageCourseApplicationModel->getAllListOfApplicationMPC();
            $x = 0;
            foreach ($MPCApplicant as $row) {

                $applicant = $this->applicantModel->getApplicantProfileInfo($row["Applicant_IC"]);
                $applicantNameList[$x] = $applicant["ApplicantName"];

                $x++;
            }

            $_SESSION['MPCApplicant'] = $MPCApplicant;
            $_SESSION['applicantName'] = $applicantNameList;

            header('Location: ../app/View/MarriageCourse/ListOfApplicantMPCView.php');
        } elseif ($from == 'newApplicant') {

            $MPCApplicant = $this->marriageCourseApplicationModel->getListOfApplicationMPC('DALAM PROSES');
            $x = 0;
            foreach ($MPCApplicant as $row) {

                $applicant = $this->applicantModel->getApplicantProfileInfo($row["Applicant_IC"]);
                $applicantNameList[$x] = $applicant["ApplicantName"];

                $x++;
            }

            $_SESSION['MPCApplicant'] = $MPCApplicant;
            $_SESSION['applicantName'] = $applicantNameList;

            header('Location: ../app/View/MarriageCourse/NewApplicantView.php');
        } else {

            $MPCApplicant = $this->marriageCourseApplicationModel->getListOfApplicationMPC('PESERTA');
            $x = 0;
            foreach ($MPCApplicant as $row) {

                $applicant = $this->applicantModel->getApplicantProfileInfo($row["Applicant_IC"]);
                $applicantNameList[$x] = $applicant["ApplicantName"];

                $x++;
            }

            $_SESSION['MPCApplicant'] = $MPCApplicant;
            $_SESSION['applicantName'] = $applicantNameList;

            header('Location: ../app/View/MarriageCourse/ResultView.php');
        }
    }

    public function getMPCApplicantInfoForApplicant($organize, $venue, $dateStart, $dateFinish)
    {
        session_start();
        $applicantIC = $_SESSION['currentUserIC'];
        $_SESSION['organize'] = $organize;
        $_SESSION['venue'] = $venue;
        $_SESSION['dateStart'] = $dateStart;
        $_SESSION['dateFinish'] = $dateFinish;

        $applicantInfo = $this->applicantModel->getApplicantProfileInfo($applicantIC);

        header('Location: ../app/View/MarriageCourse/UploadProofOfPaymentMPCView.php?applicantInfo=' .  urlencode(serialize($applicantInfo)));
    }

    public function uploadProofOfPaymentMPC($typeOfFee)
    {
        session_start();
        $applicantIC = $_SESSION['currentUserIC'];
        $this->paymentModel->uploadPayment($typeOfFee, $applicantIC);

        if ($this->paymentModel->uploadPayment($typeOfFee, $applicantIC)) {

            // Display success message using JavaScript
            $_SESSION['alert-success'] = "Berjaya memuat naik bukti pembayaran.";

            // Redirect the page using JavaScript
            // echo '<script>window.location.href = "index.php?action=viewProfile&from=view";</script>';
            header('Location: ../app/View/MarriageCourse/MPCView.php');
        } else {

            // Display success message using JavaScript
            $_SESSION['alert-fail'] = "Kegagalan memuat naik bukti pembayaran.";

            // Redirect the page using JavaScript
            // echo '<script>window.location.href = "index.php?action=viewProfile&from=view";</script>';
            header('Location: ../app/View/MarriageCourse/MPCView.php');
        }
    }

    public function getMPCApplicantInfoForAdmin($from, $applicantIC)
    {
        session_start();

        $applicantInfo = $this->applicantModel->getApplicantProfileInfo($applicantIC);

        if ($from == 'listOfApplicant') {

            header('Location: ../app/View/MarriageCourse/ApplicantMPCInfoView.php?applicantInfo=' .  urlencode(serialize($applicantInfo)));
        } else if ($from == 'listOfNewApplicant') {

            header('Location: ../app/View/MarriageCourse/ApproveMPCView.php?applicantInfo=' .  urlencode(serialize($applicantInfo)));
        }
    }

    public function makeApproval($approval, $applicantIC)
    {
        session_start();

        if ($approval == 'reject') {
            if ($this->marriageCourseApplicationModel->deleteApplication($applicantIC)) {
            ?>

                <script>
                    alert("Data Sucessfully delete");
                    window.href = "../../../public/index.php?action=viewListOfApplicantMPC&from=newApplicant";
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("Data unsuccessfully delete");
                    window.href = "../../../public/index.php?action=viewListOfApplicantMPC&from=newApplicant";
                </script>
            <?php
            }
        } else {
            if ($this->marriageCourseApplicationModel->updateStatus($approval, $applicantIC)) {
            ?>
                <script>
                    alert("Data Sucessfully update");
                    window.href = "../../../public/index.php?action=viewListOfApplicantMPC&from=newApplicant";
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("Data unsuccessfully update");
                    window.href = "../../../public/index.php?action=viewListOfApplicantMPC&from=newApplicant";
                </script>
            <?php
            }
        }
    }

    public function makeResult($result, $applicantIC, $approval)
    {

        if ($this->marriageCourseApplicationModel->updateResult($result, $applicantIC, $approval)) {

            ?>
            <script>
                alert("Data Sucessfully update");
                window.href = "../../../public/index.php?action=viewListOfApplicantMPC&from=giveResultApplicant";
            </script>
        <?php

        } else {

        ?>
            <script>
                alert("Data unsuccessfully update");
                window.href = "../../../public/index.php?action=viewListOfApplicantMPC&from=giveResultApplicant";
            </script>
        <?php

        }
    }

    public function insertMPCView($organize, $DateStart, $DateFinish, $Venue, $TimeStart, $TimeFinish, $StaffName, $StaffPhoneNumber, $Capacity, $Notes)
    {

        if ($this->marriageCourseInfoModel->insertMPCView($organize, $DateStart, $DateFinish, $Venue, $TimeStart, $TimeFinish, $StaffName, $StaffPhoneNumber, $Capacity, $Notes)) {
        ?>
            <script>
                alert("Data Sucessfully Insert");
                window.href = "../../../public/index.php?action=viewlistOfMPC&organize=all&from=manageMPC";
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Data unsuccessfully Insert");
                window.href = "../../../public/index.php?action=viewlistOfMPC&organize=all&from=manageMPC";
            </script>
        <?php
        }
    }

    public function updateMPCView($marriageID)
    {

        if ($this->marriageCourseInfoModel->updateMPCView($marriageID)) {
        ?>
            <script>
                alert("Data Sucessfully update");
                window.href = "../../../public/index.php?action=getMPCInfo&marriageCourseID=<?php echo $marriageID; ?>";
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Data unsuccessfully update");
                window.href = "../../../public/index.php?action=getMPCInfo&marriageCourseID=<?php echo $marriageID; ?>";
            </script>
<?php
        }
    }
}
?>