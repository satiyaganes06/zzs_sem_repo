<?php
class ComplaintModel {

  private $connect;

  //Complaint controller's constructor
  public function __construct($database) {
    $this->connect = $database;
  }

  //Add initial complaint info
  public function addComplaintInfo($complaintId, $consultationId, $adminId, $applicantIC, $purpose, $challenges, $solution, $complaintDate, $complaintStatus) {

    //Add SQL Query
    $query = $this->connect->prepare("
        INSERT INTO complaint_info 
        (Complaint_Id, 
        Consultation_Id, 
        Admin_Id, 
        Applicant_IC,
        Purpose, 
        Challenges,
        Solution,
        ComplaintDate,
        ComplaintStatus
    ) VALUES (?, ?, ?, ?, ?)");

    //return to complaint controller
    return $query->execute([$complaintId, $consultationId, $adminId, $applicantIC, $purpose, $challenges, $solution, $complaintDate, $complaintStatus]);
  }

  //Get complaint data using applicant ic 
  public function getApplicantProfileInfo($applicantIC) {

    // Prepare SQL statement with placeholders to prevent SQL injection
    $stmt = $this->connect->prepare('SELECT * FROM Complaint_Info WHERE Applicant_IC = :ic');
    $stmt->bindParam(':ic', $applicantIC);

    // Execute SQL statement
    $stmt->execute();

    //Store the result of user from mySQL
    $userinfo = $stmt->fetch(PDO::FETCH_ASSOC);  

    return $complaintinfo;
  }

  //Get all complaint data
  public function getAllComplaintInfo() {

    // Prepare SQL statement with placeholders to prevent SQL injection
    $stmt = $this->connect->prepare('SELECT * FROM Complaint_Info');

    // Execute SQL statement
    $stmt->execute();

    // Fetch all rows at once
    $complaintDetailsList = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $complaintDetailsList;
  }   

  //Update complaint data using user ic 
  public function updateApplicantProfileInfo($tujuan, $cabaran, $solusi) {
     
    session_start();
    $ic = $_SESSION['currentApplicantIC'];

    // Prepare your update statement
    $sql = "UPDATE Complaint_Info set 
                Purpose = :tujuan, 
                Challenges = :cabaran, 
                Solution = :solusi, 
            WHERE Applicant_IC = :ic";

    // Prepare the statement
    $stmt = $this->connect->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':tujuan', $tujuan);
    $stmt->bindParam(':cabaran', $cabaran);
    $stmt->bindParam(':solusi', $solusi);
    $stmt->bindParam(':ic', $ic);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
          return true;

      } else {
      
          return false;
          
      }

  }
  
}

?>