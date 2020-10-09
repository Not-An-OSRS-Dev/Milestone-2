<?php

$users = $_POST['users'];

echo "<ol> \n";

for ($index = 0; $index < count($users); $index++)
{
    foreach (array($users[$index]) as $item)
    {
            echo "<li> $item[0] \t $item[1] \t $item[2] </li><br> \n";
    }
}

echo "</ol>";