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

    public function viewListOfApplicantMPC()
    {
        // session_start();
        $applicantNameList = [];
        $MPCApplicant = $this->marriageCourseApplicationModel->getListOfApplicationMPC();

        // for ($x = 0; $x <= count($MPCApplicant); $x++) {
        //     foreach ($MPCApplicant as $row) {
        //         //$applicantNameList[$x] = $row["Applicant_IC"];
        //         $applicant = $this->applicantModel->getApplicantProfileInfo($row["Applicant_IC"]);

        //     }
        //     $applicantNameList[$x] = $applicant["ApplicantName"];
        //     echo $applicantNameList[$x] . "<br>";
        // }

        $x = 0;
        foreach ($MPCApplicant as $row) {
            //$applicantNameList[$x] = $row["Applicant_IC"];
            $applicant = $this->applicantModel->getApplicantProfileInfo($row["Applicant_IC"]);
            $applicantNameList[$x] = $applicant["ApplicantName"];
            // echo $applicantNameList[$x] . "<br>";
            $x++;
        }

        // echo count($MPCApplicant);
        // echo $applicantNameList[0];
        // echo $applicantNameList[1];

        $_SESSION['MPCApplicant']=$MPCApplicant;
        $_SESSION['applicantName']=$applicantNameList;
        header('Location: ../app/View/MarriageCourse/ListOfApplicantMPCView.php');
    }
}
