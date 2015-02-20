<?php
session_start(); 
include("config.php"); 

                 
include("header.php");  
   
   $codice=$_GET['codice'];

             
          if(isset($_SESSION['ID'])) {
              
                
            
 $q_news="SELECT * from prodotto where Codice=$codice";
 $risultato=mysqli_query($conn,$q_news);
   
  while ($q_news=mysqli_fetch_array($risultato))
  {   $codice=$q_news['Codice'];
      $titolo=$q_news['Nome'];
      $testo=$q_news['Descrizione'];
      $prezzo=$q_news['Prezzo'];
      $foto=$q_news['Immagine'];
  
   print("<center><p><a href=\"compra.php?codice=$codice\">$titolo - $prezzo €</a></p>") ; 
   print("<img height=150 width=180 src='images/$foto'> <br> $testo <br><br><br><hr><br>");  
  }
        print("<br>");     
        
  print("<p>Vuoi comprare questo oggetto?  <a href=\"paga.php?codice=$codice\">SI</A>  -  <a href=\"index.php\">NO</a></p> ");         
                    
                
                
                
  
                  }   ELSE {   print("<script>location.replace('index.php'); </script>"); }
                 
include("down.php");   
 

            