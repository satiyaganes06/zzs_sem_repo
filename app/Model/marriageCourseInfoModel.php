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
        } else {
            $stmt = $this->connect->prepare('SELECT * FROM marriage_course_info WHERE organize = :organize');
            $stmt->bindParam(':organize', $organize);
        }

        // Execute SQL statement
        $stmt->execute();

        //Store the result of user from mySQL
        $listOfMPC = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $listOfMPC;
    }

    public function getMPCInfo($marriageCourseID)
    {

        $stmt = $this->connect->prepare('SELECT * FROM marriage_course_info WHERE Marriage_Course_Id  = :marriageCourseID');
        $stmt->bindParam(':marriageCourseID', $marriageCourseID);

        // Execute SQL statement
        $stmt->execute();

        //Store the result of user from mySQL
        $MPCInfo = $stmt->fetch(PDO::FETCH_ASSOC);

        return $MPCInfo;
    }

    public function insertMPCView($organize, $DateStart, $DateFinish, $Venue, $TimeStart, $TimeFinish, $StaffName, $StaffPhoneNumber, $Capacity, $Notes)
    {

        $sql = 'INSERT INTO marriage_course_info (Organize, Venue, DateStart, DateFinish, TimeStart, TimeFinish, StaffName, StaffPhoneNumber, Notes, Capacity, Vacancy) 
        VALUES (:organize, :Venue, :DateStart, :DateFinish, :TimeStart, :TimeFinish, :StaffName, :StaffPhoneNumber, :Notes, :Capacity, :Vacancy)';

        // Prepare the statement
        $stmt = $this->connect->prepare($sql);

        $Vacancy = 0;

        $stmt->bindParam(':organize', $organize);
        $stmt->bindParam(':DateStart', $DateStart);
        $stmt->bindParam(':DateFinish', $DateFinish);
        $stmt->bindParam(':Venue', $Venue);
        $stmt->bindParam(':TimeStart', $TimeStart);
        $stmt->bindParam(':TimeFinish', $TimeFinish);
        $stmt->bindParam(':StaffName', $StaffName);
        $stmt->bindParam(':StaffPhoneNumber', $StaffPhoneNumber);
        $stmt->bindParam(':Notes', $Notes);
        $stmt->bindParam(':Capacity', $Capacity);
        $stmt->bindParam(':Vacancy', $Vacancy);

        // Execute SQL statement
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateMPCView($marriageID)
    {

        $stmt = $this->connect->prepare('UPDATE marriage_course_info 
            SET Organize = :organize, 
            DateStart = :dateStart, 
            DateFinish = :dateFinish, 
            TimeStart = :timeStart, 
            TimeFinish = :timeFinish, 
            Venue = :venue, 
            StaffName = :staffName, 
            StaffPhoneNumber = :staffPhoneNumber, 
            Notes = :notes 
            WHERE Marriage_Course_Id  = :marriageID');

        $stmt->bindParam(':marriageID', $marriageID);
        $stmt->bindParam(':organize', $_POST['organize']);
        $stmt->bindParam(':dateStart', $_POST['dateStart']);
        $stmt->bindParam(':dateFinish', $_POST['dateFinish']);
        $stmt->bindParam(':timeStart', $_POST['timeStart']);
        $stmt->bindParam(':timeFinish', $_POST['timeFinish']);
        $stmt->bindParam(':venue', $_POST['venue']);
        $stmt->bindParam(':staffName', $_POST['staffName']);
        $stmt->bindParam(':staffPhoneNumber', $_POST['staffPhoneNumber']);
        $stmt->bindParam(':notes', $_POST['notes']);

        // Execute SQL statement
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
