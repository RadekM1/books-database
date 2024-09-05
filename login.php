<?php
class DbConnect
{
    private $server = 'mysql80.r3.websupport.cz';
    private $dbname = 'eshop_vsb_test';
    private $user = 'eshop_vsb';
    private $pass = 'BMWm3white';  
    private $port = 3314;
    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    );

    public function connect()
    {
        try {

            $conn = new PDO(
                "mysql:host={$this->server};port={$this->port};dbname={$this->dbname}",
                $this->user,
                $this->pass,
                $this->options
            );
            return $conn;
        } catch (PDOException $e) {
            
            echo "Database Error: " . $e->getMessage();
            return null;
        }
    }
}


