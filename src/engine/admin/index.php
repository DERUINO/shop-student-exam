<?php require_once('head.php'); ?>
<body>
    <?php
        if ($_SESSION['user_group'] != 1) {
            echo 'Нет доступа';
        } else {
            echo '<div class="admin-wrapper">';
                require_once('components/sidebar.php');
                require_once('main.php');
            echo '</div>';
        }
    ?>
<?php require_once('footer.php'); ?>