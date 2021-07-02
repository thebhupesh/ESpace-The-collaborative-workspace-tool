<?php
	$servername="localhost";
	$username="root";
	$password="";
	$mydb="tcwt";
	$conn=new mysqli($servername, $username, $password, $mydb);
	$user=$_POST["user"];
	$oldpwd=$_POST["old"];
	$newpwd=$_POST["new"];
	$sql="SELECT * FROM accounts WHERE Username='$user';";
	$result=mysqli_query($conn, $sql);
	if($result->num_rows==1) {
		while($row=$result->fetch_assoc()) {	
			if($oldpwd==$row["Password"]) {
				$sql="UPDATE accounts SET password='$newpwd' WHERE Username='$user';";
				mysqli_query($conn, $sql);
				if($row["type"]=="pm") {
					echo "<form action='pm.php' method='post' name='form'>
					<input type='hidden' name='id' value='$user'>
					</form>";
					echo "<script>alert('Password Changed Successfully!!!');
					document.form.submit();</script>";
				}
				elseif($row["type"]=="th") {
					echo "<form action='th.php' method='post' name='form'>
					<input type='hidden' name='id' value='$user'>
					</form>";
					echo "<script>alert('Password Changed Successfully!!!');
					document.form.submit();</script>";
				}
				elseif($row["type"]=="mm") {
					echo "<form action='mm.php' method='post' name='form'>
					<input type='hidden' name='id' value='$user'>
					</form>";
					echo "<script>alert('Password Changed Successfully!!!');
					document.form.submit();</script>";
				}
			}
			else {
                if($row["type"]=="pm") {
					echo "<form action='pm.php' method='post' name='form'>
					<input type='hidden' name='id' value='$user'>
					</form>";
					echo "<script>alert('Incorrect Old Password!!!');
                	document.form.submit();</script>";
				}
				elseif($row["type"]=="th") {
					echo "<form action='th.php' method='post' name='form'>
					<input type='hidden' name='id' value='$user'>
					</form>";
					echo "<script>alert('Incorrect Old Password!!!');
                	document.form.submit();</script>";
				}
				elseif($row["type"]=="mm") {
					echo "<form action='mm.php' method='post' name='form'>
					<input type='hidden' name='id' value='$user'>
					</form>";
					echo "<script>alert('Incorrect Old Password!!!');
                	document.form.submit();</script>";
				}
			}
		}
	}
	else {
        if($row["type"]=="pm") {
			echo "<form action='pm.php' method='post' name='form'>
			<input type='hidden' name='id' value='$user'>
			</form>";
			echo "<script>alert('ERROR!!! Retry...');
        	document.form.submit();</script>";
		}
		elseif($row["type"]=="th") {
			echo "<form action='th.php' method='post' name='form'>
			<input type='hidden' name='id' value='$user'>
			</form>";
			echo "<script>alert('ERROR!!! Retry...');
        	document.form.submit();</script>";
		}
		elseif($row["type"]=="mm") {
			echo "<form action='mm.php' method='post' name='form'>
			<input type='hidden' name='id' value='$user'>
			</form>";
			echo "<script>alert('ERROR!!! Retry...');
        	document.form.submit();</script>";
		}
	}
	mysqli_close($conn);
?>