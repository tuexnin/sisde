var tabla;

function init() {

    listar();


    $("#txtRedC").select2();

    selectRedMaestro("#txtRedC");

    $("#txtRedC").change(function (e) {
        $.post(
            "controllers/red.controller.php?op=getRedMaestro",
            { txtIdRed: $(this).val() },
            function (data) {
                data = JSON.parse(data);
                $("#txtRed").val(data[0]["Red"]);
                $("#txtCodigored").val(data[0]["Codigo_Red"]);
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

function selectRedMaestro(campo) {
    $.post(
        "controllers/red.controller.php?op=selectRedMaestro",
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
                url: "controllers/red.controller.php?op=listar",
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

function ver(idred) {
    $("#tituloModal").text("Informacion de la Red");
    $("#redMaestro").hide();
    $("#btnGuardar").hide();
    $.post(
        "controllers/red.controller.php?op=mostrar",
        { txtIdRed: idred },
        function (data) {
            data = JSON.parse(data);

            $("#modalRed").modal("show");

            $("#txtIdRed").val(data[0]["idred"]);
            $("#txtRed").val(data[0]["red"]);
            $("#txtCodigored").val(data[0]["codigo_red"]);

        }
    );
}

function limpiar() {
    $("#txtIdRed").val("");
    $("#txtRed").val("");
    $("#txtCodigored").val("");
    selectRedMaestro();
    $("#redMaestro").show();
    $("#btnGuardar").show();
}

function guardaryeditar(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    $("#btnGuardar").prop("disabled", true);
    $.ajax({
        url: "controllers/red.controller.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            $("#modalRed").modal("hide");
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
