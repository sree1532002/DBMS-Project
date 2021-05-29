<!doctype html>
<html lang="en">
  <head>
  <link rel="icon" href="favicon.ico" type="image/icon type">
  <meta http-equiv="refresh" content="10" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<title>Uniclub | Club Admin</title>
  </head>
<?php
include "db.php";
$query = "SELECT * FROM chat";
$result = mysqli_query($con,$query);?>
<div class="card container-fluid ideasd">
<ul class="list-group list-group-flush">
<div class="card-header feature">Chat</div>
    <?php
    while($row = mysqli_fetch_assoc($result)){
    ?>
    <li class  ="list-group-item"><?php echo $row['roll_no']." || ";?><?php echo $row['dt']." || ";?><?php echo $row['message'];?></li>
    <?php } ?>
</ul>
</div>

<form>
<textarea id="message" name="message" rows="4" cols="50">
</textarea>
<button class = "btn-btn-info" onclick = "send()">Send</button>
</form>

<script>
    function send(){
    var message = $("#message").val();
    $.ajax({
    type: "POST",
    url: "send.php",
    data: {
    message: message,
    send:1
    },
    cache: false,
    success: function(data) {
        console.log(data);
    },
    error: function(xhr, status, error) {
    console.error(xhr);
    }
    });
    location.reload();
    setTimeout("location.reload(true);", t);
}
</script>