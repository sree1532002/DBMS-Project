<?php
include 'functions.php';
$con = connect();
if (isset($_GET['id'])) {
    $query = $con->prepare('SELECT * FROM polls WHERE id = ?');
    $query->execute([$_GET['id']]);
    $poll = $query->fetch(PDO::FETCH_ASSOC);
    if ($poll) {
        $query = $con->prepare('SELECT * FROM poll_answers WHERE poll_id = ?');
        $query->execute([$_GET['id']]);
        $poll_answers = $query->fetchAll(PDO::FETCH_ASSOC);
        if (isset($_POST['poll_answer'])) {
            $query = $con->prepare('UPDATE poll_answers SET votes = votes + 1 WHERE id = ?');
            $query->execute([$_POST['poll_answer']]);
            header ('Location: result.php?id=' . $_GET['id']);
            exit;
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
            
            <a href="result.php?id=<?=$poll['id']?>">View Result</a>
        </div>
    </form>
</div>
<?php echo template_footer(); ?>