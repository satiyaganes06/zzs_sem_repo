<?php
class WaliModel {

  private $connect;

  //Registration controller's constructor
  public function __construct($database) {
    $this->connect = $database;
  }
//Update marriage info using marriage id 
public function insertWaliInfo($waliIc, $waliAddress, $waliBirthDate, $waliAge, $waliName, $relation, $waliNumberPhone) {
     
    session_start();
    

    // Prepare your update statement
    $sql = "UPDATE wali_info set 
                WaliName =:waliName
                WaliAddress =:waliAddress
                WaliBirthDate =:waliBirthDate
                WaliAge =:waliAge
                WaliNumberPhone =:waliNumberPhone
                
            WHERE Wali_IC = :waliIc";

    // Prepare the statement
    $stmt = $this->connect->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':waliAddress', $waliAddress);
    $stmt->bindParam(':waliBirthDate', $waliBirthDate);
    $stmt->bindParam(':waliAge', $waliAge);
    $stmt->bindParam(':waliName', $waliName);
    $stmt->bindParam(':relation', $relation);
    $stmt->bindParam(':waliNumberPhone', $waliNumberPhone);
    $stmt->bindParam(':waliIc', $waliIc);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
          return true;

      } else {
      
          return false;
          
      }

}
}
?>