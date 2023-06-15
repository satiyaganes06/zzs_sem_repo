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

}
?>