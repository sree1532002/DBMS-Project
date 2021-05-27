<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['login']) == 2)
{
    include "db.php";
    $club = $_SESSION['club'];
    $query = "SELECT signup.roll_no,signup.name,signup.year,signup.dept,users.club_id,signup.email,signup.phone,users.accepted_status FROM signup INNER JOIN users ON signup.roll_no = users.roll_no WHERE users.club_id = $club";
    $result = mysqli_query($con,$query);

?>
<head>
<link rel="icon" href="favicon.ico" type="image/icon type">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<title>Uniclub | Club Admin</title>
<div class="container" style = "border-style: groove;border: 3px solid #495d87;">
  <table class="table table-hover">
  <thead>
  <br>
    <tr>
    <th>S.No.</th>
      <th>Roll No.</th>
      <th>Name</th>
      <th>Year</th>
      <th>Department</th>
      <th>Club Id</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Member status</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i = 1;
    while($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
    <td><?php echo $i;?></td>
    <form>
      <input type = "hidden" id = "id" value = "<?php echo $row['id'];?>">
      <td><?php echo $row['roll_no'];?></td>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['year'];?></td>
      <td><?php echo $row['dept'];?></td>
      <td><?php echo $row['club_id'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['phone'];?></td>
      <td><?php if($row['accepted_status']==1){
                    echo "<button class=\"btn btn-success\" onclick=\"change(" . $row['roll_no'] .", ".$row['club_id'].",".$row['accepted_status']." )\" >";
                    echo "Yes";
                }else{
                    echo "<button class=\"btn btn-danger\" onclick=\"change(" . $row['roll_no'] .", ".$row['club_id'].",".$row['accepted_status']." )\" >";
                    echo "No";
                }
            ?></button>
        </td>
    
    </form>
    </tr>
    <?php
    $i++;
    }
    ?>
  </tbody>
</table>
</body>
</html>
<?php } 
else{
  echo "<script>";
  echo "alert('Access Denied');";
  echo "window.location.href = 'index.php';";
  echo "</script>";
}?>
<script>
function change(roll_no,club_id,accepted_status){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if(this.readyState == 4 && this.status){
            document.getElementById('message').innerHTML = this.responseText;
        }
    };
    xmlhttp.open('GET', 'members.php?roll_no='+roll_no+'&club_id='+club_id+'&accepted_status='+accepted_status, true);
    xmlhttp.send();
}
</script>
