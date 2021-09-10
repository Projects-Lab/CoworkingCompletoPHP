function login() {
    $.ajax({
        type: 'POST',
        data: $('#form_login').serialize(),
        url: 'controlador/login.php?opcion=login',
        success: function (response) {
            console.log(response);
            if (response == '1') {
                location.href = "app/inicio";
            }
        }
    });

    return false;
}