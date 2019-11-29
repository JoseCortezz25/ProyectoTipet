$(document).ready(function() {

    $("#loginForm").bind("submit", function() {

        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            beforeSend: function() {
                $("#loginForm button[type=submit]").html("Enviando...");
                $("#loginForm button[type=submit]").attr("disabled", "disabled");
            },
            success: function(response) {
                if (response.estado == "true") {
                    $("span").overhang({
                        type: "success",
                        message: "Usuario encontrado, te estamos redirigiendo... 😀",
                        callback: function() {
                            window.location.href = "admin.php";
                        }
                    });
                } else {
                    $("span").overhang({
                        type: "error",
                        message: "Usuario o contraseña incorrecto. 🙁"
                    });
                }

                $("#loginForm button[type=submit]").html("Ingresar");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            },
            error: function() {
                $("body").overhang({
                    type: "error",
                    message: "Usuario o password incorrecto!"
                });

                $("#loginForm button[type=submit]").html("Ingresar");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            }
        });

        return false;
    });

});