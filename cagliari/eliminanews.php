<?php
session_start(); 
include("config.php"); 

                 
include("header.php");  
   
   $codice=$_GET['codice'];
    
              
                  $q_="DELETE from news where Codice=$codice";
 $risultato2=mysqli_query($conn,$q_);
           print("<script> location.replace('index.php'); </script> ");  
             

                 
include("down.php");   
 

            