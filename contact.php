<?php
	 // MySQL database information
		 $servername = 'mysql.cs.nott.ac.uk';
		 $username = 'psxaa31';
		 $password = 'db123456';
		 $dbname = 'psxaa31';
		 $conn = mysqli_connect($servername, $username, $password, $dbname)or die ('I cannot connect to the database  because: ' . mysql_error());
		// Check connection
		if ($conn->connect_error) {
			die('Connection failed: ' . $conn->connect_error);
		}	
		session_start();
?>		