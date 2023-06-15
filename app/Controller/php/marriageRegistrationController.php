<?php

class marriageRegistrationController {
  private $accountModel;
  private $applicantModel;
  private $staffModel;
  private $marriageInfoModel;
  private $waliModel;
  private $marriageDocModel;
  //Registration controller's constructor
  public function __construct($accountModel, $applicantModel, $staffModel, $marriageInfoModel, $waliModel, $marriageDocModel) {
    $this->accountModel = $accountModel;
    $this->applicantModel = $applicantModel;
    $this->staffModel = $staffModel;
    $this->marriageInfoModel = $marriageInfoModel;
    $this->waliModel = $waliModel;
    $this->marriageDocModel = $marriageDocModel;
  }

  public function marriageRegistrationWithApproval($marriageId, $waliIC, $witnessIC) {

    $this->marriageInfoModel->registerWithApproval($marriageId, $waliIC, $witnessIC );
    
    session_start();
    

    ?>
        <script>
              
            window.location = "../app/View/MarriageRegistration/marriageRegistrationUpdateView.php";
            
        </script>
    <?php

}
public function updateMarriageInfo($marriageId, $waliIC, $witnessIC, $requestDate, $marriageDate, $marriageAddress, $dowryType, $dowry, $gift) {

  $this->marriageInfoModel->updateMarriageInfoWithApproval($marriageId, $waliIC, $witnessIC, $requestDate, $marriageDate, $marriageAddress, $dowryType, $dowry, $gift );
  
  session_start();
  

  ?>
      <script>
          return true;
      </script>
  <?php

}
public function insertWaliInfo($waliIc, $waliAddress, $waliBirthDate, $waliAge, $waliName, $relation, $waliNumberPhone){
  $this->waliModel->updateWaliInfo($waliIc, $waliAddress, $waliBirthDate, $waliAge, $waliName, $relation, $waliNumberPhone);
  
  session_start();

  ?>
      <script>
          window.location = "../app/View/MarriageRegistration/marriageFileUpload1View.php";
      </script>
  <?php
}
public function uploadFileWithApproval($marriageId, $docId, $combinedContent){
  $this->marriageDocModel->insertWithApprovalDoc($marriageId, $docId, $combinedContent);

  session_start();
  ?>
      <script>
          window.location = "../app/View/MarriageRegistration/marriageRegistrationStatusView.php";
      </script>
  <?php
}

}