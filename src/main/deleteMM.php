<?php
	$servername="localhost";
	$username="root";
	$password="";
	$mydb="tcwt";
	$conn=new mysqli($servername, $username, $password, $mydb);
	$id=$_POST["id"];
	$mid=$_POST["mid"];
    $tid=$_POST["tid"];
	$sql="DELETE FROM member WHERE TID='$tid' AND MID='$mid';";
	mysqli_query($conn, $sql);
	$sql="SELECT * FROM member WHERE MID='$mid';";
    $result=mysqli_query($conn, $sql);
    if($result->num_rows==0) {
		$sql="DELETE FROM accounts WHERE Username='$mid';";
		mysqli_query($conn, $sql);
	}
    echo '<script>alert("Member Deleted Successfully!!!");</script>';
    echo "<form action='th_teammember.php' method='post' name='form'>
	<input type='hidden' name='id' value='$id'>
	</form>";
	echo "<script>document.form.submit();</script>";	
	mysqli_close($conn);
?>