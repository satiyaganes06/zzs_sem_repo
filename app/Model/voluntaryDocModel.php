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
        
        try {
            $stmt = $this->connect->prepare("SELECT DocLink FROM voluntary_doc WHERE Doc_id = $docId");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $existingValue = $row['DocLink'];
        } catch (PDOException $e) {
            echo "Error retrieving attribute: " . $e->getMessage();
        }
        
        if ($existingValue) {
            // Get the newly uploaded files
            $newFiles = $_FILES['files']['name'];
        
            // Combine the existing value and new files
            $combinedValue = $existingValue . "," . implode(",", $newFiles);
        
            // Update the attribute with the combined value in the database
            $updateQuery = "UPDATE voluntary_doc SET DocLink = :combinedValue WHERE id = 1";
        
            try {
                $updateStmt = $this->connect->prepare($updateQuery);
                $updateStmt->bindParam(':combinedValue', $combinedValue);
                return $updateStmt->execute();

            } catch (PDOException $e) {
                echo "Error retrieving attribute: " . $e->getMessage();
            }
        }

        

}
}

