<?php
include 'functions.php';
$con = connect();
$rollno = $_SESSION['rollno'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
  
    $query = $con->prepare('SELECT * FROM polls WHERE id = ?');
    $query->execute([$_GET['id']]);
    $poll = $query->fetch(PDO::FETCH_ASSOC);
    
    if ($poll) {
        $query = $con->prepare('SELECT * FROM poll_answers WHERE poll_id = ?');
        $query->execute([$_GET['id']]);
        $poll_answers = $query->fetchAll(PDO::FETCH_ASSOC);
        if (isset($_POST['poll_answer'])) {
            $query1 =  $con->prepare("SELECT id FROM polling_over WHERE roll_no = '$rollno' AND poll_id = ?");
            $query1->execute([$_GET['id']]);
            $result = $query1->fetch(PDO::FETCH_ASSOC);
           
            if($result){
                echo "<script>";
                echo "alert('You have already participated in the poll');";
                echo "parent.location.href='index.php';";
                echo "</script>";
            }
            else{
                $query2 = $con->prepare("INSERT INTO polling_over(roll_no,poll_id) VALUES('$rollno','$id')");
                
                if($query2->execute([$_GET['id']])){
                    echo "<script>";
                    echo "alert('Yo');";
                    echo "</script>";
                }
                else{
                    echo "ufff";
                }
                $query = $con->prepare('UPDATE poll_answers SET votes = votes + 1 WHERE id = ?');
                $query->execute([$_POST['poll_answer']]);
                header ('Location: result.php?id=' . $_GET['id']);
                exit;
            }
        }
    } else {
        die ('Poll with that ID does not exist.');
    }
} else {
    die ('No poll ID specified.');
}
?>
<?php echo template_header('Poll Vote'); ?>
<div class="content poll-vote">
	<h2><?=$poll['title']?></h2>
	<p><?=$poll['desc']?></p>
    <form action="vote.php?id=<?=$_GET['id']?>" method="post">
        <?php for ($i = 0; $i < count($poll_answers); $i++): ?>
        <label>
            <input type="radio" name="poll_answer" value="<?=$poll_answers[$i]['id']?>"<?=$i == 0 ? ' checked' : ''?>>
            <?=$poll_answers[$i]['title']?>
        </label>
        <?php endfor; ?>
        <div>
            <input type="submit" value="Vote">
            <a href="result.php?id=<?=$poll['id']?>">View Result</a>
        </div>
    </form>
</div>
<?php echo template_footer(); ?>