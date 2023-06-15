<?php
class IncentiveDocModel
{

    private $connect;

    //Registration controller's constructor
    public function __construct($database)
    {
        $this->connect = $database;
    }

    //Add the incentive doc info of the applicant
    public function addIncentiveDoc($doc) {
            
            session_start();
            $userIC = $_SESSION['currentUserIC'];
    
            //Prepare update statement
            $query = $this->connect->prepare("INSERT INTO incentive_doc (Applicant_IC, Doc) VALUES (?, ?)");
            
            //Execute update statement
            $query->execute([$userIC, $doc]);
    
            header("Location: ../../../public/index.php?action=specialIncentiveApplication");
    }

}
