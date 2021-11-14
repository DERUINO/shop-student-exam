<?php require_once('head.php'); ?>
<body>
    <?php
        if ($_SESSION['user_group'] != 1) {
            echo 'Нет доступа';
        } else {
            echo '<div class="admin-wrapper">';
                require_once('components/sidebar.php'); ?>
                
                <div class="content">
                    <div class="categories">
                        <div class="title">Список категорий</div>
                        <div class="categories-container">
                            <div class="categoriesblock">
                                <table>
                                    <tr>
                                        <th></th>
                                        <th>ID категории</th>
                                        <th>Название категории</th>
                                        <th></th>
                                    </tr>
                            <?php
                                $categories_sql = $link->prepare("SELECT * FROM `categories`");
                                $categories_sql->execute();
                                $categories_row = $categories_sql->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($categories_row as $categories) { ?>
                                    <tr>
                                        <td><button onClick="editCategory(<?php echo $categories['categories_id'] ?>)" type="submit">сохранить</button></td>
                                        <td><?php echo $categories['categories_id'] ?></td>
                                        <td>
                                            <input type="text" name="categoryId<?php echo $categories['categories_id'] ?>" value="<?php echo $categories['categories_id'] ?>" hidden>
                                            <input type="text" name="categoryTitle<?php echo $categories['categories_id'] ?>" value="<?php echo $categories['pageTitle'] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="deleteCategory<?php echo $categories['categories_id'] ?>" value="<?php echo $categories['categories_id']; ?>" hidden>
                                            <button type="submit" onClick="deleteCategory(<?php echo $categories['categories_id'] ?>)" class="close">удалить</button>
                                        </td>
                                    </tr>
                                <?php }
                            ?>
                                </table>
                            </div>
                            <div class="addblock">
                                <form id="add-category">
                                    <input type="text" name="addCategory" placeholder="Новая категория">
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
    addCategory();
</script>