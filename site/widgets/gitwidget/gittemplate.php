<!-- JavaScript for widget (does not have normal header) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        
    });
</script>

<!-- html for the widget -->
<style>
    h2 {
        padding-bottom: 16px;
    }
    .good-merge {
        color: green;
    }
    .bad-merge {
        color: red;
    }
    form {
        margin-left: auto;
        margin-right: auto;
        width: 95%;
    }
    textarea {
        width: 100%;
        padding: 12px;
    }
</style>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $message = $_POST['conflict'];
        echo $message;
    }
 ?>

<?php if ($conflict): ?>
    <h2 class="bad-merge">Merge conflict found:</h2>
    <form action="<?= page('gitwidget')->url() ?>" method="post" id="conflict-form">
        <div class="conflict-message"><?= $pull_message ?></div>
        <textarea name="conflict" id="conflict"></textarea>
        <input type="submit" name="submit" />
    </form>
<?php else: ?>
    <h2 class="good-merge">No merge conflicts found.</h2>
<?php endif; ?>
