<?php
	$servername="localhost";
	$username="root";
	$password="";
	$mydb="tcwt";
	$conn=new mysqli($servername, $username, $password, $mydb);
	$tid=$_POST["tid"];
	$pmid=$_POST["id"];
	$sql="SELECT * FROM teams WHERE TID='$tid';";
	$result=mysqli_query($conn, $sql);
	if($result->num_rows==1) {
		while($row=$result->fetch_assoc()) {
			if($tid==$row["TID"]) {
				$sql="DELETE FROM teams WHERE TID='$tid';";
				mysqli_query($conn, $sql);
				echo '<script>alert("Team Deleted Successfully!!!");</script>';
				echo "<form action='pm_project.php' method='post' name='form'>
						<input type='hidden' name='id' value='$pmid'>
					</form>";
				echo "<script>document.form.submit();</script>";	
			}
		}
	}
	mysqli_close($conn);
?>