<?php
include 'functions.php';
$login = $_SESSION['login'];
$con = connect();
$query = $con->query('SELECT p.*, GROUP_CONCAT(pa.title ORDER BY pa.id) AS answers FROM polls p LEFT JOIN poll_answers pa ON pa.poll_id = p.id GROUP BY p.id');
$polls = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<?php echo template_header('Polls'); 
$i = 1;?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Uniclub | Home</title>
  <link rel="icon" href="../Images/logohat.jpeg" type="image/icon type">
  <meta charset="utf-8">
  <link rel="stylesheet" href="../stylecards.css">
  <link rel="stylesheet" href="../stylemain.css">
  <link rel="stylesheet" href="../footer.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../admin.css">
  <link rel="stylesheet" href="../adminpage.css">

  <link rel="icon" href="..logo.jpeg" type="image/icon type">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="container-fluid">
   
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#b8b5ff;">
      <div id = "p" class="float-child">
        <ul class="nav justify-content-end">
        <li class="nav-item" >
            <a class="nav-link"  id = "item" href="../main.php">Home</a>
          </li>
          <li class="nav-item" >
            <a class="nav-link"  id = "item" href="../main.php#about1">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id = "item" href="../main.php#clubs">Clubs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id = "item" href="../announcements.php">Announcements</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id = "item" href="../main.php#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id = "item" href="#">Polls</a>
          </li>
          <?php 
          if($login == 2){?>
          <li class="nav-item">
            <a class="nav-link" id = "item" href="../admincards.php">Admin</a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" id = "item" href="../logout.php">Logout</a>
          </li>
          <li class="nav-item">
          <img src="../Images/logo.png" style="height:95%;width:200px;float:left;margin-left:350px">
          </li>
        </ul>
      </div>
      </nav>
  <div class="container-fluid feature" >
 

<div  id="content" class="content home shadow-lg p-3 mb-5 bg-red rounded" >
  

<?php if($login == 2){?>
    <h2>Polls created</h2>
            <?php } ?>
    <?php if($login == 2){?>
	<button class="create-poll" onclick = "create()">Create Poll</button>
    <?php } ?>
    <br>
	<table>
        <thead>
            <tr>
                <td>S.No.</td>
                <td>Poll name</td>
				<td>Options</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($polls as $poll): ;?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$poll['title']?></td>
				<td><?=$poll['answers']?></td>
                <td class="actions">
                <div class="fas fa-eye fa-xs" style = "height:30px;width:40px;background-color: #f7def0;border-radius:5px;padding-right:12px;padding-top:10px;" onclick = "loadpoll(<?=$poll['id']?>)"></div>
                <?php if($login == 2){?>
                <div class="fas fa-trash fa-xs" style = "height:30px;width:40px;background-color:#dbd9ff;border-radius:5px;padding-right:15px;padding-top:10px;" onclick = "del(<?=$poll['id']?>)"></div>
                <?php } ?> 
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

</div>

</div>
                
<br>

<!--frames-->
<div class="continer-fluid feature">
<div class="iframe-container">
 
<div  id="content" class="content home shadow-lg p-3 mb-5 bg-red rounded" >
<iframe name="iFrameName" class="frames" height = "500px" width = "100%"></iframe>
               
</div>
 </div>                
</body>
</html>
<script>
function loadpoll(id){
    var source = "vote.php?id=" + id;
    console.log(source);
    document.getElementsByName('iFrameName')[0].src = source;
}
function del(id){
    var source = "delete.php?id=" + id;
    console.log(source);
    document.getElementsByName('iFrameName')[0].src = source;
}
function create(){
    document.getElementsByName('iFrameName')[0].src = 'create.php';
}
</script>
<?php echo template_footer(); ?>