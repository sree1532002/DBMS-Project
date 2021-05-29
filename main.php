<?php
session_start();
include "db.php";
if(isset($_SESSION['login'])){
  $query = "SELECT * FROM chat";
  $result0 = mysqli_query($con,$query);
if($_SESSION['login'] == 2){
  $admin = 1;
}
else{
  $admin = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Uniclub | Home</title>
  <link rel="icon" href="Images/logohat.jpeg" type="image/icon type">
  <meta charset="utf-8">
  <link rel="stylesheet" href="stylemain.css">
  <link rel="stylesheet" href="stylecards.css">
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

  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body class="container-fluid">
    <div class="bg-img" class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#b8b5ff;">
      <div id = "p" class="float-child">
        <ul class="nav justify-content-end">
        <li class="nav-item" >
            <a class="nav-link"  id = "item" href="#">Home</a>
          </li>
          <li class="nav-item" >
            <a class="nav-link"  id = "item" href="#about1">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id = "item" href="#clubs">Clubs</a>
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
      </nav>
     
      <div class ="uni">Uniclub</div>
    </div>

    <div id="bg">
        <h1 class="mm" id = "about1">About</h1>
        <div class="about">
        <p >Getting involved in an extracurricular club could be one of the highlights of your time on campus. Whether you’re a head-of-the-class, perfect-GPA, volunteers-at-the-nursing-home-on-weekends kind of student, or a stay-out-late-on-Thursday, avoid-taking-classes-on-Friday-morning, in-it-for-the-personal-growth type of student, there’s an activity out there for you. And in many cases, that club could plug you into a national network of like-minded groups, individuals, and possibly even future employers. </p>
        </div>
    </div>
    <div id="bg">
        <h1 class="mm" id = "clubs">Clubs</h1>
    </div>
    <!-- clubs-->

    <div class="card-deck">
  
  <div class="card">
    <img class="card-img-top" src="Images/space2.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Astro Club</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <form action = "club.php" method = "post">
      
      <input type = "hidden" name = "club" value = "1">
     <button type = "submit" name = "submit"  class="btn btn-primary" >Go</button>
      </form>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="Images/tech.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Computers Club</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <form action = "club.php" method = "post">
      <input type = "hidden" name = "club" value = "2">
      <button type = "submit" name = "submit" class="correct btn btn-primary">Go</button>
      </form>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="Images/photography.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Photography Club</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <form action = "club.php" method = "post">
      <input type = "hidden" name = "club" value = "3">
      <button type = "submit" name = "submit" class="btn btn-primary">Go</button>
      </form>
    </div>
  </div>

  <div class="card">
    <img class="card-img-top" src="Images/cultural.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Music Club</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <form action = "club.php" method = "post">
      <input type = "hidden" name = "club" value = "4">
      <button type = "submit" name = "submit" class="btn btn-primary">Go</button>
      </form>
    </div>
  </div>
</div>
</div>

 <!--chat button-->    
<div class="fixed-btn">
  <p><button type="button" class="btn" data-toggle="modal" data-target="#chat" style="background-color:#b8b5ff;border:none;postion:sticky;bottom:5px;left:5px;"> Chat    </button></p>
 </div>
 <div class="fixed-btn">
 <p><button type="button" class="btn" data-toggle="modal" data-target="#chat" style="background-color:#b8b5ff;border:none;postion:sticky;bottom:5px;left:5px;"> <i class='far fa-comment-dots icons' style='font-size:48px;color:white;postion:sticky;bottom:5px;left:5px;'></i>   </button></p>
          </div>

<!--modal-->

<div class="modal fade bd-example-modal-lg" id="chat" tabindex="-1" role="dialog" aria-labelledby="chat" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Chat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id = "m1">
      <?php
      while($row = mysqli_fetch_assoc($result0)){
      ?>
    <ul>
    <?php echo $row['roll_no']." || ";?><?php echo $row['dt']." || ";?><?php echo $row['message'];?>
    </ul>
    <?php } ?>
    </div>
    <div id="result">
   
  </div>
      <div class="modal-footer">
      <form id = "send">
        <textarea name="message" id = "message" rows="4" cols="60" required></textarea>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Send">
        </form>
      </div>
  </div>
</div>
 </div>
</div>
<!--end modal-->
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<script>


$(document).ready(function(){
    $("#send").submit(function(event){
      event.preventDefault();
      var formValues = $(this).serialize();
      var message = $("#message").val();
      $.post("send.php", formValues, function(data){
          document.getElementById("m1").style.display = "none";
          $("#result").html(data);
      });
  });
});


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
<?php include "footer.php"?>
</div>
</body>
</html>
<?php }else{
  echo "<script>";
  echo "alert('Please login/signup to continue');";
  echo "window.location.href='index.php';";
  echo "</script>";
}
?>