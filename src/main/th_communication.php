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
                        <button class="w3-bar-item w3-button w3-light-grey frame">Workspace</button></a>
                    </form>
                    <form action="th_communication.php" method="post">
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
		<div id="project" class="w3-content w3-padding pm_project w3-center" style="margin-left: -3.5%; margin-right: auto; width: 90%">	
            <div class="w3-container w3-padding-32 " id="container">
                <h1 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center" style="text-align: center; font-size: 55px;"><b>Communication</b></h1>
                <div class="w3-container" >
                    <div class="w3-bar w3-light-grey" ><b>
                        <a href="#sendMsg"><button class="w3-bar-item w3-button tablink w3-grey" onclick="operation1(event, 'sendMsg')">Send Message</button></a>
                        <a href="#projectchannel"><button class="w3-bar-item w3-button tablink" onclick="operation1(event, 'projectchannel')">Project Channel</button></a>
                        <a href="#teamchannel"><button class="w3-bar-item w3-button tablink" onclick="operation1(event, 'teamchannel')">Team Channel</button></a>
                    </b></div>
                    <div id="sendMsg" class="w3-container w3-border tabs" >
                        <div class="w3-center">
                            <div id="selectTeam" class="w3-container"style="display:none;" >
                                    
                            </div>
                            <div id="msg" class="w3-container  " >
                                <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center"><b class="pagetabtitle">Team Broadcast Message:</b></h2>
                                <form action="storeMsg2.php" method='post'>
                                    <textarea name="mssage" name="message" placeholder="Write your message here...." style="height:200px; border-style: solid; border-color: black; border-width: 2px;"></textarea><br>
                                <?php 
                                    echo "<input type='hidden' name='id' value='$id'>";
                                    echo "<input type='hidden' name='tid' value='$tid'>";
                                    echo "<input type='hidden' name='pid' value='$pid'>";
                                ?>
                                <b><input class="w3-button w3-green w3-round" type="submit" value="Send"></b><br><br></form> 
                            </div>
                        </div>
                    </div>
                    <div id="projectchannel" class="w3-container w3-border tabs" style="display:none;">
                            <div class="w3-center">
                                <div id="pmsg" class="w3-container" >
                                    <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center"><b class="pagetabtitle">Project Messages</b></h2>
                                    <?php   
                                        $sql="SELECT * FROM communication WHERE type = 'p' AND PID='$pid' GROUP BY Msg ;";
                                        if($result=mysqli_query($conn, $sql)) {
                                            echo "<table class='w3-table w3-striped'>";
                                            echo "<thead>";
                                            echo "<tr class='w3-light-grey'>";
                                            echo "<th class='w3-center'>ID</th>";
                                            echo "<th class='w3-center'>Message</th>";
                                            echo "<th class='w3-center'>Sender ID</th>";
                                            echo "<th class='w3-center'>Time</th>";  
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            while($row=mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td class='w3-center'> {$row[0]}</td>";
                                                echo "<td class='w3-center'> {$row[1]}</td>";
                                                echo "<td class='w3-center'> {$row[5]}</td>";
                                                echo "<td class='w3-center'> ".date("d-m-Y g:iA",strtotime($row[6]))."</td>";
                                                echo "</tr>";
                                            } 
                                            echo "</tbody></table><br>";
                                        }
                                    ?>
                                </div>
                            </div>                 
                    </div>
                    <div id="teamchannel" class="w3-container w3-border tabs" style="display:none;">
                            <div id="selectTeam2" class="w3-container" >
                                <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-center"><b class="pagetabtitle">Team Messages</b></h2>
                                <?php      
                                    $sql="SELECT * FROM communication WHERE type = 't' AND TID = '$tid';";
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
                                                echo "<td  style='text-align: justify; width: 30%'> {$row[1]}</td>";
                                                echo "<td class='w3-center'> {$row[5]}</td>";
                                                echo "<td class='w3-center'> ".date("d-m-Y g:iA",strtotime($row[6]))."</td>";
                                                echo "</tr>";
                                            } 
                                            echo "</tbody></table><br>";
                                    }
                                ?>
                            </div>                    
                    </div>
                </div>
            </div>
        </div>
		<script>
            function operation1(evt, op) {
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
