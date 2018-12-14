<!DOCTYPE html>
<html lang="en">
<head>
<title>Addnig Modules</title>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<body>
<div class="topnav">
  <p><b><a href="home_blue.php" target="_blank">Home</a></b></p>
  <p><b><a href="reports_blue.php" target="_blank">Reports</a></b></p>
  <p><b><a href="timetable_blue.php" target="_blank">Time Table</a></b></p>
  <p><b><a href="https://moodle.nottingham.ac.uk/login/index.php" target="_blank">Moodle</a></b></p>
  <p><b><a href="https://www.nottingham.ac.uk/it-services/help/help.aspx" target="_blank">Help</a></b></p>
</div>

<br>
<br>
<div class="display modules">
<p><b><a href="add_module.php" target="_blank">Add Module</a></b></p>
<p><b><a href="modules_blue.php" target="_blank">Delete Module</a></b></p>
<p><b><a href="display_blue2.php" target="_blank">Display Modules</a></b></p>
  
</div>


<div class="header">
  <h1>Adding Modules</h1>
</div>
<body>
		
		
		<form  method="POST">
		<fieldset>
		<legend>Please Enter the module detailes:</legend><br>

		 Module Code:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="module_id"><br>
		 <br>
		 Module Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="module_name"><br>
		 <br>
		 Credits:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="datepicker" name="credits"><br>
		 <br>
		 Student ID: <input type="text" name="UserID"><br>
		 <br>
		
		 <input type="submit" onclick="myFunction()" value = "Add Module">
		<input type="submit" value = "Back to Modules Page" formaction="modules_blue.php">
		 
		 </center>
		 </form>
		</fieldset>
		 <script>
		function myFunction() {
			alert("The module was successfully Registrerd PLEASE check your email in 5 working days for confirmation");
		}
		</script>
		
		</font>
		</span>
		</form>
	</body>
	<?php
		include "contact.php";
		// construct the SELECT query
		 $sql = "SELECT * FROM modules ;";
		 // send query to database
		 $result = mysqli_query($conn, $sql);
		echo"<br>";
		echo"<left><h2>The number of modules in your timetable: ".mysqli_num_rows($result)."</center><br>";
		
		while($row = mysqli_fetch_assoc($result))
		 {
				if ($row["module_id"] == NULL){
					$row["module_id"]="No Module ID Registered";
				} 
				if ($row["module_name"] == NULL){
					$row["module_name"]="No Name Registered";
				}
				if ($row["credits"] == NULL){
					$row["credits"]="No Credits Registered";
				}
				if ($row["UserID"] == NULL){
					$row["UserID"]="No Student ID  Registered";
				}				
		 }	
		 
		if ($_POST['module_id']!="" && $_POST['module_name']!=""	&& $_POST['credits']!="" && $_POST['UserID']!="")
		{
		echo "module_id: ".$_POST['module_id']." module_name: ".$_POST['module_name']." credits: ".$_POST['credits']." UserID: ".$_POST['UserID']."<br>";
		$sql="INSERT INTO modules(module_id,module_name,credits,UserID) VALUES
		('".$_POST['module_id']."','".$_POST['module_name']."','".$_POST['credits']."','".$_POST['UserID']."');";
		$result = mysqli_query($conn, $sql); 

		}
	?> 


</body>
</html>
