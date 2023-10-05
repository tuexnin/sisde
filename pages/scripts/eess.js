var tabla;

function init() {

    listar();
    $("#redL").hide();
    $("#microredLabel").hide();
    $("#nunsico").hide();
    $("#sicomost").hide();
    $("#nunsicomost").hide();


    $("#txtRed").select2({
        dropdownParent: $("#modalEstablecimiento")
    });
    $("#txtMicroRed").select2({
        dropdownParent: $("#modalEstablecimiento")
    });
    $("#txtEstablecimiento").select2({
        dropdownParent: $("#modalEstablecimiento")
    });

    $("#txtSico").change(function (e) {
        if($(this).val() == 1){
            $("#nunsico").show();
        }else{
            $("#nunsico").hide();
        }
        $(window).trigger('resize');
    });

    selectRed("#txtRed");

    $("#txtRed").change(function (e) {
        selectMicroRed("#txtMicroRed", $(this).val());
    });

    $("#txtMicroRed").change(function (e) {
        selectEstablecimiento("#txtEstablecimiento", $(this).val());
    });

    $("#txtEstablecimiento").change(function (e) {
        $.post(
            "controllers/eess.controller.php?op=getEstablecimientoMaestro",
            { txtEstablecimiento: $(this).val() },
            function (data) {
                data = JSON.parse(data);
                $("#txtEstablecimientoL").val(data[0]["Nombre_Establecimiento"]);
                $("#txtCodigoUnico").val(data[0]["Codigo_Unico"]);
            }
        );
        $.post(
            "controllers/microred.controller.php?op=getId",
            { txtIdMicroRed: $("#txtMicroRed").val() },
            function (data) {
                data = JSON.parse(data);
                $("#txtIdMicrored").val(data[0]["idmicrored"]);
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
        "controllers/red.controller.php?op=selectRed",
        function (data) {
            $(campo).html(data);
        }
    );
}

function selectMicroRed(campo, valor) {
    $.post(
        "controllers/microred.controller.php?op=selectMicroRedCod",
        {txtIdRed: valor},
        function (data) {
            $(campo).html(data);
        }
    );
}

function selectEstablecimiento(campo, valor) {
    $.post(
        "controllers/eess.controller.php?op=selectEstableMaestro",
        {txtMicroRed: valor},
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
                url: "controllers/eess.controller.php?op=listar",
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

function ver(ideess) {
    $("#tituloModal").text("Informacion del Establecimiento");
    $("#red").hide();
    $("#microred").hide();
    $("#establecimiento").hide();
    $("#redL").show();
    $("#microredLabel").show();
    $("#btnGuardar").hide();
    $("#nunsicomost").show();
    $("#sicomost").show();
    $("#nunsico").hide();
    $("#tenesicoSelect").hide();
    $.post(
        "controllers/eess.controller.php?op=mostrar",
        { txtIdEstablecimiento: ideess },
        function (data) {
            data = JSON.parse(data);

            $("#modalEstablecimiento").modal("show");

            $("#txtRedL").val(data[0]["red"]);
            $("#txtMicroRedL").val(data[0]["microred"]);
            $("#txtEstablecimientoL").val(data[0]["establecimiento"]);
            $("#txtCodigoUnico").val(data[0]["codigo_unico"]);
            $("#txtSicoMost").val(data[0]["sico"] == 1 ? "SI" : "NO");
            $("#txtNunSicoMost").val(data[0]["num"]);
            
        }
    );
}

function limpiar() {
    $("#txtRedL").val("");
    $("#txtIdEstablecimiento").val("");
    $("#txtIdMicrored").val("");
    $("#txtMicroRedL").val("");
    $("#txtEstablecimientoL").val("");
    $("#txtCodigoUnico").val("");
    selectRed("#txtRed");
    selectMicroRed("#txtMicroRed", "");
    selectEstablecimiento("#txtEstablecimiento", "");
    $("#red").show();
    $("#microred").show();
    $("#establecimiento").show();
    $("#btnGuardar").show();
    $("#redL").hide();
    $("#microredLabel").hide();
    $("#nunsico").hide();
    $("#nunsico").val("");
    $("#txtSico").val("0");
    $("#tenesicoSelect").show();
    $("#nunsicomost").hide();
    $("#sicomost").hide();
}

function guardaryeditar(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "controllers/eess.controller.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            $("#modalEstablecimiento").modal("hide");
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
