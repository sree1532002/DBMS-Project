<?php
include "db.php";
if(isset($_FILES)){
    //print_r($_FILES);
    $file = $_FILES['image'];
    if(isset($file)) {
        $filename = $_FILES['image']['name'];
        $filetmp = $_FILES['image']['tmp_name'];
        $filesize = $_FILES['image']['size'];
        $fileerror = $_FILES['image']['error'];
        $filetype = $_FILES['image']['type'];

        $fileext = explode('.', $filename);
        $fileactualext = strtolower(end($fileext));

        $allowed = array('jpg', 'jpeg', 'png');
        if(in_array($fileactualext, $allowed)){
            if ($fileerror === 0){
                $filenamenew = uniqid('', true) . "." . $fileactualext;
                $filedestination = 'Images/'.$filenamenew;
                if(move_uploaded_file($filetmp, $filedestination)){
                    $club_id = $con->real_escape_string($_POST['clubid']);
                    $club_name = $con->real_escape_string($_POST['clubname']);
                    $president = $con->real_escape_string($_POST['president']);
                    $incharge = $con->real_escape_string($_POST['incharge']);
                    $t_contact = $con->real_escape_string($_POST['contact']);
                    $heading = $con->real_escape_string($_POST['heading']);
                    $description = $con->real_escape_string($_POST['description']);
                    $sql0 = "INSERT INTO clubs(club_id,club_name,incharge,president,t_contact) VALUES('$club_id','$club_name','$incharge','$president','$t_contact')";
                    $sql = "INSERT INTO club_layout(club_id,heading,image,description) VALUES ('$club_id','$heading','$filenamenew','$description')";
                    if(mysqli_query($con, $sql0))
                    {
                        echo 'Trigger added';
                        if(mysqli_query($con, $sql))
                        {
                            echo 'Announcement added';
                        }
                        else{
                            echo "Error:  <br>" . $con->error;
                        }
                    }
                    else{
                        echo "Error:  <br>" . $con->error;
                    }
                }
                else{
                    echo '0';
                }
            } 
            else{
                echo '0';
            }
        }
        else{
            echo "0";
        }
    }
}
else{
    echo "<script>";
    echo "alert('Access Denied');";
    echo "window.location.href = 'clubadmin.php';";
    echo "</script>";
}
?>