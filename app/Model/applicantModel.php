<?php
class ApplicantModel {

  private $connect;

  //Registration controller's constructor
  public function __construct($database) {
    $this->connect = $database;
  }

  //Add initial applicant info
  public function addApplicantInfo($userIC, $accountId, $userName, $userGender) {

    //Add SQL Query
    $query = $this->connect->prepare("
        INSERT INTO Applicant_Info 
        (Account_Id, 
        Applicant_Ic, 
        ApplicantName, 
        ApplicantGender
    ) VALUES (?, ?, ?, ?)");

    //return to registration controller
    return $query->execute([$accountId, $userIC, $userName, $userGender]);
  }

  public function getApplicantProfileInfo($userIC) {

    $stmt = $this->connect->prepare('SELECT * FROM Applicant_Info WHERE Applicant_Ic = :id');
    $stmt->bindParam(':id', $userIC);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  
}

?>
