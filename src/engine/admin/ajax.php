<script type="text/javascript">
    function deleteCategory(index) {
        var accept = confirm('Подтвердить действие?');
        var inputId = $('input[name="deleteCategory'+index+'"]').val();
        if (accept == true) {
            $.ajax({
                type: "POST",
                url: "update.php",
                cache: false,
                data: {deleteCategory: inputId},
                dataType: 'html',
                success: function () {
                    window.location.reload();
                },
                error: function () {
                }
            });  
        } else {
            return false;
        }
    }

    function addCategory() {
        $(document).on("submit", "#add-category", function (e) {
            e.preventDefault();
            var accept = confirm('Подтвердить действие?');
            if (accept == true) {
              var form_data = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "update.php",
                    cache: false,
                    data: form_data,
                    dataType: 'html',
                    success: function () {
                        window.location.reload();
                    },
                    error: function () {
                    }
                });  
            } else {
                return false;
            }
        });
    }

    function editCategory(index) {
        var accept = confirm('Подтвердить действие?');
        var inputId = $('input[name="categoryId'+index+'"]').val();
        var inputTitle = $('input[name="categoryTitle'+index+'"]').val();
        if (accept == true) {
            $.ajax({
                type: "POST",
                url: "update.php",
                cache: false,
                data: {categoryId: inputId, categoryTitle: inputTitle},
                dataType: 'html',
                success: function (data) {
                    window.location.reload();
                },
                error: function (data) {
                    console.log(data);
                }
            });  
        } else {
            return false;
        }
    }

    function addGoods() {
        $('#add-goods').on('submit', function(){
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "update.php",
                data:  formData,
                processData: false,
                contentType: false,
                success: function(data){
                    window.location.reload();
                }
            });
            return false;
        });
    }

    function editGoods(index) {
        var accept = confirm('Подтвердить действие?');
        var inputId = $('input[name="goodsEditId'+index+'"]').val();
        var inputSelect = $('select[name="goodsEditCategory'+index+'"]').val();
        var inputTitle = $('input[name="goodsEditTitle'+index+'"]').val();
        var inputText = $('input[name="goodsEditText'+index+'"]').val();
        var inputPrice = $('input[name="goodsEditPrice'+index+'"]').val();
        if (accept == true) {
            $.ajax({
                type: "POST",
                url: "update.php",
                cache: false,
                data: {goodsEditId: inputId, goodsEditSelect: inputSelect, goodsEditTitle: inputTitle, goodsEditText: inputText, goodsEditPrice: inputPrice},
                dataType: 'html',
                success: function () {
                    window.location.reload();
                },
                error: function (data) {
                    console.log(data);
                }
            });  
        } else {
            return false;
        }
    }

    function deleteGoods(index) {
        var accept = confirm('Подтвердить действие?');
        var inputId = $('input[name="deleteGoods'+index+'"]').val();
        if (accept == true) {
            $.ajax({
                type: "POST",
                url: "update.php",
                cache: false,
                data: {deleteGoods: inputId},
                dataType: 'html',
                success: function (data) {
                    window.location.reload();
                },
                error: function (data) {
                    console.log(data);
                }
            });  
        } else {
            return false;
        }
    }

    function editUser() {
        var accept = confirm('Подтвердить действие?');
        var inputId = $('input[name="userEditId"]').val();
        var inputName = $('input[name="userEditName"]').val();
        var inputEmail = $('input[name="userEditEmail"]').val();
        var inputGroup = $('input[name="userEditGroup"]').val();
        if (accept == true) {
            $.ajax({
                type: "POST",
                url: "update.php",
                cache: false,
                data: {userEditId: inputId, userEditName: inputName, userEditEmail: inputEmail, userEditGroup: inputGroup},
                dataType: 'html',
                success: function (data) {
                    window.location.reload();
                },
                error: function (data) {
                    console.log(data);
                }
            });  
        } else {
            return false;
        }
    }

    function deleteUser() {
        var accept = confirm('Подтвердить действие?');
        var inputId = $('input[name="deleteUser"]').val();
        if (accept == true) {
            $.ajax({
                type: "POST",
                url: "update.php",
                cache: false,
                data: {deleteUser: inputId},
                dataType: 'html',
                success: function (data) {
                    window.location.replace('users.php');
                },
                error: function (data) {
                    console.log(data);
                }
            });  
        } else {
            return false;
        }
    }
</script>