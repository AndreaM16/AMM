<?php
session_start(); 
include("config.php"); 

                 
include("header.php");  
 

    $codice=$_GET['codice'];
    
   


    $q_2="update ordine set Pagato=1 where Codice=$codice";
        $ris2=mysqli_query($conn,$q_2);
            
           
            
            
             if ($ris2) {Print("<center><h2>Oggetto pagato, Torna alla <a href=\"index.php\"><u>home</u></a></h2> ");}    else {print("errore"); }
                        
         
                               
    
                             
             
        include("down.php");   
   