<?php require_once('head.php'); ?>
<?php $url = $_SERVER["REQUEST_URI"];  ?>
<body>
    <?php
        if ($_SESSION['user_group'] != 1) {
            echo 'Нет доступа';
        } else {
            echo '<div class="admin-wrapper">';
                require_once('components/sidebar.php'); ?>
                
                <div class="content">
                    <div class="users categories">
                        <?php if ($url == '/engine/admin/users.php') { ?>
                            <div class="title">Пользователи</div>
                            <div class="usersblock">
                                <?php
                                    $users_sql = $link->prepare("SELECT * FROM `users`");
                                    $users_sql->execute();
                                    $users_row = $users_sql->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($users_row as $users) {
                                        echo '<a href="users.php?id='.$users['id'].'"><div class="user-link">'.$users['name'].'</div></a>';
                                    }
                                ?>
                            </div>
                        <?php } else if ($url == '/engine/admin/users.php?id='.$_GET['id'].'') { ?>
                        <?php
                            $user_sql = $link->prepare("SELECT * FROM `users` WHERE `id` = :id");
                            $user_sql->execute(array('id' => $_GET['id']));
                            $user_row = $user_sql->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <div class="title"><?php echo $user_row['name']; ?></div>
                        <div class="categories-container">
                            <div class="categoriesblock">
                                <table width="100%">
                                    <tr>
                                        <th></th>
                                        <th>ID</th>
                                        <th>Логин</th>
                                        <th>Эл. Почта</th>
                                        <th width="5%">Группа</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td><button onClick="editUser()">Сохранить</button></td>
                                        <td><input type="text" name="userEditId" value="<?php echo $user_row['id']; ?>" hidden><?php echo $user_row['id']; ?></td>
                                        <td><input type="text" name="userEditName" value="<?php echo $user_row['name']; ?>"></td>
                                        <td><input type="text" name="userEditEmail" value="<?php echo $user_row['email']; ?>"></td>
                                        <td><input type="number" name="userEditGroup" value="<?php echo $user_row['user_group']; ?>"></td>
                                        <td><input type="text" name="deleteUser" value="<?php echo $user_row['id']; ?>" hidden><button onClick="deleteUser()">Удалить</button></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="ordersblock">
                                <div class="title">
                                    Список заказов
                                </div>
                                <table>
                                    <tr>
                                        <th>ID заказа</th>
                                        <th>Название товара</th>
                                        <th>Категория</th>
                                        <th>Дата добавления</th>
                                        <th>Размер</th>
                                        <th>Цена</th>
                                        <th>Статус</th>
                                    </tr>
                                    <?php
                                        $cart_sql = $link->prepare("SELECT * FROM `cart` INNER JOIN `goods` ON cart.productId = goods.goods_id INNER JOIN `categories` ON categories.categories_id = goods.category WHERE `user_id` = :user_id ORDER BY cart.cart_id DESC");
                                        $cart_sql->execute(array('user_id' => $_GET['id']));
                                        $cart_row = $cart_sql->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($cart_row as $cart) { ?>
                                        
                                            <tr>
                                                <td><?php echo $cart['cart_id']; ?></td>
                                                <td><?php echo $cart['title']; ?></td>
                                                <td><?php echo $cart['pageTitle']; ?></td>
                                                <td><?php echo $cart['addDate']; ?></td>
                                                <td><?php echo $cart['productSize']; ?></td>
                                                <td><?php echo $cart['price']; ?></td>
                                                <td><?php echo $cart['productStatus']; ?></td>
                                            </tr>

                                    <?php }?>
                                </table>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

            <?php echo '</div>';
        }
    ?>
<?php require_once('footer.php'); ?>