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
<link rel = "stylesheet" href = "announcement.css">
<link rel = "stylesheet" href = "admin.css">
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<title>Uniclub | Club Admin</title>
</head>
<body >
  <!--navbar-->

  
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
     
          </nav>
          

  <!--navbar ends-->

  <div class="feature">
  <div class="tab">
    <button type="button" class="tablinks btn" data-toggle="modal" data-target="#myModal">Add announcement</button><br><br>
    <button type="button" class="tablinks btn" data-toggle="modal" data-target="#myModal2">Add document</button>
          </div>
          
    <div  id="content" class="shadow-lg p-3 mb-5 bg-red rounded" >
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
      <td><input type="button" class="btn btn1" value = "Update" onclick = "update(<?php echo $row['id'];?>)"></td>
      <td><input type="button" class="btn btn2 " value = "Delete" onclick = "del(<?php echo $row['id'];?>)"></td>
    </form>
    </tr>
    <?php
    $i++;
    }
    ?>
  </tbody>
</table>

  </div>
  

<!-- Modal 1-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalTitle">Add announcements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
              <div class=" form-group ">
                <input type="text" name = "events" class="form-control" id = 'events' placeholder="Enter the announcement" aria-label="Recipient's idea" aria-describedby="basic-addon2" required>
              <br>
              
                  <label for="clubid" class="form-check-label" >Choose the club name</label>
                    <select name="clubid" id="clubid" required>
                        <option value="0">General</option>
                        <option value="1">Astro Club</option>
                        <option value="2">Computer Club</option>
                        <option value="3">Photography Club</option>
                        <option value="4">Cultural Club</option>
                   </select>
                   <br>
                   <input type="datetime-local" class="form-control"  id="date" placeholder="Enter date&time of the event" name="date" required>
       </div>
      </div>
      <div class="modal-footer">
      <input type="button" class="btn btn1" value = "Add" onclick = "add()">
          <button type="button" class="btn btn2" data-dismiss="modal">Close</button>
          </form>
      </div>
    </div>
  </div>
</div>

<!--modal 1 ends-->



 <!-- Modal 2-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2Title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModal2Title">Add documents (Posters/ documents)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action = "addannmat.php" method="post" enctype="multipart/form-data">
      <div class=" form-group ">
              <input type = "text" class="form-control" placeholder = "Description" name = "description">
              <input type = "hidden" class="form-control" placeholder = "Club ID" name = "clubid" value = "<?php echo $club;?>"><br>
              File Upload <input type="file"  class="form-contol-file" name="file">
              </div>
      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn1" name="submit" value="Upload">
          <button type="button" class="btn btn2" data-dismiss="modal">Close</button>
          </form>
      </div>
    </div>
  </div>
</div>


<!--modal 2 ends-->


  </div>
  </div>
</body>
</html>

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


</script>
<?php
mysqli_close($con);
include "footer.php";
}
else
{
    echo "<script>";
    echo "alert('Access denied');";
    echo "window.location.href='main.php';";
    echo "</script>";

}?>


