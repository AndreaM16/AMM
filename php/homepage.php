<?php
session_start();
if (!isset($_SESSION['id'])) {
    echo("Hello!\n You are trying to access a restricted area, please go <a href='index.php'>back </a>and login.");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestionale AlphaData | Home</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="•http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.1.js"/>
        <script type="text/javascript">
            $(document).ready(function() {
                $.get( "workers/worker.php", { type: "0"} ).done(function(data) {
                    document.write(data);
                });
            });
        </script>
    </head>
    <body>
        <div id="header">
            <h1>Gestionale AlphaData Inc.</h1>
        </div>
        <div id="body" style="width:100%;">
            <div id="leftSidebar">
                <p id="formHeader" style="margin-left: 25px; margin-top:25px;">
                    Profilo utente:<br>
                    <a href="login.php?logout=1">[LOGOUT]</a>
                </p>
                <div style="margin-left:25px;margin-top:10px;">
                    <?php
                        echo('<img src="images/'.$_SESSION['picture'].'" width="275" height="275" align="middle" /><br>');
                    ?>
                    <h3>Nome: <span><i><?php echo($_SESSION['name']); ?></i></span></h3>
                    <h3>Cognome: <span><i><?php echo($_SESSION['surname']); ?></i></span></h3>
                    <h3>Ruolo: 
                        <span><i>
                        <?php 
                            switch ($_SESSION['name']) 
                            {
                                case 0:
                                    echo("Amministratore");
                                    break;
                                case 1:
                                    echo("Dipendente");
                                    break;
                                case 2:
                                    echo("Cliente");
                                    break;
                            } 
                        ?>
                    </i></span>
                    </h3>
                    <br>
                    <br>
                    <?php 
                        if($_SESSION['is_admin'] == 1) {
                        echo("<p id='formHeader' style='font-size:18px'>Amministrazione:</p>");
                        echo("<ul><li><p id='formHeader' style='margin-top:0px;'><a href='news.php'>[AGGIUNGI NEWS]</a></p></li><li><p id='formHeader' style='margin-top:0px;'><a href='users.php'>[AGGIUNGI UTENTE]</a></p></li>");
                    }
                    ?>
                </div>
            </div>
            <div id="content">
                <div id="news" style="width:100%;height: 25%;">
                    <p id="formHeader" style="margin-left: 25px; margin-top:15px;">News dal mondo AlphaData</p>
                    <table style="margin-left: 25px; margin-top:-15px;">
                        <thead>
                            <tr>
                                <td>Data</td>
                                <td>Titolo</td>
                                <td>Gestione</td>
                            </tr>
                        </thead>
                        <tbody id="newsTableBody"></tbody>
                    </table>
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
                        <tbody id="orderTableBody"></tbody>
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
                        <tbody id="userTableBody"></tbody>
                    </table>
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
        </div>
    </body>
</html>

