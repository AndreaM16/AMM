<?php
session_start(); 
include("config.php"); 

                 
include("header.php");  
   
        
          if(isset($_SESSION['ID'])) {
       
       print("<center><h2>Ordini</h2>");       
         
       print("clicca sul codice dell'utente per visualizzare il profilo.");          
       
       
             
            
 $q_ord="SELECT * from ordine";
 $risultato=mysqli_query($conn,$q_ord);
   print("<table align=\"center\" cellpadding=2 border=1> ") ;
   
  print("<tr><td>Codice ordine</td><td>Codice Utente</td><td>Codice Prodotto</td><td>Data</td><td>Ora</td><td>Totale</td><td>Pagato</td> ") ; 
  while ($q_ord=mysqli_fetch_array($risultato))
  
  {   $codice=$q_ord['Codice'];
       $codice_p=$q_ord['Codice_Prodotto'];
       $codice_u=$q_ord['Codice_Utente'];
      $data=$q_ord['Data'];
      $ora=$q_ord['Ora'];
      $totale=$q_ord['Totale'];
      $pagato=$q_ord['Pagato'];
  
   print(" <tr> ");
    // print(" <td><a href=\"\">   </A></td> "); 
     print(" <td>$codice</td> "); 
     print(" <td><a href=\"profilo.php?codice=$codice_u\">$codice_u</a></td> ");
      print(" <td>$codice_p</td> "); 
       print(" <td>$data</td> "); 
        print(" <td>$ora</td> "); 
         print(" <td>$totale €</td> ");
         
            if($pagato>0) { print(" <td>SI</td></tr> ");    }   ELSE   {
            print(" <td>NO</td></tr> ");                                }
  }
        print("</table>");     
                 
           
        
                
                
                
  
                  }   ELSE {   print("<script>location.replace('index.php'); </script>"); }
                 
include("down.php");   
 

            