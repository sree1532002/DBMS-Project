<?php
include 'functions.php';
$con = connect();
$msg = '';
if (isset($_GET['id'])) {
    $query = $con->prepare('SELECT * FROM polls WHERE id = ?');
    $query->execute([$_GET['id']]);
    $poll = $query->fetch(PDO::FETCH_ASSOC);
    if (!$poll) {
        die ('Poll doesn\'t exist with that ID!');
    }
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            $query = $con->prepare('DELETE FROM polls WHERE id = ?');
            $query->execute([$_GET['id']]);
            $query = $con->prepare('DELETE FROM poll_answers WHERE poll_id = ?');
            $msg = 'You have deleted the poll!';
        } else {
            header('Location: index.php');
            exit;
        }
    }
} else {
    die ('No ID specified!');
}
echo template_header('Delete'); ?>
<div class="content delete">
	<h2>Delete Poll <?=$poll['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete poll <?=$poll['id']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$poll['id']?>&confirm=yes">Yes</a>
        <a href="delete.php?id=<?=$poll['id']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>
<?php echo template_footer(); ?>