var tabla;

function init() {
    listar();

    $("#upload_file").on("submit", uploadFile);

    $("#txtTipoDocumento").change(function (e) {
        if ($(this).val() == 6) {
            $("#nombreDocOtro").show();
        } else {
            $("#nombreDocOtro").hide();
        }
    });

}


function selectTipoDoc() {
    $.post(
        "controllers/tipoDoc.controller.php?op=selectTipoDocAt",
        function (data) {
            $("#txtTipoDocumento").html(data);
        }
    );
}

function cargarArchivos(idregistro) {
    $("#modalAgregarArchivos").modal("show");
    $("#idregistro").val(idregistro);
    selectTipoDoc();
    traerArchivos(idregistro);
}

function traerArchivos(idregistro) {
    $(".wrapper_files").empty();
    $.post(
        "controllers/upload.controller.php?op=traerArchivosAt",
        { idregistro: idregistro },
        function (data) {
            if (data != false) {
                let datos = JSON.parse(data);
                console.log(datos);
                for (x of datos) {
                    let docdoc = x.nombre.trim() != '' ? x.nombre : x.doc;
                    $(".wrapper_files").append(
                        '<a class="d-block btn btn-light btn-sm mt-2" href="" download>Descargar: ' + docdoc + '</a>'
                    );
                }
            }
        }
    );
}

function uploadFile(e) {
    e.preventDefault();

    let form = $(this),
        wrapper = $(".wrapper"),
        wrapper_f = $(".wrapper_files"),
        progress_bar = $(".progress_bar"),
        data = new FormData(form.get(0));

    //inicializamos la barra de progreso
    progress_bar.removeClass('bg-success bg-danger').addClass('bg-info');
    progress_bar.css('width', '0%');
    progress_bar.html('Preparando...');
    wrapper.fadeIn();

    $.ajax({
        xhr: function () {
            let xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener('progress', function (e) {
                if (e.lengthComputable) {
                    let percentComplete = Math.floor((e.loaded / e.total) * 100);
                    //Mostramos el progreso
                    progress_bar.css('width', percentComplete + '%');
                    progress_bar.html(percentComplete + '%');
                }
            }, false);
            return xhr;
        },
        type: 'POST',
        url: 'controllers/upload.controller.php?op=guardarArchivo',
        dataType: 'json',
        contentType: false,
        processData: false,
        cache: false,
        data: data,
        beforeSend: () => {
            $('button', form).attr('disabled', true);
        }


    }).done(res => {
        if (res.status === 200) {
            progress_bar.removeClass('bg-info').addClass('bg-success');
            progress_bar.html('¡Listo!');
            form.trigger('reset');

            traerArchivos(res.data);

            setTimeout(() => {
                wrapper.fadeIn();
                progress_bar.removeClass('bg-success bg-danger').addClass('bg-info');
                progress_bar.css('width', '0%');
            }, 1500);
            tabla.ajax.reload();
        } else {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: res.msg,
                showConfirmButton: false,
                timer: 1500
            });

            progress_bar.css('width', '100%');
            progress_bar.html(res.msg);
        }
    }).fail(err => {
        progress_bar.removeClass('bg-success bg-info').addClass('bg-danger');
        progress_bar.html('¡Hubo un error!');
    }).always(() => {
        $('button', form).attr('disabled', false);
    });
}

function atendido(idmovimiento) {
    $.post(
        "controllers/upload.controller.php?op=validarUploadAt",
        { idmovimiento: idmovimiento },
        function (data) {
            if (data == true) {
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "No adjunto ningun documento!",
                    showConfirmButton: false,
                    timer: 4500,
                });
            } else {
                $.post(
                    "controllers/movimientos.controller.php?op=atendido",
                    { idmovimiento: idmovimiento },
                    function (data) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: data,
                            showConfirmButton: false,
                            timer: 4500,
                        });
                    }
                );
            }
            tabla.ajax.reload();
        }
    );

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
                url: "controllers/atenciones.controller.php?op=listar",
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


function limpiar() {
    
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