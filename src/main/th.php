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
    <div class="load" >
			<div class="loading"></div>
			<div class="loading"></div>
			<div class="loading"></div>
            <div class="loading"></div>
            <div class="loading"></div>
            <div class="loading"></div>
            <div class="loading"></div>
            <div class="loading"></div>
		</div>
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
                    }   
                ?>
                </h3>
            </div>
            <div class="w3-bar-item"><b>
                <div class="btn2"  style="margin-left: -15px;">
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
		<div class="help" style="text-align: center; width: 80%;">
            <h1 style="font-size: 45px;"><b><u>Help Desk</u></b></h1>
            <h3>Here is all the help you need !!!</h3>
            <h3><b>VIEW TEAM DETAILS</b></h3>
            <p><b>To view team details:</b> Select "View Team Details" on the side panel<br></p>
            <h3><b>TEAM MEMBERS</b></h3>
            <p><b>To add a member:</b><br>
            Select "Team Members" on the side panel -> Select "Add Member" tab -> <br>Fill details in the form <b><i>(Please check phone number)</i></b> -> Click "Add Member" button
            </p>
            <p><b>To delete a member:</b><br>
            Select "Team Members" on the side panel -> Select "Delete Member" tab -> Click "Delete" button against the member to delete
            </p>
            <h3><b>WORKSPACE</b></h3>
            <p><b>To create workspace:</b><br>
            Select "Workspace" on the side panel -> Select "Create Workspace" tab -> Fill details in the form -> Click "Create" button
            </p>
            <p><b>To delete workspace:</b><br>
            Select "Workspace" on the side panel -> Select "Delete Workspace" tab -> Click "Delete" button against the workspace to delete
            </p>
            <p><b>To use workspace:</b><br>
            Select "Workspace" on the side panel -> Select "Progressing Workspace" tab -> Select the Workspace from the list -> <br>Workspace Environment displayed with Formatting Tools
            </p>
            <p><b>To view old file:</b><br>
            Follow above steps -> Select "Old Files" button -> Select Workspace version from the list
            </p>
            <h3><b>COMMUNICATION</b></h3>
            <p><b>To send messages:</b><br>
            Select "Communication" on the side panel -> Enter message you want to send -> Click "Send" button
            </p>
            <p><b>To view messages:</b><br>
            Select "Communication" on the side panel -> Select "Project Channel" for Project Messages or "Team Channel" for Team Messages
            </p>
            <p><b>**To go back:</b> Click "Back" Button**</p>
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
        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
            }
        let loading = document.querySelector('.load');
            window.addEventListener('load',async function(){
                await sleep(1000);
                loading.style.display = 'none';
            });
	</script>
	<?php mysqli_close($conn); ?>
</html>