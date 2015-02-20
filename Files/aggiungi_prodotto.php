<?php
session_start(); 
include("config.php"); 


include("header.php");  
   
?>
       <center> <H2>Nuovo prodotto</H2> 
                         <form action="prodottoin.php" method="post">
    	                               <center>
                  <table align="center">
        <tr><td>Nome :</td><td><input type="text" name="nome"></td>
        <tr><td>Descrizione :</td><td> <TEXTAREA NAME="descrizione" ROWS=10 COLS=40> </TEXTAREA></td>          
         <tr><td>Prezzo :</td><td><input type="text" name="prezzo"></td>
         <tr><td>URL Foto :</td><td><input type="text" name="foto"></td>
           </table>
        
                    
<br>
 <button type="submit">
               Conferma
               </button>
              </form> 
              
     
        
   <?php           
   include("down.php");   
 
  