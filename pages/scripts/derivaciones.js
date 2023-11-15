var tabla;

function init() {
    listar();

    $("#txtMicroRed").change(function (e) {
        e.preventDefault();
        selectEess("#txtEess", $(this).val());
    });

    $("#btnCancelar").click(function () {
        limpiar();
    });

    $("#formulario").on("submit", function (e) {
        e.preventDefault();
        derivar();
    });

}

function selectMicroRed(campo) {
    $.post(
        "controllers/microred.controller.php?op=selectMicroRedUs",
        function (data) {
            $(campo).html(data);
        }
    );
}

function selectEess(campo, idmicrored) {
    $.post(
        "controllers/eess.controller.php?op=selectEess",
        { txtIdMicrored: idmicrored },
        function (data) {
            $(campo).html(data);
        }
    );
}


function derivar() {
    $.post(
        "controllers/movimientos.controller.php?op=derivar",
        { idmovimiento: $("#idmovimiento").val(), ideess: $("#txtEess").val() },
        function (data) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: data,
                showConfirmButton: false,
                timer: 4500,
            });
            tabla.ajax.reload();
        }
    );
    $("#modalDerivar").modal("hide");
    limpiar();   
}

//Función Listar
function listar() {
    tabla = $("#tbllistado")
        .dataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ],
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
                { orderable: false, targets: [0] },
                { searchable: false, targets: [0] },
                //{ width: "30%", targets: [0] }
            ],
            responsive: true,
            ajax: {
                url: "controllers/derivaciones.controller.php?op=listar",
                type: "get",
                dataType: "json",
                error: function (e) {
                    console.log(e.responseText);
                },
            },
            bDestroy: true,
            iDisplayLength: 5, //Paginación
            order: [[0, "asc"]], //Ordenar (columna,orden)
        })
        .DataTable();
}

function mostrar(idregistro) {
    $("#tituloModal").text("Editar Registro");
    $.post(
        "controllers/registros.controller.php?op=mostrar",
        { txtIdregistro: idregistro },
        function (data) {
            data = JSON.parse(data);

            $("#modalRegistro").modal("show");

            $("#txtIdregistro").val(data[0]["idregistro"]);

        }
    );
}

function derivarOpen(idmovimiento) {
    $("#modalDerivar").modal("show");
    $("#idmovimiento").val(idmovimiento);
    selectMicroRed("#txtMicroRed");
}

function limpiar() {
    selectMicroRed("#txtMicroRed");
    selectEess("#txtEess", null);
}

function desifraruederiv(dato){
    $.post(
        "controllers/ver.controller.php?op=uederiv",
        { ue: dato },
        function (data) {
            data = JSON.parse(data);
            $("#ueder").text(data[0]["red"]);
        }
    );
}

