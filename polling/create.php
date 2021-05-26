<?php
include 'functions.php';
$con = connect();
$msg = '';
if (!empty($_POST)) {
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $desc = isset($_POST['desc']) ? $_POST['desc'] : '';
    $query = $con->prepare('INSERT INTO polls VALUES (NULL, ?, ?)');
    $query->execute([$title, $desc]);
    $poll_id = $con->lastInsertId();
    $answers = isset($_POST['answers']) ? explode(PHP_EOL, $_POST['answers']) : '';
    foreach ($answers as $answer) {
        if (empty($answer)) continue;
        $query = $con->prepare('INSERT INTO poll_answers VALUES (NULL, ?, ?, 0)');
        $query->execute([$poll_id, $answer]);
    }
    $msg = 'Created Successfully!';
    echo "<script>";
    echo "parent.location.href='index.php';";
    echo "</script>";
}?>
<?php echo template_header('Create Poll'); ?>
<div class="content update">
	<h2>Create Poll</h2>
    <form action="create.php" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
        <label for="desc">Description</label>
        <input type="text" name="desc" id="desc" required>
        <label for="answers">Answers (per line)</label>
        <textarea name="answers" id="answers" required></textarea>
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
<?php echo template_footer(); ?>