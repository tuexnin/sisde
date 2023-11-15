<div class="row">
    <div class="col-md-12">
        <div class="block block-themed">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">Por Atender</h3>
            </div>
            <div class="block-content">

                <div class="mt-4">
                    <table id="tbllistado" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="" style="width: 10%;">Opciones</th>
                                <th>Entidad Derivadora</th>
                                <th class="">Fecha Derivacion</th>
                                <th class="">Apellidos y nombres del derivado</th>
                                <th class="" style="width: 5%;">Adjuntar</th>
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
                                <label class="col-12">Modulo</label>
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
                                <label class="col-12">Tipo de Maltrato</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="tipvulder"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Tipo de Violencia</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="violenciado"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Abandono y/o Desamparo</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="abandordesamp"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-12">Consumo de alcohol y/o drogas</label>
                                <div class="col-md-9">
                                    <div class="form-control-plaintext" id="alcoholordrogas"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="otrotipvl">
                        <div class="col-md-12">
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


<script src="pages/scripts/atenciones.js"></script>