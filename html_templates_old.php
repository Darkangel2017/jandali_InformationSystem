<?php
function insert_content_and_view_dash(){
  ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Collapsible sidebar using Bootstrap 3</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/html_templates.css">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h2>POSSYSTEM</h2>
            </div>

            <ul class="list-unstyled components">
                <li class="active"><a href="dashboard.php">Dashboard</a></li>
                <li>
                    <a href="#homeSubmenu" id="supplier_drop_down" data-toggle="collapse" aria-expanded="false">Supplier</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li><a href="#">Add Suplier</a></li>
                        <li><a href="#">Edit Supplier</a></li>
                        <li><a href="#">Delete Supplier</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false">Client</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li><a href="#">Add Client</a></li>
                        <li><a href="#">Edit Client</a></li>
                        <li><a href="#">Delete Client</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Item</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li><a href="#">Add Items</a></li>
                        <li><a href="#">Edit Items</a></li>
                        <li><a href="#">Delete Items</a></li>
                        <li><a href="#">Return Bought Items</a></li>
                        <li><a href="#">Return Sold Items</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false">Balance</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu3">
                        <li><a href="#">With Full Payment</a></li>
                        <li><a href="#">Without Full Payment</a></li>
                    </ul>

                </li>
                <li>
                    <a href="#">Sell / Purchase</a>
                </li>
                <li>
                    <a href="#">Inventory</a>
                </li>

            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-default">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="navbar-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Account Details</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
          <!-- nav ends / view start -->
          <?php
        }






function content_end(){

        ?>
        </div>
        <!-- content ends -->

    </div>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
      
    </script>
</body>
</html>
<?php
}
?>
