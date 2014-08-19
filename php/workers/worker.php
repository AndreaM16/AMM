<?php
include 'config.php';

if(isset($_GET['type']))
{
    $action = $_GET['type'];
    switch ($action)
    {
        case 0:
            header('Content-Type: application/json');
            $result = LoadNews();
            echo($result);
            break;
    }
}
else
{
    header("HTTP/1.0 400 Bad Request");
}

function LoadNews() {
    global $host;
    global $usernameDB;
    global $passwordDB;
    global $db_name;
    
    // Create connection
    $connection=mysqli_connect($host,$usernameDB,$passwordDB);
    if (!$connection){
        die("Database Connection Failed\n" . mysql_error());
    }
    
    $selecting = mysqli_select_db($connection,$db_name);
    if (!$selecting){
        die("Database Selection Failed\n" . mysql_error());
    }

    $query = "SELECT * FROM news";
    $result = mysqli_query($connection,$query) or die(mysql_error());
    mysqli_close($connection);
    $newsArray = mysqli_fetch_array($result);
    $json = json_encode($newsArray);
    return $json;
}