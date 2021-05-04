function agregarArchivosGestor() {
    let formData = new FormData(document.getElementById('frmArchivos'));
    $.ajax({
        url: "../procesos/gestor/guardarArhivos.php",
        type: "POST",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#frmArchivos')[0].reset();
                $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
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

function eliminarArchivo(id_archivo) {
    swal({
        title: "Alvertencia",
        text: "¿Estas seguro de eliminar esté archivo?\nUna vez eliminada, no hay vuelta atras",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                data: "id_archivo=" + id_archivo,
                url: "../procesos/gestor/eliminarArchivo.php",
                success: function(respuesta) {
                    respuesta = respuesta.trim();
                    if (respuesta == 1) {
                        $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
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

function ver(id_archivo) {
    $.ajax({
        type: "POST",
        data: "id_archivo=" + id_archivo,
        url: "../procesos/gestor/obtenerArchivo.php",
        success: function(respuesta) {
            $('#archivoObtenido').html(respuesta);
        }
    });
}