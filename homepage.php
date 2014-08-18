<?php

if(isset($_SESSION['id']))
{
    echo($_SESSION['id']);
}
else
{
    echo("Not Authorized\n");
}

