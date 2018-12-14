
<!DOCTYPE html>
<html lang="en">
<head>
<title>Signup Module</title>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<body>
<div class="topnav">
<margin-center><p><b><a href="login.php" target="_blank">Exist</a></b></p></margin-center>
  
</div>


<?php
  
 /* session_start();*/
  include "contact.php";

    $UserName = "";

    $errors = array(); 

  if (isset($_POST['submit'])) {
    // receive all input values from the form
    $UserName = mysqli_real_escape_string($conn, $_POST['UserName']);
    $Type = mysqli_real_escape_string($conn, $_POST['Type']);
    $Password_1 = mysqli_real_escape_string($conn, $_POST['Password']);
    $Password_2 = mysqli_real_escape_string($conn, $_POST['Password2']);
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($UserName))
     {
          array_push($errors, "UserName is required"); 
        }
    if (empty($Type)) 
    {
         array_push($errors, "User Type is required ");
        
         }

    if (empty($Password_1)) 
    {
         array_push($errors, "Password is required");

         }
    if ($Password_1 != $Password_2)
     {
      array_push($errors, "The two Passwords do not match");
    }
  
    // first check the database to make sure 
    // a user does not already exist with the same UserName and/or email
    $user_check_query = "SELECT * FROM login WHERE UserName='$UserName' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exist
      if ($user['UserName'] === $UserName) {
        array_push($errors, "User name is already exist");
      }
  
     
    }
  
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $Password = md5($Password_1);//encrypt the Password before saving in the database
  
        $query = "INSERT INTO login (UserName, Password, Type) 
                  VALUES('$UserName','$Password_1','$Type')";
        mysqli_query($conn, $query);
        $_SESSION['UserName'] = $UserName;
        $_SESSION['success'] = "You are now rigsterd";
        header('location: login.php');
    }
  }
  
?>
<main>

<div class="login-box">
    <section>
    <img src="nott3.png" class="avatar">
        <h1>Please Enter Your Details</h1>
        
     <form  method="post">
                        <p>UserName</p>
       <input type="text" name="UserName" placeholder="UserName">
                        <p> User Type</p>
                        <br>
        <p> For Student please enter (User) and for Tutors is (Admin) </p>
       <input type="text" name="Type" placeholder="Type">
       <br>
                   <p>Password</p>
       <input type="Password" name="Password" placeholder="Password">
                        <p>retype Password</p>
       <input type="Password" name="Password2" placeholder="retype-Password">
                        
       <input type="submit" name="submit" value="submit">
    </form>
    <?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
    </section>
</div>
</main>



