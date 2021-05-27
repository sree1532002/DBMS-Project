<!DOCTYPE html>
<html>
<head><link rel="icon" href="images/logo.jpeg" type="image/icon type"></head>
<?php
session_start();
if(isset($_SESSION['login']) == 2)
{
    include "db.php";
    $club = $_SESSION['club'];
    $login = $_SESSION['login'];
    $query = "SELECT * FROM announcements WHERE club_id = '$club'";
    $result = mysqli_query($con,$query);
?>
<head>
<link rel="icon" href="favicon.ico" type="image/icon type">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<title>Uniclub | Club Admin</title>
</head>
<body>
    <h1 style ="text-align:center">Announcements</h1>
    <div class="container">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add announcement</button>

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

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">Add Club</button>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Add document</button>
  <!-- Modal -->
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
              <input type = "text" placeholder = "Contact number" name = "contact"><br>
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
</div>

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
              <input type = "hidden" placeholder = "Club ID" name = "clubid" value = "<?php echo $club;?>"><br>
              File Upload:<input type="file" name="file">
              </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" name="submit" value="upload">
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

</body>
</html>

<?php
mysqli_close($con);
}
else
{
    echo "<script>";
    echo "alert('Access denied');";
    echo "window.location.href='main.php';";
    echo "</script>";

}?>
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

