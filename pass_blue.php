<html>
<head>
<head>
<body>
<title>Blue Castle Home Page</title>
<link rel="stylesheet" type="text/css" href="style.css">
 
<div class="header">
  <h1>Welcome to Bluecastle Student Portal</h1>
</div>


	<a class="logout button" href="login.php">
  <form class="log-out" action="login.php">
  <input type="submit" name="Log out">

  </form>
	</a>

<div class="topnav">
  <p><b><a href="modules_blue.php" target="_blank">Modules</a></b></p>
  <p><b><a href="reports_blue.php" target="_blank">Reports</a></b></p>
  <p><b><a href="timetable_blue.php" target="_blank">Time Table</a></b></p>
  <p><b><a href="https://moodle.nottingham.ac.uk/login/index.php" target="_blank">Moodle</a></b></p>
  <p><b><a href="pass_blue.php" target="_blank">Change Password</a></b></p>
  <p><b><a href="https://www.nottingham.ac.uk/it-services/help/help.aspx" target="_blank">Help</a></b></p>
</div>

       <p>Please Enter Username and New Password</p>
       <form action="pass_blue.php" method="POST">
       User Name: <input type="text" name="UserName" required><br><br>
       New Password:<input type="text" name="Password" required><br><br>
                   <input type="submit" name="update" class="button" value=" Change Password"><br>
           <p><a href="login.php">Logout</a>
     
        </span>
        </form>
       
 </body> 

</head>   


<?php
/*include "contact.php"; */
/* php code to Update data from mysql database Table */



if(isset($_POST['update']))
{
 
  
$servername = 'mysql.cs.nott.ac.uk';
$username = 'psxaa31';
$password = 'db123456';
$dbname = 'psxaa31';
$conn = mysqli_connect($servername, $username, $password, $dbname); 

  /* get values from input text and number */
   
   $Username = $_POST['UserName'];
   $Password = $_POST['Password'];
           
   /* mysql query to Update data */
   $query = "UPDATE login SET Password='$Password' WHERE UserName = '$Username'";
   
   $result = mysqli_query($conn, $query);
   
   if($result)
   {
       echo '<h2>Password Updated</h2>';
   }
   else
    {
       
       echo 'Password Not Updated';
     }
   mysqli_close($conn);
}

?>

</body>
</html>