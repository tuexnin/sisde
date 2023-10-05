var tabla;

function init() {

    listar();

    $("#red").hide();
    $("#txtRed").select2({
        dropdownParent: $("#modalMicroRed")
    });
    $("#txtMicroRed").select2({
        dropdownParent: $("#modalMicroRed")
    });

    selectRed("#txtRed");

    $("#txtRed").change(function (e) {
        selectMicroRed("#txtMicroRed", $(this).val());
    });

    $("#txtMicroRed").change(function (e) {
        $.post(
            "controllers/microred.controller.php?op=getMicroRedMaestro",
            { txtMicroRed: $(this).val() },
            function (data) {
                data = JSON.parse(data);
                $("#txtMicroRedL").val(data[0]["Microred"]);
                $("#txtCodigoMicro").val(data[0]["Codigo_Microrred"]);
                $("#txtCodigo").val(data[0]["Codigo_Cocadenado"]);
            }
        );
        $.post(
            "controllers/red.controller.php?op=getId",
            { txtIdRed: $("#txtRed").val() },
            function (data) {
                data = JSON.parse(data);
                $("#txtIdRed").val(data[0]["idred"]);
            }
        );
    });

    $("#btnCancelar").click(function () {
        limpiar();
    });

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });
}

function selectRed(campo) {
    $.post(
        "controllers/red.controller.php?op=selectRedCod",
        function (data) {
            $(campo).html(data);
        }
    );
}

function selectMicroRed(campo, valor) {
    $.post(
        "controllers/microred.controller.php?op=selectMicroRedMaestro",
        {txtcodred: valor},
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
                url: "controllers/microred.controller.php?op=listar",
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

function ver(idmicrored) {
    $("#tituloModal").text("Informacion de la MicroRed");
    $("#redMaestro").hide();
    $("#red").show();
    $("#microredMaestro").hide();
    $("#btnGuardar").hide();
    $.post(
        "controllers/microred.controller.php?op=mostrar",
        { txtIdRed: idmicrored },
        function (data) {
            data = JSON.parse(data);

            $("#modalMicroRed").modal("show");

            $("#txtRedL").val(data[0]["red"]);
            $("#txtMicroRedL").val(data[0]["microred"]);
            $("#txtCodigoMicro").val(data[0]["codigo_microred"]);
            $("#txtCodigo").val(data[0]["codigo_cocatenado"]);

        }
    );
}

function limpiar() {
    $("#txtIdMicroRed").val("");
    $("#txtIdRed").val("");
    $("#txtMicroRedL").val("");
    $("#txtCodigoMicro").val("");
    $("#txtCodigo").val("");
    selectRed("#txtRed");
    selectMicroRed("#txtMicroRed", "");
    $("#redMaestro").show();
    $("#btnGuardar").show();
    $("#red").hide();
    $("#microredMaestro").show();
}

function guardaryeditar(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "controllers/microred.controller.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            $("#modalMicroRed").modal("hide");
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
