<?php
session_start();
if (!isset($_SESSION['id'])) {
    echo("Hello!\n You are trying to access a restricted area, please go <a href='index.php'>back </a>and login.");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestionale AlphaData | Home</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.1.js"></script>
        <script type="text/javascript">
            $.get("workers/worker.php?type=0", function(data) {
                    $.each(data, function(key,value){
                        var tableRef = document.getElementById('newsTableBody').getElementsByTagName('tbody')[0];
                        
                        // Insert a row in the table at row index 0
                        var newRow   = tableRef.insertRow(tableRef.rows.length);
                        
                        // Insert a cell in the row at index 0
                        var dateCell  = newRow.insertCell(0);
                        var titleCell = newRow.insertCell(1);
                        var linkCell = newRow.insertCell(2);

                        // Append a text node to the cell
                        var date  = document.createTextNode(value.date_posted);
                        var title = document.createTextNode(value.title);
                        
                        var link = document.createElement("a");
                        link.href = value.link;
                        link.appendChild(document.createTextNode(value.link));
                        
                        dateCell.appendChild(date);
                        titleCell.appendChild(title);
                        linkCell.appendChild(link);
                    })
            }, "json");
            <?php
                if($_SESSION['is_admin'] == 1) {
                    echo '$.get("workers/worker.php?type=1",function(data){
                            console.log(data);
                            $.each(data, function(key,value){
                                var tableRef = document.getElementById(\'orderTableBody\').getElementsByTagName(\'tbody\')[0];

                                // Insert a row in the table at row index 0
                                var newRow   = tableRef.insertRow(tableRef.rows.length);

                                // Insert a cell in the row at index 0
                                var idCell  = newRow.insertCell(0);
                                var dateCell  = newRow.insertCell(1);
                                var clienteCell = newRow.insertCell(2);
                                var articoloCell = newRow.insertCell(3);
                                var totaleCell = newRow.insertCell(4);
                                var statusCell = newRow.insertCell(5);
                                var gestioneCell = newRow.insertCell(6);

                                // Append a text node to the cell
                                var id  = document.createTextNode(value.order_id);
                                var date = document.createTextNode(value.order_date);
                                var cliente = document.createTextNode("ID:"+value.id +" "+value.name +" "+value.surname);
                                var articolo = document.createTextNode(value.articolo);
                                var totale = document.createTextNode(value.totale+"€");
                                var status = document.createTextNode(value.status == 1 ? "Pagato" : "Non Pagato");

                                var gestione = document.createElement("a");
                                gestione.href="workers/worker.php?type=3&id="+value.order_id;
                                gestione.appendChild(document.createTextNode("Segna come pagato"));

                                idCell.appendChild(id);
                                dateCell.appendChild(date);
                                clienteCell.appendChild(cliente);
                                articoloCell.appendChild(articolo);
                                totaleCell.appendChild(totale);
                                statusCell.appendChild(status);
                                if(value.status == 0){
                                    gestioneCell.appendChild(gestione);
                                }
                            })
                    },"json");';
                    echo '$.get("workers/worker.php?type=2",function(data){
                            console.log(data);
                            $.each(data, function(key,value){
                                var tableRef = document.getElementById(\'userTableBody\').getElementsByTagName(\'tbody\')[0];

                                // Insert a row in the table at row index 0
                                var newRow   = tableRef.insertRow(tableRef.rows.length);

                                // Insert a cell in the row at index 0
                                var idCell  = newRow.insertCell(0);
                                var nameCell  = newRow.insertCell(1);
                                var surnameCell = newRow.insertCell(2);
                                var usernameCell = newRow.insertCell(3);
                                var pwdCell = newRow.insertCell(4);
                                var isAdminCell = newRow.insertCell(5);
                                var roleCell = newRow.insertCell(6);
                                var gestioneCell = newRow.insertCell(7);

                                // Append a text node to the cell
                                var id  = document.createTextNode(value.id);
                                var name = document.createTextNode(value.name);
                                var surname = document.createTextNode(value.surname);
                                var username = document.createTextNode(value.username);
                                var pwd = document.createTextNode(value.pwd);
                                var is_admin = document.createTextNode(value.is_admin == 1 ? "SI" : "NO");
                                var role = document.createTextNode("");
                                switch(value.role)
                                {
                                    case 0:
                                        role = document.createTextNode("Amministratore");
                                        break;
                                    case 1:
                                        role = document.createTextNode("Dipendente");
                                        break;
                                    case 2:
                                        role = document.createTextNode("Cliente");
                                        break;
                                    default:
                                        role = document.createTextNode("N/A");
                                        break;
                                }
                                var gestione = document.createTextNode("Be an admin");
                                
                                idCell.appendChild(id);
                                nameCell.appendChild(name);
                                surnameCell.appendChild(surname);
                                usernameCell.appendChild(username);
                                pwdCell.appendChild(pwd);
                                isAdminCell.appendChild(is_admin);
                                roleCell.appendChild(role);
                                gestioneCell.appendChild(gestione);
                            })
                    },"json");';
                }
                else {
                    echo '$.get("workers/worker.php?type=1",function(data){
                            console.log(data);
                            $.each(data, function(key,value){
                                var tableRef = document.getElementById(\'orderTableBody\').getElementsByTagName(\'tbody\')[0];

                                // Insert a row in the table at row index 0
                                var newRow   = tableRef.insertRow(tableRef.rows.length);

                                // Insert a cell in the row at index 0
                                var idCell  = newRow.insertCell(0);
                                var dateCell  = newRow.insertCell(1);
                                var articoloCell = newRow.insertCell(2);
                                var totaleCell = newRow.insertCell(3);
                                var statusCell = newRow.insertCell(4);

                                // Append a text node to the cell
                                var id  = document.createTextNode(value.order_id);
                                var date = document.createTextNode(value.order_date);
                                var articolo = document.createTextNode(value.articolo);
                                var totale = document.createTextNode(value.totale+"€");
                                var status = document.createTextNode(value.status == 1 ? "Pagato" : "Non Pagato");

                                idCell.appendChild(id);
                                dateCell.appendChild(date);
                                articoloCell.appendChild(articolo);
                                totaleCell.appendChild(totale);
                                statusCell.appendChild(status);
                            })
                    },"json");';
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
                        echo('<img src="images/'.$_SESSION['picture'].'" width="275" height="275" align="middle" /><br>');
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
                        echo("<ul><li><p id='formHeader' style='margin-top:0px;'><a href='news.php'>[AGGIUNGI NEWS]</a></p></li><li><p id='formHeader' style='margin-top:0px;'><a href='users.php'>[AGGIUNGI UTENTE]</a></p></li>");
                    }
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
                                <td width="250px">Titolo</td>
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
                                    echo("<td width='50px'>Gestione</td>");
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
                                            <td width="150px">Ruolo</td>
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

