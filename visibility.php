<?php
if(isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $visibility = $_REQUEST['visibility'];
    include "db.php";
    if($visibility==1) {
        $query = "UPDATE ideas SET visibility=0 where id=$id";
    }else{
        $query = "UPDATE ideas SET visibility=1 where id=$id";
    }
    if($con->query($query)){
        $txt = ($visibility)? "Visible to non visible":"Non visible to visible";
        echo "Updated from " . $txt;
    }else{
        echo "Error Updating record: " . $con->error;
    }

    $con->close();
}else{
      echo "<script>";
      echo "alert('Access Denied');";
      echo "window.location.href = 'index.php';";
      echo "</script>";
}