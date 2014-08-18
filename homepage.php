<?php
/*
session_start();
if(!isset($_SESSION['id']))
{
    $ip = $_SERVER['REMOTE_ADDR'];
    echo("Hello!\n You are trying to access a restricted area, please go <a href='index.php'>back </a>and login.");
}*/
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestionale AlphaData | Home</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <style>
            #leftSidebar {
                float:left;
                width: 20%;
                height:800px;
                background-color: lightgrey;
            }
            #content {
                float:left;
                width:80%;
                height: 800px;
                background-color: whitesmoke;
            }
        </style>
    </head>
    <body>
        <div id="header">
            <h1>Gestionale AlphaData Inc.</h1>
        </div>
        <div id="body" style="height: 800px; width:100%;">
            <div id="leftSidebar">
                <p id="formHeader" style="margin-left: 25px; margin-top:25px;">
                    Profilo utente:<br>
                    <a href="#">[LOGOUT]</a>
                </p>
                <div style="margin-left:25px;margin-top:10px;">
                    <img src="http://www.built.com.au/library/Website%20Pic%20of%20Marco_Rossi.jpg" width="300" height="300" align="middle" /><br>
                    <h3>Nome: <span><i>Marco</i></span></h3>
                    <h3>Cognome: <span><i>Rossi</i></span></h3>
                    <h3>Ruolo: <span><i>Amministratore</i></span></h3>
                </div>
            </div>
            <div id="content">
                <div id="news" style="width:100%">
                    <p id="formHeader" style="margin-left: 25px; margin-top:15px;">News dal mondo AlphaData</p>
                    <table style="margin-left: 25px; margin-top:-15px;">
                        <thead>
                            <tr>
                                <td>Data</td>
                                <td>Titolo</td>
                                <td>Gestione</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01/10/2014</td>
                                <td>Lorem Ipsum dolor</td>
                                <td><a href="#">Cancella</a></td>
                            </tr>
                            <tr>
                                <td>01/10/2014</td>
                                <td>Lorem Ipsum dolor</td>
                                <td><a href="#">Cancella</a></td>
                            </tr>
                            <tr>
                                <td>01/10/2014</td>
                                <td>Lorem Ipsum dolor</td>
                                <td><a href="#">Cancella</a></td>
                            </tr>
                            <tr>
                                <td>01/10/2014</td>
                                <td>Lorem Ipsum dolor</td>
                                <td><a href="#">Cancella</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <p id="formHeader" style="margin-left: 25px; margin-top:15px;font-size:18px">Aggiungi news:</p>
                    <form action="worker.php" method="POST" style="margin-left: 25px;">
                        <label for="username">Titolo :</label>
                        <input name="username" type="text" required />
                        <label for="pass">Link :</label>
                        <input name="pass" type="url" required />
                        <input type="submit" value="Aggiungi"/>
                    </form>
                </div>
                <hr>
                <div id="orders" style="width:100%;">
                    <p id="formHeader" style="margin-left: 25px; margin-top:15px;">Ordini</p>
                    <table style="margin-left: 25px; margin-top:-15px;">
                        <thead>
                            <tr>
                                <td>Numero #</td>
                                <td>Oggetto</td>
                                <td>Cliente</td>
                                <td>Stato</td>
                                <td>Gestione</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Lorem Ipsum dolor</td>
                                <td>Rossi</td>
                                <td>Pagato</td>
                                <td><a href="#">Segna come pagato</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Lorem Ipsum dolor</td>
                                <td>Rossi</td>
                                <td>Pagato</td>
                                <td><a href="#">Segna come pagato</a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Lorem Ipsum dolor</td>
                                <td>Rossi</td>
                                <td>Pagato</td>
                                <td><a href="#">Segna come pagato</a></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Lorem Ipsum dolor</td>
                                <td>Rossi</td>
                                <td>Pagato</td>
                                <td><a href="#">Segna come pagato</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div id="users" style="width:100%; height: 25%;">
                    <p id="formHeader" style="margin-left: 25px; margin-top:15px;">Utenti</p>
                    <table style="margin-left: 25px; margin-top:-15px;">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Nome</td>
                                <td>Amministratore</td>
                                <td>Ruolo</td>
                                <td>Gestione</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Marco Rossi</td>
                                <td>SI</td>
                                <td>Amministratore Delegato</td>
                                <td>
                                    <a href="#">Elimina</a> |
                                    <a href="#">Resetta Pass</a> |
                                    <a href="#">Declassa</a> |
                                    <a href="#">Fai Admin</a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Marco Rossi</td>
                                <td>SI</td>
                                <td>Amministratore Delegato</td>
                                <td>
                                    <a href="#">Elimina</a> |
                                    <a href="#">Resetta Pass</a> |
                                    <a href="#">Declassa</a> |
                                    <a href="#">Fai Admin</a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Marco Rossi</td>
                                <td>SI</td>
                                <td>Amministratore Delegato</td>
                                <td>
                                    <a href="#">Elimina</a> |
                                    <a href="#">Resetta Pass</a> |
                                    <a href="#">Declassa</a> |
                                    <a href="#">Fai Admin</a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Marco Rossi</td>
                                <td>SI</td>
                                <td>Amministratore Delegato</td>
                                <td>
                                    <a href="#">Elimina</a> |
                                    <a href="#">Resetta Pass</a> |
                                    <a href="#">Declassa</a> |
                                    <a href="#">Fai Admin</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="footer">
            <div style="width:25%; height: 100px; float:left">
                <p id="footerText">Anno accademico 2013-2014</p>
            </div>
            <div style="width:50%; height: 100px; float:left"></div>
            <div style="width:25%; height: 100px; float:left">
                <p id="footerText">Giancarlo Lelli - Matricola: 47792</p>
            </div>
        </div>
    </body>
</html>

