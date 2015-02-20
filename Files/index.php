<?php
session_start(); 
include("config.php"); 


include("header.php");  
             ?>
       <?php
            $livello=0;
            $user2=0;
                    ?> <center><?php
            if(isset($_SESSION['ID'])) {
            
               
              $livello=$_SESSION['LIV'];   $user2=$_SESSION['ID'];  $nomeu=$_SESSION['USER'];
            
            
              if($livello>1) {
              print("<H3>Admin loggato</H3>");
              print("<a href=\"aggiungi_news.php\">Aggiungi NEWS</a><br>");
              print("<a href=\"aggiungi_prodotto.php\">Aggiungi Prodotto</a><br>");
               print("<a href=\"ordini.php\">Visualizza ordini</a><br>");
               print("Clicca sul titolo del prodotto o della news per eliminare<br>");
                    print("<A href=\"logout.php\">logout</a><br>");        
                          
                          
                       print("<div id=\"left\">");
                
$q_news="SELECT * from news";
 $risultato=mysqli_query($conn,$q_news);  
     
                                                  
   print("<h2>NEWS<hr></h2> "); 
   
  while ($q_news=mysqli_fetch_array($risultato))
  {   $codice=$q_news['Codice'];
      $titolo=$q_news['Titolo'];
      $testo=$q_news['Testo'];
      $ora=$q_news['Ora'];
      $data=$q_news['Data'];
  
 print("<p><a href=\"eliminanews.php?codice=$codice\">$titolo - $data $ora</a></p>") ;  
   print(" $testo <br><br><br><hr><br>");  
  }
        print("<br>");     
                
                
                
                  //FINE SINISTRA
                
                  print("</div>");
                 print("<div id=\"right\">");
                
                
                   $q_news="SELECT * from prodotto";
 $risultato=mysqli_query($conn,$q_news);
      
     
                                                  
   print("<h2>STORE</h2><hr> "); 
   
  while ($q_news=mysqli_fetch_array($risultato))
  {   $codice=$q_news['Codice'];
      $titolo=$q_news['Nome'];
      $testo=$q_news['Descrizione'];
      $prezzo=$q_news['Prezzo'];
      $foto=$q_news['Immagine'];
  
   print("<p><a href=\"eliminaprodotto.php?codice=$codice\">$titolo - $prezzo €</a></p>") ; 
   print("<img height=150 width=180 src='$foto'>Codice prodotto:$codice - $testo <br><br><br><hr><br>");  
  }
        print("<br>");     
                
                
                
                   print("</div>");    
                          
                          
                          
                          
                          
                          
                             }
                             
                           
              else {
              print("<H3>Utente $nomeu </H3>");  print("<a href=\"myorder.php\">Profilo e ordini</a><br>");
              print("<A href=\"logout.php\">Logout</a>");
                
                print("<div id=\"left\">");
                
$q_news="SELECT * from news";
 $risultato=mysqli_query($conn,$q_news);  
     
                                                  
   print("<h2>NEWS<hr></h2> "); 
   
  while ($q_news=mysqli_fetch_array($risultato))
  {   $codice=$q_news['Codice'];
      $titolo=$q_news['Titolo'];
      $testo=$q_news['Testo'];
      $ora=$q_news['Ora'];
      $data=$q_news['Data'];
  
   print("<p>$titolo</p>") ; 
   print(" $testo <br><br><br><hr><br>");  
  }
        print("<br>");     
                
                
                
                  //FINE SINISTRA
                
                  print("</div>");
                 print("<div id=\"right\">");
                
                
                   $q_news="SELECT * from prodotto";
 $risultato=mysqli_query($conn,$q_news);
      
     
                                                  
   print("<h2>STORE</h2> Clicca sul titolo del prodotto per comprarlo <hr> "); 
   
  while ($q_news=mysqli_fetch_array($risultato))
  {   $codice=$q_news['Codice'];
      $titolo=$q_news['Nome'];
      $testo=$q_news['Descrizione'];
      $prezzo=$q_news['Prezzo'];
      $foto=$q_news['Immagine'];
  
   print("<p><a href=\"compra.php?codice=$codice\">$titolo - $prezzo €</a></p>") ; 
   print("<img height=150 width=180 src='$foto'>  $testo <br><br><br><hr><br>");  
  }
        print("<br>");     
                
                
                
                   print("</div>");
                
                  }
              
              } ELSE {
              
              
              
            ?>        <center><H1>LOGIN</H1>
            <form action="login.php" method="post">
            <table align="center"><tr>
            <tr align="right"><td><font size="4">User</font></td><td> <input type="text" name="user" size="10"></td>
            <tr><td><font size="4">Password</font></td><td> <input type="password" name="password" size="10"> </td>
            </table><center><button type="submit"> ACCEDI  </button> </center>
            </form>
            <?php  }
            ?>
 
               <?php
include("down.php");   
 

               ?>