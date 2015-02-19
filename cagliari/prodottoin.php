<?php
session_start(); 
include("config.php"); 


include("header.php");  
   

 
       print("<center>"); 
$nome=$_POST["nome"];
$descrizione=$_POST["descrizione"];
 $prezzo=$_POST["prezzo"];
$foto=$_POST["foto"];    
    
            $descrizione = str_replace("'", "''", $descrizione);
$q_="INSERT INTO prodotto (Nome,Descrizione,Prezzo,Immagine)
     values ('$nome','$descrizione',$prezzo,'$foto');";
   $ris2=mysqli_query($conn,$q_);
            
        if($ris2)
        {
         print("<font size=4 color=\"green\"><script> location.replace('index.php'); </script> <br></font>");
        }
        else
        {
         print("Errore");
        }          
       
        
        
         
                    
                                 
                                                                     
                                  
                                 
                                  
                                  
             
                             
             
        include("down.php");   
 
       