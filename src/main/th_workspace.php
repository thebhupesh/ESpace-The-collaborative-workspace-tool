<?php
    $servername="localhost";
    $username="root";
    $password="";
    $mydb="tcwt";
    $conn=new mysqli($servername, $username, $password, $mydb);
    $id=$_POST["id"];
    $pid="NULL";
?>
<!DOCTYPE html>
<html>
    <title>ESPACE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link type="text/css" rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <script src="workspace_tools.js"></script>
    <body class="w3-content bdy" >
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
						<button class="w3-bar-item w3-button w3-light-grey">Team Members</button>
					</form>
                    <form action="th_workspace.php" method="post">
                        <?php echo "<input type='hidden' name='id' value='$id'>"; ?>
                        <button class="w3-bar-item w3-button " style="color: #FFFFFF; background-color: #0F2653;">Workspace</button></a>
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
		<div id="workspace" class="w3-content w3-padding pm_project" style="width: 80%; margin-left: 1%;">	
            <div class="w3-container w3-padding-32" id="container" style="width: 72%; height: 5%; margin-left: 9%;">
                <h1 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center" style="text-align: center; font-size: 55px;"><b>Workspace</b></h1>
                <div class="w3-container" style="width: 100%;">
                    <div class="w3-bar w3-light-grey" style="width: max-content; margin: auto;"><b>
                        <a href="#create_workspace"><button class="w3-bar-item w3-button tablink w3-grey" onclick="operation(event, 'create_workspace')">Create Workspace</button></a>
                        <a href="#delete_workspace"><button class="w3-bar-item w3-button tablink" onclick="operation(event, 'delete_workspace')">Delete Workspace</button></a>
                        <a href="#prog_workspace"><button class="w3-bar-item w3-button tablink" onclick="operation(event, 'prog_workspace')">Progressing Workspace</button></a>
                    </b></div>
                    <div id="create_workspace" class="w3-container w3-border tabs" style="width: 100%; text-align: center;">
                        <p class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center"><b class="pagetabtitle">Enter Workspace Details</b></p>
                        <div class="w3-center" style="margin-left: auto;margin-right: auto; width: 56%">
                            <div class="container">
                                <form action="createWorkspace.php" method="post">
                                    <label for="pname">Workspace Name: </label>
                                    <input type="text" id="name" name="wname" placeholder="Enter Workspace Name"><br>
                                    <label for="description">Description: </label>
                                    <textarea id="descript" name="description" placeholder=" About workspace in brief..." style="height:100px"></textarea>
                                    <?php 
                                        echo "<input type='hidden' name='id' value='$id'><input type='hidden' name='pid' value='$pid'><input type='hidden' name='tid' value='$tid'>"

                                    ?>
                                    <input type="submit" value="Create">
                                </form>
                            </div><br>
                        </div>
                    </div>
                    <div id="delete_workspace" class="w3-container w3-border tabs" style="display:none"> 
                        <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center"><b class="pagetabtitle">Delete Workspace</b></h2>
						<?php      
							$sql="SELECT * FROM workspace WHERE TID='$tid';";
							if($result=mysqli_query($conn, $sql)) {
								echo "<table class='w3-table w3-striped'>";
								echo "<thead>";
								echo "<tr class='w3-light-grey'>";
								echo "<th class='w3-center'>WID</th>";
								echo "<th class='w3-center'>Name</th>";
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
                                    echo '<td class="w3-center"> <form action="deleteWorkspace.php" method="post" name="form">
                                    <input type="hidden" name="id" value="'.$row["WID"].'">';
                                    echo "<input type='hidden' name='pid' value='$id'>";
                                    echo '<input class="w3-button w3-round" style="background-color: #0f2653; color: white;" type="submit" value="Delete">
                                    </form></td>
									</tr>';
								}
								echo "</tbody></table><br>";
							}
						?>
                    </div>
                    <div id="prog_workspace" class="w3-container w3-border tabs" style="display:none; width: 140%; margin-left: -20%;"> 
                        <div id="prog1">
                            <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center"><b class="pagetabtitle">Select Workspace</b></h2>
                            <?php      
							    $sql="SELECT * FROM workspace WHERE TID='$tid';";
							    if($result=mysqli_query($conn, $sql)) {
								    echo "<table class='w3-table w3-striped'>";
								    echo "<thead>";
                                    echo "<tr class='w3-light-grey'>";
                                    echo "<th class='w3-center'>WID</th>";
                                    echo "<th class='w3-center'>Name</th>";
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
                                        echo '<td class="w3-center"> 
                                            <button class="w3-bar-item w3-button w3-round" style="background-color: #0f2653; color: white;" name="wid" value="'.$row["WID"].'" onclick="update2(this.value)" ><b>Select</b></button></td>';
                                        echo "</tr>";
                                    }
                                    echo "</tbody></table><br>";
                                }
                            ?>
                        </div>
                        <div id="prog2"  style="display:none;"></div>
                        <div id="prog3"  style="display:none;"></div>
                        <div id="prog4"  style="display:none;"></div>
                    </div>
                </div>
            </div>
        </div>
		<script>
            function update2(val) {
                var xhttp;
                var id = "<?php echo $id;?>";
                document.getElementById("prog1").style.display="none";
                document.getElementById("prog2").style.display="block";
                if (val == "") {
                    document.getElementById("prog2").innerHTML = "";
                    return;
                }
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("prog2").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "getworkspace2.php?pid="+val+"&id="+id, true);
                xhttp.send();
            }
            function update3(val) {
                var xhttp;
                var id = "<?php echo $id;?>";
                document.getElementById("prog2").style.display="none";
                document.getElementById("prog3").style.display="block";
                document.getElementById("prog4").style.display="none";
                if (val == "") {
                    document.getElementById("prog3").innerHTML = "";
                    return;
                }
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("prog3").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "getworkspace3.php?pid="+val+"&id="+id, true);
                xhttp.send();
            }
            function update4(ver) {
                var xhttp;
                var id = "<?php echo $id;?>";
                var val = document.getElementById("wid").value;
                document.getElementById("prog3").style.display="none";
                document.getElementById("prog4").style.display="block";
                if (val == "") {
                    document.getElementById("prog4").innerHTML = "";
                    return;
                }
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("prog4").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "getworkspace4.php?pid="+val+"&id="+id+"&v="+ver, true);
                xhttp.send();
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
            function updateData() {
                var title = document.getElementById("T").innerHTML;
                var data = document.getElementById("D").innerHTML;
                document.getElementById("w_title").value = title.toString();
                document.getElementById("w_data").value = data.toString();
                document.workspace_form.submit();
            }
            function updateData1() {
                var title = document.getElementById("T1").innerHTML;
                var data = document.getElementById("D1").innerHTML;
                document.getElementById("w_title1").value = title.toString();
                document.getElementById("w_data1").value = data.toString();
                document.workspace_form1.submit();
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