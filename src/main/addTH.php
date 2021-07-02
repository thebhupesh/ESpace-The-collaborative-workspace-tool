<!DOCTYPE html>
<html>
	<title>ESPACE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<body class="w3-container">
		<?php
			function mid() {
				$id=rand(1000, 9999);
				$mysqli=new mysqli('localhost', 'root', '', 'tcwt');
				$result=$mysqli->query("SELECT MID FROM member WHERE MID='$id';");
				if($result->num_rows==0) {
					return strval($id);
				}
				else {
					mid();
				}
				$mysqli->close();
			}
			$servername="localhost";
			$username="root";
			$password="";
			$mydb="tcwt";
			$mysqli=new mysqli($servername, $username, $password, $mydb);
			$id='M';
			$id.=mid();
            $pid=$_POST["pid"];
            $tid=$_POST["tid"];
            $name=$_POST["name"];
            $dob=$_POST["dob"];
            $cno=$_POST["cno"];
            $pmid=$_POST["id"];
			$sql="SELECT * FROM member WHERE contact='$cno';";
            $stmt=$mysqli->prepare($sql);
            $stmt->execute();
            $stmt->store_result();
            $flag=0;
            $sql="SELECT MID FROM member WHERE PID='$pid' AND TID='$tid' AND Designation='Team Head';";
            $stmt1=$mysqli->prepare($sql);
            $stmt1->execute();
            $stmt1->store_result();
            $stmt1->bind_result($rid);
            if($stmt->num_rows!=0) {
                $stmt->bind_result($MID, $Name, $TID, $PID, $Designation, $DOB, $contact);
                while($stmt->fetch()) {
                    if(strcasecmp(strtolower($Name),strtolower($name))==0) {
                        if($PID==$pid) {
                            $flag=1;
                            if($TID==$tid) {
                                if($Designation!='Team Head') {
                                    $sql="UPDATE accounts SET type='th' WHERE MID='$MID';";
                                    $stmt=$mysqli->prepare($sql);
                                    $stmt->execute();
                                    $sql="UPDATE member SET Designation='Team Head' WHERE MID='$MID' AND PID='$pid';";
                                    $stmt=$mysqli->prepare($sql);
                                    $stmt->execute();
                                    $sql="UPDATE teams SET THID='$MID' WHERE PID='$pid' AND TID='$tid';";
                                    $stmt=$mysqli->prepare($sql);
                                    $stmt->execute();
                                    while($stmt1->fetch()) {
                                        $sql="DELETE FROM accounts WHERE MID='$rid' AND type='th';";
                                        $stmt1=$mysqli->prepare($sql);
                                        $stmt1->execute();
                                        $sql="DELETE FROM member WHERE PID='$pid' AND MID='$rid';";
                                        $stmt1=$mysqli->prepare($sql);
                                        $stmt1->execute();
                                    }
                                    echo "<div class='w3-panel w3-green w3-center'>
                                        <h3>Team Head Changed Successfully!!!</h3>
                                        <p><b>Team Head ID: $$MID</b></p>
                                        <form action='pm_project.php' method='post'>
                                            <input type='hidden' name='id' value='$pmid'>
                                            <button class='w3-button w3-block w3-white w3-section w3-padding' type='submit'>Okay</button>
                                        </form>
                                    </div>";
                                    $stmt1->close(); 
                                    break;
                                }
                                else {
                                    echo "<form action='pm_project.php' method='post' name='form'>
                                            <input type='hidden' name='id' value='$pmid'>
                                        </form>";
                                    echo '<script>alert("'.$Name.' is already the Team Head.\nRetry with other member.");
                                        document.form.submit();</script>';
                                    break;
                                }
                            }
                            else {
                                echo "<form action='pm_project.php' method='post' name='form'>
                                        <input type='hidden' name='id' value='$pmid'>
                                    </form>";
                                echo '<script>alert("'.$Name.' is not a member of this team.\nRetry with other member.");
                                    document.form.submit();</script>';
                                break;
                            }
                        }
                    }
                    else {
                        $flag=1;
                        echo "<form action='pm_project.php' method='post' name='form'>
                                <input type='hidden' name='id' value='$pmid'>
                            </form>";
                        echo '<script>alert("Name does not match the contact number.\nRetry...");
                            document.form.submit();</script>';
                        break;
                    }
                }
                if($flag==0) {
                    $sql="UPDATE accounts SET type='th' WHERE MID='$MID';";
                    $stmt=$mysqli->prepare($sql);
                    $stmt->execute();
                    $sql="INSERT INTO member VALUES('$MID','$Name','$tid','$pid','Team Head','$DOB','$CNO');";
                    $stmt=$mysqli->prepare($sql);
                    $stmt->execute();
                    $sql="UPDATE teams SET THID='$MID' WHERE PID='$pid' AND TID='$tid';";
                    $stmt=$mysqli->prepare($sql);
                    $stmt->execute();
                    while($stmt1->fetch()) {
                        $sql="DELETE FROM accounts WHERE MID='$rid' AND type='th';";
                        $stmt1=$mysqli->prepare($sql);
                        $stmt1->execute();
                        $sql="DELETE FROM member WHERE PID='$pid' AND MID='$rid';";
                        $stmt1=$mysqli->prepare($sql);
                        $stmt1->execute();
                    }
                    echo "<div class='w3-panel w3-green w3-center'>
                        <h3>Team Head Added Successfully!!!</h3>
                        <form action='pm_project.php' method='post'>
                            <input type='hidden' name='id' value='$pmid'>
                            <button class='w3-button w3-block w3-white w3-section w3-padding' type='submit'>Okay</button>
                        </form>
                    </div>";            
                }
            }
            else {
                $sql="INSERT INTO accounts VALUES('$id','$id','$id','th');";
                $stmt=$mysqli->prepare($sql);
                $stmt->execute();
                $sql="INSERT INTO member VALUES('$id','$name','$tid','$pid','Team Head','$dob','$cno');";
                $stmt=$mysqli->prepare($sql);
                $stmt->execute();
                $sql="UPDATE teams SET THID='$id' WHERE PID='$pid' AND TID='$tid';";
                $stmt=$mysqli->prepare($sql);
                $stmt->execute();
                while($stmt1->fetch()) {
                    $sql="DELETE FROM accounts WHERE MID='$rid' AND type='th';";
                    $stmt1=$mysqli->prepare($sql);
                    $stmt1->execute();
                    $sql="DELETE FROM member WHERE PID='$pid' AND MID='$rid';";
                    $stmt1=$mysqli->prepare($sql);
                    $stmt1->execute();
                }
                echo "<div class='w3-panel w3-green w3-center'>
					<h3>Team Head Added Successfully!!!</h3>
					<p><b>Username: $id</b></p>
                    <p><b>Password: $id</b></p>
					<form action='pm_project.php' method='post'>
						<input type='hidden' name='id' value='$pmid'>
						<button class='w3-button w3-block w3-white w3-section w3-padding' type='submit'>Okay</button>
					</form>
				</div>";
            }
            $stmt->close(); 
            $mysqli->close();
		?>
	</body>
</html>