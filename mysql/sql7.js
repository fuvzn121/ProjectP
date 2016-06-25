var req = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', function(){
    var cre_btn = document.getElementById('c_table');
    cre_btn.addEventListener('click', tableCreate, false);
}, false);

function tableCreate() {
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            document.getElementById('ctdiv').textContent = req.responseText;
            document.getElementById('dtdiv').textContent = "";
        }
    }
    req.open('GET', './sql_create.php', true);
    req.send(null);
}

document.addEventListener('DOMContentLoaded', function(){
    var del_btn = document.getElementById('d_table');
    del_btn.addEventListener('click', deleteTable, false);
}, false);

function deleteTable() {
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            document.getElementById('dtdiv').textContent = req.responseText;
            document.getElementById('ctdiv').textContent = "";
        }
    }
    req.open('GET', './sql_del.php', true);
    req.send(null);
}

document.addEventListener('DOMContentLoaded', function(){
    var in_btn = document.getElementById('add_btn');
    in_btn.addEventListener('click', insertRecord, false);
}, false);

function insertRecord(){
    var add_n = document.getElementById('add_name');
    var add_a = document.getElementById('add_address');
    var add_e = document.getElementById('add_email');

    if (add_n.value == "" || add_a.value == "" || add_e.value == "") {
        document.getElementById('add_menu').textContent = "すべて埋めてください";
    }
    var url = "./sql2.php?add_n=" + add_n.value + "&add_a=" + add_a.value + "&add_e=" + add_e.value;
    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            add_n.value = "";
            add_a.value = "";
            add_e.value = "";
        }
    }
    req.open('GET', url, true);
    req.send();
}

document.addEventListener('DOMContentLoaded', function(){
    var all_btn = document.getElementById('search_all');
    all_btn.addEventListener('click', showTable, false);
}, false);

function showTable(){
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            var ta = document.getElementById("all_t");
            var d_ta = ta.getElementsByTagName('table');
            if (d_ta.length != 0) {
                while (d_ta[0])
                    d_ta[0].parentNode.removeChild(d_ta[0]);
            }

            var json_obj = JSON.parse(req.responseText);
            var rows = [];
            var all_table = document.createElement("table");
            all_table.border = "1px";

            for (var i = 0; i < json_obj.length; i++) {
                rows.push(all_table.insertRow(-1));
                for(var j in json_obj[i]){
                    var cell = rows[i].insertCell(-1);
                    cell.appendChild(document.createTextNode(json_obj[i][j]))
                }
            }
        ta.appendChild(all_table);
        }
    }
    req.open('GET', "./sql3.php", true);
    req.send();
}

document.addEventListener('DOMContentLoaded', function(){
    var all_btn = document.getElementById('hide_table');
    all_btn.addEventListener('click', hideTable, false);
}, false);

function hideTable(){
    var ta = document.getElementById("all_t");
    var d_ta = ta.getElementsByTagName('table');
    if (d_ta.length != 0) {
        while (d_ta[0])
            d_ta[0].parentNode.removeChild(d_ta[0]);
    }
}

document.addEventListener('DOMContentLoaded', function(){
    var s_record = document.getElementById('search_btn');
    s_record.addEventListener('click', searchRecord, false);
}, false);

function searchRecord(){
    var s_id = "";
    var s_name = "";
    var s_address = "";
    var s_email = "";
    var s_input = document.getElementById('search_text');
    var check = document.getElementsByName("property");
    if (document.s_select.sid.checked){
        s_id = s_input.value;
    } else if (document.s_select.sname.checked) {
        s_name = s_input.value;
    } else if (document.s_select.saddress.checked) {
        s_address = s_input.value;
    } else if (document.s_select.semail.checked){
        s_email = s_input.value;
    }

    var url = "./sql4.php?s_id=" + s_id + "&s_name=" + s_name + "&s_address=" + s_address + "&s_email=" + s_email;

    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            var ta = document.getElementById("s_result");
            var bt = document.getElementById("u_record")
            var d_ta = ta.getElementsByTagName('table');
            if (d_ta.length != 0) {
                while (d_ta[0])
                    d_ta[0].parentNode.removeChild(d_ta[0]);
            }
            var json_obj = JSON.parse(req.responseText);
            var rows = [];
            var all_table = document.createElement("table");
            all_table.border = "1px";
            all_table.id = "result_t";

            for (var i = 0; i < json_obj.length; i++) {
                rows.push(all_table.insertRow(-1));
                for(var j in json_obj[i]){
                    var cell = rows[i].insertCell(-1);
                    cell.appendChild(document.createTextNode(json_obj[i][j]))
                }
            }
            ta.appendChild(all_table);
            
            document.getElementById("c_id").value = json_obj[1]['ID'];
            document.getElementById("c_name").value = json_obj[1]['name'];
            document.getElementById("c_address").value = json_obj[1]['address'];
            document.getElementById("c_email").value = json_obj[1]['email'];
        }
    }
    req.open('GET', url, true);
    req.send();
}

document.addEventListener('DOMContentLoaded', function(){
    var update = document.getElementById("c_record");
    update.addEventListener('click', updateRecord, false);
}, false);
function updateRecord() {
            var input1 = document.getElementById('c_id');
            var input2 = document.getElementById('c_name');
            var input3 = document.getElementById('c_address');
            var input4 = document.getElementById('c_email');
            var url = "./sql5.php?param1=" + input1.value + "&param2=" + input2.value + "&param3=" +  input3.value + "&param4=" + input4.value;

            req.open('GET', url, true);
            req.send(null);
    
}

document.addEventListener('DOMContentLoaded', function(){
    var del = document.getElementById("d_record");
    del.addEventListener('click', deleteRecord, false);
}, false);

function deleteRecord(){
    var d_inp = document.getElementById('c_id');
    var url = "./sql6.php?dtext=" + d_inp.value;

    req.open('GET', url, true);
    req.send(null);
}