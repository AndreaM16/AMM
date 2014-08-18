<?php
$usernameDB = "lelliGiancarlo";
$passwordDB = "anatra176";
$host = "localhost";
$db_name = "amm14_lelliGiancarlo";

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

    $query = "SELECT * FROM 'users' WHERE username='$username' and pwd='$password'";
    echo($query);
    $result = mysqli_query($connection,$query) or die(mysql_error());
    $count = mysqli_num_rows($result);
    mysqli_close($connection);

    if ($count == 1)
    {
        $data = mysqli_fetch_row($result);
        session_start();
        $_SESSION['id'] = $data[0];
        session_write_close();
        echo("eureka");
        //header("Location: homepage.php"); 
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