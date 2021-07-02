<?php
    $servername="localhost";
    $username="root";
    $password="";
    $mydb="tcwt";
    $id=$_REQUEST['id'];
    $pid=$_REQUEST['pid'];
    $msg=$_REQUEST['msg'];
    $conn=new mysqli($servername, $username, $password, $mydb);
    $mysqli = mysqli_connect($servername, $username, $password, $mydb);
    ?>
    <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center"><b class="pagetabtitle">Select Team</b></h2>
    <input type="checkbox" class="w3-bar-item w3-button " onclick="toggle(this)"> For Whole Project<br>
                                    <form action="storeMsg.php" method="post">
                                    <?php      
                                        $sql="SELECT * FROM teams WHERE PID='$pid';";
                                        if($result=mysqli_query($conn, $sql)) {
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
                                            while($row=mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td class='w3-center'> {$row[0]}</td>";
                                                echo "<td class='w3-center'> {$row[1]}</td>";
                                                echo "<td class='w3-center'> {$row[2]}</td>";
                                                echo "<td class='w3-center'> {$row[4]}</td>";
                                                echo '<td class="w3-center"> 
                                                    <input type="checkbox" class="w3-bar-item w3-button " name="tids[]" value="'.$row["TID"].'" ></td>';
                                                echo "</tr>";
                                            } 
                                            echo "</tbody></table><br>";
                                        }
                                echo '<input type="hidden" name="id" value="'.$id.'">
                                <input type="hidden" name="pid" value="'.$pid.'">
                                <input type="hidden" name="msg" value="'.$msg.'">';?>
                                <b><input class="w3-button" type="submit" value="Confirm"></b>  </form>  
                                
<?php
    $mysqli->close();
?>