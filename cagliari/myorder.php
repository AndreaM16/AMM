<?php
session_start(); 
include("config.php"); 

                 
include("header.php");  
   
        
          if(isset($_SESSION['ID'])) {
       
       print("<center><h2>Profilo</h2>");       
       $user=$_SESSION['ID'];   
       
       
               
 $q_ut="SELECT * from utente where Codice=$user";
 $risultatout=mysqli_query($conn,$q_ut);
   print("<table align=\"center\" cellpadding=2 border=1> ") ;
   
  print("<tr><td>User</td><td>Email</td><td>Nome</td><td>Cognome</td><td>Indirizzo</td><td>Data nascita</td><td>Telefono</td> ") ; 
  while ($q_ut=mysqli_fetch_array($risultatout))
  
  {   $codice=$q_ut['Codice'];
       $usern=$q_ut['User'];
        $email=$q_ut['Email'];
         $nome=$q_ut['Nome'];
          $cognome=$q_ut['Cognome'];
           $data_na=$q_ut['Data_Nascita'];
            $indirizzo=$q_ut['Indirizzo'];
            $telefono=$q_ut['Telefono'];
  
   print(" <tr> ");
    // print(" <td><a href=\"\">   </A></td> "); 
     print(" <td>$usern</td> "); 
      print(" <td>$email</td> "); 
       print(" <td>$nome</td> "); 
        print(" <td>$cognome</td> "); 
         print(" <td>$data_na</td> ");
        print(" <td>$indirizzo</td> ");
        print(" <td>$telefono</td> ");
         
                                       
  }
        print("</table><br>");     print("<center><h2>Ordini</h2>");  
                 
       
       
             
            
 $q_ord="SELECT * from ordine where Codice_Utente=$user";
 $risultato=mysqli_query($conn,$q_ord);
   print("<table align=\"center\" cellpadding=2 border=1> ") ;
   
  print("<tr><td>Codice ordine</td><td>Codice Prodotto</td><td>Data</td><td>Ora</td><td>Totale</td><td>Pagato</td> ") ; 
  while ($q_ord=mysqli_fetch_array($risultato))
  
  {   $codice=$q_ord['Codice'];
       $codice_p=$q_ord['Codice_Prodotto'];
      $data=$q_ord['Data'];
      $ora=$q_ord['Ora'];
      $totale=$q_ord['Totale'];
      $pagato=$q_ord['Pagato'];
  
   print(" <tr> ");
    // print(" <td><a href=\"\">   </A></td> "); 
     print(" <td>$codice</td> "); 
      print(" <td>$codice_p</td> "); 
       print(" <td>$data</td> "); 
        print(" <td>$ora</td> "); 
         print(" <td>$totale €</td> ");
         
            if($pagato>0) { print(" <td>SI</td></tr> ");    }   ELSE   {
            print(" <td>NO -<a href=\"paga2.php?codice=$codice\">Paga ora</a></td></tr> ");                                }
  }
        print("</table>");     
                 
           
        
                
                
                
  
                  }   ELSE {   print("<script>location.replace('index.php'); </script>"); }
                 
include("down.php");   
 

            