<?php
include 'functions.php';
$con = connect();
if (isset($_GET['id'])) {
    $query = $con->prepare('SELECT * FROM polls WHERE id = ?');
    $query->execute([$_GET['id']]);
    $poll = $query->fetch(PDO::FETCH_ASSOC);
    if ($poll) {
        $query = $con->prepare('SELECT * FROM poll_answers WHERE poll_id = ? ORDER BY votes DESC');
        $query->execute([$_GET['id']]);
        $poll_answers = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_votes = 0;
        foreach ($poll_answers as $poll_answer) {
            $total_votes += $poll_answer['votes'];
        }
    } else {
        die ('Poll with that ID does not exist.');
    }
} else {
    die ('No poll ID specified.');
}
echo template_header('Poll Results'); ?>
<div class="content poll-result"  >
	<h2 ><?=$poll['title']?></h2>
	<p style="padding-left:20px;"><?=$poll['desc']?></p>
    <div class="wrapper" >
        <?php foreach ($poll_answers as $poll_answer): ?>
        <div class="poll-question">
            <p><?=$poll_answer['title']?> <span>(<?=$poll_answer['votes']?> Votes)</span></p>
            <div class="result-bar" style= "width:<?=@round(($poll_answer['votes']/$total_votes)*100)?>%">
                <?=@round(($poll_answer['votes']/$total_votes)*100)?>%
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php echo template_footer(); ?>