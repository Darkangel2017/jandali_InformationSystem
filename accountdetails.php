<?php
include('connection.php');
include('html_templates.php');
start_page_side_bar();
$q="SELECT * FROM user WHERE user_id='{$_SESSION['user_id']}'";
$user_details=mysqli_fetch_assoc(mysqli_query($conn,$q));
if(!isset($_SESSION['user_id'])){

  ?>
<script>
window.location.replace("index.php");
</script>

<?php
}
?>

<div class="accountcontainer">
  <h2>Account Details</h2><br>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']  ?> ">
  <span>Username </span><br><input class="accountinputs" type="text" name="username" value="<?php echo $user_details['username']  ?> "><br>
  <span>New Password </span><br><input class="accountinputs" type="password" name="password" value=""><br>
  <span>Confirm Password </span><br><input class="accountinputs" type="password" name="password2" value=""><br>
  <span>Address </span><br> <input  class="accountinputs" type="text" name="address" value="<?php echo $user_details['address']  ?> "><br>
  <span>Phone Number </span><br><input class="accountinputs" type="text" name="phonenumber" value="<?php echo $user_details['phone__number']  ?> "><br>
  <input type="submit" class="savebutton" name="save" value="Save"><br>
  </form>
  <form action="<?php echo $_SERVER['PHP_SELF']  ?> " method="post" enctype="multipart/form-data">
    Select Logo to upload:
    <input type="file" name="fileToUpload" style="width: 100%;" class="accountinputs" required id="fileToUpload">
    <input type="text" name="logo_name" id="logo_name" class="accountinputs" required placeholder="LOGO Name">
    <input type="submit" value="Upload Logo" style="width: 100%" name="submit_image">
  </form>
  <a href="adduser.php" class="newuser">Add New Account</a>
</div>



<?php
if(isset($_POST['save'])){
$username=$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$address=$_POST['address'];
$phone__number=$_POST['phonenumber'];
if($password==""){
  $q="UPDATE user SET username='{$username}', address='{$address}', phone__number='{$phone__number}'";
  mysqli_query($conn,$q); 
?>

<script> 
location.replace("accountdetails.php"); 
</script>
<?php 
}
else {
  if($password!=$password2){
    echo 'Invalid input, passwords are not identical !';
  }
  else{
    $q="UPDATE user SET username='{$username}', password='{$password}', address='{$address}' , phone__number='{$phone__number}'";
    mysqli_query($conn,$q); 

  ?>
  
<script> 
location.replace("logout.php"); 
</script>
  <?php
  }

}

}



if(isset($_POST["submit_image"])){
  $logo_name=$_POST['logo_name'];
  $final_dir="";
  $target_dir = "images/logos/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
  }
  // Check if file already exists
  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
          $final_dir="images/logos/" .basename( $_FILES["fileToUpload"]["name"]);
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }
  $q="INSERT INTO logo VALUES (null,'{$logo_name}','{$final_dir}')";
  mysqli_query($conn,$q);
  }
  
end_page_side_bar();
 ?> 
