<?php
require 'html_templates.php';
require_once 'connection.php';
if(!isset($_SESSION['user_id'])){?>
  <script>
  window.location.replace("index.php");
  </script>
  <?php
  }
start_page_side_bar();


echo '
<form method=post action=view_to_return.php>
<div class="container">
<div class="balancelbp">
  <p>Bought Items : </p>
  <div id="bought_items">
  <input type="submit" name="view_bought_items"class="editbutton" value="View Bought Items"></input>
  </div>
</div>
<div class="balanceusd">
  <p>Sold Items : </p>
  <div id="sold_items">
  <input type="submit" name="view_sold_items" class="editbutton" value="View Sold Items"></input>
  </div>
</div>
</form>
';






end_page_side_bar();
?>