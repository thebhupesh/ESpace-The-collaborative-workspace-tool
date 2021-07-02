<?php
    $mysqli=new mysqli("localhost", "root", "", "tcwt");
    $sql="SELECT * From teams WHERE PID = ?";
    $id=$_REQUEST['id'];
    $stmt=$mysqli->prepare($sql);
    $stmt->bind_param("s", $_GET['pid']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($TID, $Name, $Description, $PID, $THID); 
    echo '<h2 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center"><b class="pagetabtitle">Select Team</b></h2>';
    echo "<table class='w3-table w3-striped'>";
						echo "<thead>";
						echo "<tr class='w3-light-grey'>";
						echo "<th class='w3-center'>ID</th>";
						echo "<th class='w3-center'>Name</th>";
						echo "<th class='w3-center'>Description</th>";
						echo "<th class='w3-center'>Team Head</th>";
						echo "<th class='w3-center'>Action</th>";  
						echo "</tr>";
						echo "</thead>";
						echo "<tbody>";
    while($stmt->fetch()) {
        echo "<tr>";
							echo "<td class='w3-center'> ".$TID."</td>";
							echo "<td class='w3-center'> ".$Name."</td>";
							echo "<td class='w3-center'> ".$Description."</td>";
							echo "<td class='w3-center'> ".$THID."</td>";
                            echo '<td class="w3-center"> <form action="deleteTeam.php" method="post">
									<input type="hidden" name="id" value="'.$id.'">
									<input type="hidden" name="tid" value="'.$TID.'">
                                    <input class="w3-button w3-round"  type="submit" value="Delete">
                                    </form></td>';
							echo "</tr>";
						} 
						echo "</tbody></table>";
						echo '<div class="w3-center"><br><input class="w3-button w3-red w3-round" onclick="change()" type="submit" value="Back"></div><br>';
    $stmt->close(); 
    $mysqli->close();
?>