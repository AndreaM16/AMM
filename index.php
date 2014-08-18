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
        <style>
            .round-button {
                display:block;
                width:150px;
                height:50px;
                line-height:50px;
                border: 2px solid #f5f5f5;
                color:#f5f5f5;
                text-align:center;
                text-decoration:none;
                background: #464646;
                box-shadow: 0 0 3px gray;
                font-size:20px;
                font-weight:bold;
                margin-top:15px;
            }
            .input-label {
                color:black; 
                font-size: 18px; 
                font-family: 'Segoe WP Semibold', Verdana;
            }
            .input-boxes {
                border:1px; 
                border-color: black; 
                border-style: solid; 
                padding: 5px; 
                font-family: 'Segoe UI'; 
                font-size: 16px;
            }
            .footer {
                vertical-align:bottom; 
                background-color: #007FFF; 
                width:100%; 
                height:50px;
                margin-top:-100px;
            }
            #footerText {
                color:white; 
                font-size: 15px; 
                font-family: 'Segoe WP Semibold', Verdana; 
                text-align: center;
            }
            #formBox {
                width: 300px; 
                height: 300px; 
                margin-top: 100px; 
                margin-left:auto; 
                margin-right:auto; 
                background-color: lightgrey; 
                padding: 20px;
            }
            #formHeader {
                color:black; 
                font-size: 25px; 
                font-family: 'Segoe WP Semibold', Verdana;
                margin-top:0px;
            }
            h1 {
               text-align: center; 
               color: white; 
               font-size:50px; 
               font-family:'Segoe WP Semibold', Verdana;
               margin-top:0px; 
            }
            #header {
                width:100%; 
                height: 100px; 
                background-color:#007FFF;
            }
        </style>
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
