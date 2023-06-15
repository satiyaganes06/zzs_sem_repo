<?php
class ApplicantOccupationModel
{

    private $connect;

    //Registration controller's constructor
    public function __construct($database)
    {
        $this->connect = $database;
    }

    //Add the occupation info of the applicant
    public function addOccupation($occupationType, $companyName, $employerName, $employerPhoneNo) {

        session_start();
        $userIC = $_SESSION['currentUserIC'];

        //Prepare update statement
        $query = $this->connect->prepare("INSERT INTO applicant_occupation_info (Applicant_IC, OccupationType, CompanyName, EmployerName, EmployerPhoneNo) VALUES (?, ?, ?, ?, ?)");
        
        //Execute update statement
        $query->execute([$userIC, $occupationType, $companyName, $employerName, $employerPhoneNo]);

        header("Location: ../../../public/index.php?action=specialIncentiveApplication");
    }

    //Retrieve occupation info of the applicant
    public function getOccupationInfo() {

        $userIC = $_SESSION['currentUserIC'];

        // Prepare SQL statement with placeholders to prevent SQL injection
        $stmt = $this->connect->prepare('SELECT * FROM applicant_occupation_info WHERE Applicant_IC = :ic');
        $stmt->bindParam(':ic', $userIC);

        // Execute SQL statement
        $stmt->execute();

        //Store the result of user from mySQL
        $occupationInfo = $stmt->fetch(PDO::FETCH_ASSOC);  

        return $occupationInfo;
    }

}
