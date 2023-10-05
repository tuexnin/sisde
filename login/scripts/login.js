var tabla;

function init (){

    validarNumeros("#login-username", 8);

    $("#formulario").on("submit", function (e)
    {
        e.preventDefault();
        if($("#login-username").val().length <= 0){
            Swal.fire({
                icon: 'error',
                title: 'Error: Tiene que ingresar un usuario'
            })
        }else if($("#login-password").val().length <= 0){
            Swal.fire({
                icon: 'error',
                title: 'Error: Tiene que ingresar una contraseña'
            })
        }else{
            ingresar(e);
        }
        
    })

}

function validarNumeros(campo, cant) {
    $(campo).on("input", function () {
        var valor = $(this).val();
        var regex = /^[0-9]{0,cant}$/;
        if (!regex.test(valor)) {
            valor = valor.replace(/[^0-9]/g, "").substring(0, cant);
            $(this).val(valor);
        }
    });
}

function limpiar(){
    $("#login-username").val("");
    $("#login-password").val("");
}

function ingresar(e)
{
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "controllers/login.controller.php?op=validar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos)
        {    
            if (datos == 0){
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error: Usuario no existe',
                    showConfirmButton: false,
                    timer: 4500
                });
                limpiar();
            }else{
                console.log(datos);
                data = JSON.parse(datos);
                if(data[0][0] == 'no password'){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: data[0][1],
                        text: 'Contraña incorrecta',
                        showConfirmButton: false,
                        timer: 4500
                    });
                }else{
                    $.ajax({
                        url: "controllers/login.controller.php?op=iniciar",
                        type: "POST",
                        data:{
                            idusuario : data[0][0],
                            nombres : data[0][1],
                            dni: data[0][2],
                            foto : data[0][3],
                            rol : data[0][4],
                            tipo : data[0][5],
                            ididenti : data[0][6]
                        }
                    }).done(function(respt){
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Bienvenid@ ' + data[0][1],
                            text: 'Datos correctos',
                            showConfirmButton: false,
                            timer: 4500
                        }).then((result) => {
                            location.reload(true);
                        });
                    });
                }
            }

        }

    });
    
}

init();