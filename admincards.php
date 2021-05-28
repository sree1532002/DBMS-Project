<?php 
session_start();
if(isset($_SESSION['login'])){
$login = $_SESSION['login'];
$club = $_SESSION['club'];
if($_SESSION['login'] == 2){
  $admin = 1;
}
else{
  $admin = 0;
}

include 'db.php';
$rollno = $_SESSION['rollno'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Uniclub | Home</title>
  <link rel="icon" href="Images/logohat.jpeg" type="image/icon type">
  <meta charset="utf-8">
  <link rel="stylesheet" href="adminpage.css">
  
  <link rel="stylesheet" href="footer.css">
  <link rel="icon" href="logohat.jpeg" type="image/icon type">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

<!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<!--new links-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body class="container-fluid">
    <div class="bg-img" class="container-fluid">
      <nav class="navbar navbar-expand-sm navbar-light" style="background-color:#b8b5ff;">
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
            <a class="nav-link" id = "item" href="polling/index.php">Polls</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" id = "item" href="clubadmin.php">Admin</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" id = "item" href="logout.php">Logout</a>
          </li>
          <li class="nav-item">
            <span><img src="Images/logofinal.jpeg" style="height:95%;width:200px;float:left;margin-left:350px"></span>
          </li>
        </ul>
      </div>
      </nav>
</div>

      <!--navbar finishes -->
    <div class = "util">Admin utilities</div>
    <hr>
      <!--cards start -->
  <div class="container-fluid">
	<div class="row">
	<div class="col-md-3 col-sm-4">
	<div class="wrimagecard wrimagecard-topimage">
          <a href="clubadmin.php">
          <div class="wrimagecard-topimage_header" style="background-color:#FFDCF4 ">
            <center><i class="fa fa-bullhorn" style="color:#F07BBB"></i></center>
          </div>
          <div class="wrimagecard-topimage_title">
            <h4>Announcements
            </h4>
          </div>
        </a>
      </div>
      </div>
    <div class="col-md-3 col-sm-4">
      <div class="wrimagecard wrimagecard-topimage">
          <a href="ideaverification.php">
          <div class="wrimagecard-topimage_header" style="background-color: #F5E1FD">
            <center><i class = "fa fa-lightbulb-o" style="color:#9979C1"></i></center>
          </div>
          <div class="wrimagecard-topimage_title">
            <h4>Ideas
            <div class="pull-right badge" id="WrControls"></div></h4>
          </div>
        </a>
      </div>
</div>
<div class="col-md-3 col-sm-4">
      <div class="wrimagecard wrimagecard-topimage">
          <a href="users.php">
          <div class="wrimagecard-topimage_header" style="background-color:#FFDCF4">
            <center><i class="fa fa-users" style="color:#F07BBB"> </i></center>
          </div>
          <div class="wrimagecard-topimage_title" >
            <h4>Users
            <div class="pull-right badge" id="WrForms"></div>
            </h4>
          </div></a>
    </div>
    </div>
	<div class="col-md-3 col-sm-4">
      <div class="wrimagecard wrimagecard-topimage">
          <a href="" >
          <div class="wrimagecard-topimage_header" style="background-color: #F5E1FD">
             <center><i class="fa fa-comments" style="color:#9979C1"> </i></center>
          </div>
          <div class="wrimagecard-topimage_title">
            <h4><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1"></button>Add Club
            <div class="pull-right badge" id="WrGridSystem"></div></h4>
          </div></a>
         
        </div>
    </div>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">Add Club</button>

    <!--modal-->
    
<!--end of modal-->
    
<!--footer-->

</body>
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add club</h4>
        </div>
        <div class="modal-body">
        <form action = "addclub.php" method="post" enctype="multipart/form-data">
              <div class="input-group-append idea">
              <input type = "text" placeholder = "Club ID" name = "clubid"><br>
              <input type = "text" placeholder = "Club name" name = "clubname"><br>
              <input type = "text" placeholder = "President Roll number" name = "president"><br>
              <input type = "text" placeholder = "Incharge name" name = "incharge"><br>
              <input type = "text" placeholder = "Contact number" name = "contact"><br><br>
              <input type = "text" placeholder = "Heading" name = "heading"><br>
              <input type = "text" placeholder = "Description" name = "description"><br>
              <input type = "file" id = "image" name = "image">
              </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value = "Add">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action = "addclub.php" method="post" enctype="multipart/form-data">
              <div class="input-group-append idea">
              <input type = "text" placeholder = "Club ID" name = "clubid"><br>
              <input type = "text" placeholder = "Club name" name = "clubname"><br>
              <input type = "text" placeholder = "President Roll number" name = "president"><br>
              <input type = "text" placeholder = "Incharge name" name = "incharge"><br>
              <input type = "text" placeholder = "Contact number" name = "contact"><br><br>
              <input type = "text" placeholder = "Heading" name = "heading"><br>
              <input type = "text" placeholder = "Description" name = "description"><br>
              <input type = "file" id = "image" name = "image">
              </div>  
      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-success" value = "Add">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </form>
      </div>
    </div>
  </div>
</div>

</html>
<?php }
else{
    echo "<script>";
  echo "alert('Access Denied');";
  echo "window.location.href = 'index.php';";
  echo "</script>";
}?>




 
