<!DOCTYPE html>
<html>
<?php
session_start();
if(isset($_SESSION['login']) == 2)
{
    include "db.php";
    $club = $_SESSION['club'];
    $login = $_SESSION['login'];
    $rollno = $_SESSION['rollno'];
    $query = "SELECT * FROM chat";
    $result0 = mysqli_query($con,$query);
    if($_SESSION['login'] == 2){
      $admin = 1;
    }
    else{
      $admin = 0;
    }
    $query = "SELECT * FROM announcements WHERE club_id = '$club'";
    $result = mysqli_query($con,$query);
?>
<head>
<!-- Required meta tags -->
<link rel="icon" href="Images/logohat.jpeg" type="image/icon type">
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
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
  <!--navbar-->

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
          <img src="Images/logo.png" style="height:95%;width:200px;float:left;margin-left:350px">
          </li>
        </ul>
      </div>
    </div>

  <!--navbar ends-->


    <h1 style ="text-align:center">Announcements</h1>
    <div class="container">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add announcement</button>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#chat">Chat</button>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add announcement</h4>
        </div>
        <div class="modal-body">
        <form>
              <div class="input-group-append idea">
                <input type="text" name = "events" class="form-control" id = 'events' placeholder="Enter the announcement" aria-label="Recipient's idea" aria-describedby="basic-addon2" required>
              </div>
              <div class="input-group-append">
                  <label for="clubid">Choose the club name</label>
                    <select name="clubid" id="clubid" required>
                        <option value="0">General</option>
                        <option value="1">Astro Club</option>
                        <option value="2">Computer Club</option>
                        <option value="3">Photography Club</option>
                        <option value="4">Cultural Club</option>
                   </select>
                   <input type="datetime-local"  class="float-right" id="date" placeholder="Enter date&time of the event" name="date" required>
              </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-success" value = "Add" onclick = "add()">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Add document</button>


<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add documents (Posters/ documents)</h4>
        </div>
        <div class="modal-body">
        <form action = "addannmat.php" method="post" enctype="multipart/form-data">
              <div class="input-group-append idea">
              <input type = "text" placeholder = "Description" name = "description">
              <input type = "hidden" placeholder = "Club ID" name = "clubid" value = "<?php echo $club;?>"><br>
              File Upload:<input type="file" name="file">
              </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" name="submit" value="Upload">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

<div class="container" style = "border-style: groove;border: 3px solid #495d87;">
  <table class="table table-hover">
  <thead>
  <br>
    <tr>
    <th>S.No.</th>
      <th>Club Id</th>
      <th>Events</th>
      <th>Dates</th>
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
      <td><input type = "text" id = "club_id<?php echo $row['id'];?>" value = "<?php echo $row['club_id'];?>"></td>
      <td><input type = "text" id = "events<?php echo $row['id'];?>" value = "<?php echo $row['events'];?>"></td>
      <td><input type = "text" id = "dates<?php echo $row['id'];?>" value = "<?php echo $row['dates'];?>"></td>
      <td><input type="button" class="btn btn-primary" value = "Update" onclick = "update(<?php echo $row['id'];?>)"></td>
      <td><input type="button" class="btn btn-danger" value = "Delete" onclick = "del(<?php echo $row['id'];?>)"></td>
    </form>
    </tr>
    <?php
    $i++;
    }
    ?>
  </tbody>
</table>
  </div>

<!-- Button trigger modal -->

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
<script>
function update(id){
    var club_id = $("#club_id"+id).val();
    var events = $("#events"+id).val();
    var dates = $("#dates"+id).val();
    
    $.ajax({
    type: "POST",
    url: "change.php",
    data: {
    id: id,
    club_id: club_id,
    events: events,
    dates: dates,
    up:1
    },
    cache: false,
    success: function(data) {
    alert(data);
    },
    error: function(xhr, status, error) {
    console.error(xhr);
    }
    });
    location.reload();
}
function del(id){
    $.ajax({
    type: "POST",
    url: "change.php",
    data: {
    id: id,
    del:1
    },
    cache: false,
    success: function(data) {
    alert(data);
    },
    error: function(xhr, status, error) {
    console.error(xhr);
    }
    });
    location.reload();
}
function add(){
    var club_id = $("#clubid").val();
    var events = $("#events").val();
    var dates = $("#date").val();
    $.ajax({
    type: "POST",
    url: "change.php",
    data: {
    club_id: club_id,
    events: events,
    dates: dates,
    add:1
    },
    cache: false,
    success: function(data) {
    alert(data);
    },
    error: function(xhr, status, error) {
    console.error(xhr);
    }
    });
    location.reload();
}
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

</script>
</body>
</html>
<?php
mysqli_close($con);
//include "footer.php";
}
else
{
    echo "<script>";
    echo "alert('Access denied');";
    echo "window.location.href='main.php';";
    echo "</script>";

}?>


