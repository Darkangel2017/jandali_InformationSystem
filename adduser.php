<?php
include('connection.php');
include('html_templates.php');
start_page_side_bar();
if(!isset($_SESSION['user_id'])){

  ?>
<script>
window.location.replace("index.php");
</script>
<?php
}
?>

<div class="accountcontainer">
  <h2>Add New Account</h2><br>
  <form method="post" action="<?PHP echo $_SERVER['PHP_SELF']?>">
  <span>Username </span><br><input class="accountinputs" type="text" name="username" required value=""><br>
  <span>New Password </span><br><input class="accountinputs" type="password" name="password" required value=""><br>
  <span>Confirm Password </span><br><input class="accountinputs" type="password" name="password1" required value=""><br>
  <span>Address </span><br><input  class="accountinputs" type="text" name="address" required value=""><br>
  <span>Phone Number </span><br><input class="accountinputs" type="number" name="phonenumber" required value=""><br>
    <span>Type of User</span><br><select class="userselection" name="typeofuser">
      <option value="0">Admin</option>
      <option value="1">Employee</option>
    </select><br>
  <input type="submit" class="savebutton" name="save" value="Save"><br>
  </form>

</div>


<?php
if(isset($_POST['save'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $password1=$_POST['password1'];
  $address=$_POST['address'];
  $phone__number=$_POST['phonenumber'];
  $role_id=$_POST['typeofuser'];
  if($password==""){
    echo 'Please Enter A password for the new user';
  }
  elseif($password!=$password1){
    echo 'The passwords should be identical';

  }
  else {
    $q="INSERT INTO user VALUES (NULL,'{$username}','{$password}','{$address}','{$phone__number}','{$role_id}')";
    mysqli_query($conn,$q);
    $last_id = $conn->insert_id;
    $q="INSERT INTO purchase_cart VALUES (NULL , {$last_id})";
    mysqli_query($conn,$q);
    $q="INSERT INTO sell_cart VALUES (NULL, {$last_id})";
    mysqli_query($conn,$q);
    echo 'New User Added Successfully';
  }
}


end_page_side_bar();
?>
