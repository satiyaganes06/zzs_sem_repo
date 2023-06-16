<?php
class SpecialIncentiveModel
{

    private $connect;

    //Registration controller's constructor
    public function __construct($database)
    {
        $this->connect = $database;
    }

    public function getAllSpecialIncentiveInfo(){
        $stmt = $this->connect->prepare('SELECT * FROM special_incentive_info');
        $stmt->execute();
        $specialIncentiveList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $specialIncentiveList;
    }

    public function addRejection($rejectionReason) {

        session_start();
        $userIC = $_SESSION['currentUserIC'];

        //Prepare update statement
        $query = $this->connect->prepare("INSERT INTO special_incentive_info (Applicant_IC, RejectionReason) VALUES (?, ?)");

        //Execute update statement
        $query->execute([$userIC, $rejectionReason]);

        header("Location: ../../../public/index.php?action=specialIncentiveApplication");
    }

}
?>