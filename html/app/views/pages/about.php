<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-3"><?php echo $data['title']; ?></h1>
        <p class="p"><?php echo $data['description']; ?></p>
        <p class="p">Version <?php echo APPVERSION; ?></p>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
