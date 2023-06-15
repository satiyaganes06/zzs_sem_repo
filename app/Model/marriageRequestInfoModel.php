<?php
class MarriageRequestInfoModel
{

    private $connect;

    //Registration controller's constructor
    public function __construct($database)
    {
        $this->connect = $database;
    }

    public function listOfRequestMarriageApplicantion($status){

        // Prepare SQL statement with placeholders to prevent SQL injection
        if($status == 'all'){
            $stmt = $this->connect->prepare("SELECT * FROM marriage_request_info");
        }else{
            $stmt = $this->connect->prepare("SELECT * FROM marriage_request_info WHERE RequestStatus = '$status'");
        }

        // Execute SQL statement
        $stmt->execute();

        //Store the result of user from mySQL
        $listOfRequestMarriageApplication = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $listOfRequestMarriageApplication;
        
    }

    public function requestMarriageApplicantInfo($applicantIC) {

        $stmt = $this->connect->prepare("SELECT * FROM marriage_request_info WHERE Applicant_IC = '$applicantIC'");

        // Execute SQL statement
        $stmt->execute();

        //Store the result of user from mySQL
        $requestMarriageApplicationInfo = $stmt->fetch(PDO::FETCH_ASSOC);

        return $requestMarriageApplicationInfo;
        

    }

}
?>