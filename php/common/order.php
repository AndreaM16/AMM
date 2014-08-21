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
        <title>Gestionale AlphaData | Ordini</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="../workers/worker.js"></script>
        <script type="text/javascript">
            $.get("../workers/worker.php?type=10", function(data) {
                $.each(data,function(key,value){
                    $('#articoloName').append("<option value='"+value.name+"' prezzoUnitario='"+value.punitario+"'>"+value.name+"</option>");
                });
            },"json");

            function OnSelectionChange() {
                var el = document.getElementById("articoloName");
                var unitario = el.options[el.selectedIndex].getAttribute("prezzounitario");
                document.getElementById("priceValue").value = unitario;
                document.getElementById("qntValue").value = 1;
                OnQuantityChange().call();
            }

            function OnQuantityChange() {
                var el = document.getElementById("articoloName");
                var unitario = el.options[el.selectedIndex].getAttribute("prezzounitario");
                var quantita = document.getElementById("qntValue").value;
                document.getElementById("totValue").value = unitario * quantita;
            }

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
                    <a href="../login.php?logout=1">[LOGOUT]</a>
                </p>
                <div style="margin-left:25px;margin-top:10px;">
                    <?php
                        echo('<img src="../images/'.$_SESSION['picture'].'" width="200" height="200" align="middle" /><br>');
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
                    <p id='formHeader' style='font-size:18px'>Menù:</p>
                    <ul>
                        <li><p id='formHeader' style='margin-top:0px;'><a href='../homepage.php'>[VAI ALLA HOME]</a></p></li>
                    </ul>
                </div>
            </div>
            <div id="content">
                <div id="news" style="width:100%;">
                    <p id="formHeader" style="margin-left: 25px; margin-top:15px;">Aggiungi Ordine:</p>
                    <form style="margin-left: 25px; margin-top:15px;" action="../workers/worker.php" method="POST">
                        <input name="type" value="9" type="hidden"/>
                        
                        <label class="input-label" for="articolo">Articolo&nbsp;:</label>
                        <select class="input-boxes" id="articoloName" name="articolo" onchange="javascript:OnSelectionChange()"></select><br>
                        
                        <label class="input-label" for="price">Prezzo unitario&nbsp;:</label>
                        <input id="priceValue" name="price" type="number" readonly class="input-boxes" required /><br>
                        
                        <label class="input-label" for="qnt">Quantità&nbsp;:</label>
                        <input id="qntValue" name="qnt" type="number" class="input-boxes" required onchange="javascript:OnQuantityChange()"/><br>
                        
                        <label class="input-label" for="tot">Totale&nbsp; €:</label>
                        <input id="totValue" name="tot" type="number" readonly class="input-boxes" required /><br>
                        
                        <input class="round-button" type="submit" value="Ordina"/>
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