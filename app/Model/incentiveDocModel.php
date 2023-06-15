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
    public function addIncentiveDoc($doc)
    {

        session_start();
        $userIC = $_SESSION['currentUserIC'];

        //Prepare update statement
        $query = $this->connect->prepare("INSERT INTO incentive_doc (Applicant_IC, Doc) VALUES (?, ?)");

        //Execute update statement
        $query->execute([$userIC, $doc]);

        header("Location: ../../../public/index.php?action=specialIncentiveApplication");
    }

    public function getIncentiveDoc()
    {

        $userIC = $_SESSION['currentUserIC'];

        // Prepare SQL statement with placeholders to prevent SQL injection
        $stmt = $this->connect->prepare('SELECT * FROM incentive_doc WHERE Applicant_IC = :ic');
        $stmt->bindParam(':ic', $userIC);

        // Execute SQL statement
        $stmt->execute();

        //Store the result of user from mySQL
        $heirInfo = $stmt->fetch(PDO::FETCH_ASSOC);

        //return $incentiveDocInfo;
    }
}
