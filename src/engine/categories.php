<?php
    require_once('config.php');

    $categoryId = $_GET['type'];
    $goodsId = $_GET['id'];

    $category_list_sql = $link->prepare("SELECT * FROM `categories`");
    $category_list_sql->execute();
    $category_list_row = $category_list_sql->fetchAll(PDO::FETCH_ASSOC);

    $goods_list_sql = $link->prepare("SELECT * FROM `goods`");
    $goods_list_sql->execute();
    $goods_list_row = $goods_list_sql->fetchAll(PDO::FETCH_ASSOC);

    $category_title_sql = $link->prepare("SELECT * FROM `categories` WHERE `categories_id` = :id");
    $category_title_sql->execute(array('id' => $categoryId));
    $category_title_row = $category_title_sql->fetch(PDO::FETCH_ASSOC);
    $categoryTitle = $category_title_row['pageTitle'];

    $category_type_sql = $link->prepare("SELECT * FROM `goods` WHERE `category` = :category");
    $category_type_sql->execute(array('category' => $categoryId));
    $category_type_row = $category_type_sql->fetchAll(PDO::FETCH_ASSOC);

    $goods_sql = $link->prepare("SELECT * FROM `goods` WHERE `category` = :category AND `goods_id` = :id");
    $goods_sql->execute(array('category' => $categoryId, 'id' => $goodsId));
    $goods_row = $goods_sql->fetch(PDO::FETCH_ASSOC);

    $goods_row_id = $goods_row['goods_id'];
    $goods_row_title = $goods_row['title'];
    $goods_row_text = $goods_row['text'];
    $goods_row_size = $goods_row['size'];
    $goods_row_price = $goods_row['price'];
    $goods_row_category = $goods_row['category'];
    $goods_row_image = $goods_row['imageId'];
?>