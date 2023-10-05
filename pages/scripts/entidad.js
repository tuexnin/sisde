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
            $("#txtCelular").val(data[0]["celular"]);
            $("#txtCorreo").val(data[0]["correo"]);
            $("#distrito").hide();
            $("#provincia").hide();
            $("#departamento").hide();

        }
    );
}

function limpiar() {
    $("#txtIdEntidad").val("");
    $("#txtEntidad").val("");
    $("#txtRuc").val("");
    $("#txtDireccion").val("");
    $("#txtTelefono").val("");
    $("#txtCelular").val("");
    $("#txtCorreo").val("");
    $("#txtCorreo").val("");
    selectDepartamento("#txtDepartamento");
    selectProvincias("#txtProvincia", "");
    selectDistrito("#txtDistrito", "");
    $("#distrito").show();
    $("#provincia").show();
    $("#departamento").show();
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
