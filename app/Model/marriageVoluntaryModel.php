<?php
class MarriageVoluntaryModel
{

    private $connect;

    //Registration controller's constructor
    public function __construct($database)
    {
        $this->connect = $database;
    }
    
    public function registerVoluntary($voluntaryId, $ApplicantIC){
        $query = $this->connect->prepare("
          INSERT INTO marriage_voluntary_info
          (Voluntary_id,
          Applicant_IC
      ) VALUES (?,?)");
  
      //return to marriage registration controller
      return $query->execute([ $voluntaryId, $ApplicantIC]);
    }
}
?>