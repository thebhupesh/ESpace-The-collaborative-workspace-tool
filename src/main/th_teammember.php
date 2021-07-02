<?php
    $servername="localhost";
    $username="root";
    $password="";
    $mydb="tcwt";
    $conn=new mysqli($servername, $username, $password, $mydb);
    $id=$_POST["id"];
?>
<!DOCTYPE html>
<html>
    <title>ESPACE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link type="text/css" rel="stylesheet" href="home.css">
    <body class="w3-content bdy">
        <div class="a w3-top">
            <span class="a">ESPACE</span>
            <span class="b"> The Collaborative Workspace Tool</span>
            <form action="th.php" method="post">
				<?php echo "<input type='hidden' name='id' value='$id'>";?>
				<button class="btn1 w3-btn w3-hover-white w3-round-large" style="font-size: 18px; margin-left: -0.5%;"><b>Help</b></button>
			</form>
        </div>
		<div class="w3-sidebar w3-bar-block bar">
            <div class="details">
                <h3 class="w3-bar-item" style="font-size: 18px; margin-top: 20px; margin-left: 0px;">
                <?php
                    $sql = mysqli_query($conn, "SELECT * From member WHERE MID = '$id'");  
                    while($data = mysqli_fetch_array($sql))
                    {
                        echo "<b><u>Name: </u></b><br>".$data['Name'];
                        echo "<br><b><u>Designation: </u></b><br>".$data['Designation'];
                        $tid=$data['TID'];
                        $pid=$data['PID'];
                    }   
                ?>
                </h3>
            </div>
            <div class="w3-bar-item"><b>
                <div class="btn2" style="margin-left: -15px;">
                    <form action="th_details.php" method="post">
						<?php echo "<input type='hidden' name='id' value='$id'>"; ?>
						<button class="w3-bar-item w3-button w3-light-grey">View Team Details</button>
					</form>
                    <form action="th_teammember.php" method="post">
						<?php echo "<input type='hidden' name='id' value='$id'>"; ?>
						<button class="w3-bar-item w3-button" style="color: #FFFFFF; background-color: #0F2653;">Team Members</button>
					</form>
                    <form action="th_workspace.php" method="post">
                        <?php echo "<input type='hidden' name='id' value='$id'>"; ?>
                        <button class="w3-bar-item w3-button w3-light-grey frame">Workspace</button></a>
                    </form>
                    <form action="th_communication.php" method="post">
						<?php echo "<input type='hidden' name='id' value='$id'>";?>
						<button class="w3-bar-item w3-button w3-light-grey" >Communication</button>
					</form>
                </div>
            </b></div>
            <div class="btn3 w3-bar-item"><b>
                <a href="#change_password" class="w3-bar-item w3-button" style="font-size: 13px;" onclick="document.getElementById('pwdchange').style.display='block'">Change Password</a>
                <a href="login.html" class="w3-bar-item w3-button">Logout</a>
            </b></div>
        </div>
        <div class="w3-container">
			<div id="pwdchange" class="w3-modal">
				<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
					<div class="w3-center"><br>
						<span onclick="document.getElementById('pwdchange').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
					</div>
					<form class="w3-container" action="pwdchange.php" method="post">
						<div class="w3-section">
							<input type="hidden" name="user" value="<?php echo "$id"; ?>">
							<label><b>Old Password</b></label>
							<input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Enter Old Password" name="old" required id="old">
							<input type="checkbox" onclick="password('old')"> Show Password<br>
							<br><label><b>New Password</b></label>
							<input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Enter New Password" name="new" required id="new">
							<input type="checkbox" onclick="password('new')"> Show Password<br>
							<button class="w3-button w3-block w3-section w3-padding" style="color: white; background-color: #0F2653;" type="sign_in"><b>Change</b></button>
						</div>
					</form>
				</div>
			</div>
		</div>
        <div id="members" class="w3-content w3-padding pm_project" style="width: 60%; margin-left: 5.5%;">	
            <div class="w3-container w3-padding-32" id="container">
                <h1 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center" style="text-align: center; font-size: 55px;"><b>Team Members</b></h1>
                <div class="w3-container">
                    <div class="w3-bar w3-light-grey" style="width: max-content; margin: auto;"><b>
                        <a href="#add_member"><button class="w3-bar-item w3-button tablink w3-grey" onclick="operation(event, 'add_member')">Add Member</button></a>
                        <a href="#delete_member"><button class="w3-bar-item w3-button tablink" onclick="operation(event, 'delete_member')">Delete Member</button></a>
                    </b></div><br>
                    <div id="add_member" class="w3-container w3-border tabs">
                        <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center"><b class="pagetabtitle">Add Member</b></h2>
                        <div class="w3-center" style="margin-left: auto;margin-right: auto; width: 55%;">
                            <div class="container" style="width: 100%;">
                                <form action="addMM.php" method="post">
                                    <input type="hidden" name="tid" value="<?php echo $tid; ?>">
                                    <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                                    <label for="name">Name: </label>
                                    <input type="text" id="name" name="name" placeholder="Enter Full Name"><br>
                                    <label for="cno">Contact: </label>
                                    <input type="number" id="cno" name="cno" placeholder="Enter Phone Number" onchange="alert('Please confirm the number.')"><br>
                                    <label for="dob">DOB: </label>
                                    <input type="date" id="dob" name="dob"><br>
                                    <?php 
                                        echo "<input type='hidden' name='id' value='$id'>";
                                    ?>
                                    <input type="submit" value="Add Member">
                                </form>
                            </div><br>
                        </div>
                    </div>
                    <div id="delete_member" class="w3-container w3-border tabs" style="display: none;">
                        <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center"><b class="pagetabtitle">Delete Member</b></h2>
						<?php      
							$sql="SELECT * FROM member WHERE TID='$tid' and Designation='Member';";
							if($result=mysqli_query($conn, $sql)) {
								echo "<table class='w3-table w3-striped'>";
								echo "<thead>";
								echo "<tr class='w3-light-grey'>";
								echo "<th class='w3-center'>Name</th>";
								echo "<th class='w3-center'>Designation</th>";
								echo "<th class='w3-center'>DOB</th>";
								echo "<th class='w3-center'>Contact</th>";
								echo "<th class='w3-center'>Action</th>";
								echo "</tr>";
								echo "</thead>";
								echo "<tbody>";
								while($row=mysqli_fetch_array($result)) {
									echo "<tr>";
									echo "<td class='w3-center'> {$row[1]}</td>";
									echo "<td class='w3-center'> {$row[4]}</td>";
									echo "<td class='w3-center'> {$row[5]}</td>";
									echo "<td class='w3-center'> {$row[6]}</td>";
                                    echo '<td class="w3-center"> <form action="deleteMM.php" method="post" name="form">
                                    <input type="hidden" name="mid" value="'.$row[0].'">
                                    <input type="hidden" name="tid" value="'.$tid.'">
                                    <input type="hidden" name="id" value="'.$id.'">';
                                    echo '<input class="w3-button w3-round" style="background-color: #0f2653; color: white;" type="submit" value="Delete">
                                    </form></td>
									</tr>';
								}
								echo "</tbody></table><br>";
							}
						?>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>  
		function password(id) {
			var x=document.getElementById(id);
			if(x.type==="password") {
				x.type="text";
			}
			else {
				x.type="password";
			}
		}
        function operation(evt, op) {
            var i, x, tablinks;
            x=document.getElementsByClassName("tabs");
            for(i=0; i < x.length; i++) {
                x[i].style.display="none";
            }
            tablinks=document.getElementsByClassName("tablink");
            for(i=0; i < x.length; i++) {
                tablinks[i].className=tablinks[i].className.replace(" w3-grey", "");
            }
            document.getElementById(op).style.display="block";
            evt.currentTarget.className+=" w3-grey";
        }
	</script>
	<?php mysqli_close($conn); ?>
</html>