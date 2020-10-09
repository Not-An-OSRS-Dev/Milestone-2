<?php

require 'UserBusinessService.php';

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$useFirstName = isset($_POST['isFirstName']);
$useLastName = isset($_POST['isLastName']);

$businessService = new UserBusinessService();

if (!$useFirstName || !isset($firstName))
{
    $useLastName=false;
}
if (!$useLastName || !isset($lastName))
{
    $useFirstName=false;
}

if ($useFirstName && $useLastName)
{
    $users = $businessService->searchByFullName($firstName, $lastName);
}
else 
{
    if ($useFirstName)
    {
        $users = $businessService->searchByFirstName($firstName);
    }
    else if ($useLastName)
    {
        $users = $businessService->searchByLastName($lastName);
    }
    else echo "None of the sql functions were run";
}

if ($users!=null)
{
    $_POST['users'] = $users;
    include 'displayAllUsers.php';
}
else echo "no users were found with that pattern in their name";


?>