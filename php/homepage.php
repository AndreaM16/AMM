<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: error.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestionale AlphaData | Home</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="workers/worker.js"></script>
        <script type="text/javascript">
            LoadNews.call(this);
            <?php
                if($_SESSION['is_admin'] == 1) {
                    echo 'LoadAdminOrders.call(this);';
                    echo 'LoadUsers.call(this);';
                }
                else {
                    echo 'LoadMyOrders.call(this);';
                }
            ?>
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
                        echo('<img src="images/'.$_SESSION['picture'].'" width="200" height="200" align="middle" /><br>');
                    ?>
                    <h3>Nome: <span><i><?php echo($_SESSION['name']); ?></i></span></h3>
                    <h3>Cognome: <span><i><?php echo($_SESSION['surname']); ?></i></span></h3>
                    <h3>Ruolo: 
                        <span><i>
                        <?php 
                            switch ($_SESSION['role']) 
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
                        echo("<p id='formHeader' style='font-size:18px'>Menù:</p>");
                        echo("<ul>");
                        if($_SESSION['is_admin'] == 1) {
                            echo("<li><p id='formHeader' style='margin-top:0px;'><a href='adminpanel/news.php'>[AGGIUNGI NEWS]</a></p></li><li><p id='formHeader' style='margin-top:0px;'><a href='adminpanel/user.php'>[AGGIUNGI UTENTE]</a></p></li>");
                        }
                        echo("<li><p id='formHeader' style='margin-top:0px;'><a href='common/order.php'>[AGGIUNGI ORDINE]</a></p></li>");
                        echo("</ul>");
                    ?>
                </div>
            </div>
            <div id="content">
                <div id="news" style="width:100%;height: 25%;">
                    <p id="formHeader" style="margin-left: 25px; margin-top:15px;">News dal mondo AlphaData</p>
                    <table id="newsTableBody" style="margin-left: 25px; margin-top:-15px;">
                        <thead>
                            <tr>
                                <td width="140px">Data</td>
                                <td width="350px">Titolo</td>
                                <td>Link</td>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <hr>
                <div id="orders" style="width:100%;">
                    <p id="formHeader" style="margin-left: 25px; margin-top:15px;">Ordini</p>
                    <table id="orderTableBody" style="margin-left: 25px; margin-top:-15px;">
                        <thead>
                            <tr>
                                <td width="50px">#</td>
                                <td width="100px">Data ordine</td>
                                <?php 
                                    if($_SESSION['is_admin'] == 1) {
                                    echo("<td width='150px'>Cliente</td>");
                                    }
                                ?>
                                <td width="100px">Articolo</td>
                                <td width="100px">Totale</td>
                                <td width="100px">Status</td>
                                <?php 
                                    if($_SESSION['is_admin'] == 1) {
                                    echo("<td width='150px'>Gestione</td>");
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <?php
                if($_SESSION['is_admin'] == 1) {
                    echo '<hr>
                            <div id="users" style="width:100%; height: 25%;">
                                <p id="formHeader" style="margin-left: 25px; margin-top:15px;">Utenti</p>
                                <table id="userTableBody" style="margin-left: 25px; margin-top:-15px;">
                                    <thead>
                                        <tr>
                                            <td width="50px">ID</td>
                                            <td width="100px">Nome</td>
                                            <td width="100px">Cognome</td>
                                            <td width="100px">Username</td>
                                            <td width="100px">Password</td>
                                            <td width="125px">Platf. Admin</td>
                                            <td width="200px">Ruolo</td>
                                            <td width="250px">Gestione</td>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>';}?>
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

