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
                    $('#tablasCategorias').load("categorias/tablaCategoria.php");
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

function eliminarCategoria(id_categoria) {
    id_categoria = parseInt(id_categoria);
    if (id_categoria < 1) {
        swal({
            title: "Error",
            icon: "error",
            text: "¡No tienes id de categorias!",
            button: false,
            timer: 2000,
        });
        return false;
    } else {
        swal({
            title: "Alvertencia",
            text: "¿Estas seguro de eliminar esta categoria?\nUna vez eliminada, no hay vuelta atras",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    data: "id_categoria=" + id_categoria,
                    url: "../procesos/categorias/eliminarCategoria.php",
                    success: function(respuesta) {
                        respuesta = respuesta.trim();
                        if (respuesta == 1) {
                            $('#tablasCategorias').load("categorias/tablaCategoria.php");
                            swal({
                                title: "Correcto",
                                icon: "success",
                                text: "¡Se elimino correctamente!",
                                button: false,
                                timer: 2000,
                            });
                        } else {
                            swal({
                                title: "Error",
                                icon: "error",
                                text: "¡Fallo al eliminar!",
                                button: false,
                                timer: 2000,
                            });
                        }
                    }
                });
            }
        });
    }
}

function obtenerDatosCategoria(id_categoria) {
    $.ajax({
        type: "POST",
        data: "id_categoria=" + id_categoria,
        url: "../procesos/categorias/obtenerDatosCategoria.php",
        success: function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#id_categoria').val(respuesta['id_categoria']);
            $('#categoriaU').val(respuesta['nombreCategoria'])
        }
    });
}

function actualizaCategoria() {
    if ($('#categoriaU').val() == "" || $('#categoriaU').val() == " ") {
        swal({
            title: "Alvertencia",
            icon: "warning",
            text: "¡No hay nada que cambiar!",
            button: false,
            timer: 2000,
        });
        return false;
    } else {
        $.ajax({
            type: "POST",
            data: $('#frmActualizaCategoria').serialize(),
            url: "../procesos/categorias/actualizaCategoria.php",
            success: function(respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1) {
                    $('#tablasCategorias').load("categorias/tablaCategoria.php");
                    swal({
                        title: "Correcto",
                        icon: "success",
                        text: "¡Se actualizo correctamente!",
                        button: false,
                        timer: 2000,
                    });
                } else {
                    swal({
                        title: "Correcto",
                        icon: "success",
                        text: "¡Fallo la actualizaión!",
                        button: false,
                        timer: 2000,
                    });
                }
            }
        });
    }
}