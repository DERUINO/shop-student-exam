<?php require_once('head.php'); ?>
<body>
    <?php
        if ($_SESSION['user_group'] != 1) {
            echo 'Нет доступа';
        } else {
            echo '<div class="admin-wrapper">';
                require_once('components/sidebar.php'); ?>
                
                <div class="content">
                    <div class="goods categories">
                        <div class="title">Список товаров</div>
                        <div class="categories-container">
                            <div class="categoriesblock">
                                <table>
                                    <tr>
                                        <th></th>
                                        <th>ID товара</th>
                                        <th>Название категории</th>
                                        <th>Название товара</th>
                                        <th>Описание</th>
                                        <th width="10%">Цена</th>
                                        <th></th>
                                    </tr>
                            <?php
                                $categories_sql = $link->prepare("SELECT * FROM `goods` INNER JOIN `categories` ON goods.category = categories.categories_id ORDER BY `goods_id` DESC");
                                $categories_sql->execute();
                                $categories_row = $categories_sql->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($categories_row as $categories) { ?>
                                    <tr>
                                        <td><button onClick="editGoods(<?php echo $categories['goods_id'] ?>)" type="submit">сохранить</button></td>
                                        <td>
                                            <input type="text" name="goodsEditId<?php echo $categories['goods_id'] ?>" value="<?php echo $categories['goods_id']; ?>" hidden>
                                            <?php echo $categories['goods_id']; ?>
                                        </td>
                                        <td>
                                            <select name="goodsEditCategory<?php echo $categories['goods_id'] ?>">
                                            <?php
                                                $categories_list_sql = $link->prepare("SELECT * FROM `categories`");
                                                $categories_list_sql->execute();
                                                $categories_list_row = $categories_list_sql->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($categories_list_row as $categories_list) {
                                                    if ($categories_list['categories_id'] == $categories['category']) {
                                                        echo '<option value="'.$categories_list['categories_id'].'" selected>'.$categories_list['pageTitle'].'</option>';
                                                    } else {
                                                        echo '<option value="'.$categories_list['categories_id'].'">'.$categories_list['pageTitle'].'</option>';
                                                    }
                                                }
                                            ?>
                                            </select>
                                        </td>
                                        <td><input type="text" name="goodsEditTitle<?php echo $categories['goods_id'] ?>" value="<?php echo $categories['title']; ?>"></td>
                                        <td><input type="text" name="goodsEditText<?php echo $categories['goods_id'] ?>" value="<?php echo $categories['text']; ?>"></td>
                                        <td><input type="text" name="goodsEditPrice<?php echo $categories['goods_id'] ?>" value="<?php echo $categories['price']; ?>"></td>
                                        <td>
                                            <input type="text" name="deleteGoods<?php echo $categories['goods_id']; ?>" value="<?php echo $categories['goods_id']; ?>" hidden>
                                            <button type="submit" onClick="deleteGoods(<?php echo $categories['goods_id'] ?>)" class="close">удалить</button>
                                        </td>
                                    </tr>
                                <?php }
                            ?>
                                </table>
                            </div>
                            <div class="addblock">
                                <form id="add-goods">
                                    <input type="text" name="goodsAddTitle" placeholder="Название товара">
                                    <input type="text" name="goodsAddText" placeholder="Описание">
                                    <input type="number" name="goodsAddPrice" placeholder="Цена">
                                    <select name="goodsAddCategory">
                                        <?php
                                        $categories_list_sql = $link->prepare("SELECT * FROM `categories`");
                                        $categories_list_sql->execute();
                                        $categories_list_row = $categories_list_sql->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($categories_list_row as $categories_list) {
                                                echo '<option value="'.$categories_list['categories_id'].'">'.$categories_list['pageTitle'].'</option>';
                                            }
                                        ?>
                                    </select>
                                    <label for="goodsAddFile">Добавить изображение</label>
                                    <input type="file" id="goodsAddFile" name="file" hidden>
                                    <button type="submit">Добавить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php echo '</div>';
        }
    ?>
<?php require_once('footer.php'); ?>
<script type="text/javascript">
    addGoods();
</script>