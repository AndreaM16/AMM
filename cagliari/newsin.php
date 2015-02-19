<?php
session_start(); 
include("config.php"); 


include("header.php");  
   

 
       print("<center>"); 
$titolo=$_POST["titolo"];
$testo=$_POST["testo"];
         $user=$_SESSION['ID'];
      $data=(date("Y-m-d"));
$ora=(date("G:i:s"));
         PRINT("$testo");
            $testo = str_replace("'", "''", $testo);
$q_="INSERT INTO news (Titolo,Testo,Data,Ora,Codice_Utente)
     values ('$titolo','$testo','$data','$ora',$user);";
   $ris2=mysqli_query($conn,$q_);
            
      PRINT("$testo");
        if($ris2)
        {
         print("<font size=4 color=\"green\"><script> location.replace('index.php'); </script> <br></font>");
        }
        else
        {
         print("Errore");
        }          
       
        
        
         
                    
                                 
                                                                     
                                  
                                 
                                  
                                  
             
                             
             
        include("down.php");   
 
       