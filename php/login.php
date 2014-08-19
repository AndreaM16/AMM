<?php
include_once 'workers/config.php';

if(isset($_GET['logout']))
{
    session_start();
    session_destroy();
    header("Location: index.php");
}

if (isset($_POST['username']) and isset($_POST['pass']))
{
    $username = $_POST['username'];
    $password = $_POST['pass'];
    
    // Create connection
    $connection=mysqli_connect($host,$usernameDB,$passwordDB);
    if (!$connection){
        die("Database Connection Failed\n" . mysql_error());
    }
    
    $selecting = mysqli_select_db($connection,$db_name);
    if (!$selecting){
        die("Database Selection Failed\n" . mysql_error());
    }

    $query = "SELECT * FROM users WHERE username='$username' and pwd='$password'";
    $result = mysqli_query($connection,$query) or die(mysql_error());
    $count = mysqli_num_rows($result);
    mysqli_close($connection);

    if ($count == 1)
    {
        $data = mysqli_fetch_row($result);
        session_start();
        
        // Saving user info
        $_SESSION['id'] = $data[0];
        $_SESSION['name'] = $data[1];
        $_SESSION['picture'] = $data[2];
        $_SESSION['surname'] = $data[3];
        $_SESSION['username'] = $data[4];
        $_SESSION['is_admin'] = $data[6];
        $_SESSION['role'] = $data[7];
        
        session_write_close();
        header("Location: homepage.php"); 
    }
    else
    {
        echo("Invalid Login Credentials.\n");
    }
}
else
{
    echo("Error fetching POST params\n");
}