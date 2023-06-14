<?php
class MarriagePreparationCourseController
{

    private $marriageCourseInfoModel;
    private $marriageCourseApplicationModel;
    private $applicantModel;

    //Login controller's constructor
    public function __construct($marriageCourseInfoModel, $marriageCourseApplicationModel, $applicantModel)
    {
        $this->marriageCourseInfoModel = $marriageCourseInfoModel;
        $this->marriageCourseApplicationModel = $marriageCourseApplicationModel;
        $this->applicantModel = $applicantModel;
    }

    public function viewListOfMPC($organize, $from)
    {
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
                window.location = "../app/View/MarriageCourse/Manage<PCView.php";
            </script>
<?php
        }
    }

    public function viewListOfApplicantMPC()
    {

        $MPCApplicant = $this->marriageCourseApplicationModel->getListOfApplicantMPC();
        $listOfApplicant = $this->applicantModel->getAllApplicantInfo();

        header('Location: ../app/View/MarriageCourse/ListOfApplicantMPCView.php?returnInfo=' .  urlencode(serialize($MPCApplicant)));
    }
}
