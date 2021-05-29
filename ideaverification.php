<!DOCTYPE html>
<html>
<head><link rel="icon" href="images/logo.jpeg" type="image/icon type"></head>
<?php
session_start();
if(isset($_SESSION['login'])  == 2)
{
    $club = $_SESSION['club'];
    include "db.php";
    $query = "SELECT ideas.id, signup.name,ideas.idea,signup.dept,signup.phone,ideas.visibility FROM signup INNER JOIN ideas ON signup.roll_no = ideas.roll_no WHERE club_id = $club";
    $result = mysqli_query($con,$query);
?>
<head>
<link rel = "stylesheet" href = "admin.css">
<link rel="icon" href="favicon.ico" type="image/icon type">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<title>Uniclub | Club Admin</title>
</head>

<body class="container-fluid">
<div class="bg-img" class="container-fluid">
<div  id="content" class="card"  >

 
  <table class="card-table table table-hover">
  <thead>
  <br>
    <tr>
    <th>S.No.</th>
      <th>Name</th>
      <th>Idea</th>
      <th>Department</th>
      <th>Phone</th>
      <th>Visibility</th>
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
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['idea'];?></td>
      <td><?php echo $row['dept'];?></td>
      <td><?php echo $row['phone'];?></td>
       <td><?php if($row['visibility']==1){
                    echo "<button class=\"btn btn-success\" onclick=\"change(" . $row['id'] .", ".$row['visibility']." )\" >";
                    echo "Hide";
                }else{
                    echo "<button class=\"btn btn-danger\" onclick=\"change(" . $row['id'] .", ".$row['visibility']." )\" >";
                    echo "Show";
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
  </div>

</div>
</body>
</html>
<script>
function change(id, visibility){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if(this.readyState == 4 && this.status){
            document.getElementById('message').innerHTML = this.responseText;
        }
    };
    xmlhttp.open('GET', 'visibility.php?id='+id+'&visibility='+visibility, true);
    xmlhttp.send();
}
</script>
<?php }
else{
  echo "<script>";
  echo "alert('Access Denied');";
  echo "window.location.href = 'index.php';";
  echo "</script>";
}
?>