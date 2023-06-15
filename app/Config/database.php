<!-- Create a connect to SQL Server -->

<?php
class Database {

    private $host = "localhost";
    private $db_name = "zzs_db";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    
    public function connect() {
        $conn = null;
        try {
            $conn = new PDO("mysql:host=" . $this->host . ";port=" . $this->port .";dbname=" . $this->db_name, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $exception) {

            //Error Message
            echo "Connection error: " . $exception->getMessage();
        }
        return $conn;
    }
}
