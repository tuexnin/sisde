var tabla;

function init() {

    listar();

    $("#contentEsta").hide();
    $("#contentRed").hide();
    $("#contentUbigeo").hide();
    $("#contentEntidad").hide();

    $("#txtDepartamento").select2({
        dropdownParent: $("#modalUsuario")
    });
    $("#txtProvincia").select2({
        dropdownParent: $("#modalUsuario")
    });
    $("#txtDistrito").select2({
        dropdownParent: $("#modalUsuario")
    });
    $("#txtidentidad").select2({
        dropdownParent: $("#modalUsuario")
    });
    $("#txtidred1").select2();
    $("#txtidred").select2();
    $("#txtidmicrored").select2();
    $("#txtideess").select2();

    validarNumeros("#txtDni", 8);
    validarNumeros("#txtCelular", 9);
    validarEntradaTexto("#txtNombres", 55);
    validarEntradaTexto("#txtApellidos", 55);
    validarEntradaTexto("#txtProfesion", 55);
    validarEntradaTexto("#txtCargo", 55);
    validarEntradaEmail("#txtCorreo", 55);

    selectRol();
    selectTipo();

    $("#txtTipo").change(function (e) {
        if ($(this).val() == 1) {
            $("#contentRed").show();
            $("#contentEsta").hide();
            $("#contentUbigeo").hide();
            $("#contentEntidad").hide();
            selectRed("#txtidred1");
        } else if ($(this).val() == 2) {
            $("#contentEsta").show();
            $("#contentRed").hide();
            $("#contentUbigeo").hide();
            $("#contentEntidad").hide();
            selectRed("#txtidred");

        } else if ($(this).val() == 3) {
            $("#contentUbigeo").show();
            $("#contentEntidad").show();
            $("#contentEsta").hide();
            $("#contentRed").hide();
            selectDepartamento();
        } else {
            $("#contentEsta").hide();
            $("#contentRed").hide();
            $("#contentUbigeo").hide();
            $("#contentEntidad").hide();
        }

    });

    $("#txtidred").change(function (e) {
        selectMicrored("#txtidmicrored", $(this).val());
    });
    $("#txtidmicrored").change(function (e) {
        selectEess("#txtideess", $(this).val());
    });
    
    $("#txtDepartamento").change(function (e) {
        selectProvincias($(this).val());
    });
    $("#txtProvincia").change(function (e) {
        selectDistrito($(this).val());
    });
    $("#txtDistrito").change(function (e) {
        selectEntidad($(this).val());
    });

    $("#imagenmuestra").hide();

    $("#btnCancelar").click(function () {
        limpiar();
    });

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });
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

function validarEntradaTexto(campo, cant) {
    $(campo).on("input", function () {
        var valor = $(this).val().toUpperCase();
        $(this).val(valor);
    }).on("keydown keyup", function (e) {
        var valor = $(this).val().toUpperCase();
        $(this).val(valor);
        if (e.type === "keydown") {
            if (e.key.match(/^[a-z]$/i) && $(this).val().length >= cant && e.keyCode !== 8 && e.keyCode !== 32 && e.keyCode !== 9) {
                e.preventDefault();
            } else if (!e.key.match(/^[a-z]$/i) && e.keyCode !== 8 && e.keyCode !== 32 && e.keyCode !== 9) {
                e.preventDefault();
            }
        } else if (e.type === "keyup") {
            if (!$(this).val().match(/^[A-Z ]{0,cant}$/)) {
                var valorActual = $(this).val().toUpperCase();
                var valorNuevo = valorActual.replace(/[^A-Z ]/g, '').substring(0, cant);
                $(this).val(valorNuevo);
            }
        }
    });
}

function validarEntradaEmail(campo, cant) {
    $(campo).on("input", function () {
        var valor = $(this).val().toUpperCase();
        $(this).val(valor);
    }).on("keydown keyup", function (e) {
        var valor = $(this).val().toUpperCase();
        $(this).val(valor);
        if (e.type === "keydown") {
            if (e.key.match(/^[a-zA-Z0-9@.]$/) && $(this).val().length >= cant && e.keyCode !== 8 && e.keyCode !== 32 && e.keyCode !== 9) {
                e.preventDefault();
            } else if (!e.key.match(/^[a-zA-Z0-9@.]$/) && e.keyCode !== 8 && e.keyCode !== 32 && e.keyCode !== 9) {
                e.preventDefault();
            }
        } else if (e.type === "keyup") {
            if (!$(this).val().match(/^[A-Z0-9@. ]{0,cant}$/)) {
                var valorActual = $(this).val().toUpperCase();
                var valorNuevo = valorActual.replace(/[^A-Z0-9@. ]/g, '').substring(0, cant);
                $(this).val(valorNuevo);
            }
        }
    });
}

function validarEntradaTextoNumeros(campo, cant) {
    $(campo).on("input", function () {
        var valor = $(this).val().toUpperCase();
        $(this).val(valor);
    }).on("keydown keyup", function (e) {
        if (e.type === "keydown") {
            if (e.key.match(/^[a-zA-Z0-9 ]$/) && $(this).val().length >= cant && e.keyCode !== 8 && e.keyCode !== 32 && e.keyCode !== 9) {
                e.preventDefault();
            } else if (!e.key.match(/^[a-zA-Z0-9 ]$/) && e.keyCode !== 8 && e.keyCode !== 32 && e.keyCode !== 9) {
                e.preventDefault();
            }
        } else if (e.type === "keyup") {
            if (!$(this).val().match(/^[A-Z0-9 ]{0,cant}$/)) {
                var valorActual = $(this).val().toUpperCase();
                var valorNuevo = valorActual.replace(/[^A-Z0-9 ]/g, '').substring(0, cant);
                $(this).val(valorNuevo);
            }
        }
    });
}

