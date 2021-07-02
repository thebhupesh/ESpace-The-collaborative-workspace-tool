<!DOCTYPE html>
<html>
	<title>ESPACE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<body class="w3-container">
		<?php
			function tid() {
				$id=rand(1000, 9999);
				$mysqli=new mysqli('localhost', 'root', '', 'tcwt');
				$result=$mysqli->query("SELECT TID FROM teams WHERE TID='$id';");
				if($result->num_rows==0) {
					return strval($id);
				}
				else {
					tid();
				}
				$mysqli->close();
			}
			$servername="localhost";
			$username="root";
			$password="";
			$mydb="tcwt";
			$conn=new mysqli($servername, $username, $password, $mydb);
			$id='T';
			$id.=tid();
			$name=$_POST["teamname"];
			$des=$_POST["description"];
            $pid=$_POST["pid"];
            $pmid=$_POST["id"];
			$sql="INSERT INTO teams VALUES('$id', '$name', '$des', '$pid',null);";
			mysqli_query($conn, $sql);
			mysqli_close($conn);
			echo "<div class='w3-panel w3-green w3-center'>
					<h3>Team Created Successfully!!!</h3>
					<p><b>Team ID: $id</b></p>
					<form action='pm_project.php' method='post'>
						<input type='hidden' name='id' value='$pmid'>
						<button class='w3-button w3-block w3-white w3-section w3-padding' type='submit'>Okay</button>
					</form>
				</div>";
		?>
	</body>
</html>