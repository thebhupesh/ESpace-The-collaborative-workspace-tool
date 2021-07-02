<!DOCTYPE html>
<html>
	<title>ESPACE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<body class="w3-container">
		<?php
			$servername="localhost";
			$username="root";
			$password="";
			$mydb="tcwt";
			$conn=new mysqli($servername, $username, $password, $mydb);
			$mysqli = mysqli_connect($servername, $username, $password, $mydb);
			$wid=$_POST["wid"];
			$pid=$_POST["id"];
			$title=$_POST["title"];
			$data=$_POST["data"];
			$sql="SELECT COUNT(WID) FROM workspace_files WHERE WID='$wid';";
			$result=mysqli_query($mysqli,$sql);
			$row=mysqli_fetch_array($result);   
			$version = $row[0] + 1;
			$sql="SELECT type FROM accounts WHERE MID ='$pid';";
			$res=mysqli_query($mysqli,$sql);
			$row=mysqli_fetch_array($res);
			$type=$row[0];
			if($type=='pm'){
			$submit_url="pm_workspace.php";
			}
			elseif($type=='th'){
			$submit_url="th_workspace.php";
			}
			elseif($type=='mm'){
			$submit_url="mm_workspace.php";
			}
			$timeStamp=date("Y-m-d h:i:s");
			$sql="INSERT INTO workspace_files VALUES('$wid','$version','$title','$data','$timeStamp',' ',' ','$pid');";
			mysqli_query($conn, $sql);
			mysqli_close($conn);
				echo "<div class='w3-panel w3-green w3-center'>
					<h3>Workspace File Saved Successfully!!!</h3>
					<p><b>Version: $version</b></p>
					<form action='$submit_url' method='post'>
					<input type='hidden' name='id' value='$pid'>
					<input type='hidden' name='pid' value='NULL'>
					<button class='w3-button w3-block w3-white w3-section w3-padding' type='submit'>Okay</button>
					</form>
				</div>";
		?>
	</body>
</html>