function selectRol() {
    $.post(
        "controllers/usuarios.controller.php?op=selectRol",
        function (data) {
            $("#txtRol").html(data);
        }
    );
}

function selectTipo() {
    $.post(
        "controllers/usuarios.controller.php?op=selectTipo",
        function (data) {
            $("#txtTipo").html(data);
        }
    );
}

function selectDepartamento() {
    $.post(
        "controllers/usuarios.controller.php?op=selectDepartamento",
        function (data) {
            $("#txtDepartamento").html(data);
        }
    );
}

function selectProvincias(dato) {
    $.post(
        "controllers/usuarios.controller.php?op=selectProvincia",
        { iddepartamento: dato },
        function (data) {
            $("#txtProvincia").html(data);
        }
    );
}

function selectDistrito(dato) {
    $.post(
        "controllers/usuarios.controller.php?op=selectDistrito",
        { idprovincia: dato },
        function (data) {
            $("#txtDistrito").html(data);
        }
    );
}

function selectEntidad(dato) {
    $.post(
        "controllers/entidad.controller.php?op=selectEntidad",
        { txtDistrito: dato },
        function (data) {
            $("#txtidentidad").html(data);
        }
    );
}

function selectRed(campo) {
    $.post(
        "controllers/red.controller.php?op=selectRed",
        function (data) {
            $(campo).html(data);
        }
    );
}

function selectMicrored(campo, valor) {
    $.post(
        "controllers/microred.controller.php?op=selectMicroRed",
        {txtIdRed: valor},
        function (data) {
            $(campo).html(data);
        }
    );
}

function selectEess(campo, valor) {
    $.post(
        "controllers/eess.controller.php?op=selectEess",
        {txtIdMicrored: valor},
        function (data) {
            $(campo).html(data);
        }
    );
}

//Función Listar
function listar() {
    tabla = $("#tbllistadoUsuarios")
        .dataTable({
            aProcessing: true, //Activamos el procesamiento del datatables
            aServerSide: true, //Paginación y filtrado realizados por el servidor
            language: {
                lengthMenu: "Mostrar _MENU_ Registros",
                zeroRecords: "Ningún registro encontrado",
                info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
                infoEmpty: "Ningún registro encontrado",
                infoFiltered: "(filtrados desde _MAX_ registros totales)",
                search: "Buscar:",
                loadingRecords: "Cargando...",
                paginate: {
                    first: "Primero",
                    last: "Último",
                    next: "Siguiente",
                    previous: "Anterior",
                },
            },
            columnDefs: [
                { className: "centered", targets: [0] },
                //{ orderable: false, targets: [0, 3] },
                //{ searchable: false, targets: [0, 3] },
                //{ width: "30%", targets: [0] }
            ],
            responsive: true,
            ajax: {
                url: "controllers/usuarios.controller.php?op=listar",
                type: "get",
                dataType: "json",
                error: function (e) {
                    console.log(e.responseText);
                },
            },
            bDestroy: true,
            iDisplayLength: 5, //Paginación
            order: [[0, "desc"]], //Ordenar (columna,orden)
        })
        .DataTable();
}

function mostrar(idusuario) {
    $("#tituloModal").text("Editar Usuario");
    $.post(
        "controllers/usuarios.controller.php?op=mostrar",
        { txtIdusuario: idusuario },
        function (data) {
            data = JSON.parse(data);

            $("#modalUsuario").modal("show");
            $("#tipouser").hide();

            $("#txtIdusuario").val(data[0]["idusuario"]);
            $("#txtContraseña").val(data[0]["password"]);
            $("#txtDni").val(data[0]["dni"]);
            $("#txtNombres").val(data[0]["nombres"]);
            $("#txtApellidos").val(data[0]["apellidos"]);
            $("#txtCelular").val(data[0]["celular"]);
            $("#txtCorreo").val(data[0]["correo"]);
            $("#txtProfesion").val(data[0]["profesion"]);
            $("#txtCargo").val(data[0]["cargo"]);
            $("#txtPassword").val(data[0][""]);
            $("#txtTipo").val(data[0]["tipo"])
            $("#imagenmuestra").attr("src", data[0]["foto"] == null || data[0]["foto"] == "" ? "" : "files/fotos/" + data[0]["foto"]);
            $("#imagenactual").val(data[0]["foto"]);
            data[0]["foto"] == null || data[0]["foto"] == "" ? $("#imagenmuestra").hide() : $("#imagenmuestra").show();
            $("#txtRol").val(data[0]["rol"]);
        }
    );
}

function limpiar() {
    $("#txtIdusuario").val("");
    $("#txtContraseña").val("");
    $("#txtDni").val("");
    $("#txtNombres").val("");
    $("#txtApellidos").val("");
    $("#txtCelular").val("");
    $("#txtCorreo").val("");
    $("#txtProfesion").val("");
    $("#txtCargo").val("");
    $("#txtPassword").val("");
    $("#tituloModal").text("Agregar Usuario");
    $("#imagenmuestra").attr("src", "");
    $("#imagenactual").val("");
    $("#txtRol").val("");
    $("#txtImagen").val("");
    $("#imagenmuestra").hide();
    selectDepartamento();
    selectProvincias("");
    selectDistrito("");
    $("#tipouser").show();
}

function guardaryeditar(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    $("#btnGuardar").prop("disabled", true);
    $.ajax({
        url: "controllers/usuarios.controller.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            $("#modalUsuario").modal("hide");
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: datos,
                showConfirmButton: false,
                timer: 4500,
            });
            tabla.ajax.reload();
        },
    });
    limpiar();
}

init();