function ver(idmovimiento) { 
    $("#modalVer").modal("show");
    $.post(
        "controllers/ver.controller.php?op=ver",
        { idmovimiento: idmovimiento },
        function (data) {
            data = JSON.parse(data);
            $("#nombreProf").text(data[0]["nombre_prof"]);
            $("#cargoyoprof").text(data[0]["cargo_prof"]);
            $("#telprof").text(data[0]["telefono_prof"]);
            $("#corrElect").text(data[0]["correo_prof"]);
            $("#fecder").text(data[0]["fecha_derivacion"]);
            //$("#famConDer").text(data[0]["familia_con"]);
            $("#uniEjec").text(data[0]["unidad_ejecutora"]);
            $("#jefEst").text(data[0]["unidad"]);
            $("#depart").text(data[0]["departamento"]);
            $("#Provin").text(data[0]["provincia"]);
            $("#distr").text(data[0]["distrito"]);
            $("#dirEst").text(data[0]["direccion"]);
            $("#telfijinst").text(data[0]["telefono"]);
            $("#telmovest").text(data[0]["celular"]);
            $("#corrElInst").text(data[0]["correo"]);
            desifraruederiv(data[0]["ue_derivar"]);
            $("#apnomderiv").text(data[0]["ap_nom_us"]);
            $("#fecnasderiv").text(data[0]["fecha_nas_us"]);
            $("#edderiv").text(data[0]["edad_us"]);
            $("#sexderiv").text(data[0]["sexo_us"]);
            $("#nacioderiv").text(data[0]["nacionalidad_us"]);
            $("#gradInsderiv").text(data[0]["grado_instruc_us"]);
            $("#ocupderiv").text(data[0]["ocupacion_us"]);
            $("#domdnideriv").text(data[0]["domicilio_dni_us"]);
            $("#domacderiv").text(data[0]["domicilio_actual_us"]);
            $("#telderiv").text(data[0]["telefono_us"]);
            $("#dnideriv").text(data[0]["dni_us"]);
            $("#apnomtut").text(data[0]["ap_nom_tu"]);
            $("#dnitut").text(data[0]["dni_tu"]);
            $("#fecnactut").text(data[0]["fecha_nac_tu"]);
            $("#edadtut").text(data[0]["edad_tu"]);
            $("#sextut").text(data[0]["sexo_tu"]);
            $("#nactut").text(data[0]["nacionalidad_tu"]);
            $("#parentut").text(data[0]["parentezco_tu"]);
            $("#gradinstut").text(data[0]["grado_instuc_tu"]);
            $("#ocuptut").text(data[0]["ocupacion_tu"]);
            $("#domdnitut").text(data[0]["domicilio_dni_tu"]);
            $("#domactut").text(data[0]["domicilio_actual_tu"]);
            $("#telfijtut").text(data[0]["telefono_tu"]);
            $("#celtut").text(data[0]["celular_tu"]);
            $("#vicagre").text(data[0]["vic_agre"]);
            $("#tipvulder").text(data[0]["tipo_vul_der"]);
            $("#violenciado").text(data[0]["violencia_sexual"]);
            $("#abandordesamp").text(data[0]["abandono_desamparo"]);
            $("#alcoholordrogas").text(data[0]["consumo"]);
            $("#otrodesc").text(data[0]["otro_desc"]);
            $("#motder").text(data[0]["motivo_der"]);
            $("#datrelecon").text(data[0]["datos_relevantes"]);

            if (data[0]["edad_us"] > 18){
                $("#tituloidentuto").hide();
                $("#contetuto1").hide();
                $("#contetuto2").hide();
                $("#contetuto3").hide();
                $("#contetuto4").hide();
                $("#contetuto5").hide();
                $("#contetuto6").hide();
                $("#contetuto7").hide();
                $("#contentinfi").hide();
                $("#contentdeseres").hide();
            }else{
                $("#tituloidentuto").show();
                $("#contetuto1").show();
                $("#contetuto2").show();
                $("#contetuto3").show();
                $("#contetuto4").show();
                $("#contetuto5").show();
                $("#contetuto6").show();
                $("#contetuto7").show();
                $("#contentinfi").show();
                $("#contentdeseres").show();
            }

            if(data[0]["otro_desc"].length > 1) {
                $("#otrotipvl").show();
            }else{
                $("#otrotipvl").hide();
            }
        }
    );

    $("#docsadjunt").empty();
    $("#listademov").empty();

    $.post(
        "controllers/ver.controller.php?op=verDoc",
        { idmovimiento: idmovimiento },
        function (data) {
            data = JSON.parse(data);
            for (x of data) {
                let docdoc = x.nombre.trim() != '' ? x.nombre : x.tipo;
                $("#docsadjunt").append(
                    "<div class='col-md-4'><a href='upload/"+x.doc+"' target='_blank'><i class='fa fa-file-text-o'></i> "+docdoc+"</a></div>"
                );
            }
        }
    );

    $.post(
        "controllers/ver.controller.php?op=verMovimientos",
        { idmovimiento: idmovimiento },
        function (data) {
            data = JSON.parse(data);
            for (x of data) {
                let registra = "";
                let destino  = "";
                if(x.tipo_movimiento == 1 || x.tipo_movimiento == 2 || (x.tipo_movimiento == 3 && x.idderiva == null)){
                    registra = x.entidad;
                    if(x.tipo_movimiento == 2){
                        destino = x.redDes;
                    }else if(x.tipo_movimiento == 3 && x.idderiva == null){
                        destino = x.establecimiento;
                    }
                }else if(x.tipo_movimiento == 3){
                    registra = x.redDer;
                    destino = x.establecimiento;
                }else if(x.tipo_movimiento == 4){
                    registra = x.establecimiento;
                }
                $("#listademov").append(
                    "<li><i class='si si-wallet text-success'></i><div class='font-w600'>"+registra+"</div><div><a href='javascript:void(0)'>"+destino+"</a></div><div class='font-size-xs text-muted'>"+ tipMov(x.tipo_movimiento - 1) +"</div></li>"
                );
            }
        }
    );


}

function tipMov (dato){
    let tipo = ["Registrado", "Listo", "Derivado", "Atendido"];
    return tipo[dato];
}


init();