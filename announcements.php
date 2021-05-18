<?php 
session_start();
include 'db.php';
$uname = $_SESSION['uname'];
$sql = "SELECT feed FROM ann";
$result = mysqli_query($con,$sql);

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
  </head>
  <body>
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
            <a class="nav-link" id = "item" href="logout.php">Logout</a>
          </li>
          <li class="nav-item">
            <img src="logo.jpeg" style="height:100%;width:100px;float:left;margin-left:620px">
          </li>
        </ul>
      </div>
    </div>
    <div class="menu container-fluid">
      <div class="row">
        <div class="col-lg-6 grid">
          <div>
            <img src="Images/Gridimg1.jpg" alt="gimg1" class="fgrid" />
          </div>
          <div>
            <img src="Images/Gridimg2.jpg" alt="gimg2" class="fgrid" />
          </div>
          <div>
            <img src="Images/Gridimg3.jpg" alt="gimg3" class="fgrid" />
          </div>
          <div>
            <img src="Images/Gridimg4.jpg" alt="gimg4" class="fgrid" />
          </div>
        </div>
        <div class="col-lg-6 flexContainer">
          <div class="menuCon">
            <div class="discover">Catch the latest news here!</div>
            <div class = "subtext">Here's a single destination to get all the announcements regarding your favourite club activities.</div> 
            <div class = "ideas">
           
            <div class = "card-title">Post a Message right here!</div>
          </div>
          <div class="input-group mb-3">
            <form action = "addann.php" method = "post" class = "ideatxt">
              <div class="input-group-append idea">
                <input type="text" name = "feeddata" class="form-control" name = 'idea' placeholder="Add" aria-label="Recipient's idea" aria-describedby="basic-addon2">
                <button type="submit" class="logbtn addbtn btn btn-primary" name = "addann">Post</button>  
              </div>
        
              <div class="input-group-append">
                  <input type = "hidden" name = "uname" value ="<?php echo $uname;?>">
                  <input type = "hidden" name = "clubno" value ="1">
              </div>
            </form>
          </div>
          <div class = "card-title">Latest announcements</div>
          <div class="card container-fluid ideasd">
            <ul class="list-group list-group-flush">
            <div class="card-header feature">Important</div>
              <?php
                while($row = mysqli_fetch_assoc($result)){
              ?>
              <li class  ="list-group-item"><?php echo $row['feed'];?></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    
</body>
