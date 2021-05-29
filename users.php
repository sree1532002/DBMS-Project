<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['login']) == 2)
{
    include "db.php";
    $club = $_SESSION['club'];
    if($_SESSION['login'] == 2){
      $admin = 1;
    }
    else{
      $admin = 0;
    }
    $query = "SELECT signup.roll_no,signup.name,signup.year,signup.dept,users.club_id,signup.email,signup.phone,users.accepted_status FROM signup INNER JOIN users ON signup.roll_no = users.roll_no WHERE users.club_id = $club";
    $result = mysqli_query($con,$query);

?>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="Images/logohat.jpeg" type="image/icon type">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Uniclub | Members</title>
    
    <!--CSS Style-->
    <link rel = "stylesheet" href = "announcement.css">
    
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
      integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
<title>Uniclub | Club Admin</title>
  </head>
  <body>
    <!--navbar -->


    <div class="bg-img" class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#b8b5ff;">
      <div id = "p" class="float-child">
        <ul class="nav justify-content-end">
        <li class="nav-item" >
            <a class="nav-link"  id = "item" href="main.php">Home</a>
          </li>
          <li class="nav-item" >
            <a class="nav-link"  id = "item" href="main.php#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id = "item" href="main.php#clubs">Clubs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id = "item" href="#">Announcements</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id = "item" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id = "item" href="polling/index.php">Polls</a>
          </li>
          <?php 
          if($admin == 1){?>
          <li class="nav-item">
            <a class="nav-link" id = "item" href="admincards.php">Admin</a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" id = "item" href="logout.php">Logout</a>
          </li>
          <li class="nav-item">
          <img src="Images/logofinal.jpeg" style="height:95%;width:200px;float:left;margin-left:350px">
          </li>
        </ul>
      </div>
    </div>
    <!--navbar ends-->


<div class="container" style = "border-style: groove;border: 3px solid #495d87;margin-bottom:400px;margin-top:100px;">
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
                    echo "<button class=\"btn btn-success\"   onclick=\"change(" . $row['roll_no'] .", ".$row['club_id'].",".$row['accepted_status']." )\" >";
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
  </div>
  </div>
</body>
</html>
<?php include "footer.php"; } 
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
