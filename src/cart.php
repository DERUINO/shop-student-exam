<?php
    require_once('head.php');
    require_once('engine/titles.php');

    echo '<title>'.$titles['cart'].'</title>';
?>

<?php
    require_once('engine/cart.php');
?>

<body>
    <div class="wrapper">
        <?php require_once('header.php'); ?>
        
        <div class="content">
            <div class="cartblock">
                <?php if (!$_SESSION['id']) { ?>
                    <div class="title">Авторизуйтесь, для просмотра корзины.</div>
                <?php } else {
                    if (!$show_cart) { ?>
                    <div class="title">Корзина пустая.</div>                    
                <?php } else { ?>
                    <div class="modal-container">
                        <div class="flexbox">
                            <div class="modalblock">
                                <div class="title">Подтвердить оформление заказа?</div>
                                <div class="answerblock">
                                    <form id="confirmOrder">
                                        <input type="text" name="trigger" hidden value="trigger">
                                        <div class="yes">Да</div>
                                    </form>
                                    <div class="no">Я еще подумаю</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="titleblock">
                        <div class="title">Список товаров:</div>
                        <div class="buyblock confirmOrder">
                            <button>Оформить заказ</button>
                        </div>
                    </div>
                    <div class="cartlist">
                        <table width="100%">
                            <tr>
                                <th>Название товара</th>
                                <th>Категория</th>
                                <th>Дата добавления</th>
                                <th>Размер</th>
                                <th>Цена</th>
                                <th>Статус</th>
                                <th></th>
                            </tr>
                            <?php foreach ($show_cart as $cart_row) { ?>
                                <tr>
                                    <td><?php echo $cart_row['title'] ?></td>
                                    <td><?php echo $cart_row['pageTitle'] ?></td>
                                    <td><?php echo $cart_row['addDate'] ?></td>
                                    <td width="10%"><?php echo $cart_row['productSize'] ?></td>
                                    <td><?php echo $cart_row['price'] ?></td>
                                    <td width="15%"><?php echo $cart_row['productStatus'] ?></td>
                                    <?php
                                        if ($cart_row['productStatus'] == 'Принят в обработку') {
                                            echo '<td></td>';
                                        } else { ?>
                                    <td class="td_checkbox"><input type="checkbox" class="confirmOrderCheckbox deleteOrderCheckbox" value="<?php echo $cart_row['cart_id'] ?>"></td>
                                </tr>
                            <?php }
                            } ?>
                        </table>
                        <div class="deleteCart">
                            <div class="button">
                                Удалить выбранные позиции
                            </div>
                        </div>
                    </div>
                <?php }
                } ?>
            </div>
        </div>

        <?php require_once('footer.php'); ?>
    </div>
    <script type="text/javascript">
        sendConfirmOrder();
        sendDeleteOrder();
    </script>
</body>

</html>