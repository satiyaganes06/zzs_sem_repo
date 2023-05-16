<?php
class StaffModel {

  private $connect;

  //Registration controller's constructor
  public function __construct($database) {
    $this->connect = $database;
  }

  //Get applicant data using user ic 
  public function getStaffProfileInfo($staff_Id) {

    // Prepare SQL statement with placeholders to prevent SQL injection
    $stmt = $this->connect->prepare('SELECT * FROM Staff_Info WHERE Account_Id = :id');
    $stmt->bindParam(':id', $staff_Id);

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
        INSERT INTO Staff_Info 
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
      $stmt = $this->connect->prepare('SELECT * FROM Staff_Info');

      // Execute SQL statement
      $stmt->execute();

      // Fetch all rows at once
      $staffDetailsList = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $staffDetailsList;
  }         
}

?>