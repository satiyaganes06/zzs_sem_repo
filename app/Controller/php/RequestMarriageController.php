<?php
class RequestMarriageController
{

    private $marriageInfoModel;
    private $marriageRequestInfoModel;
    private $applicantModel;
    private $waliModel;
    private $witnessModel;
    private $marriageDocModel;
    private $documentModel;

    //Login controller's constructor
    public function __construct($marriageInfoModel, $marriageRequestInfoModel, $applicantModel, $waliModel, $witnessModel, $marriageDocModel, $documentModel)
    {
        // session_start();
        $this->marriageInfoModel = $marriageInfoModel;
        $this->marriageRequestInfoModel = $marriageRequestInfoModel;
        $this->applicantModel = $applicantModel;
        $this->waliModel = $waliModel;
        $this->witnessModel = $witnessModel;
        $this->marriageDocModel = $marriageDocModel;
        $this->documentModel = $documentModel;
    }

    public function getApplicantAndPartnerInfo($partnerIC, $applicantIC)
    {

        // session_start();
        $partnerInfo = $this->applicantModel->getApplicantProfileInfo($partnerIC);
        $applicantInfo = $this->applicantModel->getApplicantProfileInfo($applicantIC);

        // echo $applicantInfo['ApplicantName'] ."<br>". $partnerInfo['ApplicantName'];
        header('Location: ../app/View/MarriageRequest/RequestMarriageView.php?display=1&partnerInfo='.urlencode(serialize($partnerInfo)).'&applicantInfo='.urlencode(serialize($applicantInfo)));
    }

    public function listOfMarriageRequestApplication($status)
    {
        session_start();

        $applicantName = [];
        $applicantGender = [];
        $x = 0;

        $listOfRequestMarriageApplicantion = $this->marriageRequestInfoModel->listOfRequestMarriageApplicantion($status);

        foreach ($listOfRequestMarriageApplicantion as $row) {

            $applicantInfo = $this->applicantModel->getApplicantProfileInfo($row['Applicant_IC']);

            $applicantName[$x] = $applicantInfo['ApplicantName'];
            $applicantGender[$x] = $applicantInfo['ApplicantGender'];
            $x++;
        }

        $_SESSION['applicantName'] = $applicantName;
        $_SESSION['applicantGender'] = $applicantGender;
        $_SESSION['listOfRequestMarriageApplicantion'] = $listOfRequestMarriageApplicantion;

        if ($status == 'all'){
            header('Location: ../app/View/MarriageRequest/ListApplicantView.php');
        }
        else {
            header('Location: ../app/View/MarriageRequest/ListApprovalRequestView.php');
        }
    }

    public function MarriageRequestApplicationInfo($applicantIC, $from)
    {

        $applicantInfo = $this->applicantModel->getApplicantProfileInfo($applicantIC);

        if ($from == 'listApplicant') {
            header('Location: ../app/View/MarriageRequest/ApplicantInfoView.php?applicantInfo=' . urlencode(serialize($applicantInfo)));
        }else{
            header('Location: ../app/View/MarriageRequest/ApproveRequestView.php?applicantInfo=' . urlencode(serialize($applicantInfo)));
        }
    }

    public function approveMarriageRequest($status, $applicantIc)
    {

        if ($this->marriageRequestInfoModel->approveMarriageRequest($status, $applicantIc)){

            ?>
                <script>
                    alert("Data Sucessfully update");
                    window.href = "../../../public/index.php?action=listOfMarriageRequestApplication&status=new";
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("Data unsuccessfully update");
                    window.href = "../../../public/index.php?action=listOfMarriageRequestApplication&status=new";
                </script>
            <?php
            }
        }

    }