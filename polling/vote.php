<?php
include 'functions.php';
$con = connect();
$rollno = $_SESSION['rollno'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo $id;
    echo $rollno;
    $query = $con->prepare('SELECT * FROM polls WHERE id = ?');
    $query->execute([$_GET['id']]);
    $poll = $query->fetch(PDO::FETCH_ASSOC);
    if ($poll) {
        $query = $con->prepare('SELECT * FROM poll_answers WHERE poll_id = ?');
        $query->execute([$_GET['id']]);
        $poll_answers = $query->fetchAll(PDO::FETCH_ASSOC);
        if (isset($_POST['poll_answer'])) {
            $query1 = "SELECT * FROM polling_over WHERE roll_no = $rollno AND poll_id = $id";
            $result = mysqli_query($con,$query1);
            if(mysqli_fetch_assoc($result) != NULL){
                echo "<script>";
                echo "alert('You have already participated in the poll');";
                echo "window.location.href='index.php';";
                echo "</script>";
            }
            else{
                $query2 = "INSERT INTO polling_over(roll_no,poll_id) VALUES('$rollno','$id')";
                if(mysqli_query($con,$query2)){
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