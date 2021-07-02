<?php
    $servername="localhost";
    $username="root";
    $password="";
    $mydb="tcwt";
    $id=$_REQUEST['id'];
    $wid=$_REQUEST['pid'];
    $conn=new mysqli($servername, $username, $password, $mydb);
    $mysqli = mysqli_connect($servername, $username, $password, $mydb);
	echo "<input type='hidden' id='wid' value='$wid'>";
    $sql="SELECT * FROM workspace_files WHERE WID='$wid';";
	if($result=mysqli_query($conn, $sql)) {
		echo "<table class='w3-table w3-striped'>";
		echo "<thead>";
		echo "<tr class='w3-light-grey'>";
		echo "<th class='w3-center'>Version</th>";
		echo "<th class='w3-center'>Timestamp</th>";
		echo "<th class='w3-center'>Editor ID</th>";
		echo "<th class='w3-center'>Action</th>";  
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		while($row=mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td class='w3-center'> {$row[1]}</td>";
			echo "<td class='w3-center'> ".date("d-m-Y g:iA",strtotime($row[4]))."</td>";
			echo "<td class='w3-center'> {$row[7]}</td>";
        	echo "<td class='w3-center'> 
    		<button class='w3-bar-item w3-button w3-round' style='background-color: #0f2653; color: white;' name='wid' value='$row[1]' onclick='update4(this.value)' ><b>Select</b></button></td>";
			echo "</tr>";
		}
		echo "</tbody></table><br>";
	}
?>