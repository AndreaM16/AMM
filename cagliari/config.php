<?php 

$Host="localhost"; //Nome Host.
$User="meddaAndrea"; //Username PHP-MyAdmin.
$Password="dromedario864"; //PassWord.
$db="amm14_meddaAndrea"; //Nome DataBase.

$conn=mysqli_connect($Host,$User,$Password); //Effettua la connessione.
$r=mysqli_select_db($conn,$db); //Seleziona il database.
  