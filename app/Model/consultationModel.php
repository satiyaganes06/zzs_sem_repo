<?php
class ConsultationModel {

  private $connect;

  //Consultation controller's constructor
  public function __construct($database) {
    $this->connect = $database;
  }

  //Add initial consultation info
  public function addConsultationInfo($consultationId, $staffId, $consultationDate, $consultationTime, $consultationPlace, $consultationResult) {

    //Add SQL Query
    $query = $this->connect->prepare("
        INSERT INTO consultation_info 
        (Consultation_Id, 
        Staff_Id, 
        ConsultationDate,
        ConsultationTime,
        ConsultationPlace,
        ConsultationResult,
    ) VALUES (?, ?, ?, ?, ?)");

    //return to consultation controller
    return $query->execute([$consultationId, $staffId, $consultationDate, $consultationTime, $consultationPlace, $consultationResult]);
  }

  //Get consultation data using applicant ic 
  public function getApplicantProfileInfo($applicantIC) {

    // Prepare SQL statement with placeholders to prevent SQL injection
    $stmt = $this->connect->prepare('SELECT * FROM Consultation_Info WHERE Applicant_IC = :ic');
    $stmt->bindParam(':ic', $applicantIC);

    // Execute SQL statement
    $stmt->execute();

    //Store the result of user from mySQL
    $userinfo = $stmt->fetch(PDO::FETCH_ASSOC);  

    return $consultationinfo;
  }

  //Get all consultation data
  public function getAllConsultationInfo() {

    // Prepare SQL statement with placeholders to prevent SQL injection
    $stmt = $this->connect->prepare('SELECT * FROM Consultation_Info');

    // Execute SQL statement
    $stmt->execute();

    // Fetch all rows at once
    $consultationDetailsList = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $consultationDetailsList;
  }   

  //Update consultation data using user ic 
  public function updateApplicantProfileInfo($tarikh, $masa, $namapenasihat, $tempat) {
     
    session_start();
    $ic = $_SESSION['currentApplicantIC'];

    // Prepare your update statement
    $sql = "UPDATE Consultation_Info set 
                ConsultationDate = :tarikh, 
                ConsultationTime = :masa, 
                Staff_Id = :namapenasihat,
                ConsultationPlace = :tempat, 
            WHERE Applicant_IC = :ic";

    // Prepare the statement
    $stmt = $this->connect->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':tarikh', $tarikh);
    $stmt->bindParam(':masa', $masa);
    $stmt->bindParam(':namapenasihat', $namapenasihat);
    $stmt->bindParam(':tempat', $tempat);
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