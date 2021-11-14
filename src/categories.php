<?php
    require_once('head.php');
    require_once('engine/titles.php');

    echo '<title>'.$titles['categories'].'</title>';
?>

<?php
    require_once('engine/categories.php');
?>

<body>
    <div class="wrapper">
        <?php require_once('header.php'); ?>

        <div class="content">
            <div class="goodsblock">
                <?php if ($url == '/categories.php?type='.$categoryId.'') { ?>
                    <div class="goods-title"><?php echo $categoryTitle; ?></div>
                    <div class="goodscontainer category">
                        <?php foreach ($category_type_row as $goods) { ?>
                            <a href="?type=<?php echo $categoryId ?>&id=<?php echo $goods['goods_id'] ?>">
                                <div class="goodsblock">
                                    <img src="css/images/goods/<?php echo $goods['imageId']; ?>.png">
                                    <div class="text"><?php echo $goods['title']; ?></div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                <?php } else if ($url == '/categories.php?type='.$categoryId.'&id='.$goodsId.'') { ?>
                    <div class="currentProductBlock">
                        <div class="flexbox">
                            <div class="previewImgBlock">
                                <img src="css/images/goods/<?php echo $goods_row_image; ?>.png">
                            </div>
                            <div class="orderblock">
                                <div class="buttonsBlock">
                                    <div class="button buyNow">
                                        <button>Заказать сейчас</button>
                                    </div>
                                    <?php if ($_SESSION['id']) { ?>
                                        <div class="button addToCart">
                                            <button type="submit">Добавить в корзину</button>
                                        </div>
                                    <?php } else { ?>
                                        <div class="button noAuthAddCart">
                                            <button>Добавить в корзину</button>
                                        </div>
                                    <?php } ?>
                                </div>
                                <form id="addToCart">
                                    <div class="selectSizeBlock">
                                        <div class="title">Выберите<br>размер</div>
                                        <div class="inputblock">
                                            <input type="radio" name="productSize" checked value="xs"> XS
                                        </div>
                                        <div class="inputblock">
                                            <input type="radio" name="productSize" value="s"> S
                                        </div>
                                        <div class="inputblock">
                                            <input type="radio" name="productSize" value="m"> M
                                        </div>
                                        <div class="inputblock">
                                            <input type="radio" name="productSize" value="l"> L
                                        </div>
                                        <div class="valuesBlock">
                                            <input type="text" name="productId" value="<?php echo $goods_row_id ?>">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="textblock">
                            <?php echo $goods_row_text ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <?php require_once('footer.php'); ?>
    </div>

    <script type="text/javascript">
        addToCart();
    </script>
</body>

</html>