<?php
class MarriageCourseApplicationModel
{

    private $connect;

    //Registration controller's constructor
    public function __construct($database)
    {
        $this->connect = $database;
    }

    public function getListOfApplicantMPC()
    {

        // Prepare SQL statement with placeholders to prevent SQL injection
        $stmt = $this->connect->prepare('SELECT * FROM marriage_course_application ORDER BY RequestDate');

        // Execute SQL statement
        $stmt->execute();

        //Store the result of user from mySQL
        $MPCApplicantinfo = $stmt->fetch(PDO::FETCH_ASSOC);

        return $MPCApplicantinfo;
    }
}
?>