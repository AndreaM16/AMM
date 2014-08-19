<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../error.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestionale AlphaData | News</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
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
                        echo('<img src="../images/'.$_SESSION['picture'].'" width="275" height="275" align="middle" /><br>');
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
                        if($_SESSION['is_admin'] == 1) {
                        echo("<p id='formHeader' style='font-size:18px'>Amministrazione:</p>");
                        echo("<ul><li><p id='formHeader' style='margin-top:0px;'><a href='users.php'>[AGGIUNGI UTENTE]</a></p></li>");
                    }
                    ?>
                </div>
            </div>
            <div id="content">
                <div id="news" style="width:100%;height: 25%;">
                    <p id="formHeader" style="margin-left: 25px; margin-top:15px;">Aggiungi News:</p>
                    <form style="margin-left: 25px; margin-top:15px;" action="../workers/worker.php" method="POST">
                        <input name="type" value="7" type="hidden"/>
                        <label class="input-label" for="title">Title&nbsp;:</label>
                        <input name="title" type="text" class="input-boxes" required /><br>
                        <label class="input-label" for="link">Link&nbsp;:</label>
                        <input name="link" type="url" class="input-boxes" required /><br>
                        <input class="round-button" type="submit" value="Add"/>
                    </form>
                </div>
                <hr>
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