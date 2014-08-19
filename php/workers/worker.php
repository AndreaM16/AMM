<?php
include 'config.php';
session_start();

if(isset($_GET['type']))
{
    $action = $_GET['type'];
    switch ($action)
    {
        case 0:
            header('Content-Type: application/json');
            $result = LoadItems("SELECT date_posted,title,link FROM news ORDER BY date_posted DESC LIMIT 5");
            echo($result);
            break;
        case 1:
            header('Content-Type: application/json');
            if($_SESSION['is_admin'] == 1) {
                $result = LoadItems("SELECT * FROM orders AS o, users AS u WHERE o.cliente_id=u.id");
            }
            else {
                $id = $_SESSION['id'];
                $result = LoadItems("SELECT * FROM orders WHERE cliente_id=$id");
            }
            echo($result);
            break;
        case 2:
            header('Content-Type: application/json');
            $result = LoadItems("SELECT * FROM users");
            echo($result);
            break;
        case 3:
            // Segna pagato
            $order_id = $_GET['id'];
            PerformQuery("");
            header('Location: homepage.php');
            break;
        case 4:
            // resetta pwd
            $user_id = $_GET['id'];
            PerformQuery("");
            header('Location: homepage.php');
            break;
        case 5:
            // fai admin
            $user_id = $_GET['id'];
            PerformQuery("");
            header('Location: homepage.php');
            break;
        case 6:
            // declass
            $user_id = $_GET['id'];
            PerformQuery("");
            header('Location: homepage.php');
            break;
    }
}
else
{
    header("HTTP/1.0 400 Bad Request");
}

function LoadItems($stringQuery) {
    global $host;
    global $usernameDB;
    global $passwordDB;
    global $db_name;
    
    $connection=mysqli_connect($host,$usernameDB,$passwordDB);
    if (!$connection){
        die("Database Connection Failed\n" . mysql_error());
    }
    
    $selecting = mysqli_select_db($connection,$db_name);
    if (!$selecting){
        die("Database Selection Failed\n" . mysql_error());
    }

    $result = mysqli_query($connection,$stringQuery) or die(mysql_error());
    mysqli_close($connection);
    
    $output = array();
    while($row = mysqli_fetch_assoc($result)){
        $output[] = $row;
    }
    
    $json = json_encode($output);
    return $json;
}

function PerformQuery($queryString) {
    global $host;
    global $usernameDB;
    global $passwordDB;
    global $db_name;
    
    $connection=mysqli_connect($host,$usernameDB,$passwordDB);
    if (!$connection){
        die("Database Connection Failed\n" . mysql_error());
    }
    
    $selecting = mysqli_select_db($connection,$db_name);
    if (!$selecting){
        die("Database Selection Failed\n" . mysql_error());
    }

    $result = mysqli_query($connection,$queryString) or die(mysql_error());
    mysqli_close($connection);
    
    return $result;
}