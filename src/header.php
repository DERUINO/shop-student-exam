<?php require_once('engine/ajax.php') ?>
<?php require_once('components/authblock.php'); ?>
<?php require_once('engine/categories.php'); ?>

<div class="header">
    <div class="header-navigationblock">
        <div class="header-logo">
            <img src="css/images/logo.png">
        </div>
        <?php if ($_SESSION['id']) { ?>
        <div class="welcomeblock">
            <div class="welcome-text">
                Здравствуйте, <?php echo $_SESSION['name'] ?>
            </div>
            <div class="welcome-links">
                <?php if ($_SESSION['user_group'] == 1) { ?>
                    <div class="admin"><a href="engine/admin/index.php">в админку</a></div>
                <?php } ?>
                    <div class='logout'><a href="engine/logout.php">выйти</a></div>
            </div>
        </div>
        <?php } else { ?>
        <div class="header-authblock">
            Вход/Регистрация
        </div>
        <?php } ?>
    </div>
    <div class="header-menublock">
        <div class="menu-link"><a href="index.php">Главная</a></div>
        <div class="menu-link dropdown">
            Категории
            <div class="dropdown-links">
                <?php foreach ($category_list_row as $category) { ?>
                    <a href="/categories.php?type=<?php echo $category['categories_id']; ?>">
                        <div class="menu-link"><?php echo $category['pageTitle']; ?></div>
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="menu-link"><a href="cart.php">Корзина</a></div>
        <div class="menu-link"><a href="policy.php">FQA</a></div>
    </div>
</div>

