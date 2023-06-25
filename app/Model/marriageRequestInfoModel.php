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
        }else if($status == 'new'){
            $stmt = $this->connect->prepare("SELECT * FROM marriage_request_info WHERE RequestStatus = 'DALAM PROSES'");
        }

        // Execute SQL statement
        $stmt->execute();

        //Store the result of user from mySQL
        $listOfRequestMarriageApplicantion = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $listOfRequestMarriageApplicantion;
        
    }

    public function getMarriageInfo($applicant_IC){

        // Prepare SQL statement with placeholders to prevent SQL injection
        $stmt = $this->connect->prepare("SELECT * FROM marriage_request_info WHERE Applicant_IC = '$applicant_IC'");
        

        // Execute SQL statement
        $stmt->execute();

        //Store the result of user from mySQL
        $requestMarriageApplication = $stmt->fetch(PDO::FETCH_ASSOC);

    

        return $requestMarriageApplication;
        
    }

    public function approveMarriageRequest($status, $applicantIc){

        // Prepare your update statement
        $sql = "UPDATE marriage_request_info set 
                RequestStatus = :status,
                WHERE Applicant_IC = :applicantIc";

        // Prepare the statement
        $stmt = $this->connect->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':applicantIc', $applicantIc);

        // Execute the statement
        if ($stmt->execute()) {
            return true;
        } else {

            return false;
        }
    }
}
