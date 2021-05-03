function agregarCategoria() {
    let categoria = $('#nombreCategoria').val();
    if (categoria == "") {
        swal({
            title: "Advertencia",
            icon: "warning",
            text: "¡Debes agregar una categoria!",
            button: false,
            timer: 2000,
        });
        return false;
    } else {
        $.ajax({
            type: "POST",
            data: "categoria=" + categoria,
            url: "../procesos/categorias/agregarCategorias.php",
            success: function(respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1) {
                    $('#nombreCategoria').val("");
                    swal({
                        title: "Correcto",
                        icon: "success",
                        text: "¡Agregado con exito!",
                        button: false,
                        timer: 2000,
                    });
                } else {
                    swal({
                        title: "Error",
                        icon: "error",
                        text: "¡Fallo al agregar!",
                        button: false,
                        timer: 2000,
                    });
                }
            }
        });
    }
}