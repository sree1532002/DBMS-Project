<?php 
include "db.php";
if(isset($_REQUEST["submit"]))
{
    $club_id = $_POST['clubid'];
	$file=$_FILES["file"]["name"];
	$tmp_name=$_FILES["file"]["tmp_name"];
	$path="Images/".$file;
	$file1=explode(".",$file);
	$ext=$file1[1];
	$allowed=array("jpg","png","gif","pdf","wmv","pdf","zip");
	if(in_array($ext,$allowed)){
        move_uploaded_file($tmp_name,$path);
        mysqli_query($con,"insert into announcements_info(club_id,info)values('$club_id','$path')");
        echo "<script>";
        echo "alert('Uploaded successfully');";
        echo "window.location.href = 'clubadmin.php';";
        echo "</script>";	
    }
    else{
        echo "<script>";
        echo "alert('File type not matched');";
        echo "window.location.href = 'clubadmin.php';";
        echo "</script>";	
    }
}
else{
    echo "<script>";
    echo "alert('Access denied');";
    echo "window.location.href = 'clubadmin.php';";
    echo "</script>";
}
?>