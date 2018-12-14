<html>
<head>
<style>
.button {
    background-color: Beige;
    border: 2;
    color: purple;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
<div class="header">

<a href="https://www.nottingham.ac.uk/"><img src="nott3.png" width="350" height="120" title="Uni logo" alt="Logo"></a>

<h1><span style="color: White;"> <center> Welcome to Blue castle </center> </span></h1>
</div>

<body background="Background4.jpg">
		
		 <hr>
		<center>
		<span style="color: black;">
		<font size="6">
		<p>Please Enter your Username and Password</p>
		<form method="POST">
		User Name: <input type="text" name="username"><br><br>
		Password &nbsp;&nbsp;: <input type="password" name="password"><br>
		 <input type="submit" class="button" value="Login">
		 <a href="signup.php"> signup </a>
		</font>
		 </span>
		 </form></center>
		 </hr>
	</body>
<?php
	if ($_POST['username']!="" && $_POST['password']!="")
	{
 		//connect to database
 		include "contact.php";
 		//make query
 		$query="SELECT * FROM login;";
		//send query to database
		$result = mysqli_query($conn, $query);

		$login=False;
		while($row = mysqli_fetch_assoc($result))
 		{
 			//check if pair post values match any pair of database tuples
 			if ($row["UserName"]==$_POST['username'] && $row["Password"]==$_POST['password'])
 			{
 				if ($row["Type"]=="Admin"){
 					echo "Login-in as Administrator is successful <br>";
					header("location:home_blue.php");
 					echo "<a>continue1</a>";
 					$login=True;
 					
 				}
 				if ($row["Type"]=="User"){
 					echo "Login-in as a student is successful <br>";
					header("location:home_blue.php");
 					echo "<a>continue2</a>";
 					$login=True;
 					
 				}
 			}
 		}
 		if ($login==False){
 			echo  "<h2><center>   Kindly check your username and password <h2></center>  ";
			 
 			mysqli_close($conn);
 		}
 		
 	}



?>

<!DOCTYPE html>
<body><left>

<h2><p id="demo"></p><h2>

<script>
document.getElementById("demo").innerHTML=Date();
</script>

</body>




</html>