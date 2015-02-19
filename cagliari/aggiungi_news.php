<?php
session_start(); 
include("config.php"); 


include("header.php");  
   
?>
       <center> <H2>Nuova News</H2> 
                         <form action="newsin.php" method="post">
    	
                  <center>
                  <table align="center">
        <tr><td>Titolo :</td><td><input type="text" name="titolo"></td>
        <tr><td>Testo :</td><td> <TEXTAREA NAME="testo" ROWS=10 COLS=40> </TEXTAREA></td>          
        
           </table>
        
                    
<br>
 <button type="submit">
               Conferma
               </button>
              </form> 
              
     
        
   <?php           
   include("down.php");   
 
  