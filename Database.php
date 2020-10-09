<?php

class Database
{

    public function __construct()
    {}
    
    function getConnect()
    {
        $conn = new mysqli("localhost", "root", "root", "activity2");
        if ($conn->connect_error)
        {
            die( "Connection failed: " . $conn->connect_error);
            return false;
        }
        else return $conn;
    }
}

