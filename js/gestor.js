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
            console.log(respuesta);
            respuesta = respuesta.trim();
            if (respuesta == 1) {
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