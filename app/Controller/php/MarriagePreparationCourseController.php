<?php
class MarriagePreparationCourseController
{

    private $marriageCourseInfoModel;
    private $marriageCourseApplicationModel;

    //Login controller's constructor
    public function __construct($marriageCourseInfoModel, $marriageCourseApplicationModel)
    {
        $this->marriageCourseInfoModel = $marriageCourseInfoModel;
    }

    public function viewListOfMPC($organize)
    {
        session_start();

        $MPC = $this->marriageCourseInfoModel->getListOfMPC($organize);

        header('Location: ../app/View/MarriageCourse/MPCView?returnInfo=' .  urlencode(serialize($MPC)));
    }

    public function viewListOfApplicantMPC()
    {
        session_start();

        $MPCApplicant = $this->marriageCourseApplicationModel->getListOfApplicantMPC();

        header('Location: ../app/View/MarriageCourse/ListOfApplicantMPCView.php?returnInfo=' .  urlencode(serialize($MPCApplicant)));
    }
}
