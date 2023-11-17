
<?php
function create_connect()
{
    $serverName = "localhost";
    $userName = "phat";
    $password = "phat";
    $dbName = "cse454";
    return mysqli_connect($serverName, $userName, $password, $dbName);
}
?>





















