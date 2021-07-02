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
    <body class="w3-content bdy" >
        <div class="a w3-top">
            <span class="a">ESPACE</span>
            <span class="b"> The Collaborative Workspace Tool</span>
            <form action="pm.php" method="post">
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
                    }   
                ?>
                </h3>
            </div>
            <div class="w3-bar-item"><b>
                <div class="btn2" style="margin-left: -15px;">
                    <form action="pm_project.php" method="post">
						<?php echo "<input type='hidden' name='id' value='$id'>";?>
						<button class="w3-bar-item w3-button w3-light-grey" >Project</button>
					</form>
                    <form action="pm_details.php" method="post">
						<?php echo "<input type='hidden' name='id' value='$id'>
						<input type='hidden' name='pid' value='NULL'>
						<input type='hidden' name='tid' value='NULL'>"; ?>
						<button class="w3-bar-item w3-button w3-light-grey">Project Details</button>
					</form>
                    <form action="pm_workspace.php" method="post">
						<?php echo "<input type='hidden' name='id' value='$id'>
                        <input type='hidden' name='pid' value='NULL'>";?>
						<button class="w3-bar-item w3-button w3-light-grey " >Workspace</button>
					</form>
                    <form action="pm_communication.php" method="post">
						<?php echo "<input type='hidden' name='id' value='$id'>";?>
						<button class="w3-bar-item w3-button "  style="color: #FFFFFF; background-color: #0F2653;">Communication</button>
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
		<div id="project" class="w3-content w3-padding pm_project w3-center" style="margin-left: 50px; margin-right: auto; width: auto;">	
            <div class="w3-container w3-padding-32 " id="container">
                <h1 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center" style="text-align: center; font-size: 60px;"><b>Communication</b></h1>
                <div class="w3-container" >
                    <div id="selectpid" class="w3-container w3-border tabs">
                        <div class="w3-center">
                            <div id="sendmsg" class="w3-container" >
                                <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center"><b class="pagetabtitle">Select Project</b></h2>
                                <?php      
                                    $sql="SELECT * FROM projects WHERE PMID='$id';";
                                    if($result=mysqli_query($conn, $sql)) {
                                        echo "<table class='w3-table w3-striped'>";
                                        echo "<thead>";
                                        echo "<tr class='w3-light-grey'>";
                                        echo "<th class='w3-center'>ID</th>";
                                        echo "<th class='w3-center'>Name</th>";
                                        echo "<th class='w3-center'>Due Date</th>";
                                        echo "<th class='w3-center'>Description</th>";
                                        echo "<th class='w3-center'>Action</th>";  
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        while($row=mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td class='w3-center'> {$row[0]}</td>";
                                            echo "<td class='w3-center'> {$row[1]}</td>";
                                            echo "<td class='w3-center'> {$row[2]}</td>";
                                            echo "<td class='w3-center'> {$row[3]}</td>";
                                            echo '<td class="w3-center"> <form action="pm_communication2.php" method="post">
                                                <input type="hidden" name="id" value="'.$id.'">
                                                <b><button class="w3-button w3-round" style="background-color: #0f2653; color: white;" name="pid" value="'.$row["PID"].'"  >Select</button></b>
                                                </form></td>';
                                            echo "</tr>";
                                        } 
                                        echo "</tbody></table><br>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <script>
                        function getpid(val) {
                            var xhttp;
                            var id = "<?php echo $id;?>";
                            document.getElementById("selectpid").style.display="none";
                            
                            if (val == "") {
                                document.getElementById("comm").innerHTML = "";
                                return;
                            }
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("comm").innerHTML = this.responseText;
                                    document.getElementById("comm").style.display="block";
                                }
                            };
                            xhttp.open("GET", "getTeams3.php?pid="+val+"&id="+id, true);
                            xhttp.send();
                            }
                    </script>
                    <script>
                        function change() {
                            document.getElementById("projects").style.display="block";
                            document.getElementById("team2").style.display="none";
                        }
                    </script>
                </div>
            </div>
        </div>
		<script>
            function operation(evt, op) {
                var i, x, tablinks;
                x=document.getElementsByClassName("tabs");
                for(i=0; i < x.length; i++) {
                    x[i].style.display="none";
                }
                tablinks=document.getElementsByClassName("tablink");
                for(i=0; i < x.length; i++) {
                    tablinks[i].className=tablinks[i].className.add(" w3-grey", "");
                }
                document.getElementById(op).style.display="block";
                evt.currentTarget.className+=" w3-grey";
            }
            function password(id) {
                var x=document.getElementById(id);
                if(x.type==="password") {
                    x.type="text";
                }
                else {
                    x.type="password";
                }
            }
        </script>
    </body>
	<?php mysqli_close($conn); ?>
</html>