var tabla;

function init() {

    listar();

    $("#txtDepartamento").select2({
        dropdownParent: $("#modalEntidad")
    });
    $("#txtProvincia").select2({
        dropdownParent: $("#modalEntidad")
    });
    $("#txtDistrito").select2({
        dropdownParent: $("#modalEntidad")
    });


    validarEntradaTexto("#txtNomRespon", 150);
    validarEntradaTexto("#txtApeRespon", 150);
    validarEntradaTexto("#txtApeRespUnidad", 150);
    validarEntradaTexto("#txtNomRespUnidad", 150);
    validarEntradaTextoNumeros("#txtEntidad", 150);
    validarEntradaTextoNumeros("#txtDireccion", 150);
    validarEntradaTextoNumeros("#txtUnidad", 150);
    validarEntradaTextoNumeros("#txtDireccionUnidad", 150);
    validarEntradaTextoNumeros("#txtDirecInstitucion", 150);
    validarEntradaTextoNumeros("#txtInstitucion", 150);
    validarEntradaEmail("#txtCorreo", 50);
    validarEntradaEmail("#txtCorreoInstitucion", 50);
    validarEntradaEmail("#txtCorreoUnidad", 50);
    validarNumeros("#txtRuc", 11);
    validarNumeros("#txtTelefono", 9);
    validarNumeros("#txtAnexo", 6);
    validarNumeros("#txtAnexoUnidad", 6);
    validarNumeros("#txtAnexInstitucion", 6);
    validarNumeros("#txtCelular", 9);
    validarNumeros("#txtRucUnidad", 11);
    validarNumeros("#txtRucInstitucion", 11);
    validarNumeros("#txtTelefonoUnidad", 9);
    validarNumeros("#txtCelularUnidad", 9);
    validarNumeros("#txtTelInstitucion", 9);
    validarNumeros("#txtCelInstitucion", 9);

    selectDepartamento("#txtDepartamento");

    $("#txtDepartamento").change(function (e) {
        selectProvincias("#txtProvincia", $(this).val());
    });

    $("#txtProvincia").change(function (e) {
        selectDistrito("#txtDistrito", $(this).val());
    });

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


function selectDepartamento(campo) {
    $.post(
        "controllers/entidad.controller.php?op=selectDepartamento",
        function (data) {
            $(campo).html(data);
        }
    );
}

function selectProvincias(campo, valor) {
    $.post(
        "controllers/entidad.controller.php?op=selectProvincia",
        {txtDepartamento: valor},
        function (data) {
            $(campo).html(data);
        }
    );
}

function selectDistrito(campo, valor) {
    $.post(
        "controllers/entidad.controller.php?op=selectDistrito",
        {txtProvincia: valor},
        function (data) {
            $(campo).html(data);
        }
    );
}

//Función Listar
function listar() {
    tabla = $("#tbllistado")
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
                //{ orderable: false, targets: [0, 2] },
                //{ searchable: false, targets: [0, 2] },
                //{ width: "30%", targets: [0] }
            ],
            responsive: true,
            ajax: {
                url: "controllers/entidad.controller.php?op=listar",
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

function mostrar(identidad) {
    $("#tituloModal").text("Editar Establecimiento");
    $.post(
        "controllers/entidad.controller.php?op=mostrar",
        { txtIdEntidad: identidad},
        function (data) {
            data = JSON.parse(data);

            $("#modalEntidad").modal("show");

            $("#txtIdEntidad").val(data[0]["identidad"]);
            $("#txtEntidad").val(data[0]["entidad"]);
            $("#txtRuc").val(data[0]["ruc"]);
            $("#txtDireccion").val(data[0]["direccion"]);
            $("#txtTelefono").val(data[0]["telefono"]);
            $("#txtAnexo").val(data[0]["anexo"]);
            $("#txtCelular").val(data[0]["celular"]);
            $("#txtCorreo").val(data[0]["correo"]);
            $("#txtNomRespon").val(data[0]["nombre_responsable"]);
            $("#txtApeRespon").val(data[0]["apellidos_responsable"]);
            $("#txtUnidad").val(data[0]["unidad"]);
            $("#txtRucUnidad").val(data[0]["ruc_unidad"]);
            $("#txtDireccionUnidad").val(data[0]["direccion_unidad"]);
            $("#txtTelefonoUnidad").val(data[0]["telefono_unidad"]);
            $("#txtAnexoUnidad").val(data[0]["anexo_unidad"]);
            $("#txtCelularUnidad").val(data[0]["celular_unidad"]);
            $("#txtCorreoUnidad").val(data[0]["correo_unidad"]);
            $("#txtApeRespUnidad").val(data[0]["apellido_resp_unidad"]);
            $("#txtNomRespUnidad").val(data[0]["nombres_resp_unidad"]);
            $("#txtInstitucion").val(data[0]["institucion"]);
            $("#txtRucInstitucion").val(data[0]["ruc_institucion"]);
            $("#txtDirecInstitucion").val(data[0]["direccion_institucion"]);
            $("#txtTelInstitucion").val(data[0]["telefono_institucion"]);
            $("#txtAnexInstitucion").val(data[0]["anexo_institucion"]);
            $("#txtCelInstitucion").val(data[0]["celular_institucion"]);
            $("#txtCorreoInstitucion").val(data[0]["correo_institucion"]);
            $("#ubigeo").hide();

        }
    );
}

function limpiar() {
    $("#txtIdEntidad").val("");
    $("#txtEntidad").val("");
    $("#txtRuc").val("");
    $("#txtDireccion").val("");
    $("#txtTelefono").val("");
    $("#txtAnexo").val("");
    $("#txtCelular").val("");
    $("#txtCorreo").val("");
    $("#txtNomRespon").val("");
    $("#txtApeRespon").val("");
    $("#txtUnidad").val("");
    $("#txtRucUnidad").val("");
    $("#txtDireccionUnidad").val("");
    $("#txtTelefonoUnidad").val("");
    $("#txtAnexoUnidad").val("");
    $("#txtCelularUnidad").val("");
    $("#txtCorreoUnidad").val("");
    $("#txtApeRespUnidad").val("");
    $("#txtNomRespUnidad").val("");
    $("#txtInstitucion").val("");
    $("#txtRucInstitucion").val("");
    $("#txtDirecInstitucion").val("");
    $("#txtTelInstitucion").val("");
    $("#txtAnexInstitucion").val("");
    $("#txtCelInstitucion").val("");
    $("#txtCorreoInstitucion").val("");
    selectDepartamento("#txtDepartamento");
    selectProvincias("#txtProvincia", "");
    selectDistrito("#txtDistrito", "");
    $("#ubigeo").show();
}

function guardaryeditar(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "controllers/entidad.controller.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            $("#modalEntidad").modal("hide");
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
