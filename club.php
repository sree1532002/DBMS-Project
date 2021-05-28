<?php 
session_start();
if(isset($_POST['club'])){
include 'db.php';
$club = $_POST['club'];
$_SESSION['clubno'] = $club;
$login = $_SESSION['login'];
$rollno = $_SESSION['rollno'];

$sql = "SELECT idea FROM ideas where club_id = $club AND visibility = 1";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);

$sql1 = "SELECT email FROM signup where roll_no = $rollno";
$result1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_assoc($result1);
if($row1 != NULL){
  $email = $row1['email'];
  $_SESSION['mail'] = $email;
}
$sql2 = "SELECT * FROM club_layout where club_id = $club";
$result2 = mysqli_query($con,$sql2);
$row2 = mysqli_fetch_assoc($result2);

$sql3 = "SELECT interested_status FROM users WHERE club_id = '$club' AND roll_no = '$rollno'";
$result3 = mysqli_query($con, $sql3);
$row3 = mysqli_fetch_assoc($result3);
if($row3){
    $already = 1;
}
else{
  $already = 0;
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/logo.jpeg" type="image/icon type">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Uniclub | Club</title>

    <!--CSS Style-->
    <link rel = "stylesheet" href = "clubs.css">
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
    
  </head>
  <body>
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
            <a class="nav-link" id = "item" href="announcements.php">Announcements</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id = "item" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id = "item" href="logout.php">Logout</a>
          </li>
          <li class="nav-item">
            <img src="logo.jpeg" style="height:100%;width:100px;float:left;margin-left:450px">
          </li>
        </ul>
      </div>
  </div>
  <div class="card mb-3" style="max-width: 100%;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src=<?php echo $row2['image'];?> class="card-img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row2['heading'];?></h5>
          <p class="card-text"><?php echo $row2['description'];?></p>
          <div class = "ideas">
            <div class = "card-title1">We believe you've got great ideas, Share em with us.</div>
          </div>
          <div class="input-group mb-3">
            <form action = "addidea.php" method = "post" class = "ideatxt">
              <div class="input-group-append idea">
                <input type="text" class="form-control" name = 'idea' placeholder="Add your Idea here" aria-label="Recipient's idea" aria-describedby="basic-addon2">
                <button type="submit" class="logbtn addbtn btn btn-primary" name = "addidea">Add</button>  
              </div>
              <div class="input-group-append">
                  <input type = "hidden" name = "rollno" value ="<?php echo $rollno;?>">
                  <input type = "hidden" name = "clubno" value ="<?php echo $club;?>">
              </div>
            </form>
          </div>
          <div class = "card-title1">Here are some ideas posted by enthusiastic members</div>
        
          <div class="card container-fluid ideasd">
            <ul class="list-group list-group-flush">
            <div class="card-header feature">Featured Ideas</div>
              <?php
                while($row = mysqli_fetch_assoc($result)){
              ?>
              <li class  ="list-group-item"><?php echo $row['idea'];?></li>
              <?php } ?>
            </ul>
          </div>

          <?php if($login == 1 && $already == 0){?>
          <div class = "join">
            <div class = "card-title">Found us interesting? Come be a part of this family!</div>
            <form action = "joinclub.php" method = "post">
            <input type = "hidden" value = "<?php echo $club?>" name = "club">
            <input type = "hidden" value = "<?php echo $rollno?>" name = "rollno">
            <button type="submit" class="join1 btn btn-primary" name = "login">Join the club</button>
            </form>
          </div>
          <?php } ?>

          <?php if($login == 1 && $already == 1){?>
          <div class = "join">
            <div class = "card-title">Found us interesting? Come be a part of this family!</div>
            <form action = "joinclub.php" method = "post">
            <input type = "hidden" value = "<?php echo $club?>" name = "club">
            <input type = "hidden" value = "<?php echo $rollno?>" name = "rollno">
            <button type="submit" class="join1 btn btn-primary" name = "login" disabled = "true">Join the club</button>
            </form>
          </div>
          <?php } ?>

        </div>
      </div>
    </div>
  </div>
  <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<script>
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
</body>
</html>
<?php
  include "footer.php";
}
else{
      echo "<script>";
      echo "alert('Access Denied');";
      echo "window.location.href = 'index.php';";
      echo "</script>";
}
?>