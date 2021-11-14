<?php if (!$_SESSION['id']) { ?>
<div class="authblock">
    <div class="flexbox">
        <div class="close-mask"></div>
        <div class="authcontainer">
            <div class="auth switchAuth active">
                <div class="title">Авторизация</div>
                <form id="auth" autocomplete="off">
                    <div class="inputblock input">
                        <input type="text" name="name" placeholder="Логин" autocomplete="off" required>
                    </div>
                    <div class="inputblock input">
                        <input type="password" name="password" placeholder="Пароль" autocomplete="off" required>
                    </div>
                    <div class="inputblock submit">
                        <button type="submit">войти</button>
                    </div>
                    <div class="register-link link">Зарегистрироваться</div>
                </form>
            </div>
            <div class="register switchAuth">
                <div class="title">Регистрация</div>
                <form id="register">
                    <div class="inputblock input">
                        <input type="text" name="name" placeholder="Логин" required>
                    </div>
                    <div class="inputblock input">
                        <input type="text" name="email" placeholder="Эл. почта" required>
                    </div>
                    <div class="inputblock input">
                        <input type="password" name="password1" placeholder="Пароль" required>
                    </div>
                    <div class="inputblock input">
                        <input type="password" name="password2" placeholder="Подтверждение пароля" required>
                    </div>
                    <div class="inputblock submit">
                        <button type="submit">зарегистрироваться</button>
                    </div>
                    <div class="auth-link link">К авторизации</div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<script type="text/javascript">
    loginAuth();
    register();
</script>