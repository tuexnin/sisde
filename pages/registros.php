<div class="row">
    <div class="col-md-12">
        <div class="block block-themed">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">Registro de Derivaciones</h3>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="row mt-3">
                            <div class="ml-3 mt-2">
                                <button type="button" class="btn btn-outline-secondary mr-5 mb-5" data-toggle="modal" data-target="#modalRegistro">
                                    <i class="fa fa-plus mr-5"></i>Nuevo Registro
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <table id="tbllistado" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="" style="width: 10%;">Opciones</th>
                                <th>Unidad Ejecutora</th>
                                <th class="">Fecha Derivacion</th>
                                <th class="">Apellidos y nombres del derivado</th>
                                <th class="" style="width: 5%;">Documentos</th>
                                <th class="" style="width: 10%;">Estado</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- From Left Modal -->
<div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="modal-fromleft" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-fromleft" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title" id="tituloModal">Nuevo Registro</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">

                    <div id="smartwizard">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#step-1">
                                    <div class="num">1</div>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#step-2">
                                    <span class="num">2</span>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#step-3">
                                    <span class="num">3</span>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#step-4">
                                    <span class="num">4</span>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#step-5">
                                    <span class="num">5</span>

                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-6">
                                        <h6>IDENTIFICACION DE LA ENTIDAD QUE DERIVA EL CASO</h6>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-5">
                                        <div class="form-material">
                                            <input type="hidden" id="txtIdregistro" name="txtIdregistro">
                                            <input type="hidden" id="txtidusuario" name="txtidusuario">
                                            <input type="hidden" id="txtidentidad" name="txtidentidad">
                                            <input type="text" class="form-control" id="txtNombreProf" name="txtNombreProf" placeholder="Ingrese sus datos" require>
                                            <label for="txtNombreProf">Profesional</label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtCargoProf" name="txtCargoProf" placeholder="Ingrese el cargo">
                                            <label for="txtCargoProf">Cargo y/o Profesion</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtTelefonoProf" name="txtTelefonoProf" placeholder="Ingrese el telefono">
                                            <label for="txtTelefonoProf">Telefono</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="email" class="form-control" id="txtCorreoProf" name="txtCorreoProf" placeholder="Ingrese su correo">
                                            <label for="txtCorreoProf">Correo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-material">
                                            <input type="text" class="js-datepicker form-control" id="txtFecDerivacion" name="txtFecDerivacion" data-provide="datepicker" data-date-format="dd-mm-yyyy">
                                            <label for="txtFecDerivacion">Fecha de Derivacion</label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtFamiliaCon" name="txtFamiliaCon" placeholder="Ingrese el nombre del familiar">
                                            <label for="txtFamiliaCon">Familia en conocimiento</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-6">
                                        <h6>IDENTIFICACION DE LA INSTITUCION DERIVADORA</h6>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <select class="form-control" id="txtModulo" name="txtModulo" style="width: 100%;">
                                                <option value='0'>SELECCIONE</option>
                                                <option value='P'>MODULO DE PROTECCION</option>
                                                <option value='SA'>MODULO DE SANCION PENAL</option>
                                            </select>
                                            <label for="txtModulo">Modulo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <select class="form-control" id="txtUnidadEjec" name="txtUnidadEjec" style="width: 100%;">
                                            </select>
                                            <label for="txtUnidadEjec">Unidad ejecutora</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtJefeEst" name="txtJefeEst" placeholder="Ingrese el nombre del responsable">
                                            <label for="txtJefeEst">Responsable de la Derivacion</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtDepartamento" name="txtDepartamento" readonly>
                                            <label for="txtDepartamento">Departamento</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtProvincia" name="txtProvincia" readonly>
                                            <label for="txProvincia">Provincia</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtDistrito" name="txtDistrito" readonly>
                                            <label for="txtDistrito">Distrito</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtDireccionEst" name="txtDireccionEst" readonly>
                                            <label for="txtDireccionEst">Dirección del establecimiento</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtTelefonoInst" name="txtTelefonoInst" readonly>
                                            <label for="txtTelefonoInst">Teléfono fijo institucional</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtCelularEst" name="txtCelularEst" readonly>
                                            <label for="txtCelularEst">Teléfono móvil del establecimiento</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtCorreoInst" name="txtCorreoInst" readonly>
                                            <label for="txtCorreoInst">Correo electrónico</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-6">
                                        <h6>IDENTIFICACION DEL DERIVADO</h6>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-5">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtAp_nom_us" name="txtAp_nom_us">
                                            <label for="txtAp_nom_us">Apellidos y nombres</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtDni_us" name="txtDni_us">
                                            <label for="txtDni_us">DNI</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-material">
                                            <input type="text" class="js-datepicker form-control" id="txtFecha_nas" name="txtFecha_nas" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                            <label for="txtFecha_nas">Fecha de Nacimiento</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtEdadUs" name="txtEdadUs" readonly>
                                            <label for="txtEdadUs">Edad</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-material">
                                            <select class="form-control" id="txtSexoUs" name="txtSexoUs" style="width: 100%;">
                                                <option value='0'>SELECCIONE</option>
                                                <option value='F'>Femenino</option>
                                                <option value='M'>Masculino</option>
                                            </select>
                                            <label for="txtSexoUs">Sexo</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtNacionalidad" name="txtNacionalidad">
                                            <label for="txtNacionalidad">Nacionalidad</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <select class="form-control" id="txtGradoInstruc" name="txtGradoInstruc" style="width: 100%;">
                                                <option value='0'>SELECCIONE</option>
                                                <option value='PRIMARIA COMPLETA'>PRIMARIA COMPLETA</option>
                                                <option value='PRIMARIA INCOMPLETA'>PRIMARIA INCOMPLETA</option>
                                                <option value='SECUNDARIA COMPLETA'>SECUNDARIA COMPLETA</option>
                                                <option value='SECUNDARIA INCOMPLETA'>SECUNDARIA INCOMPLETA</option>
                                                <option value='SUPERIOR COMPLETA'>SUPERIOR COMPLETA</option>
                                                <option value='SUPERIOR INCOMPLETA'>SUPERIOR INCOMPLETA</option>
                                                <option value='SUPERIOR UNIVERSITARIO COMPLETO'>SUPERIOR UNIVERSITARIO COMPLETO</option>
                                                <option value='SUPERIOR UNIVERSITARIO INCOMPLETO'>SUPERIOR UNIVERSITARIO INCOMPLETO</option>
                                                <option value='NO ESTUDIO'>NO ESTUDIO</option>
                                            </select>
                                            <label for="txtGradoInstruc">Grado de Instruccion</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtOcupacionUs" name="txtOcupacionUs">
                                            <label for="txtOcupacionUs">Ocupación</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtDomicilioDni" name="txtDomicilioDni">
                                            <label for="txtDomicilioDni">Domicilio de DNI</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtDomicilioAct" name="txtDomicilioAct">
                                            <label for="txtDomicilioAct">Domicilio Actual</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtTelefonoUs" name="txtTelefonoUs">
                                            <label for="txtTelefonoUs">Telefono</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <select class="form-control" id="txtDepartamentUs" name="txtDepartamentUs" style="width: 100%;">
                                            </select>
                                            <label for="txtDepartamentUs">Departamento</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <select class="form-control" id="txtProvinciaUs" name="txtProvinciaUs" style="width: 100%;">
                                            </select>
                                            <label for="txtProvinciaUs">Provincia</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <select class="form-control" id="txtDistritoUs" name="txtDistritoUs" style="width: 100%;">
                                            </select>
                                            <label for="txtDistritoUs">Distrito</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <select class="form-control" id="txtCcppUs" name="txtCcppUs" style="width: 100%;">
                                            </select>
                                            <label for="txtCcppUs">CCPP</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtUeDerivar" name="txtUeDerivar" readonly>
                                            <label for="txtUeDerivar">UE Deriar</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <select class="form-control" id="directo" name="directo" style="width: 100%;">
                                                <option value='0'>NO</option>
                                                <option value='1'>SI</option>
                                            </select>
                                            <label for="directo">Derivacion Directa?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" id="campodirectoderiv">
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <select class="form-control" id="microredElect" name="microredElect" style="width: 100%;">
                                            </select>
                                            <label for="microredElect">MicroRed</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <select class="form-control" id="eessDirecto" name="eessDirecto" style="width: 100%;">
                                            </select>
                                            <label for="eessDirecto">Eess</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center" id="titulo1">
                                    <div class="col-md-6">
                                        <h6>IDENTIFICACION DEL ADULTO RESPONSABLE</h6>
                                    </div>
                                </div>
                                <div class="form-group row" id="datos1">
                                    <div class="col-md-5">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtAp_nom_tu" name="txtAp_nom_tu">
                                            <label for="txtAp_nom_tu">Apellidos y nombres</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-material">
                                            <input type="text" class="js-datepicker form-control" id="txtFecha_nas_tu" name="txtFecha_nas_tu" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                            <label for="txtFecha_nas_tu">Fecha de Nacimiento</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtEdadTu" name="txtEdadTu" readonly>
                                            <label for="txtEdadTu">Edad</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-material">
                                            <select class="form-control" id="txtSexoTu" name="txtSexoTu" style="width: 100%;">
                                                <option value='0'>SELECCIONE</option>
                                                <option value='F'>F</option>
                                                <option value='M'>M</option>
                                            </select>
                                            <label for="txtSexoTu">Sexo</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" id="datos2">
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtDniTu" name="txtDniTu">
                                            <label for="txtDniTu">DNI Tutor</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtNacionalidadTu" name="txtNacionalidadTu">
                                            <label for="txtNacionalidadTu">Nacionalidad</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtParentestoTu" name="txtParentestoTu">
                                            <label for="txtParentestoTu">Parentesco</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" id="datos3">
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <select class="form-control" id="txtGradoInstrucTu" name="txtGradoInstrucTu" style="width: 100%;">
                                                <option value='0'>SELECCIONE</option>
                                                <option value='PRIMARIA COMPLETA'>PRIMARIA COMPLETA</option>
                                                <option value='PRIMARIA INCOMPLETA'>PRIMARIA INCOMPLETA</option>
                                                <option value='SECUNDARIA COMPLETA'>SECUNDARIA COMPLETA</option>
                                                <option value='SECUNDARIA INCOMPLETA'>SECUNDARIA INCOMPLETA</option>
                                                <option value='SUPERIOR COMPLETA'>SUPERIOR COMPLETA</option>
                                                <option value='SUPERIOR INCOMPLETA'>SUPERIOR INCOMPLETA</option>
                                                <option value='SUPERIOR UNIVERSITARIO COMPLETO'>SUPERIOR UNIVERSITARIO COMPLETO</option>
                                                <option value='SUPERIOR UNIVERSITARIO INCOMPLETO'>SUPERIOR UNIVERSITARIO INCOMPLETO</option>
                                                <option value='NO ESTUDIO'>NO ESTUDIO</option>
                                            </select>
                                            <label for="txtGradoInstrucTu">Grado de Instruccion</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtOcupacionTu" name="txtOcupacionTu">
                                            <label for="txtOcupacionTu">Ocupacion</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtDomicilioDniTu" name="txtDomicilioDniTu">
                                            <label for="txtDomicilioDniTu">Domicilio DNI</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" id="datos4">
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtDomicilioActTu" name="txtDomicilioActTu">
                                            <label for="txtDomicilioActTu">Domicilio Actual</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtTelefonoFijoTu" name="txtTelefonoFijoTu">
                                            <label for="txtTelefonoFijoTu">Telefono Fijo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtCelularTu" name="txtCelularTu">
                                            <label for="txtCelularTu">Celular</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-6">
                                        <h6>DESCRIPCION DE LA VULNERACION DEL DERECHO</h6>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <select class="form-control" id="txtVicAgre" name="txtVicAgre" style="width: 100%;">
                                                <option value='0'>SELECCIONE</option>
                                                <option value='VICTIMA'>VICTIMA</option>
                                                <option value='AGRESOR'>AGRESOR</option>
                                            </select>
                                            <label for="txtVicAgre">Tipo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtTipoVulDer" name="txtTipoVulDer">
                                            <label for="txtTipoVulDer">Tipo de vulneración de derecho</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="campo1">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtMaltratoInf" name="txtMaltratoInf">
                                            <label for="txtMaltratoInf">Maltrato Infantil</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4" id="campo2">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtTipMaltratoFisi" name="txtTipMaltratoFisi">
                                            <label for="txtTipMaltratoFisi">Maltrato Fisico</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="campo3">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtDesercionEsco" name="txtDesercionEsco">
                                            <label for="txtDesercionEsco">Desercion Escolar</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="campo4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtAcosoEsco" name="txtAcosoEsco">
                                            <label for="txtAcosoEsco">Acoso Escolar</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtViolenciaSexu" name="txtViolenciaSexu">
                                            <label for="txtViolenciaSexu">Violencia Sexual</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtViolenciaFami" name="txtViolenciaFami">
                                            <label for="txtViolenciaFami">Violencia Familiar</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtViolenciaGene" name="txtViolenciaGene">
                                            <label for="txtViolenciaGene">Violencia de Genero</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtAbandonoDesamp" name="txtAbandonoDesamp">
                                            <label for="txtAbandonoDesamp">Abandono y/o Desamparo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtConsumo" name="txtConsumo">
                                            <label for="txtConsumo">Consumo de alcohol y/o drogas</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="txtOtroDesc" name="txtOtroDesc">
                                            <label for="txtOtroDesc">Otro</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-5" class="tab-pane" role="tabpanel" aria-labelledby="step-5">
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-6">
                                        <h6>DESCRIPCION</h6>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-material">
                                            <textarea class="form-control" id="txtMotivoDer" name="txtMotivoDer" rows="3" placeholder="Descripcion completa..."></textarea>
                                            <label for="txtMotivoDer">Motivo de la Derivacion</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-material">
                                            <textarea class="form-control" id="txtDatosRelevant" name="txtDatosRelevant" rows="3" placeholder="Descripcion completa..."></textarea>
                                            <label for="txtDatosRelevant">Datos Relevantes a Considerar</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Include optional progressbar HTML -->
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <p>Todos los campos deben ser ingresados, con excepción de Observaciones</p>
            </div>
        </div>
    </div>
