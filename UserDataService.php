<?php
require "Database.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class UserDataService
{
    
    // echo "<pre>";
    // print_r($conn);
    // echo "</pre>";

    public function __construct()
    {}
    
    private function runSQL($sql)
    {
        // Creates a connection to the database
        $conn = new DataBase();
        if ($conn) {
            $result = mysqli_query($conn->getConnect(), $sql);
            
            $users = array();
            $index = 0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $users[$index] = array(
                        $row['id'],
                        $row['first_name'],
                        $row['last_name']
                    );
                    $index ++;
                }
            }
            return $users;
        } else
            echo $conn->connect_error;
            return false;
    }

    public function findByFirstName($lastName)
    {
        // Runs the script from the search page
        // Name for the search paramaters in HTML method is misleading
        $sql = "SELECT * FROM users WHERE `first_name` LIKE '%$lastName%'";
        $this->runSQL($sql);
    }
    
    public function findByLastName($lastName)
    {
        $sql = "SELECT * FROM users WHERE 'last_name' LIKE '%$lastName%'";
        $this->runSQL($sql);
    }
    
    public function findByFullName($firstName, $lastName)
    {
       $sql = "SELECT * FROM users WHERE 'first_name' LIKE '%$firstName%' OR 'last_name' LIKE '$lastName'"; 
       $this->runSQL($sql);
    }
}