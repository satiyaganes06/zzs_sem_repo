<?php
class AccountModel {

  private $connect;

  //Registration controller's constructor
  public function __construct($database) {
    $this->connect = $database;
  }

  //This function will create new account in mySQL database
  public function createAccount($userIC, $userType, $userPassword) {
    $uniqid = uniqid();
    $query = $this->connect->prepare("INSERT INTO Account_Info (Account_Id, User_IC, UserPassword, UserType) VALUES (?, ?, ?, ?)");
    $query->execute([$uniqid, $userIC, $userPassword, $userType]);


    //return account id to registration controller
    return $uniqid;
  }

  //This function will login account using mySQL database
  public function loginAccount($userIC, $password) {
    
    // Prepare SQL statement with placeholders to prevent SQL injection
    $stmt = $this->connect->prepare("SELECT * FROM Account_Info WHERE User_IC = :ic");
    $stmt->bindParam(":ic", $userIC);
    
    // Execute SQL statement
    $stmt->execute();
    
    // Fetch user from result set
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Verify password
    if ($user && password_verify($password, $user['UserPassword'])) {
      // Password is correct, start session
      session_start();
      $_SESSION['accountId'] = $user['Account_Id'];
      $_SESSION['userIc'] = $user['User_IC'];
      $_SESSION['currentUser'] = $user['User_IC'];
      
      return true;
      
    } else {
        // Password is incorrect or user not found
        return false;
    }
  }

 
}

?>