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
			$msg=$_POST["msg"];
			$tids=$_POST["tids"];
            $pid=$_POST["pid"];
			$pmid=$_POST["id"];
            $sql="SELECT COUNT(TID) FROM teams WHERE PID='$pid';";
            $result=mysqli_query($mysqli,$sql);
            $row=mysqli_fetch_array($result);  
            if($row[0]==count($tids)){
                $type='p';
            }
            else{
                $type='t';
            }
            $time=date("Y-m-d H:i:s");
            for($i=0;$i<count($tids);$i++){
                $tid=$tids[$i];
                $sql="INSERT INTO communication VALUES('$id', '$msg', '$tid','$pid','$type', '$pmid','$time');";
                mysqli_query($conn, $sql);
            }
			mysqli_close($conn);
			echo "<div class='w3-panel w3-green w3-center'>
					<h3>Message Broadcasted Successfully!!!</h3>
					<p><b>Message ID: $id</b></p>
					<form action='pm_communication2.php' method='post'>
						<input type='hidden' name='id' value='$pmid'>
                        <input type='hidden' name='pid' value='$pid'>
						<button class='w3-button w3-block w3-white w3-section w3-padding' type='submit'>Okay</button>
					</form>
				</div>";
		?>
	</body>
</html>