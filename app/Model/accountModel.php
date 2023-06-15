<?php
class AccountModel {

  private $connect;

  //Registration controller's constructor
  public function __construct($database) {
    $this->connect = $database;
  }

  //Get user account data using user account_Id 
  public function getAccountInfo($account_id) {

    // Prepare SQL statement with placeholders to prevent SQL injection
    $stmt = $this->connect->prepare('SELECT User_IC, UserType FROM account_info WHERE Account_Id = :id');
    $stmt->bindParam(':id', $account_id);

    // Execute SQL statement
    $stmt->execute();

    //Store the result of user from mySQL
    $acountInfo = $stmt->fetch(PDO::FETCH_ASSOC);  

    return $acountInfo;
  }

  //Get user account data using user account_Id 
  public function checkUserExistByIc($ic) {

    // Prepare SQL statement with placeholders to prevent SQL injection
    $stmt = $this->connect->prepare('SELECT * FROM account_info WHERE User_IC = :ic');
    $stmt->bindParam(':ic', $ic);

    // Execute SQL statement
    $stmt->execute();

    //Store the result of user from mySQL
    $acountInfo = $stmt->fetch(PDO::FETCH_ASSOC);  

    return $acountInfo;
    
  }

  //This function will create new account in mySQL database
  public function createAccount($userIC, $userType, $userPassword) {
    $uniqid = uniqid();
    $query = $this->connect->prepare("INSERT INTO account_info (Account_Id, User_IC, UserPassword, UserType) VALUES (?, ?, ?, ?)");
    $query->execute([$uniqid, $userIC, $userPassword, $userType]);


    //return account id to registration controller
    return $uniqid;
  }

  //This function will login staff and applicant account using mySQL database
  public function loginAccount($userIC, $password, $userType) {
    
    // Prepare SQL statement with placeholders to prevent SQL injection
    $stmt = $this->connect->prepare("SELECT * FROM account_info WHERE UserType = :userType AND User_IC = :ic");
    $stmt->bindParam(":userType", $userType);
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
      $_SESSION['currentUserIC'] = $user['User_IC'];
      $_SESSION['currentUserType'] = $user['UserType'];
      return true;
      
    } else {
        // Password is incorrect or user not found
        return false;
    }
  }

  //This function will login account for admin using mySQL database
  public function adminLoginAccount($id, $password) {
    
    // Prepare SQL statement with placeholders to prevent SQL injection
    $stmt = $this->connect->prepare("SELECT * FROM account_Info WHERE account_Id = :id");
    $stmt->bindParam(":id", $id);
    
    // Execute SQL statement
    $stmt->execute();
    
    // Fetch user from result set
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Verify password
    if ($user && password_verify($password, $user['UserPassword'])) {
      // Password is correct, start session
      session_start();
      $_SESSION['accountId'] = $user['Account_Id'];
      $_SESSION['currentUserIC'] = $user['User_IC'];
      $_SESSION['currentUserType'] = $user['UserType'];
      
      return true;
      
    } else {
        // Password is incorrect or user not found
        return false;
    }
  }

  public function storeOTP($otpCode, $ic){

      // Prepare your update statement
      $sql = "UPDATE account_info set 
          otp = :otpCode
      WHERE User_Ic = :ic";

      // Prepare the statement
      $stmt = $this->connect->prepare($sql);

      // Bind parameters
      $stmt->bindParam(':otpCode', $otpCode);
      $stmt->bindParam(':ic', $ic);

      // Execute the statement
      if ($stmt->execute() === TRUE) {
        return true;

      } else {

        return false;

      }
  }

  public function resetToNewPassword($hashed_password, $ic){

    // Prepare your update statement
    $sql = "UPDATE account_info set 
        UserPassword = :newpass
    WHERE User_Ic = :ic";

    // Prepare the statement
    $stmt = $this->connect->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':newpass', $hashed_password);
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