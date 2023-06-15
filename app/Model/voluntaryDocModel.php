<?php
class VoluntaryDocModel
{

    private $connect;

    //Registration controller's constructor
    public function __construct($database)
    {
        $this->connect = $database;
    }
    
    public function uploadVoluntaryDoc($voluntaryId, $voluntaryFile, $docId){
        $query = $this->connect->prepare("
          INSERT INTO voluntary_doc
          (Voluntary_id,
          Doc_id,
          DocLink
      ) VALUES (?,?,?)");
  
      //return to marriage registration controller
      return $query->execute([ $voluntaryId, $voluntaryFile, $docId]);
    }

    public function uploadFileVoluntary($voluntaryId, $docId, $combinedContent){
        $query = "SELECT DocLink FROM voluntary_doc WHERE Doc_id = $docId";
        


        
}
}