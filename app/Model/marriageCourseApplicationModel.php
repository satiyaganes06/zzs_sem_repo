<?php
class MarriageCourseApplicationModel
{

    private $connect;

    //Registration controller's constructor
    public function __construct($database)
    {
        $this->connect = $database;
    }

    public function getAllListOfApplicationMPC()
    {

        // Prepare SQL statement with placeholders to prevent SQL injection
        $stmt = $this->connect->prepare('SELECT * FROM marriage_course_application ORDER BY RequestDate');

        // Execute SQL statement
        $stmt->execute();

        //Store the result of user from mySQL
        $MPCApplicantinfo = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $MPCApplicantinfo;
    }

    public function getListOfApplicationMPC($status)
    {

        // Prepare SQL statement with placeholders to prevent SQL injection
        $stmt = $this->connect->prepare("SELECT * FROM marriage_course_application ORDER BY RequestDate WHERE MPCStatus ='$status'");

        // Execute SQL statement
        $stmt->execute();

        //Store the result of user from mySQL
        $MPCApplicantinfo = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $MPCApplicantinfo;
    }

    public function deleteApplication($applicantIC)
    {

        // Prepare SQL statement with placeholders to prevent SQL injection
        $stmt = $this->connect->prepare("DELETE FROM  marriage_course_application WHERE Applicant_IC  = '$applicantIC'");

        // Execute SQL statement
        if ($stmt->execute() === TRUE) {
            return true;
        } else {

            return false;
        }
    }

    public function updateStatus($approval, $applicantIC)
    {

        // Prepare your update statement
        $sql = "UPDATE marriage_course_application set 
                MPCStatus = :approval
                WHERE Applicant_IC = :applicantIC";

        // Prepare the statement
        $stmt = $this->connect->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':approval', $approval);
        $stmt->bindParam(':applicantIC', $applicantIC);

        // Execute the statement
        if ($stmt->execute() === TRUE) {
            return true;
        } else {

            return false;
        }
    }

    public function updateResult($result, $applicantIC, $approval){

        // Prepare your update statement
        $sql = "UPDATE marriage_course_application set 
                MCResult = :result
                MPCStatus = :approval
                WHERE Applicant_IC = :applicantIC";

        // Prepare the statement
        $stmt = $this->connect->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':result', $result);
        $stmt->bindParam(':approval', $approval);
        $stmt->bindParam(':applicantIC', $applicantIC);

        // Execute the statement
        if ($stmt->execute() == TRUE) {
            return true;
        } else {

            return false;
        }
    }
}
