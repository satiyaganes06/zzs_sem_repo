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
        $listOfMPC = $this->marriageCourseInfoModel->getListOfMPC($organize);
        // echo $listOfMPC['Venue'];
        // //session_start();

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
                window.location = "../app/View/MarriageCourse/Manage<PCView.php";
            </script>
<?php
        }
    }

    public function viewListOfApplicantMPC($from)
    {
        // session_start();
        $applicantNameList = [];
        $MPCApplicant = $this->marriageCourseApplicationModel->getListOfApplicationMPC();

        $x = 0;
        foreach ($MPCApplicant as $row) {

            $applicant = $this->applicantModel->getApplicantProfileInfo($row["Applicant_IC"]);
            $applicantNameList[$x] = $applicant["ApplicantName"];

            $x++;
        }

        $_SESSION['MPCApplicant'] = $MPCApplicant;
        $_SESSION['applicantName'] = $applicantNameList;

        if ($from == 'listOFApplicant') {
            header('Location: ../app/View/MarriageCourse/ListOfApplicantMPCView.php');
        } elseif ($from == 'newApplicant') {
            header('Location: ../app/View/MarriageCourse/NewApplicantView.php');
        } else {
            header('Location: ../app/View/MarriageCourse/ResultView.php');
        }
    }

    public function getMPCApplicantInfo($organize, $venue, $dateStart, $dateFinish)
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
}
