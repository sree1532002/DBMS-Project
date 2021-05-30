<!DOCTYPE html>
<html>
<head><link rel="icon" href="images/logo.jpeg" type="image/icon type"></head>
<?php
session_start();
if(isset($_SESSION['login'])  == 2)
{
    $club = $_SESSION['club'];
    if($_SESSION['login'] == 2){
      $admin = 1;
    }
    else{
      $admin = 0;
    }
    include "db.php";
    $query = "SELECT ideas.id, signup.name,ideas.idea,signup.dept,signup.phone,ideas.visibility FROM signup INNER JOIN ideas ON signup.roll_no = ideas.roll_no WHERE club_id = $club";
    $result = mysqli_query($con,$query);
?>
<head>
<link rel = "stylesheet" href = "admin.css">
<link rel="icon" href="favicon.ico" type="image/icon type">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--newlinks-->
  <link rel="icon" href="Images/logohat.jpeg" type="image/icon type">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Uniclub | Announcements</title>
    
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

<body class="container-fluid">
  <!-- navigation bar-->
   
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
          <?php
          if($admin == 0){?>
          <li class="nav-item">
          <img src="Images/logo.png" style="height:95%;width:200px;float:left;padding-left:700px;">
          </li>
          <?php } ?>
          <?php 
          if($admin == 1){?>
          <li class="nav-item">
          <img src="Images/logo.png" style="height:95%;width:200px;float:left;margin-left:350px">
          </li>
          <?php } ?>
        </ul>
      </div>
          </nav>
    </div>
    
    <div class="container-fluid feature" >
  
<div class="container-fluid">
<div  id="content" class="shadow-lg p-3 mb-5 bg-red rounded" >
 
  <table class="table">
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
                    echo "<button class=\"btn btn1 \" onclick=\"change(" . $row['id'] .", ".$row['visibility']." )\" >";
                    echo "Hide";
                }else{
                    echo "<button class=\"btn btn2 \" onclick=\"change(" . $row['id'] .", ".$row['visibility']." )\" >";
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
  </div>
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
<?php include "footer.php";}
else{
  echo "<script>";
  echo "alert('Access Denied');";
  echo "window.location.href = 'index.php';";
  echo "</script>";
}
?>