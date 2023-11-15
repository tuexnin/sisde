<div class="row">
    <div class="col-md-12">
        <div class="block block-themed">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">Entidad</h3>
            </div>
            <div class="block-content">
                <div class="ml-3 mt-2">
                    <button type="button" class="btn btn-outline-secondary mr-5 mb-5" data-toggle="modal" data-target="#modalEntidad">
                        <i class="fa fa-plus mr-5"></i>Agregar Entidad
                    </button>
                </div>
                <div class="mt-4 col-12">
                    <table id="tbllistado" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="" style="width: 10%;">Opciones</th>
                                <th>Entidad</th>
                                <th>Ruc</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Celular</th>
                                <th>Correo</th>
                                <th>Departamento</th>
                                <th>Provincia</th>
                                <th>Distrito</th>
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
<div class="modal fade" id="modalEntidad" tabindex="-1" role="dialog" aria-labelledby="modal-fromleft" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromleft modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title" id="tituloModal">Agregar Entidad</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form method="post" id="formulario" name="formulario">
                        <div class="form-group row" id="ubigeo">
                            <div class="col-md-4">
                                <div class="form-material">
                                    <select class="form-control" id="txtDepartamento" name="txtDepartamento" style="width: 100%;">
                                    </select>
                                    <label for="txtDepartamento">Seleccione Departamento</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <select class="form-control" id="txtProvincia" name="txtProvincia" style="width: 100%;">
                                    </select>
                                    <label for="txtProvincia">Seleccione Provincia</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <select class="form-control" id="txtDistrito" name="txtDistrito" style="width: 100%;">
                                    </select>
                                    <label for="txtDistrito">Seleccione Distrito</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="">
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="hidden" id="txtIdEntidad" name="txtIdEntidad">
                                    <input type="text" class="form-control" id="txtEntidad" name="txtEntidad">
                                    <label for="txtEntidad">Entidad</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtRuc" name="txtRuc">
                                    <label for="txtRuc">RUC</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtDireccion" name="txtDireccion">
                                    <label for="txtDireccion">Direccion</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="">
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtTelefono" name="txtTelefono">
                                    <label for="txtTelefono">Telefono</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtAnexo" name="txtAnexo">
                                    <label for="txtAnexo">Anexo</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtCelular" name="txtCelular">
                                    <label for="txtCelular">Celular</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="">
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtCorreo" name="txtCorreo">
                                    <label for="txtCorreo">Correo</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtNomRespon" name="txtNomRespon">
                                    <label for="txtNomRespon">Nombres del Responsable</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtApeRespon" name="txtApeRespon">
                                    <label for="txtApeRespon">Apellidos del Responsable</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="">
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtUnidad" name="txtUnidad">
                                    <label for="txtUnidad">Unidad</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtRucUnidad" name="txtRucUnidad">
                                    <label for="txtRucUnidad">RUC de la Unidad</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtDireccionUnidad" name="txtDireccionUnidad">
                                    <label for="txtDireccionUnidad">Direccion de la Unidad</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtTelefonoUnidad" name="txtTelefonoUnidad">
                                    <label for="txtTelefonoUnidad">Telefono de la Unidad</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtAnexoUnidad" name="txtAnexoUnidad">
                                    <label for="txtAnexoUnidad">Anexo de la Unidad</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtCelularUnidad" name="txtCelularUnidad">
                                    <label for="txtCelularUnidad">Celular de la Unidad</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtCorreoUnidad" name="txtCorreoUnidad">
                                    <label for="txtCorreoUnidad">Correo de la Unidad</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtApeRespUnidad" name="txtApeRespUnidad">
                                    <label for="txtApeRespUnidad">Apellidos. Resp. Unidad</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtNomRespUnidad" name="txtNomRespUnidad">
                                    <label for="txtNomRespUnidad">Nombres Resp. Unidad</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtInstitucion" name="txtInstitucion">
                                    <label for="txtInstitucion">Institucion</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtRucInstitucion" name="txtRucInstitucion">
                                    <label for="txtRucInstitucion">RUC de la Institucion</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtDirecInstitucion" name="txtDirecInstitucion">
                                    <label for="txtDirecInstitucion">Direccion de la Institucion</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtTelInstitucion" name="txtTelInstitucion">
                                    <label for="txtTelInstitucion">Telefono de la Institucion</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtAnexInstitucion" name="txtAnexInstitucion">
                                    <label for="txtAnexInstitucion">Anexo de la Institucion</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtCelInstitucion" name="txtCelInstitucion">
                                    <label for="txtCelInstitucion">Celular de la Institucion</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtCorreoInstitucion" name="txtCorreoInstitucion">
                                    <label for="txtCorreoInstitucion">Correo de la Institucion</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal" id="btnCancelar">Cancelar</button>
                                <button type="submit" class="btn btn-alt-success" id="btnGuardar">
                                    <i class="fa fa-check"></i> Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <p>Todos los campos deben ser ingresados</p>
            </div>
        </div>
    </div>
</div>
<!-- END From Left Modal -->

<script src="pages/scripts/entidad.js"></script>