<?php
    $servername="localhost";
    $username="root";
    $password="";
    $mydb="tcwt";
    $id=$_REQUEST['id'];
    $wid=$_REQUEST['pid'];
    $conn=new mysqli($servername, $username, $password, $mydb);
    $mysqli = mysqli_connect($servername, $username, $password, $mydb);
    $sql="SELECT COUNT(WID) FROM workspace_files WHERE WID ='$wid';";
    $result=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($result);
    $version=$row[0];  
    $underline='document.execCommand("underline", false, "");';
    $italic='document.execCommand("italic", false, "");';
    $bold='document.execCommand("bold", false, "");';
    $cut='document.execCommand("cut", false, "");';
    $undo='document.execCommand("undo", false, "");';
    $redo='document.execCommand("redo", false, "");';
    $strikeThrough='document.execCommand("strikeThrough", false, "");';
    $delete='document.execCommand("delete", false, "");';
    $selectAll='document.execCommand("selectAll", false, "");';
    $justifyCenter='document.execCommand("justifyCenter", false, "");';
    $justifyLeft='document.execCommand("justifyLeft", false, "");';
    $justifyRight='document.execCommand("justifyRight", false, "");';
    $blank=null;
    $printfun="printDiv('editor')";
    $sql="SELECT type FROM accounts WHERE MID ='$id';";
    $res=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($res);
    $type=$row[0];
    if($type=='pm'){
      $back_url="pm_workspace.php";
    }
    elseif($type=='th'){
      $back_url="th_workspace.php";
    }
    elseif($type=='mm'){
      $back_url="mm_workspace.php";
    }
    $sql="SELECT PID FROM workspace WHERE WID ='$wid';";
    $res=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($res);
    $pid=$row[0];
    if($version==0){
      echo '<br><div class="toolbar">';

      echo  "<button class='tool-items fa fa-underline'  onclick='$underline'>
        </button>";

      echo  "<button class='tool-items fa fa-italic' onclick='$italic'>
        </button>";


      echo  "<button class='tool-items fa fa-bold' onclick='$bold'>
        </button>";

      echo "<button class='tool-items fa fa-scissors' onclick='$cut'></button>";

       echo "<button class='tool-items fa fa-undo' onclick='$undo'></button>";

       echo  "<button class='tool-items fa fa-repeat' onclick='$redo'></button>";

       echo "<button class='tool-items fa fa-tint' onclick='changeColor()'></button>";

       echo " <button class='tool-items fa fa-strikethrough' onclick='$strikeThrough'></button>";

       echo " <button class='tool-items fa fa-trash' onclick='$delete'></button>";

       echo "  <button class='tool-items fa fa-scribd' onclick='$selectAll'></button>";

       echo " <button class='tool-items fa fa-clone' onclick='copy()'></button>";

       echo " <button class='tool-items fa fa-align-center' onclick='$justifyCenter'></button>";

      echo "  <button class='tool-items fa fa-align-left' onclick='$justifyLeft'></button>
        <button class='tool-items fa fa-align-right' onclick='$justifyRight'></button>
      </div>";

      echo '<div class="center">
        <div id="editor" class="editor" contenteditable>
          <h1 id="T" >Title</h1>
          <p id="D" >Good to start</p>
        </div>
      </div>
      <div style="text-align: center">
      <form action="submitFile.php" method="post" name="workspace_form">
      <input type="hidden" name="id" value="'.$id.'">
      <input type="hidden" name="wid" value="'.$wid.'">
      <input type="hidden" id="w_title" name="title" value="">
      <input type="hidden" id="w_data" name="data" value="">
      </form>
      <button class="w3-button w3-green w3-round" onclick="updateData()" ><b>Submit</b></button>
      </div>
      <div style="display: flex;text-align: center;margin-top: -6.5%;margin-left: 5%;"><form action="'.$back_url.'" method="post" name="form">
                  <input type="hidden" name="id" value="'.$id.'">
                  <input type="hidden" name="pid" value="'.$pid.'">
                  <input class="w3-button w3-round w3-red" type="submit" value="Back">
                </form>
                <button class="w3-button w3-round" style="background-color: #0f2653; color: white; margin-left: 75%;" value="print a div!" onclick="'.$printfun.'" ><b>Print</b></button>
        </div><br>';
    }
    else{
      $sql="SELECT title,data FROM workspace_files WHERE WID ='$wid' AND version = '$version';";
      $result=mysqli_query($mysqli,$sql);
      $row=mysqli_fetch_array($result);
      $title=$row[0];
      $data=$row[1];
      echo '<br><div class="toolbar">';

      echo  "<button class='tool-items fa fa-underline'  onclick='$underline'>
        </button>";

      echo  "<button class='tool-items fa fa-italic' onclick='$italic'>
        </button>";

      echo  "<button class='tool-items fa fa-bold' onclick='$bold'>
        </button>";


        echo "<button class='tool-items fa fa-scissors' onclick='$cut'></button>";

       echo "<button class='tool-items fa fa-undo' onclick='$undo'></button>";

       echo  "<button class='tool-items fa fa-repeat' onclick='$redo'></button>";

       echo "<button class='tool-items fa fa-tint' onclick='changeColor()'></button>";

       echo " <button class='tool-items fa fa-strikethrough' onclick='$strikeThrough'></button>";

       echo " <button class='tool-items fa fa-trash' onclick='$delete'></button>";

       echo "  <button class='tool-items fa fa-scribd' onclick='$selectAll'></button>";

       echo " <button class='tool-items fa fa-clone' onclick='copy()'></button>";

       echo " <button class='tool-items fa fa-align-center' onclick='$justifyCenter'></button>";

      echo "  <button class='tool-items fa fa-align-left' onclick='$justifyLeft'></button>
        <button class='tool-items fa fa-align-right' onclick='$justifyRight'></button>
      </div>";

      echo '<div class="center">
        <div id="editor" class="editor" contenteditable>
          <h1 id="T">'.$title.'</h1>
          <p id="D">'.$data.'</p>
        </div>
      </div>
      <div style="text-align: center">
      <form action="submitFile.php" method="post" name="workspace_form">
      <input type="hidden" name="id" value="'.$id.'">
      <input type="hidden" name="wid" value="'.$wid.'">
      <input type="hidden" id="w_title" name="title" value="">
      <input type="hidden" id="w_data" name="data" value="">
      </form>
      <button class="w3-button w3-green w3-round" style="text-align: center" onclick="updateData()" ><b>Submit</b></button>
      </div>
      <div style="display: flex;text-align: center;margin-top: -6.5%;margin-left: 5%;"><form action="'.$back_url.'" method="post" name="form">
                  <input type="hidden" name="id" value="'.$id.'">
                  <input type="hidden" name="pid" value="'.$pid.'">
                  <input class="w3-button w3-round w3-red" type="submit" value="Back">
                </form>
                <button class="w3-button w3-round" style="background-color: #0f2653; color: white; margin-left: 70%;" name="wid" value="'.$wid.'" onclick="update3(this.value)" ><b>Old Files</b></button>
        </div><br>
        <button class="w3-button w3-round" style="background-color: #0f2653; color: white; margin-left: 45.5%; margin-bottom: 2%"  value="print a div!" onclick="'.$printfun.'" ><b>Print</b></button>';
    }
?>