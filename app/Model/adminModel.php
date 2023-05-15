<?php
class AdminModel {

  private $connect;

  //Registration controller's constructor
  public function __construct($database) {
    $this->connect = $database;
  }


  //Get admin data using user ic 
  public function getAdminProfileInfo($id) {

    // Prepare SQL statement with placeholders to prevent SQL injection
    $stmt = $this->connect->prepare('SELECT * FROM Admin_Info WHERE Account_Id = :id');
    $stmt->bindParam(':id', $id);

    // Execute SQL statement
    $stmt->execute();

    //Store the result of user from mySQL
    $userinfo = $stmt->fetch(PDO::FETCH_ASSOC);  

    return $userinfo;
  }

  //Update applicant data using user ic 
  public function updateAdminProfileInfo($nama, $email, $alamat, $noTel) {
     
    session_start();
    $id = $_SESSION['accountId'];

    // Prepare your update statement
    $sql = "UPDATE Admin_Info set 
                AdminName = :nama, 
                AdminEmail = :email, 
                AdminAddress = :alamat, 
                AdminNumberPhone = :noTel 
            WHERE Account_Id = :id";

    // Prepare the statement
    $stmt = $this->connect->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':noTel', $noTel);
    $stmt->bindParam(':id', $id);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
          return true;

      } else {
      
          return false;
          
      }

    
      
  }
  
}

?>