<?php
class MarriageDocModel
{

    private $connect;

    //Registration controller's constructor
    public function __construct($database)
    {
        $this->connect = $database;
    }
   
    //insert file
    public function insertWithApprovalDoc($marriageId, $docId, $docLink){

        $query = $this->connect->prepare("
        INSERT INTO marriage_doc
        (Marriage_Id,
        Doc_id,
        DocLink
    ) VALUES (?,?,?)");
    return $query->execute([ $marriageId, $docId, $docLink]);
    }
}
?>