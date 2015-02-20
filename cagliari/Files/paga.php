<?php
session_start(); 
include("config.php"); 

                 
include("header.php");  
 

    $codice=$_GET['codice'];
     $user=$_SESSION['ID'];
      $data=(date("Y-m-d"));
$ora=(date("G:i:s"));


     $q_news="SELECT * from prodotto where Codice=$codice";
 $risultato=mysqli_query($conn,$q_news);
   
  while ($q_news=mysqli_fetch_array($risultato))
     { $totale=$q_news['Prezzo']; }
 

     
   


    $q_2="INSERT INTO ordine (Codice_Prodotto,Codice_Utente,Data,Ora,Totale,Pagato)      
      values ($codice,$user,'$data','$ora',$totale,0);";
        $ris2=mysqli_query($conn,$q_2);
            
            
          $q_or="SELECT * from ordine where Codice_Utente='$user' and Codice_Prodotto=$codice";
 $risultatoo=mysqli_query($conn,$q_or);
   
  while ($q_or=mysqli_fetch_array($risultatoo))
    {  $codiceor=$q_or['Codice'];  }    
            
            
             if ($ris2) {Print("<center><h2>Oggetto ordinato</h2> "); ?>
             
            <?php print("<form name=\"_xclick\" action=\"paga2.php?codice=$codiceor\" method=\"post\">");    ?>
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="me@mybusiness.com">
<input type="hidden" name="currency_code" value="EUR">
<input type="hidden" name="item_name" value="Teddy Bear">
<input type="hidden" name="amount" value="12.99">
<input type="image" src="http://www.paypal.com/it_IT/i/btn/x-click-but01.gif" border="2" name="submit" alt="Effettua i tuoi pagamenti con PayPal. È un sistema rapido, gratuito e sicuro.">
</form>
             
                   <?php
             
             
             
             
             }    else {print("errore"); }
                        
         
                               
    
                             
             
        include("down.php");   
   