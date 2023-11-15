var tabla;
var idmov;

function init() {
    listar();

    $('#smartwizard').smartWizard({
        theme: 'dots',
        lang: {
            next: 'Siguiente',
            previous: 'Regresar'
        },
        toolbar: {
            showNextButton: true, // show/hide a Next button
            showPreviousButton: true, // show/hide a Previous button
            position: 'bottom', // none|top|bottom|both
            extraHtml: `<button class="btn btn-success" onclick="onFinish()">Registrar</button>
                        <button class="btn btn-secondary" id="btnCancelar" onclick="onCancel()">Cancelar</button>`
        }
    });


    $("#guardarComoPDF").click(function () {

        $.post(
            "controllers/ver.controller.php?op=ver",
            { idmovimiento: $("#txtimpresionnene").val() },
            function (data) {
                data = JSON.parse(data);

                // Función para construir el contenido HTML a partir de los datos JSON
                function buildHTMLFromJSON(data) {
                    const entry = data[0]; // Tomamos el primer elemento del array

                    return `
                    <h1>FICHA DE DERIVACION DE CASO</h1>
                    <h6>IDENTIFICACION DE LA ENTIDAD QUE DERIVA EL CASO</h6>
                    <p>Nombre del profesional: ${entry.nombre_prof}</p>
                    <p>Cargo y/o profesión: ${entry.cargo_prof}</p>
                    <p>Teléfono: ${entry.telefono_prof}</p>
                    <p>Correo electrónico: ${entry.correo_prof}</p>
                    <p>Fecha de derivación: ${entry.fecha_derivacion}</p>
                    <h6>IDENTIFICACION DE LA INSTITUCION DERIVADORA</h6>
                    <p>Unidad ejecutora: ${entry.unidad_ejecutora}</p>
                    <p>Modulo: ${entry.unidad}</p>
                    <p>UE Derivar: ${entry.ue_derivar}</p>
                    <h6>IDENTIFICACION DEL DERIVADO</h6>
                    <p>Apellidos y nombres: ${entry.ap_nom_us}</p>
                    <p>DNI: ${entry.dni_us}</p>
                    <p>Fecha de nacimiento: ${entry.fecha_nas_us}</p>
                    <p>Edad: ${entry.edad_us}</p>
                    <p>Sexo: ${entry.sexo_us}</p>
                    <p>Nacionalidad: ${entry.nacionalidad_us}</p>
                    <p>Grado de instrucción: ${entry.grado_instruc_us}</p>
                    <p>Ocupación: ${entry.ocupacion_us}</p>
                    <p>Domicilio de DNI: ${entry.domicilio_dni_us}</p>
                    <p>Domicilio actual: ${entry.domicilio_actual_us}</p>
                    <p>Teléfono: ${entry.telefono_us}</p>
                    <h6>IDENTIFICACION DEL ADULTO RESPONSABLE/TUTOR</h6>
                    <p>Apellidos y nombres: ${entry.ap_nom_tu}</p>
                    <p>DNI: ${entry.dni_tu}</p>
                    <p>Fecha de Nacimiento: ${entry.fecha_nac_tu}</p>
                    <p>Edad: ${entry.edad_tu}</p>
                    <p>Sexo: ${entry.sexo_tu}</p>
                    <p>Nacionalidad: ${entry.nacionalidad_tu}</p>
                    <p>Parentesco: ${entry.parentezco_tu}</p>
                    <p>Grado de instrucción: ${entry.grado_instuc_tu}</p>
                    <p>Ocupación: ${entry.ocupacion_tu}</p>
                    <p>Domicilio de DNI: ${entry.domicilio_dni_tu}</p>
                    <p>Domicilio actual: ${entry.domicilio_actual_tu}</p>
                    <p>Teléfono: ${entry.telefono_tu}</p>
                    <p>Celular: ${entry.celular_tu}</p>
                    <h6>DESCRIPCION DE LA VULNERACION DEL DERECHO</h6>
                    <p>Tipo: ${entry.vic_agre}</p>
                    <p>Tipo de Maltrato: ${entry.tipo_vul_der}</p>
                    <p>Tipo de Violencia: ${entry.violencia_sexual}</p>
                    <p>Abandono y/o Desamparo: ${entry.abandono_desamparo}</p>
                    <p>Consumo de alcohol y/o drogas: ${entry.consumo}</p>
                    <p>Otro: ${entry.otro_desc}</p>
                    <h6>DESCRIPCION</h6>
                    <p>MOTIVO DE DERIVACIÓN: ${entry.motivo_der}</p>
                    <p>DATOS RELEVANTES A CONSIDERAR: ${entry.datos_relevantes}</p>
                    `;
                }

                // Configuración de html2pdf
                var options = {
                    margin: 10,
                    filename: 'contenido.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                };

                var content = buildHTMLFromJSON(data);
                console.log(content);
                // Utiliza html2pdf para generar el PDF
                html2pdf().from(content).set(options).outputPdf().then(function (pdf) {
                    // Crea un objeto blob desde el PDF
                    var blob = new Blob([pdf], { type: 'application/pdf' });

                    // Crea una URL para el blob
                    var url = URL.createObjectURL(blob);

                    // Crea un enlace para descargar el PDF
                    var a = document.createElement('a');
                    a.href = url;
                    a.download = 'contenido.pdf';
                    a.style.display = 'none';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                });
            }
        );

    });

    validarEntradaTexto("#txtAp_nom_us", 55);
    validarEntradaTexto("#txtNacionalidad", 55);
    validarEntradaTexto("#txtOcupacionUs", 55);
    validarEntradaTexto("#txtAp_nom_tu", 55);
    validarEntradaTexto("#txtNacionalidadTu", 55);
    validarEntradaTexto("#txtParentestoTu", 55);
    validarEntradaTexto("#txtOcupacionTu", 55);
    validarEntradaTextoNumeros("#txtDomicilioDni", 55);
    validarEntradaTextoNumeros("#txtDomicilioAct", 55);
    validarEntradaTextoNumeros("#txtDomicilioDniTu", 55);
    validarEntradaTextoNumeros("#txtDomicilioActTu", 55);
    validarEntradaTexto("#txtOtroDesc", 400);
    validarEntradaTexto("#txtMotivoDer", 1000);
    validarEntradaTexto("#txtDatosRelevant", 1000);
    validarNumeros("#txtTelefonoProf", 9);
    validarNumeros("#txtDni_us", 8);
    validarNumeros("#txtDniTu", 8);
    validarNumeros("#txtTelefonoUs", 9);
    validarNumeros("#txtTelefonoFijoTu", 9);
    validarNumeros("#txtCelularTu", 9);


    $("#txtModulo").change(function () {
        console.log($(this).val());
        if ($(this).val() == "P") {
            $("#txtUnidadEjec").empty();
            $("#txtUnidadEjec").append('<option value="3° Juzgado de Familia Sub-Especializado en violencia">3° Juzgado de Familia Sub-Especializado en violencia</option>');
            $("#txtUnidadEjec").append('<option value="4° Juzgado de Familia Sub-Especializado en violencia">4° Juzgado de Familia Sub-Especializado en violencia</option>');
            $("#txtUnidadEjec").append('<option value="5° Juzgado de Familia Sub-Especializado en violencia">5° Juzgado de Familia Sub-Especializado en violencia</option>');
        } else if ($(this).val() == "SA") {
            $("#txtUnidadEjec").empty();
            $("#txtUnidadEjec").append('<option value="6° Juzgado de Investigacion Preparatoria">6° Juzgado de Investigacion Preparatoria</option>');
            $("#txtUnidadEjec").append('<option value="7° Juzgado de Investigacion Preparatoria">7° Juzgado de Investigacion Preparatoria</option>');
            $("#txtUnidadEjec").append('<option value="8° Juzgado de Investigacion Preparatoria">8° Juzgado de Investigacion Preparatoria</option>');
            $("#txtUnidadEjec").append('<option value="9° Juzgado de Investigacion Preparatoria">9° Juzgado de Investigacion Preparatoria</option>');
            $("#txtUnidadEjec").append('<option value="5° Juzgado Penal Unipersonal">5° Juzgado Penal Unipersonal</option>');
            $("#txtUnidadEjec").append('<option value="6° Juzgado Penal Unipersonal">6° Juzgado Penal Unipersonal</option>');
            $("#txtUnidadEjec").append('<option value="7° Juzgado Penal Unipersonal">7° Juzgado Penal Unipersonal</option>');
            $("#txtUnidadEjec").append('<option value="8° Juzgado Penal Unipersonal">8° Juzgado Penal Unipersonal</option>');
            $("#txtUnidadEjec").append('<option value="1° Juzgado Penal Colegiado">1° Juzgado Penal Colegiado</option>');
            $("#txtUnidadEjec").append('<option value="2° Juzgado Penal Colegiado">2° Juzgado Penal Colegiado</option>');
        }
    });

    $("#nombreDocOtro").hide();
    $("#campodirectoderiv").hide();
    $("#otritodesk").hide();

    $("#titulo1").hide();
    $("#datos1").hide();
    $("#datos2").hide();
    $("#datos3").hide();
    $("#datos4").hide();
    $("#campo1").hide();
    $("#campo2").hide();
    $("#campo3").hide();
    $("#campo4").hide();

    $('#txtFecha_nas').datepicker({
        autoclose: true
    });

    $('#txtFecha_nas_tu').datepicker({
        autoclose: true
    });

    $('#txtFecDerivacion').datepicker({
        autoclose: true
    });

    $("#chekito").change(function (e) {
        if ($(this).is(":checked")) {
            $("#otritodesk").show();
            $(window).trigger('resize');
        } else {
            $("#otritodesk").hide();
        }
    });

    $("#txtFecha_nas").change(function (e) {
        console.log($(this).val());
        fechaNacimientoDate = new Date($(this).val());
        fechaActual = new Date();
        edad = fechaActual.getFullYear() - fechaNacimientoDate.getFullYear();
        if (fechaActual < new Date(fechaActual.getFullYear(), fechaNacimientoDate.getMonth(), fechaNacimientoDate.getDate())) {
            edad--;
        }
        $("#txtEdadUs").val(edad);

        if (edad <= 18) {
            $("#titulo1").show();
            $("#datos1").show();
            $("#datos2").show();
            $("#datos3").show();
            $("#datos4").show();
            $("#campo1").show();
            $("#campo2").show();
            $("#campo3").show();
            $("#campo4").show();
            $(window).trigger('resize');
        }
    });

    $("#txtFecha_nas_tu").change(function (e) {
        fechaNacimientoDate = new Date($(this).val());
        fechaActual = new Date();
        edad = fechaActual.getFullYear() - fechaNacimientoDate.getFullYear();
        if (fechaActual < new Date(fechaActual.getFullYear(), fechaNacimientoDate.getMonth(), fechaNacimientoDate.getDate())) {
            edad--;
        }
        $("#txtEdadTu").val(edad);
    });

    $("#upload_file").on("submit", uploadFile);

    traerDatosInstitucion();
    selectDepartamento("#txtDepartamentUs");
    $("#txtDepartamentUs").change(function (e) {
        selectProvincia("#txtProvinciaUs", $(this).val());
    });

    $("#txtProvinciaUs").change(function (e) {
        selectDistrito("#txtDistritoUs", $(this).val());
    });

    $("#txtDistritoUs").change(function (e) {
        selectCcpp("#txtCcppUs", $(this).val());
        $.post(
            "controllers/usuarios.controller.php?op=uederiv",
            { iddistrito: $(this).val() },
            function (data) {
                data = JSON.parse(data);
                $("#txtUeDerivar").val(data[0]["RED"]);
                $.post(
                    "controllers/registros.controller.php?op=getidred",
                    { txtUeDerivar: data[0]["RED"] },
                    function (data) {
                        data = JSON.parse(data);
                        selectMicrored("#microredElect", data[0]["idred"]);
                    }
                );
            }
        );
    });

    $("#microredElect").change(function (e) {
        selectEess("#eessDirecto", $(this).val());
    });

    $("#directo").change(function (e) {
        if ($(this).val() == 1) {
            $("#campodirectoderiv").show();
        } else {
            $("#campodirectoderiv").hide();
        }
        $(window).trigger('resize');
    });

    $("#txtTipoDocumento").change(function (e) {
        if ($(this).val() == 6) {
            $("#nombreDocOtro").show();
        } else {
            $("#nombreDocOtro").hide();
        }
    });


    $("#btnCancelar").click(function () {
        limpiar();
    });

    $("#formularioss").on("submit", function (e) {

        //e.preventDefault();
        /*if ($(this).valid()) {
            guardaryeditar(e);
        }*/
        guardaryeditar(e);
    });


    $("#formulario").validate({
        ignore: [txtObservaciones],
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        errorPlacement: function (error, e) {
            jQuery(e).parents('.form-group').append(error);
        },
        highlight: function (e) {
            jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
        },
        success: function (e) {
            jQuery(e).closest('.form-group').removeClass('is-invalid');
            jQuery(e).remove();
        },
        rules: {
            txtDni: {
                required: true,
                minlength: 8
            },
            txtNombres: {
                required: true
            },
            txtApellidos: {
                required: true
            },
            txtFecAte: {
                required: true
            },
            txtTurno: {
                required: true
            },
            txtNunSol: {
                required: true
            },
            txtArea: {
                required: true
            },
            txtCantExa: {
                required: true
            },
            txtProfesional: {
                required: true
            }
        },
        messages: {
            txtDni: {
                required: "Por favor ingrese el DNI",
                minlength: 'El dni tiene minimo 8 digitos'
            },
            txtNombres: {
                required: "Por favor ingrese su nombre"
            },
            txtApellidos: {
                required: "Por favor ingrese sus apellidos"
            },
            txtFecAte: {
                required: "Por favor ingrese la fecha de atencion"
            },
            txtTurno: {
                required: "Por favor ingrese el turno"
            },
            txtNunSol: {
                required: "Por favor ingrese el numero de solicitud"
            },
            txtArea: {
                required: "Por favor seleccione el area"
            },
            txtCantExa: {
                required: "Por favor seleccione la cantidad de examenes"
            },
            txtProfesional: {
                required: "Por favor seleccione el profesional"
            }
        }
    });
}

function onFinish() {
    guardaryeditar(null);
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

function selectRed(campo) {
    $.post(
        "controllers/red.controller.php?op=selectRed",
        function (data) {
            $(campo).html(data);
        }
    );
}

function selectDepartamento(campo) {
    $.post(
        "controllers/usuarios.controller.php?op=selectDepartamento",
        function (data) {
            $(campo).html(data);
        }
    );
}

function selectProvincia(campo, dato) {
    $.post(
        "controllers/usuarios.controller.php?op=selectProvincia",
        { iddepartamento: dato },
        function (data) {
            $(campo).html(data);
        }
    );
}

function selectDistrito(campo, dato) {
    $.post(
        "controllers/usuarios.controller.php?op=selectDistrito",
        { idprovincia: dato },
        function (data) {
            $(campo).html(data);
        }
    );
}

function selectCcpp(campo, dato) {
    $.post(
        "controllers/usuarios.controller.php?op=selectCcpp",
        { iddistrito: dato },
        function (data) {
            $(campo).html(data);
        }
    );
}

function selectMicrored(campo, dato) {
    $.post(
        "controllers/microred.controller.php?op=selectMicroredUe",
        { txtIdRed: dato },
        function (data) {
            $(campo).html(data);
        }
    );
}

function selectEess(campo, dato) {
    $.post(
        "controllers/eess.controller.php?op=selectEess2",
        { txtIdMicrored: dato },
        function (data) {
            $(campo).html(data);
        }
    );
}

function selectTipoDoc() {
    $.post(
        "controllers/tipoDoc.controller.php?op=selectTipoDoc",
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
        "controllers/upload.controller.php?op=traerArchivos",
        { idregistro: idregistro },
        function (data) {
            if (data != false) {
                let datos = JSON.parse(data);
                console.log(datos);
                for (x of datos) {
                    let docdoc = x.nombre.trim() != '' ? x.nombre : x.doc;
                    $(".wrapper_files").append(
                        '<a class="d-block btn btn-light btn-sm mt-2" href="upload/' + x.ruta + '" download>Descargar: ' + docdoc + '</a>'
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

function listo(idmovimiento) {
    $.post(
        "controllers/upload.controller.php?op=validarUpload",
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
                    "controllers/movimientos.controller.php?op=listo",
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



function traerDatosInstitucion() {
    $.post(
        "controllers/entidad.controller.php?op=getData",
        function (data) {
            data = JSON.parse(data);
            $("#txtDepartamento").val(data[0]["departamento"]);
            $("#txtProvincia").val(data[0]["provincia"]);
            $("#txtDistrito").val(data[0]["distrito"]);
            $("#txtDireccionEst").val(data[0]["direccion"]);
            $("#txtTelefonoInst").val(data[0]["telefono"]);
            $("#txtCelularEst").val(data[0]["celular"]);
            $("#txtCorreoInst").val(data[0]["correo"]);
            $("#txtidentidad").val(data[0]["identidad"]);
            $("#txtidusuario").val(data[0]["idusuario"]);
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
                url: "controllers/registros.controller.php?op=listar",
                type: "get",
                dataType: "json",
                error: function (e) {
                    console.log(e.responseText);
                },
            },
            bDestroy: true,
            iDisplayLength: 20, //Paginación
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
            if (data[0]["edad_us"] < 18) {
                $("#titulo1").show();
                $("#datos1").show();
                $("#datos2").show();
                $("#datos3").show();
                $("#datos4").show();
                $("#campo1").show();
                $("#campo2").show();
                $("#campo3").show();
                $("#campo4").show();
                $(window).trigger('resize');
            } else {
                $("#titulo1").hide();
                $("#datos1").hide();
                $("#datos2").hide();
                $("#datos3").hide();
                $("#datos4").hide();
                $("#campo1").hide();
                $("#campo2").hide();
                $("#campo3").hide();
                $("#campo4").hide();
                $(window).trigger('resize');
            }
            if (data[0]["otro_desc"].length > 2) {
                $("#otritodesk").show();
                $(window).trigger('resize');
            } else {
                $("#otritodesk").hide();
                $(window).trigger('resize');
            }

            $("#txtIdregistro").val(data[0]["idregistro"]);
            //$("#txtNombreProf").val(data[0]["nombre_prof"]);
            //$("#txtCargoProf").val(data[0]["cargo_prof"]);
            //$("#txtTelefonoProf").val(data[0]["telefono_prof"]);
            //$("#txtCorreoProf").val(data[0]["correo_prof"]);
            $("#txtFecDerivacion").val(data[0]["fecha_derivacion"]);
            //$("#txtFamiliaCon").val(data[0]["familia_con"]);
            //$("#txtUnidadEjec").val(data[0]["unidad_ejecutora"]);
            //$("#txtJefeEst").val(data[0]["jefe_es"]);
            $("#txtAp_nom_us").val(data[0]["ap_nom_us"]);
            $("#txtFecha_nas").val(data[0]["fecha_nas_us"]);
            $("#txtEdadUs").val(data[0]["edad_us"]);
            $("#txtNacionalidad").val(data[0]["nacionalidad_us"]);
            $("#txtGradoInstruc").val(data[0]["grado_instruc_us"]);
            $("#txtOcupacionUs").val(data[0]["ocupacion_us"]);
            $("#txtDomicilioDni").val(data[0]["domicilio_dni_us"]);
            $("#txtDomicilioAct").val(data[0]["domicilio_actual_us"]);
            $("#txtTelefonoUs").val(data[0]["telefono_us"]);
            $("#txtDni_us").val(data[0]["dni_us"]);
            $("#txtAp_nom_tu").val(data[0]["ap_nom_tu"]);
            $("#txtFecha_nas_tu").val(data[0]["fecha_nac_tu"]);
            $("#txtEdadTu").val(data[0]["edad_tu"]);
            $("#txtDniTu").val(data[0]["dni_tu"]);
            $("#txtNacionalidadTu").val(data[0]["nacionalidad_tu"]);
            $("#txtParentestoTu").val(data[0]["parentezco_tu"]);
            $("#txtGradoInstrucTu").val(data[0]["grado_instuc_tu"]);
            $("#txtOcupacionTu").val(data[0]["ocupacion_tu"]);
            $("#txtDomicilioDniTu").val(data[0]["domicilio_dni_tu"]);
            $("#txtDomicilioActTu").val(data[0]["domicilio_actual_tu"]);
            $("#txtTelefonoFijoTu").val(data[0]["telefono_tu"]);
            $("#txtCelularTu").val(data[0]["celular_tu"]);
            $("#txtTipoVulDer").val(data[0]["tipo_vul_der"]);
            $("#txtViolenciaC").val(data[0]["violencia_sexual"]);
            $("#txtAbandoDesamp").val(data[0]["abandono_desamparo"]);
            $("#txtAlcohol").val(data[0]["consumo"]);
            //$("#txtAcosoEsco").val(data[0]["acoso_escolar"]);
            //$("#txtViolenciaSexu").val(data[0]["violencia_sexual"]);
            //$("#txtViolenciaFami").val(data[0]["violencia_familiar"]);
            //$("#txtViolenciaGene").val(data[0]["violencia_genero"]);
            //$("#txtAbandonoDesamp").val(data[0]["abandono_desamparo"]);
            //$("#txtConsumo").val(data[0]["consumo"]);
            $("#txtOtroDesc").val(data[0]["otro_desc"]);
            $("#txtMotivoDer").val(data[0]["motivo_der"]);
            $("#txtDatosRelevant").val(data[0]["datos_relevantes"]);
            $("#txtidentidad").val(data[0]["identidad"]);
            $("#txtidusuario").val(data[0]["idusuario"]);
            $("#txtSexoTu").val(data[0]["sexo_tu"]);
            $("#txtSexoUs").val(data[0]["sexo_us"]);
            $("#txtVicAgre").val(data[0]["vic_agre"]);
            $("#txtUeDerivar").val(data[0]["ue_derivar"]);


        }
    );
}

function limpiar() {
    $("#txtIdregistro").val("");
    //$("#txtNombreProf").val("");
    //$("#txtCargoProf").val("");
    //$("#txtTelefonoProf").val("");
    //$("#txtCorreoProf").val("");
    $("#txtFecDerivacion").val("");
    //$("#txtFamiliaCon").val("");
    //$("#txtUnidadEjec").val("");
    //$("#txtJefeEst").val("");
    $("#txtDireccionEst").val("");
    $("#txtTelefonoInst").val("");
    $("#txtCelularEst").val("");
    $("#txtCorreoInst").val("");//
    $("#txtAp_nom_us").val("");//
    $("#txtFecha_nas").val("");//
    $("#txtEdadUs").val("");//
    $("#txtNacionalidad").val("");//
    $("#txtGradoInstruc").val("");//
    $("#txtOcupacionUs").val("");//
    $("#txtDomicilioDni").val("");//
    $("#txtDomicilioAct").val("");//
    $("#txtTelefonoUs").val("");//
    $("#txtDni_us").val("");//
    $("#txtAp_nom_tu").val("");//
    $("#txtFecha_nas_tu").val("");//
    $("#txtEdadTu").val("");//
    $("#txtDniTu").val("");//
    $("#txtNacionalidadTu").val("");//
    $("#txtParentestoTu").val("");//
    $("#txtGradoInstrucTu").val("");//
    $("#txtOcupacionTu").val("");//
    $("#txtDomicilioDniTu").val("");//
    $("#txtDomicilioActTu").val("");//
    $("#txtTelefonoFijoTu").val("");//
    $("#txtCelularTu").val("");//
    $("#txtTipoVulDer").val("0").trigger('change');//
    //$("#txtMaltratoInf").val("");//
    //$("#txtMaltratoFisi").val("");//
    //$("#txtDesercionEsco").val("");//
    //$("#txtAcosoEsco").val("");//
    //$("#txtViolenciaSexu").val("");//
    //$("#txtViolenciaFami").val("");//
    //$("#txtViolenciaGene").val("");//
    //$("#txtAbandonoDesamp").val("");//
    //$("#txtConsumo").val("");//
    $("#txtOtroDesc").val("");//
    $("#txtMotivoDer").val("");//
    $("#txtDatosRelevant").val("");//
    //$("#txtidentidad").val("");//
    //$("#txtidusuario").val("");//
    $("#txtSexoUs").val("0").trigger('change');//
    $("#txtSexoTu").val("0").trigger('change');//
    $("#txtVicAgre").val("0").trigger('change');
    $("#txtViolenciaC").val("0").trigger('change');
    $("#txtAbandoDesamp").val("0").trigger('change');
    $("#txtAlcohol").val("0").trigger('change');
    selectDepartamento();
    selectProvincia();
    selectDistrito();
    selectCcpp();
    $("#titulo1").hide();
    $("#datos1").hide();
    $("#datos2").hide();
    $("#datos3").hide();
    $("#datos4").hide();
    $("#campo1").hide();
    $("#campo2").hide();
    $("#campo3").hide();
    $("#campo4").hide();
    $("#otritodesk").hide();

}

function guardaryeditar(e) {
    //e.preventDefault(); //No se activará la acción predeterminada del evento
    //var formData = new FormData($("#formulario")[0]);
    //$("#btnGuardar").prop("disabled", true);

    $.ajax({
        url: "controllers/registros.controller.php?op=guardaryeditar",
        type: "POST",
        data: {
            txtIdregistro: $("#txtIdregistro").val(),
            txtFecDerivacion: $("#txtFecDerivacion").val(),
            txtAp_nom_us: $("#txtAp_nom_us").val(),
            txtFecha_nas: $("#txtFecha_nas").val(),
            txtEdadUs: $("#txtEdadUs").val(),
            txtNacionalidad: $("#txtNacionalidad").val(),
            txtGradoInstruc: $("#txtGradoInstruc").val(),
            txtOcupacionUs: $("#txtOcupacionUs").val(),
            txtDomicilioDni: $("#txtDomicilioDni").val(),
            txtDomicilioAct: $("#txtDomicilioAct").val(),
            txtTelefonoUs: $("#txtTelefonoUs").val(),
            txtDni_us: $("#txtDni_us").val(),
            txtAp_nom_tu: $("#txtAp_nom_tu").val(),
            txtFecha_nas_tu: $("#txtFecha_nas_tu").val(),
            txtEdadTu: $("#txtEdadTu").val(),
            txtDniTu: $("#txtDniTu").val(),
            txtNacionalidadTu: $("#txtNacionalidadTu").val(),
            txtParentestoTu: $("#txtParentestoTu").val(),
            txtGradoInstrucTu: $("#txtGradoInstrucTu").val(),
            txtOcupacionTu: $("#txtOcupacionTu").val(),
            txtDomicilioDniTu: $("#txtDomicilioDniTu").val(),
            txtDomicilioActTu: $("#txtDomicilioActTu").val(),
            txtTelefonoFijoTu: $("#txtTelefonoFijoTu").val(),
            txtCelularTu: $("#txtCelularTu").val(),
            txtTipoVulDer: $("#txtTipoVulDer").val(),
            txtViolenciaC: $("#txtViolenciaC").val(),
            txtAbandoDesamp: $("#txtAbandoDesamp").val(),
            txtAlcohol: $("#txtAlcohol").val(),
            txtOtroDesc: $("#txtOtroDesc").val(),
            txtMotivoDer: $("#txtMotivoDer").val(),
            txtDatosRelevant: $("#txtDatosRelevant").val(),
            txtidentidad: $("#txtidentidad").val(),
            txtidusuario: $("#txtidusuario").val(),
            txtCcppUs: $("#txtCcppUs").val(),
            txtSexoTu: $("#txtSexoTu").val(),
            txtSexoUs: $("#txtSexoUs").val(),
            txtVicAgre: $("#txtVicAgre").val(),
            txtUeDerivar: $("#txtUeDerivar").val(),
            directo: $("#directo").val(),
            eessDirecto: $("#eessDirecto").val()
        },
        success: function (datos) {
            $("#modalRegistro").modal("hide");
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

function eliminar(idatencion) {
    Swal.fire({
        icon: "question",
        title: 'Esta seguro en eliminar el registro?',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post(
                "controllers/atencion.controller.php?op=eliminar",
                { txtIdatencion: idatencion },
                function (data) {
                    data = JSON.parse(data);
                    Swal.fire({
                        position: "top-end",
                        icon: data["icono"],
                        title: data["mensaje"],
                        showConfirmButton: false,
                        timer: 4500,
                    });
                    tabla.ajax.reload();
                }
            );
        }
    })

}

function onCancel() {
    $("#modalRegistro").modal("hide");
}

function desifraruederiv(dato) {
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
    $("#txtimpresionnene").val(idmovimiento);
    $("#modalVer").modal("show");
    $.post(
        "controllers/ver.controller.php?op=ver",
        { idmovimiento: idmovimiento },
        function (data) {
            data = JSON.parse(data);
            console.log(data);
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

            if (data[0]["edad_us"] > 18) {
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
            } else {
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

            if (data[0]["otro_desc"].length > 1) {
                $("#otrotipvl").show();
            } else {
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
                    "<div class='col-md-4'><a href='upload/" + x.doc + "' target='_blank'><i class='fa fa-file-text-o'></i> " + docdoc + "</a></div>"
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
                let destino = "";
                if (x.tipo_movimiento == 1 || x.tipo_movimiento == 2 || (x.tipo_movimiento == 3 && x.idderiva == null)) {
                    registra = x.entidad;
                    if (x.tipo_movimiento == 2) {
                        destino = x.redDes;
                    } else if (x.tipo_movimiento == 3 && x.idderiva == null) {
                        destino = x.establecimiento;
                    }
                } else if (x.tipo_movimiento == 3) {
                    registra = x.redDer;
                    destino = x.establecimiento;
                } else if (x.tipo_movimiento == 4) {
                    registra = x.establecimiento;
                }
                $("#listademov").append(
                    "<li><i class='si si-wallet text-success'></i><div class='font-w600'>" + registra + "</div><div><a href='javascript:void(0)'>" + destino + "</a></div><div class='font-size-xs text-muted'>" + tipMov(x.tipo_movimiento - 1) + "</div></li>"
                );
            }
        }
    );


}

function tipMov(dato) {
    let tipo = ["Registrado", "Listo", "Derivado", "Atendido"];
    return tipo[dato];
}


init();