<?php
    require_once('config.php');

    $deleteCategoryId = $_POST['deleteCategory'];
    $addCategory = $_POST['addCategory'];
    $categoryId = $_POST['categoryId'];
    $categoryTitle = $_POST['categoryTitle'];

    $goodsAddTitle = $_POST['goodsAddTitle'];
    $goodsAddText = $_POST['goodsAddText'];
    $goodsAddPrice = $_POST['goodsAddPrice'];
    $goodsAddCategory = $_POST['goodsAddCategory'];
    $deleteGoodsId = $_POST['deleteGoods'];
    $goodsAddImage = $_FILES['file'];

    $goodsEditId = $_POST['goodsEditId'];
    $goodsEditSelect = $_POST['goodsEditSelect'];
    $goodsEditTitle = $_POST['goodsEditTitle'];
    $goodsEditText = $_POST['goodsEditText'];
    $goodsEditPrice = $_POST['goodsEditPrice'];

    $userEditId = $_POST['userEditId'];
    $userEditName = $_POST['userEditName'];
    $userEditEmail = $_POST['userEditEmail'];
    $userEditGroup = $_POST['userEditGroup'];
    $deleteUser = $_POST['deleteUser'];

    if (isset($deleteCategoryId)) {
        $delete_category_sql = $link->prepare("DELETE FROM `categories` WHERE `categories_id` = :id");
        $delete_category_sql->execute(array('id' => $deleteCategoryId));

        $delete_category_sql = $link->prepare("DELETE FROM `goods` WHERE `category` = :id");
        $delete_category_sql->execute(array('id' => $deleteCategoryId));
    }

    if (isset($addCategory) && strlen($addCategory) > 0) {
        $add_category_sql = $link->prepare("INSERT INTO `categories` SET `pageTitle` = :pageTitle");
        $add_category_sql->execute(array('pageTitle' => $addCategory));
    }

    if (isset($categoryId)) {
        $edit_category_sql = $link->prepare("UPDATE `categories` SET `categories_id` = :id, `pageTitle` = :pageTitle WHERE `categories_id` = :id");
        $edit_category_sql->execute(array('id' => $categoryId, 'pageTitle' => $categoryTitle));
    }

    if (isset($goodsAddTitle)) {
        $get_id_sql = $link->prepare("SELECT * FROM `goods` ORDER BY `goods_id` DESC LIMIT 1");
        $get_id_sql->execute();
        $get_id = $get_id_sql->fetch(PDO::FETCH_ASSOC);

        $imageId = $get_id['goods_id'];
        $getImageId = $imageId + 1;

        if ($imageId == null) {
            $getImageId = 0;
        }

        $add_goods_sql = $link->prepare("INSERT INTO `goods` SET `title` = :title, `text` = :text, `price` = :price, `category` = :category, `imageId` = :imageId");
        $add_goods_sql->execute(array('title' => $goodsAddTitle, 'text' => $goodsAddText, 'price' => $goodsAddPrice, 'category' => $goodsAddCategory, 'imageId' => $getImageId));


        move_uploaded_file($goodsAddImage['tmp_name'], '../../css/images/goods/' . $getImageId . '.png');
    }

    if (isset($deleteGoodsId)) {
        $delete_goods_sql = $link->prepare("DELETE FROM `goods` WHERE `goods_id` = :id");
        $delete_goods_sql->execute(array('id' => $deleteGoodsId));
        echo 'deleted';
    }

    if (isset($goodsEditTitle)) {
        $edit_goods_sql = $link->prepare("UPDATE `goods` SET `goods_id` = :id, `title` = :title, `text` = :text, `price` = :price, `category` = :category WHERE `goods_id` = :id");
        $edit_goods_sql->execute(array('id' => $goodsEditId, 'title' => $goodsEditTitle, 'text' => $goodsEditText, 'price' => $goodsEditPrice, 'category' => $goodsEditSelect));
    }

    if (isset($userEditName)) {
        $edit_goods_sql = $link->prepare("UPDATE `users` SET `id` = :id, `name` = :name, `email` = :email, `user_group` = :group WHERE `id` = :id");
        $edit_goods_sql->execute(array('id' => $userEditId, 'name' => $userEditName, 'email' => $userEditEmail, 'group' => $userEditGroup));

        echo 'ok';
    }

    if (isset($deleteUser)) {
        $delete_user_sql = $link->prepare("DELETE FROM `users` WHERE `id` = :id");
        $delete_user_sql->execute(array('id' => $deleteUser));
        echo 'deleted';
    }

?>