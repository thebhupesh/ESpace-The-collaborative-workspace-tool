<?php
	$servername="localhost";
	$username="root";
	$password="";
	$mydb="tcwt";
	$conn=new mysqli($servername, $username, $password, $mydb);
	$wid=$_POST["id"];
	$id=$_POST["pid"];
	$sql="SELECT * FROM workspace WHERE WID='$wid';";
	$result=mysqli_query($conn, $sql);
	if($result->num_rows==1) {
		while($row=$result->fetch_assoc()) {
			if($wid==$row["WID"]) {
				$sql="DELETE FROM workspace WHERE WID='$wid';";
				mysqli_query($conn, $sql);
				echo '<script>alert("Workspace Deleted Successfully!!!");</script>';
				echo "<form action='th_workspace.php' method='post' name='form'>
						<input type='hidden' name='id' value='$id'>
					</form>";
				echo "<script>document.form.submit();</script>";	
			}
		}
	}
	mysqli_close($conn);
?>