</div>
<!-- END From Left Modal -->

<!-- From Left Modal -->
<div class="modal fade" id="modalAgregarArchivos" tabindex="-1" role="dialog" aria-labelledby="modal-fromleft" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromleft" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title" id="tituloModal">Agregar Documentos</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form id="upload_file">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="idregistro" id="idregistro">
                            <input type="hidden" class="form-control" name="iddocumento" id="iddocumento">
                        </div>
                        <div class="col-md-8">
                            <div class="form-material">
                                <select class="form-control" id="txtTipoDocumento" name="txtTipoDocumento" style="width: 100%;">
                                </select>
                                <label for="txtTipoDocumento">Documento a subir</label>
                            </div>
                        </div>
                        <div class="col-md-5 mt-4">
                            <div class="form-material">
                                <input type="text" class="form-control" name="txtNumDoc" id="txtNumDoc">
                                <label for="txtNumDoc">Numero Doc</label>
                            </div>
                        </div>
                        <div class="col-md-8 mt-4" id="nombreDocOtro">
                            <div class="form-material">
                                <input type="text" class="form-control" name="txtNombreOtro" id="txtNombreOtro">
                                <label for="txtNombreOtro">Nombre Doc</label>
                            </div>
                        </div>
                        <div class="col-md-8 mt-4">
                            <div class="form-material">
                                <input type="file" class="form-control form-control-file" name="file" id="file" max="250" accept="application/pdf" required>
                                <label for="file">Archivo a subir</label>
                            </div>
                        </div>
                        <div class="col-md-8 mt-4">
                            <button class="btn btn-success" type="submit">Subir Archivo</button>
                        </div>
                        <div class="col-md-8 mt-2">
                            <div class="wrapper" style="display: none;">
                                <div class="progress progress_wrapper">
                                    <div class="progress-bar progress-bar-striped bg-info progress-bar-animated progress_bar" role="progressbar" style="width: 0%;">0%</div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="wrapper_files"></div>
                </div>
            </div>
            <div class="modal-footer">
                <p>Todos los campos deben ser ingresados, con excepción de Observaciones</p>
            </div>
        </div>
    </div>
