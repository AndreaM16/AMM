<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestionale AlphaData | Login</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div id="header">
            <h1>Gestionale AlphaData Inc.</h1>
        </div>
        <div id="body" style="height: 600px; width:100%;">
            <div id="formBox">
                <p id="formHeader">Accesso utenti:</p>
                <form action="login.php" method="POST" style="margin-right:auto; margin-left:auto;">
                    <label class="input-label" for="username">Username :</label>
                    <input name="username" type="text" class="input-boxes" required /><br>
                    <label class="input-label" for="pass">Password :</label>
                    <input name="pass" type="password" class="input-boxes" required /><br>
                    <input class="round-button" type="submit" value="Login"/>
                </form>
            </div>
        </div>
        <div class="footer">
            <div id="aa" style="width:25%; height: 100px; float:left">
                <p id="footerText">Anno accademico 2013-2014</p>
            </div>
            <div id="empty" style="width:50%; height: 100px; float:left"></div>
            <div id="copyright" style="width:25%; height: 100px; float:left">
                <p id="footerText">Giancarlo Lelli - Matricola: 47792</p>
            </div>
        </div>
    </body>
</html>
