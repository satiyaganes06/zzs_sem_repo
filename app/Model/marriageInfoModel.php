<?php
class MarriageInfoModel {

  private $connect;

  //Registration controller's constructor
  public function __construct($database) {
    $this->connect = $database;
  
  }
    //Add initial marriage info
    public function registerWithApproval( $marriageId, $waliIC, $witnessIC) {

      //Add SQL Query
      $query = $this->connect->prepare("
          INSERT INTO marriage_info
          (Marriage_Id,
          Wali_IC,
          Witness_IC
      ) VALUES (?,?,?)");
  
      //return to marriage registration controller
      return $query->execute([ $marriageId, $waliIC, $witnessIC]);
    }

    //Update marriage info using marriage id 
  public function updateApplicantMarriageRegistrationDetail($marriageId, $waliIC, $witnessIC, $requestDate, $marriageDate, $marriageAddress, $dowryType, $dowry, $gift, $marriageCertificateNo) {
     
    session_start();
    
    
    // Prepare your update statement
    $sql = "UPDATE marriage_info set 
                Wali_IC =:waliIC
                Witness_IC =:witnessIC
                RequestDate =:requestDate
                MarriageDate =:marriageDate
                MarriageAddress =:marriageAddress
                DowryType =:dowryType
                Dowry =:dowry
                Gift =:gift
                MarriageCertificateNo =:marriageCertificateNo
            WHERE marriage_Id = :marriageId";

    // Prepare the statement
    $stmt = $this->connect->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':marriageId', $marriageId);
    $stmt->bindParam(':waliIC', $waliIC);
    $stmt->bindParam(':witnessIC', $witnessIC);
    $stmt->bindParam(':requestDate', $requestDate);
    $stmt->bindParam(':marriageDate', $marriageDate);
    $stmt->bindParam(':marriageAdress', $marriageAddress);
    $stmt->bindParam(':dowryType', $dowryType);
    $stmt->bindParam(':dowry', $dowry);
    $stmt->bindParam(':gift', $gift);
    $stmt->bindParam(':marriageCertificateNo', $marriageCertificateNo);
    

    // Execute the statement
    if ($stmt->execute() === TRUE) {
          return true;

      } else {
      
          return false;
          
      }

  }

  public function getMarriageInfoData($marriageId){

    // Prepare SQL statement with placeholders to prevent SQL injection
    $stmt = $this->connect->prepare("SELECT * FROM marriage_info WHERE Marriage_Id  = '$marriageId'");
    

    // Execute SQL statement
    $stmt->execute();

    //Store the result of user from mySQL
    $marriageInfo = $stmt->fetch(PDO::FETCH_ASSOC);



    return $marriageInfo;
    
}
}