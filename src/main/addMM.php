<!DOCTYPE html>
<html>
	<title>ESPACE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<body class="w3-container">
        <?php
            function genMID() {
                $data="0123456789";
                $length=strlen($data);
                $string='';
                for($i=0; $i<4; $i++) {
                    $character=$data[mt_rand(0, $length - 1)];
                    $string.=$character;
                }
                $string="M".$string;
                $servername="localhost";
                $username="root";
                $password="";
                $mydb="tcwt";
                $conn=new mysqli($servername, $username, $password, $mydb);
                $sql="SELECT MID FROM member WHERE MID='$string';";
                $result=mysqli_query($conn, $sql);
                if($result->num_rows>0 or $string=="M000") {
                    genMID();
                }
                else {
                    return $string;
                }
            }
            $servername="localhost";
            $username="root";
            $password="";
            $mydb="tcwt";
            $mysqli=new mysqli($servername, $username, $password, $mydb);
            $id=$_POST["id"];
            $pid=$_POST["pid"];
            $tid=$_POST["tid"];
            $name=$_POST["name"];
            $dob=$_POST["dob"];
            $cno=$_POST["cno"];
            $mid=genMID();
            $sql="SELECT * FROM member WHERE contact='$cno';";
            $stmt=$mysqli->prepare($sql);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows!=0) {
                $stmt->bind_result($MID, $Name, $TID, $PID, $Designation, $DOB, $contact);
                while($stmt->fetch()) {
                    if(strcasecmp(strtolower($Name),strtolower($name))==0) {
                        if($PID==$pid) {
                            if($TID==$tid) {
                                echo "<form action='th_teammember.php' method='post' name='form'>
                                <input type='hidden' name='id' value='$id'>
                                </form>";
                                echo '<script>alert("'.$Name.' is already the in the team.\nRetry with other member.");
                                document.form.submit();</script>';
                                break;
                            }
                            else {
                                echo "<form action='th_teammember.php' method='post' name='form'>
                                        <input type='hidden' name='id' value='$id'>
                                    </form>";
                                echo '<script>alert("'.$Name.' is a member of other team in this project.\nRetry with other member.");
                                    document.form.submit();</script>';
                                break;
                            }
                        }
                        else {
                            $sql="INSERT INTO member VALUES('$MID','$Name','$tid','$pid','Member','$dob','$cno');";
                            $stmt=$mysqli->prepare($sql);
                            $stmt->execute();
                            echo "<div class='w3-panel w3-green w3-center'>
                                <h3>Member Added Successfully!!!</h3>
                                <form action='th_teammember.php' method='post'>
                                    <input type='hidden' name='id' value='$id'>
                                    <button class='w3-button w3-block w3-white w3-section w3-padding' type='submit'>Okay</button>
                                </form>
                            </div>";
                        }
                    }
                    else {
                        echo "<form action='th_teammember.php' method='post' name='form'>
                                <input type='hidden' name='id' value='$id'>
                            </form>";
                        echo '<script>alert("Name does not match the contact number.\nRetry...");
                            document.form.submit();</script>';
                        break;
                    }
                }
            }
            else {
                $sql="INSERT INTO accounts VALUES('$mid','$mid','$mid','mm');";
                $stmt=$mysqli->prepare($sql);
                $stmt->execute();
                $sql="INSERT INTO member VALUES('$mid','$name','$tid','$pid','Member','$dob','$cno');";
                $stmt=$mysqli->prepare($sql);
                $stmt->execute();
                echo "<div class='w3-panel w3-green w3-center'>
                    <h3>Member Added Successfully!!!</h3>
                    <p><b>Username: $mid</b></p>
                    <p><b>Password: $mid</b></p>
                    <form action='th_teammember.php' method='post'>
                        <input type='hidden' name='id' value='$id'>
                        <button class='w3-button w3-block w3-white w3-section w3-padding' type='submit'>Okay</button>
                    </form>
                </div>";
            }
            $stmt->close(); 
            $mysqli->close();
        ?>
	</body>
</html>