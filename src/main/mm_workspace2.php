<?php
    $servername="localhost";
    $username="root";
    $password="";
    $mydb="tcwt";
    $conn=new mysqli($servername, $username, $password, $mydb);
    $id=$_POST["id"];
    $tid=$_POST["tid"];
?>
<!DOCTYPE html>
<html>
    <title>ESPACE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link type="text/css" rel="stylesheet" href="home.css">
    <script src="workspace_tools.js"></script>
    <body class="w3-content bdy" >
        <div class="a w3-top">
            <span class="a">ESPACE</span>
            <span class="b"> The Collaborative Workspace Tool</span>
            <form action="mm.php" method="post">
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
                    <form action="mm_workspace.php" method="post">
						<?php echo "<input type='hidden' name='id' value='$id'>";?>
						<button class="w3-bar-item w3-button "  style="color: #FFFFFF; background-color: #0F2653;">Workspace</button>
					</form>
                    <form action="mm_communication.php" method="post">
						<?php echo "<input type='hidden' name='id' value='$id'>";?>
						<button class="w3-bar-item w3-button  w3-light-grey frame"  >Communication</button>
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
		<div id="project" class="w3-content w3-padding pm_project " style="margin-left: -3.5%; width: 90%">	
            <div class="w3-container w3-padding-32 " id="container" >
                <h1 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center" style="text-align: center; font-size: 55px;"><b>Workspace</b></h1>
                <div class="w3-container" >
                    <div id="prog_workspace" class="w3-container w3-border tabs" > 
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
            function change() {
                document.getElementById("projects").style.display="block";
                document.getElementById("team2").style.display="none";
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
        </script>
    </body>
	<?php mysqli_close($conn); ?>
</html>