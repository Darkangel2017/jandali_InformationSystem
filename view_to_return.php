<?php
require_once 'connection.php';
require 'html_templates.php';
require_once 'functions.php';
if(!isset($_SESSION['user_id'])){?>
    <script>
    window.location.replace("index.php");
    </script>
    <?php
    }
    if(isset($_POST['view_bought_items'])){
    start_page_side_bar();
    ?>


<table id="data" class="compact table table-striped"  style="width:100%;">
</table>
<div id="view_invoice"></div>
<script type="text/javascript">
get_table();
function get_table(){
var table=document.getElementById("data");
var xhttp = new XMLHttpRequest();
xhttp.open("GET", "view_bought_items.php", true);
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        table.innerHTML=this.responseText;
        fill_table();
    }
};

xhttp.send();
}
function fill_table() {
$('#data').DataTable();
}
</script>



<?php
    end_page_side_bar();
    }
    else if (isset($_POST['view_sold_items'])){
    start_page_side_bar();
?>


<table id="data" class="compact table table-striped"  style="width:100%;">
</table>
<div id="view_invoice"></div>
<script type="text/javascript">
get_table();
function get_table(){
var table=document.getElementById("data");
var xhttp = new XMLHttpRequest();
xhttp.open("GET", "view_sold_items.php", true);
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        table.innerHTML=this.responseText;
        fill_table();
    }
};

xhttp.send();
}
function fill_table() {
$('#data').DataTable();
}
</script>

<?php




    end_page_side_bar();
    
    }
?>
<script>

function return_bought_invoice(id){
        var row=document.getElementById(id);
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "return_bought_invoice.php?id="+id, true);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                   document.getElementById('view_invoice').innerHTML=this.responseText
            }
        };
        xhttp.send();
} 



    function return_sold_invoice(id){
        var row=document.getElementById(id);
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "return_sold_invoice.php?id="+id, true);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('view_invoice').innerHTML=this.responseText
            }
        };
        xhttp.send();
    }


</script>