<!DOCTYPE html>
<html>
	<title>ESPACE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<body class="w3-container">
		<?php
			function mid() {
				$id=rand(1000, 9999);
				$mysqli=new mysqli('localhost', 'root', '', 'tcwt');
				$result=$mysqli->query("SELECT MsgID FROM communication WHERE MsgID='$id';");
				if($result->num_rows==0) {
					return strval($id);
				}
				else {
					mid();
				}
				$mysqli->close();
			}
			$servername="localhost";
			$username="root";
			$password="";
			$mydb="tcwt";
			$conn=new mysqli($servername, $username, $password, $mydb);
            $mysqli = mysqli_connect($servername, $username, $password, $mydb);
			$id='B';
			$id.=mid();
			$msg=$_POST["mssage"];
			$tid=$_POST["tid"];
            $pid=$_POST["pid"];
			$thid=$_POST["id"];
            $type='t';
            $time=date("Y-m-d H:i:s");
            $sql="INSERT INTO communication VALUES('$id', '$msg', '$tid','$pid','$type', '$thid','$time');";
            mysqli_query($conn, $sql);
			mysqli_close($conn);
			echo "<div class='w3-panel w3-green w3-center'>
					<h3>Message Broadcasted Successfully!!!</h3>
					<p><b>Message ID: $id</b></p>
					<form action='th_communication.php' method='post'>
						<input type='hidden' name='id' value='$thid'>
                        <input type='hidden' name='pid' value='$pid'>
						<button class='w3-button w3-block w3-white w3-section w3-padding' type='submit'>Okay</button>
					</form>
				</div>";
		?>
	</body>
</html>