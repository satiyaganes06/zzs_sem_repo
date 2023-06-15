<?php
class PaymentModel
{

    private $connect;

    //Registration controller's constructor
    public function __construct($database)
    {
        $this->connect = $database;
    }

    public function uploadPayment($typeOfFee, $applicantIC)
    {
        // Prepare SQL statement with placeholders to prevent SQL injection
        // $stmt = $this->connect->prepare("INSERT INTO paymentdetails(Applicat_IC, TypeOfFee)
        //                                 VALUES ('$applicantIC', '$typeOfFee')");

        // Prepare the SQL statement
        $stmt = $this->connect->prepare("INSERT INTO your_table (Applicat_IC, TypeOfFee) VALUES (:ApplicantIC, :JenisPembayaran)");

        // Bind the values to the prepared statement
        $stmt->bindParam(':ApplicantIC', $applicantIC);
        $stmt->bindParam(':JenisPembayaran', $typeOfFee);

        // Execute SQL statement
        if ($stmt->execute() === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
