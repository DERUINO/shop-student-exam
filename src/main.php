<div class="content">
    <?php require_once('components/slider.php'); ?>
    <div class="goodscontainer">
        <?php foreach ($goods_list_row as $goods) { ?>
            <a href="categories.php?type=<?php echo $goods['category'] ?>&id=<?php echo $goods['goods_id'] ?>">
                <div class="goodsblock">
                    <img src="css/images/goods/<?php echo $goods['imageId']; ?>.png">
                    <div class="text"><?php echo $goods['title']; ?></div>
                </div>
            </a>
        <?php } ?>
    </div>
</div>