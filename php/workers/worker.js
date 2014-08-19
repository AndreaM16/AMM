function LoadNews()
{
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
}

function LoadAdminOrders()
{
    $.get("workers/worker.php?type=1",function(data){
        console.log(data);
        $.each(data, function(key,value){
            var tableRef = document.getElementById('orderTableBody').getElementsByTagName('tbody')[0];

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
    },"json");
}

function LoadMyOrders()
{
    $.get("workers/worker.php?type=1",function(data){
        console.log(data);
        $.each(data, function(key,value){
            var tableRef = document.getElementById('orderTableBody').getElementsByTagName('tbody')[0];

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
    },"json");
}

function LoadUsers()
{
    $.get("workers/worker.php?type=2",function(data){
        console.log(data);
        $.each(data, function(key,value){
            var tableRef = document.getElementById('userTableBody').getElementsByTagName('tbody')[0];

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
                case "0":
                    role = document.createTextNode("Amministratore Delegato");
                    break;
                case "1":
                    role = document.createTextNode("Dipendente");
                    break;
                case "2":
                    role = document.createTextNode("Cliente");
                    break;
                default:
                    role = document.createTextNode("N/A");
                    break;
            }

            var resettaPwdCMD = document.createElement("a");
            resettaPwdCMD.href = "workers/worker.php?type=4&id="+value.id;
            resettaPwdCMD.appendChild(document.createTextNode("Resetta PWD"));

            var rendiAdminCMD = document.createElement("a");
            rendiAdminCMD.href = "workers/worker.php?type=5&id="+value.id;
            rendiAdminCMD.appendChild(document.createTextNode("Rendi Admin"));

            var declassaCMD = document.createElement("a");
            declassaCMD.href = "workers/worker.php?type=6&id="+value.id;
            declassaCMD.appendChild(document.createTextNode("Revoca Admin."));

            idCell.appendChild(id);
            nameCell.appendChild(name);
            surnameCell.appendChild(surname);
            usernameCell.appendChild(username);
            pwdCell.appendChild(pwd);
            isAdminCell.appendChild(is_admin);
            roleCell.appendChild(role);
            gestioneCell.appendChild(resettaPwdCMD);
            gestioneCell.appendChild(document.createTextNode(" | "));
            if(value.is_admin == 1)
            {
                gestioneCell.appendChild(declassaCMD);
            }
            else
            {
                gestioneCell.appendChild(rendiAdminCMD);
            }
        })
    },"json");
}

function LoadArticoli() {
    $.get("workers/worker.php?type=10", function(data) {
        $.each(data, function(key,value) {
            var host = document.getElementById("articoloName")[0];
            var opt = document.createElement('option');
            opt.value = value.name;
            opt.innerHTML = value.name;
            host.appendChild(opt);
        });
    });
}

function OnSelectionChange() {
    var el = document.getElementById("articoloName");
    var unitario = el.options[el.selectedIndex].prezzoUnitario;
    document.getElementById("priceValue")[0].innerHTML = unitario;
    document.getElementById("qntValue")[0].innerHTML = 1;
}

function OnQuantityChange() {
    var unitario = document.getElementById("priceValue")[0].innerHTML;
    var quantita = document.getElementById("qntValue")[0].innerHTML;
    document.getElementById("totValue")[0].innerHTML = unitario * quantita;
}