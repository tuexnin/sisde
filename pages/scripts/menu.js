$(function(){
    
    $('#contenido').load('pages/dashboard.php');

    $('#btnDashboard').on("click", function (){
        $('#contenido').load('pages/dashboard.php');
    });

    $('#btnUsuarios').on("click", function (){
        $('#contenido').load('pages/usuarios.php');
    });

    $('#btnRegistros').on("click", function (){
        $('#contenido').load('pages/registros.php');
    });

    $('#btnRed').on("click", function (){
        $('#contenido').load('pages/red.php');
    });

    $('#btnMicroRed').on("click", function (){
        $('#contenido').load('pages/microred.php');
    });

    $('#btnEess').on("click", function (){
        $('#contenido').load('pages/eess.php');
    });

    $('#btnEntidad').on("click", function (){
        $('#contenido').load('pages/entidad.php');
    });

    $('#btnDerivaciones').on("click", function (){
        $('#contenido').load('pages/derivaciones.php');
    });

    $('#btnAtenciones').on("click", function (){
        $('#contenido').load('pages/atenciones.php');
    });

    $('#btnCerrarSesion1').on("click", function (){
        cerrar();
    });

    $('#btnCerrarSesion2').on("click", function (){
        cerrar();
    });

})

function cerrar(){
    $.ajax({
        url: "controllers/login.controller.php?op=cerrar",
        type: "GET"
    }).done(function (respt) {
        Swal.fire({
            position: 'top-center',
            icon: 'info',
            title: 'Adios',
            text: 'Nos vemos..',
            showConfirmButton: false,
            timer: 4500
        }).then((result) => {
            location.reload(true);
        });
        
    });
}
