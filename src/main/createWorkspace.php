<!DOCTYPE html>
<html>
	<title>ESPACE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<body class="w3-container">
		<?php
			function wid() {
				$id=rand(1000, 9999);
				$mysqli=new mysqli('localhost', 'root', '', 'tcwt');
				$result=$mysqli->query("SELECT WID FROM workspace WHERE WID='$id';");
				if($result->num_rows==0) {
					return strval($id);
				}
				else {
					wid();
				}
				$mysqli->close();
			}
			$servername="localhost";
			$username="root";
			$password="";
			$mydb="tcwt";
			$conn=new mysqli($servername, $username, $password, $mydb);
			$id='W';
			$id.=wid();
			$name=$_POST["wname"];
			$des=$_POST["description"];
			$pid=$_POST["pid"];
            $tid=$_POST["tid"];
			$thid=$_POST["id"];
			$sql="INSERT INTO workspace VALUES('$id', '$name', '$des', '$tid' ,'$pid');";
			mysqli_query($conn, $sql);
			mysqli_close($conn);
			echo "<div class='w3-panel w3-green w3-center'>
					<h3>Workspace Created Successfully!!!</h3>
					<p><b>Workspace ID: $id</b></p>
					<form action='th_workspace.php' method='post'>
						<input type='hidden' name='id' value='$thid'>
						<button class='w3-button w3-block w3-white w3-section w3-padding' type='submit'>Okay</button>
					</form>
				</div>";
		?>
	</body>
</html>