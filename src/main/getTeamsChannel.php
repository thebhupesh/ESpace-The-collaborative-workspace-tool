<?php
    $servername="localhost";
    $username="root";
    $password="";
    $mydb="tcwt";
    $id=$_REQUEST['id'];
    $tid=$_REQUEST['tid'];
    $conn=new mysqli($servername, $username, $password, $mydb);
    $mysqli = mysqli_connect($servername, $username, $password, $mydb);
    $sql="SELECT * FROM communication WHERE type = 't' AND TID = '$tid';";
    echo '<h2 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center"><b class="pagetabtitle">Team Messages</b></h2>';
    if($result=mysqli_query($conn, $sql)) {
        echo "<table class='w3-table w3-striped'>";
        echo "<thead>";
        echo "<tr class='w3-light-grey'>";
        echo "<th class='w3-center'>ID</th>";
        echo "<th class='w3-center'>Message</th>";
        echo "<th class='w3-center'>Sender</th>";
        echo "<th class='w3-center'>Time</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
    while($row=mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td class='w3-center'> {$row[0]}</td>";
            echo "<td class='w3-center'> {$row[1]}</td>";
            echo "<td class='w3-center'> {$row[5]}</td>";
            echo "<td class='w3-center'> {$row[6]}</td>";
            echo "</tr>";
        } 
        echo "</tbody></table><br>";
    }
	echo '<input class="w3-button w3-round w3-red"onclick="change()" type="submit" value="Back"></form></div><br><br>';
    $mysqli->close();
?>