<?php

require 'UserDataService.php';

class UserBusinessService
{
    public function __construct()
    {
        
    }
    
    public function searchByFirstName($pattern)
    {
        $UserDataService = new UserDataService();
        return $UserDataService->findByFirstName($pattern);
        
        
    }
}