<?php
session_start();
if(isset($_SESSION['id']))
{
    echo($_SESSION['id']);
}
else
{
    var_dump($_SESSION);
    echo("Not Authorized\n");
}

