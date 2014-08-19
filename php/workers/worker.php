<?php
include 'config.php';
session_start();
$action = 9;

if(isset($_GET['type']))
{
    $action = $_GET['type'];
}elseif (isset($_POST['type'])) {
    $action = $_POST['type'];
}
else {
    header("HTTP/1.0 400 Bad Request");
}

switch ($action)
{
    case 0:
        // Carica news
        header('Content-Type: application/json');
        $result = LoadItems("SELECT date_posted,title,link FROM news ORDER BY date_posted DESC LIMIT 5");
        unset($_GET['type']);
        echo($result);
        break;
    case 1:
        header('Content-Type: application/json');
        if($_SESSION['is_admin'] == 1) {
            // Carica ordini admin
            $result = LoadItems("SELECT * FROM orders AS o, users AS u WHERE o.cliente_id=u.id");
        }
        else {
            // Carica ordini utente
            $id = $_SESSION['id'];
            $result = LoadItems("SELECT * FROM orders WHERE cliente_id=$id");
        }
        unset($_GET['type']);
        echo($result);
        break;
    case 2:
        // Carica utenti
        header('Content-Type: application/json');
        $result = LoadItems("SELECT * FROM users");
        echo($result);
        break;
    case 3:
        // Segna pagato
        $order_id = $_GET['id'];
        $output = PerformQuery("UPDATE `orders` SET status = 1 WHERE order_id=$order_id");
        if ($output) {
            header('Location: ../homepage.php');
        } else {
            header("HTTP/1.0 400 Bad Request");
        }
        unset($_GET['type']);
        unset($_GET['id']);
        break;
    case 4:
        // resetta pwd
        $user_id = $_GET['id'];
        $output = PerformQuery("UPDATE `users` SET pwd = 'temp' WHERE id=$user_id");
        if ($output) {
            unset($_GET['type']);
            unset($_GET['id']);
            header('Location: ../homepage.php');
        } else {
            unset($_GET['type']);
            unset($_GET['id']);
            header("HTTP/1.0 400 Bad Request");
        }
        break;
    case 5:
        // fai admin
        $user_id = $_GET['id'];
        $output = PerformQuery("UPDATE `users` SET is_admin = 1 WHERE id=$user_id");
        $_SESSION['is_admin'] = 1;
        if ($output) {
            unset($_GET['type']);
            unset($_GET['id']);
            header('Location: ../homepage.php');
        } else {
            unset($_GET['type']);
            unset($_GET['id']);
            header("HTTP/1.0 400 Bad Request");
        }
        break;
    case 6:
        // declass
        $user_id = $_GET['id'];
        $output = PerformQuery("UPDATE `users` SET is_admin = 0 WHERE id=$user_id");
        $_SESSION['is_admin'] = 0;
        if ($output) {
            unset($_GET['type']);
            unset($_GET['id']);
            header('Location: ../homepage.php');
        } else {
            unset($_GET['type']);
            unset($_GET['id']);
            header("HTTP/1.0 400 Bad Request");
        }
        break;
    case 7:
        $title = $_POST['title'];
        $link = $_POST['link'];
        $output = PerformQuery("INSERT INTO `news`(`date_posted`, `title`, `link`) VALUES (NOW(),'$title','$link')");
        if ($output) {
            unset($_POST['type']);
            unset($_POST['title']);
            unset($_POST['link']);
            header('Location: ../homepage.php');
        } else {
            unset($_POST['type']);
            unset($_POST['type']);
            unset($_POST['title']);
            unset($_POST['link']);
            header("HTTP/1.0 400 Bad Request");
        }
        break;
    case 8:
        // add user
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $role = $_POST['role'];

        $output = PerformQuery("INSERT INTO `users`(`name`, `picture_url`, `surname`, `username`, `pwd`, `role`) VALUES ('$name','user.png','$surname','$user','$pass','$role')");
        if ($output) {
            unset($_POST['name']);
            unset($_POST['surname']);
            unset($_POST['username']);
            unset($_POST['password']);
            unset($_POST['role']);
            header('Location: ../homepage.php');
        } else {
            unset($_POST['name']);
            unset($_POST['surname']);
            unset($_POST['username']);
            unset($_POST['password']);
            unset($_POST['role']);
            header("HTTP/1.0 400 Bad Request");
        }
        break;
    case 9:
        // nuovo ordine
        break;
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