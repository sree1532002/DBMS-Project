<!DOCTYPE html>
<html lang="en">
<head>
  <title>Uniclub | Home</title>
  <link rel="icon" href="Images/logohat.jpeg" type="image/icon type">
  <meta charset="utf-8">
  <link rel="stylesheet" href="adminpage.css">
  
  <link rel="stylesheet" href="footer.css">
  <link rel="icon" href="logo.jpeg" type="image/icon type">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

</head>

<body class="container-fluid">
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
            <a class="nav-link" id = "item" href="polling/index.php">Polls</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" id = "item" href="clubadmin.php">Admin</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" id = "item" href="logout.php">Logout</a>
          </li>
          <li class="nav-item">
            <img src="Images/logofinal.jpeg" style="height:95%;width:200px;float:left;margin-left:350px">
          </li>
        </ul>
      </div>
      </nav>

      <!--navbar finishes -->

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
          </div>
    </div>
    </div>
	<div class="col-md-3 col-sm-4">
      <div class="wrimagecard wrimagecard-topimage">
          <a href="addclub.php">
          <div class="wrimagecard-topimage_header" style="background-color: #F5E1FD">
             <center><i class="fa fa-comments" style="color:#9979C1"> </i></center>
          </div>
          <div class="wrimagecard-topimage_title">
            <h4>Add Club
            <div class="pull-right badge" id="WrGridSystem"></div></h4>
          </div>
          
</div>
  
</body>
</html>



 
