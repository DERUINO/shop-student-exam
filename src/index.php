<?php
    require_once('head.php');
    require_once('engine/titles.php');

    echo '<title>'.$titles['main'].'</title>';
?>

<body>
    <div class="wrapper">
        <?php require_once('header.php'); ?>
        <?php require_once('main.php'); ?>
        <?php require_once('footer.php'); ?>
    </div>
</body>

</html>