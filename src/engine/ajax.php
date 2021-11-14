<script type="text/javascript">

    function loginAuth () {
        $(document).on("submit", "#auth", function (e) {
            e.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "engine/auth.php",
                cache: false,
                data: form_data,
                dataType: 'json',
                success: function (data) {
                    if (data.error) {
                        alert(data.error);
                    } else if (data.auth) {
                        alert(data.auth);
                        location.reload();
                    }
                },
                error: function() {
                }
            });
        }); 
    }

    function register () {
        $(document).on("submit", "#register", function (e) {
            e.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "engine/register.php",
                cache: false,
                data: form_data,
                dataType: 'json',
                success: function (data) {
                    if (data.password) {
                        alert(data.password);
                    } else if (data.format) {
                        alert(data.format);
                    } else if (data.email) {
                        alert(data.email);
                    } else if (data.name) {
                        alert(data.name);
                    } else if (data.register) {
                        alert(data.register);
                        location.reload();
                    }
                },
                error: function() {
                }
            });
        }); 
    }

    function addToCart () {
        $(document).on("click", ".addToCart", function (e) {
            e.preventDefault();
            var form_data = $('#addToCart').serialize();
            $.ajax({
                type: "POST",
                url: "engine/cart.php",
                cache: false,
                data: form_data,
                dataType: 'html',
                success: function () {
                    alert('Товар добавлен, для просмотра перейдите в корзину');
                },
                error: function(data) {
                    alert('error');
                }
            });
        })
    }

    function sendConfirmOrder () {
        $(document).on("click", ".cartblock .yes", function () {
            var checkbox = $('.confirmOrderCheckbox').map(function(i,el){
                if($(el).prop('checked')){
                    return $(el).val();
                }
            }).get();
            $.ajax(
            {
                type: "POST",
                url: "engine/cart.php",
                dataType: "json",
                data: {confirmOrder: checkbox},
                cache: false,
                success: function(data){
                    console.log(data);
                },
                error: function () {
                    location.reload();
                }
            });
            return false;
        });
    }

    function sendDeleteOrder () {
        $(document).on("click", ".deleteCart", function () {
            var checkbox = $('.deleteOrderCheckbox').map(function(i,el){
                if($(el).prop('checked')){
                    return $(el).val();
                }
            }).get();
            var accept = confirm('Подтвердить действие?');
            if (accept == true) {
                $.ajax(
                {
                    type: "POST",
                    url: "engine/cart.php",
                    dataType: "json",
                    data: {deleteOrder: checkbox},
                    cache: false,
                    success: function(data){
                        console.log(checkbox);
                    },
                    error: function () {
                        location.reload();
                    }
                });
                return false;
            } else {
                return false;
            }
        });
    }

</script>