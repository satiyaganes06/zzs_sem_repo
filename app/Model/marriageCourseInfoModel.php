<?php
class MarriageCourseInfoModel
{

    private $connect;

    //Registration controller's constructor
    public function __construct($database)
    {
        $this->connect = $database;
    }

    //get list of MPC
    public function getListOfMPC($organize)
    {

        // Prepare SQL statement with placeholders to prevent SQL injection
        if ($organize == 'all') {
            $stmt = $this->connect->prepare('SELECT * FROM marriage_course_info');
        }
        else{
            $stmt = $this->connect->prepare('SELECT * FROM marriage_course_info WHERE organize = :organize');
            $stmt->bindParam(':organize', $organize);
        }
        
        // Execute SQL statement
        $stmt->execute();

        //Store the result of user from mySQL
        $listOfMPC = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $listOfMPC;
    }

    public function getMPCInfo($marriageCourseID){

        $stmt = $this->connect->prepare('SELECT * FROM marriage_course_info WHERE Marriage_Course_Id  = :marriageCourseID');
        $stmt->bindParam(':marriageCourseID', $marriageCourseID);

        // Execute SQL statement
        $stmt->execute();

        //Store the result of user from mySQL
        $MPCInfo = $stmt->fetch(PDO::FETCH_ASSOC);

        return $MPCInfo;

    }
}
