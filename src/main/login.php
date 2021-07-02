<?php
    $servername="localhost";
    $username="root";
    $password="";
    $mydb="tcwt";
    $conn=new mysqli($servername, $username, $password, $mydb);
    $user=$_POST["Username"];
    $pwd=$_POST["Password"];
    $sql="SELECT * FROM accounts WHERE username='$user';";
    $result=mysqli_query($conn, $sql);
    if($result->num_rows==1) {
        while($row=$result->fetch_assoc()) {		
            if($user==$row["Username"] && $pwd==$row["Password"]) {
                $id=$row["MID"];
                if($row["type"]=='pm') {
                    echo "<form action='pm.php' method='post' name='form'><input type='hidden' name='id' value='$id'></form>";
                    echo "<script>document.form.submit();</script>";
                }
                elseif($row["type"]=='th') {
                    echo "<form action='th.php' method='post' name='form'><input type='hidden' name='id' value='$id'></form>";
                    echo "<script>document.form.submit();</script>";
                }
                elseif($row["type"]=='mm') {
                    echo "<form action='mm.php' method='post' name='form'><input type='hidden' name='id' value='$id'></form>";
                    echo "<script>document.form.submit();</script>";
                }
            }
            else {
                echo '<script>alert("Incorrect Password!!!\nRetry...");
                    window.location.href = "login.html";</script>';
            }
        }
    }
    else {
        echo '<script>alert("Incorrect Credentials!!!\nRetry...");
            window.location.href = "login.html";</script>';
    }
    mysqli_close($conn);
?>