</div>
<!-- END From Left Modal -->

<!-- From Left Modal -->
<div class="modal fade" id="modalVer" tabindex="-1" role="dialog" aria-labelledby="modal-fromleft" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-fromleft" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title" id="tituloModal">FICHA DE DERIVACION DE CASO</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <h6>IDENTIFICACION DE LA ENTIDAD QUE DERIVA EL CASO</h6>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Nombre del profesional</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="nombreProf"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Cargo y/o profesión</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="cargoyoprof"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Teléfono</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="telprof"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Correo electronico</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="corrElect"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Fecha de derivación</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="fecder"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Familia en conocimiento de la derivación</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="famConDer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <h6>IDENTIFICACION DE LA INSTITUCION DERIVADORA</h6>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Unidad ejecutora</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="uniEjec"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Responsable de la Derivacion</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="jefEst"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Departamento</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="depart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Provincia</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="Provin"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Distrito</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="distr"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Dirección del establecimiento</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="dirEst"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Teléfono fijo institucional</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="telfijinst"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Teléfono móvil del establecimiento</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="telmovest"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Correo electrónico</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="corrElInst"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">UE Derivar</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="ueder"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <h6>IDENTIFICACION DEL DERIVADO</h6>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Apellidos y nombres</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="apnomderiv"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">DNI</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="dnideriv"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Fecha de nacimiento</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="fecnasderiv"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Edad</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="edderiv"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Sexo</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="sexderiv"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Nacionalidad</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="nacioderiv"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Grado de instrucción</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="gradInsderiv"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Ocupación</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="ocupderiv"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Domicilio de DNI</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="domdnideriv"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Domicilio actual</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="domacderiv"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Teléfono</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="telderiv"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="tituloidentuto">
                        <div class="col-md-12">
                            <hr>
                            <h6>IDENTIFICACION DEL ADULTO RESPONSABLE/TUTOR</h6>
                            <hr>
                        </div>
                    </div>
                    <div class="row" id="contetuto1">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Apellidos y nombres</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="apnomtut"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">DNI</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="dnitut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="contetuto2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Fecha de Nacimiento</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="fecnactut"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Edad</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="edadtut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="contetuto3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Sexo</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="sextut"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Nacionalidad</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="nactut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="contetuto4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Parentesco</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="parentut"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Grado de instrucción</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="gradinstut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="contetuto5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Ocupación</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="ocuptut"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Domicilio de DNI</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="domdnitut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="contetuto6">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Domicilio actual</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="domactut"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Telefono fijo</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="telfijtut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="contetuto7">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Celular</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="celtut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <h6>DESCRIPCION DE LA VULNERACION DEL DERECHO</h6>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Tipo</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="vicagre"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Tipo de vulneración de derecho</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="tipvulder"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="contentinfi">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Maltrato infantil</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="malinf"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Maltrato fisico</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="malfis"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="contentdeseres">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Deserción escolar</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="deseresc"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Acoso escolar</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="acosesc"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Violencia sexual</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="violsex"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Violencia familiar</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="violfami"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Violencia de genero</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="violgene"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Abandono y/o desamparo</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="abandesa"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Consumo de alcohol y/o drogas</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="consalcdro"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Otro</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="otrodesc"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <h6>DESCRIPCION</h6>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-12">MOTIVO DE DERIVACIÒN</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="motder" style="word-wrap: break-word;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-12">DATOS RELEVANTES A CONSIDERAR</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="datrelecon" style="word-wrap: break-word;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <h6>DOCUMENTOS ADJUNTADOS</h6>
                            <hr>
                        </div>
                    </div>
                    <div class="row" id="docsadjunt">

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <h6>MOVIMIENTOS</h6>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <div class="block-content">
                                    <ul class="list list-activity" id="listademov">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal" id="btnCancelar">Salir</button>
            </div>
        </div>
    </div>
</div>
<!-- END From Left Modal -->

<script src="pages/scripts/registros.js"></script>