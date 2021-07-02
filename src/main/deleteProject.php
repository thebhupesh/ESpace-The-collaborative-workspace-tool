<?php
	$servername="localhost";
	$username="root";
	$password="";
	$mydb="tcwt";
	$conn=new mysqli($servername, $username, $password, $mydb);
	$id=$_POST["id"];
	$pmid=$_POST["pm"];
	$sql="SELECT * FROM projects WHERE PID='$id';";
	$result=mysqli_query($conn, $sql);
	if($result->num_rows==1) {
		while($row=$result->fetch_assoc()) {
			if($id==$row["PID"]) {
				$sql="DELETE FROM projects WHERE PID='$id';";
				mysqli_query($conn, $sql);
				echo '<script>alert("Project Deleted Successfully!!!");</script>';
				echo "<form action='pm_project.php' method='post' name='form'>
						<input type='hidden' name='id' value='$pmid'>
					</form>";
				echo "<script>document.form.submit();</script>";	
			}
		}
	}
	mysqli_close($conn);
?>