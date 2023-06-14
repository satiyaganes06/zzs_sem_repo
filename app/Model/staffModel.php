<?php
class StaffModel {

  private $connect;

  //Registration controller's constructor
  public function __construct($database) {
    $this->connect = $database;
  }

  //Get applicant data using user ic 
  public function getStaffProfileInfo($account_Id) {

    // Prepare SQL statement with placeholders to prevent SQL injection
    $stmt = $this->connect->prepare('SELECT * FROM staff_info WHERE Account_Id = :id');
    $stmt->bindParam(':id', $account_Id);

    // Execute SQL statement
    $stmt->execute();

    //Store the result of user from mySQL
    $staffInfo = $stmt->fetch(PDO::FETCH_ASSOC);  

    return $staffInfo;
  }

  //Add initial applicant info
  public function addStaffInfo($name, $ic, $id, $email, $noTel, $typeOfStaff, $alamat) {
    
    $uniqid = uniqid();

    //Add SQL Query
    $query = $this->connect->prepare("
        INSERT INTO staff_info 
        (Staff_Id,
        Account_Id, 
        StaffName, 
        StaffAddress, 
        StaffNumberPhone,
        StaffEmail,
        StaffType
    ) VALUES (?, ?, ?, ?, ?, ?, ?)");

    //return to registration controller
    return $query->execute([$uniqid, $id, $name, $alamat, $noTel, $email, $typeOfStaff]);
  }
  
  //Get all staff data
  public function getAllStaffInfo() {

      // Prepare SQL statement with placeholders to prevent SQL injection
      $stmt = $this->connect->prepare('SELECT * FROM staff_info');

      // Execute SQL statement
      $stmt->execute();

      // Fetch all rows at once
      $staffDetailsList = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $staffDetailsList;
  }        
  
  //Update staff data using user ic 
  public function updateStaffProfileInfo($name, $email, $alamat, $noTel) {
     
    session_start();
    $id = $_SESSION['accountId'];

    // Prepare your update statement
    $sql = "UPDATE staff_info set 
                StaffName = :nama, 
                StaffAddress = :alamat, 
                StaffNumberPhone = :notel, 
                StaffEmail = :email
            WHERE Account_Id = :id";

    // Prepare the statement
    $stmt = $this->connect->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':nama', $name);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':notel', $noTel);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $id);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
          return true;

      } else {
      
          return false;
          
      }

  }

  //Applicant Search 
  public function getStaffSearchInfo($term) {

    // Prepare SQL statement with placeholders to prevent SQL injection
    $stmt = $this->connect->prepare("SELECT * FROM `staff_info` WHERE CONCAT (`Staff_Id`, `StaffName`, `StaffEmail`, `StaffType`, `Account_Id`) LIKE '%".$term."%'");

    // Execute SQL statement
    $stmt->execute();

    // Fetch all rows at once
    $staffDetailsList = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $staffDetailsList;
  }  
  
}

?>