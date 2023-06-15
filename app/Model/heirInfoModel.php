<?php
class HeirInfoModel
{

    private $connect;

    //Registration controller's constructor
    public function __construct($database)
    {
        $this->connect = $database;
    }

    //Add the heir info of the applicant
    public function addHeir($heirName, $heirRelationship, $heirPhoneNo, $heirEmail) {

        session_start();
        $userIC = $_SESSION['currentUserIC'];

        //Prepare update statement
        $query = $this->connect->prepare("INSERT INTO heir_info (Applicant_IC, HeirName, HeirRelationship, HeirPhoneNo, HeirEmail) VALUES (?, ?, ?, ?, ?)");
        
        //Execute update statement
        $query->execute([$userIC, $heirName, $heirRelationship, $heirPhoneNo, $heirEmail]);

        header("Location: ../../../public/index.php?action=specialIncentiveApplication");
    }

    //Retrieve heir info of the applicant
    public function getHeirInfo() {

        $userIC = $_SESSION['currentUserIC'];

        // Prepare SQL statement with placeholders to prevent SQL injection
        $stmt = $this->connect->prepare('SELECT * FROM heir_info WHERE Applicant_IC = :ic');
        $stmt->bindParam(':ic', $userIC);

        // Execute SQL statement
        $stmt->execute();

        //Store the result of user from mySQL
        $heirInfo = $stmt->fetch(PDO::FETCH_ASSOC);  

        return $heirInfo;
    }

}
?>