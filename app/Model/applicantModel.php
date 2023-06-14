<?php
class ApplicantModel {

  private $connect;

  //Registration controller's constructor
  public function __construct($database) {
    $this->connect = $database;
  }

  //Add initial applicant info
  public function addApplicantInfo($userIC, $accountId, $userName, $userGender, $phoneNum) {

    //Add SQL Query
    $query = $this->connect->prepare("
        INSERT INTO applicant_info 
        (Applicant_Ic, 
        Account_Id, 
        ApplicantName, 
        ApplicantGender,
        ApplicantPhoneNo
    ) VALUES (?, ?, ?, ?, ?)");

    //return to registration controller
    return $query->execute([$userIC, $accountId, $userName, $userGender, $phoneNum]);
  }

  //Get applicant data using user ic 
  public function getApplicantProfileInfo($userIC) {

    // Prepare SQL statement with placeholders to prevent SQL injection
    $stmt = $this->connect->prepare('SELECT * FROM applicant_info WHERE Applicant_Ic = :ic');
    $stmt->bindParam(':ic', $userIC);

    // Execute SQL statement
    $stmt->execute();

    //Store the result of user from mySQL
    $userinfo = $stmt->fetch(PDO::FETCH_ASSOC);  

    return $userinfo;
  }
  

  //Get all applicant data
  public function getAllApplicantInfo() {

    // Prepare SQL statement with placeholders to prevent SQL injection
    $stmt = $this->connect->prepare('SELECT * FROM applicant_info');

    // Execute SQL statement
    $stmt->execute();

    // Fetch all rows at once
    $applicantDetailsList = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $applicantDetailsList;
  }   

  //Update applicant data using user ic 
  public function updateApplicantProfileInfo($nama, $umur, $tarikhTL, $jantina, $bangsa, $email, $alamat, $noTel, $noTelRum, $trafPen, $jawatan, $pendapatan, $alamatKerja, $noTelPenjabat) {
     
    session_start();
    $ic = $_SESSION['currentUserIC'];

    // Prepare your update statement
    $sql = "UPDATE applicant_info set 
                ApplicantName = :nama, 
                ApplicantBirthDate = :tarikhTL, 
                ApplicantAge = :umur, 
                ApplicantGender = :jantina, 
                ApplicantEmail = :email, 
                ApplicantRace = :bangsa, 
                ApplicantAddress = :alamat, 
                ApplicantPhoneNo = :noTel, 
                ApplicantHomePhoneNo = :noTelRum, 
                ApplicantEduLevel = :trafPen, 
                ApplicantPosition = :jawatan, 
                ApplicantSalary = :pendapatan, 
                ApplicantWorkAddress = :alamatKerja, 
                ApplicantWorkPhoneNo = :noTelPenjabat
            WHERE Applicant_Ic = :ic";

    // Prepare the statement
    $stmt = $this->connect->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':umur', $umur);
    $stmt->bindParam(':tarikhTL', $tarikhTL);
    $stmt->bindParam(':jantina', $jantina);
    $stmt->bindParam(':bangsa', $bangsa);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':noTel', $noTel);
    $stmt->bindParam(':noTelRum', $noTelRum);
    $stmt->bindParam(':trafPen', $trafPen);
    $stmt->bindParam(':jawatan', $jawatan);
    $stmt->bindParam(':pendapatan', $pendapatan);
    $stmt->bindParam(':alamatKerja', $alamatKerja);
    $stmt->bindParam(':noTelPenjabat', $noTelPenjabat);
    $stmt->bindParam(':ic', $ic);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
          return true;

      } else {
      
          return false;
          
      }

  }
  
  //Applicant Search 
  public function getApplicantSearchInfo($term) {

    // Prepare SQL statement with placeholders to prevent SQL injection
    $stmt = $this->connect->prepare("SELECT * FROM `applicant_info` WHERE CONCAT (`Applicant_Ic`, `ApplicantName`, `ApplicantEmail`, `ApplicantPhoneNo`, `Account_Id`) LIKE '%".$term."%'");

    // Execute SQL statement
    $stmt->execute();

    // Fetch all rows at once
    $applicantDetailsList = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $applicantDetailsList;
  }   
}

?>
