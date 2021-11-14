<?php
    session_start();

    require_once('config.php');

    $productId = $_POST['productId'];
    $productSize = $_POST['productSize'];
    $productUserId = $_SESSION['id'];
    $addDate = date('d.m.Y H:i');
    $productStatus = array(
        'wait' => 'Ожидает оформления',
        'confirm' => 'Принят в обработку',
    );
    $cartList = $_POST['confirmOrder'];
    $cartRemove = $_POST['deleteOrder'];

    $confirmOrder = $_POST['trigger'];

    if (isset($productId) && $_SESSION['id']) {
        $cart_add_sql = $link->prepare("INSERT INTO `cart` SET `user_id` = :user_id, `productId` = :productId, `productSize` = :productSize, `addDate` = :addDate, `productStatus` = :productStatus");
        $cart_add_sql->execute(array('user_id' => $productUserId, 'productId' => $productId, 'productSize' => $productSize, 'addDate' => $addDate, 'productStatus' => $productStatus['wait']));
    }

    if (isset($confirmOrder)) {
        $confirm_sql = $link->prepare("UPDATE `cart` SET `productStatus` = :productStatus WHERE `user_id` = :user_id");
        $confirm_sql->execute(array('productStatus' => $productStatus['confirm'], 'user_id' => $productUserId));
    }

    if (isset($cartList)) {
        $cartCount = count($cartList);

        for ($i = 0; $i < $cartCount; $i++) {
            $confirm_sql = $link->prepare("UPDATE `cart` SET `productStatus` = :productStatus WHERE `user_id` = :user_id AND `cart_id` = :cartId");
            $confirm_sql->execute(array('productStatus' => $productStatus['confirm'], 'user_id' => $productUserId, 'cartId' => $cartList[$i]));
        }
    }

    if (isset($cartRemove)) {
        $cartCount = count($cartRemove);

        for ($i = 0; $i < $cartCount; $i++) {
            $delete_sql = $link->prepare("DELETE FROM `cart` WHERE `cart_id` = :cartId AND `user_id` = :user_id");
            $delete_sql->execute(array('user_id' => $productUserId, 'cartId' => $cartRemove[$i]));
        }
    }

    $show_cart_sql = $link->prepare("SELECT * FROM `cart` INNER JOIN `goods` ON cart.productId = goods.goods_id INNER JOIN `categories` ON categories.categories_id = goods.category WHERE `user_id` = :user_id ORDER BY cart.cart_id DESC");
    $show_cart_sql->execute(array('user_id' => $productUserId));
    $show_cart = $show_cart_sql->fetchAll(PDO::FETCH_ASSOC);
?>