<?php
    $mysqli=new mysqli("localhost", "root", "", "tcwt");
    $sql="SELECT * From teams WHERE PID = ?";
    
    $stmt=$mysqli->prepare($sql);
    $stmt->bind_param("s", $_GET['pid']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($TID, $Name, $Description, $PID, $THID); 
    echo "<option disabled selected>-- Select Team --</option>";
    while($stmt->fetch()) {
        echo "<option  value='". $TID ."'>".$Name ."</option>";
    }
    $stmt->close(); 
    $mysqli->close();
?>