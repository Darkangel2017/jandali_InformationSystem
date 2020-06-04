<?php 
include('connection.php');
include('html_templates.php');
start_page_side_bar_for_dashboard();
?>
<div id="view_reports" style="width:100%"> 
<!-- <form method="post" action="print_report.php">  -->
<!-- <input type="submit" name="monthly_report"  style="width:30%; margin-left: 15em; margin-top: 5em;" value="Print Monthly Report" class="addbutton" > -->
<!-- <input type="submit" name="yearly_report" style="width:30%;" value="Print Yearly Report" class="addbutton" > -->
<!-- </form> -->
</div>

<div id="income" style="width:auto;"></div>
  <div id="expenditures" style="width:auto;"></div>
  <div id="sales" style="width:auto;"></div>
  <div id="purchases" style="width:auto;!important"></div>
        <?php
view_dashboard_html();
// Daily income
for ($i=6; $i >=0 ; $i--) {
    $date_reserved="%".date('Y-m-d',mktime(0, 0, 0, date('m'), date('d')-$i, date('y')))."%";
    $q="SELECT SUM(amount_paid) FROM sell_invoice WHERE invoice_date_of_sale like '{$date_reserved}'";
    // echo $date_reserved;
    $result=mysqli_query($conn,$q);
    $row = mysqli_fetch_array($result);
    // print_r($row);
    isset($row[0])?$daily_income[(date('N')-$i+7)%7]=$row[0]:$daily_income[(date('N')-$i+7)%7]=0;
    }
    //Daily expenditure
    for ($i=6; $i >=0 ; $i--) {
        $date_reserved="%".date('Y-m-d',mktime(0, 0, 0, date('m'), date('d')-$i, date('y')))."%";
        $q="SELECT SUM(amount_paid) FROM purchase_invoice WHERE invoice_date_of_sale like '{$date_reserved}'";
        // echo $date_reserved;
        $result=mysqli_query($conn,$q);
        $row = mysqli_fetch_array($result);
        // print_r($row);
        isset($row[0])?$daily_expenditure[(date('N')-$i+7)%7]=$row[0]:$daily_expenditure[(date('N')-$i+7)%7]=0;
        }
    // Daily sold items
    for ($i=6; $i >=0 ; $i--) {
        $date_reserved="%".date('Y-m-d',mktime(0, 0, 0, date('m'), date('d')-$i, date('y')))."%";
        $q="SELECT SUM(sell.quantity) FROM sell_invoice, sell WHERE sell.invoice_group=sell_invoice.invoice_group and sell_invoice.invoice_date_of_sale like  '{$date_reserved}'";
        $result=mysqli_query($conn,$q);
        $row = mysqli_fetch_array($result);
        isset($row[0])?$daily_sold_items[(date('N')-$i+7)%7]=$row[0]:$daily_sold_items[(date('N')-$i+7)%7]=0;
        }
    //Daily bought items
    for ($i=6; $i >=0 ; $i--) {
        $date_reserved="%".date('Y-m-d',mktime(0, 0, 0, date('m'), date('d')-$i, date('y')))."%";
        $q="SELECT SUM(purchase.quantity) FROM purchase_invoice , purchase WHERE purchase.invoice_group=purchase_invoice.invoice_group and purchase_invoice.invoice_date_of_sale like  '{$date_reserved}'";
        $result=mysqli_query($conn,$q);
        $row = mysqli_fetch_array($result);
        isset($row[0])?$daily_bought_items[(date('N')-$i+7)%7]=$row[0]:$daily_bought_items[(date('N')-$i+7)%7]=0;
        }
    $days = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
      ];

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(income);
google.charts.setOnLoadCallback(expenditures);
google.charts.setOnLoadCallback(daily_sold_items);
google.charts.setOnLoadCallback(daily_bought_items);
function income() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Day Of Week');
      data.addColumn('number', 'Income');
      data.addRows([
        <?php 
         
         	foreach ($daily_income as $day => $income) {
        		echo "['".$days[$day]."',".$income."],";
        	}
        ?>
      ]);

      var options = {
        title: 'Daily Income Throughout Last Week',
        hAxis: {
          title: 'Day of Week'
        },
        vAxis: {
          title: 'USD'
        },
        colors: ['green','green'],
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('income'));

      chart.draw(data, options);
    }

    
    function expenditures() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Day Of Week');
      data.addColumn('number', 'expenditures');
      data.addRows([
        <?php 
         
         	foreach ($daily_expenditure as $day => $income) {
        		echo "['".$days[$day]."',".$income."],";
        	}
        ?>
      ]);

      var options = {
        title: 'Daily expenditures Throughout Last Week',
        hAxis: {
          title: 'Day of Week'
        },
        vAxis: {
          title: 'USD'
        },
        colors: ['red','green'],
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('expenditures'));

      chart.draw(data, options);
    }


    function daily_sold_items() {
	var data = new google.visualization.DataTable();
      data.addColumn('string', 'Day Of Week');
      data.addColumn('number', 'Sold Items');
      data.addRows([
        <?php 
         
         	foreach ($daily_sold_items as $day => $income) {
        		echo "['".$days[$day]."',".$income."],";
        	}
        ?>
      ]);

      var options = {
        title: 'Number Of Items Sold',
        hAxis: {
          title: 'Day of Week'
        },
        vAxis: {
          title: 'USD'
        },
        colors: ['blue','green'],
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('sales'));

      chart.draw(data, options);
    }

     function daily_bought_items() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Day Of Week');
      data.addColumn('number', 'Items Bought');
      data.addRows([
        <?php 
         
         	foreach ($daily_bought_items as $day => $income) {
        		echo "['".$days[$day]."',".$income."],";
        	}
        ?>
      ]);

      var options = {
        title: 'Items Bought Last Week',
        hAxis: {
          title: 'Day of Week'
        },
        vAxis: {
          title: 'USD'
        },
        colors: ['black','green'],
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('purchases'));

      chart.draw(data, options);
    }


    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
      });
    });
    

</script>

<?php
end_page_side_bar_for_dashboard();
?>