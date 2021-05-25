<html>
<head>
<link rel="icon" href="favicon.ico" type="image/icon type">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<title>Uniclub | Club Admin</title>
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