<?php
session_start();
if(isset($_SESSION['id']))
{
    echo($_SESSION['id']);
}
else
{
    $ip = $_SERVER['REMOTE_ADDR'];
    echo("Hello $ip\n You are trying to access a restricted area, please go <a href='index.php'>back </a>and login");
}

