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
    <div class="modal-dialog modal-dialog-fromleft" role="document">
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
                        <div class="form-group row justify-content-center" id="departamento">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <select class="form-control" id="txtDepartamento" name="txtDepartamento" style="width: 100%;" >
                                    </select>
                                    <label for="txtDepartamento">Seleccione Departamento</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center" id="provincia">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <select class="form-control" id="txtProvincia" name="txtProvincia" style="width: 100%;" >
                                    </select>
                                    <label for="txtProvincia">Seleccione Provincia</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center" id="distrito">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <select class="form-control" id="txtDistrito" name="txtDistrito" style="width: 100%;" >
                                    </select>
                                    <label for="txtDistrito">Seleccione Distrito</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center" id="entidad">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <input type="hidden" id="txtIdEntidad" name="txtIdEntidad">
                                    <input type="text" class="form-control" id="txtEntidad" name="txtEntidad" >
                                    <label for="txtEntidad">Entidad</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center" id="">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtRuc" name="txtRuc" >
                                    <label for="txtRuc">RUC</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" >
                                    <label for="txtDireccion">Direccion</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" >
                                    <label for="txtTelefono">Telefono</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtCelular" name="txtCelular" >
                                    <label for="txtCelular">Celular</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtCorreo" name="txtCorreo" >
                                    <label for="txtCorreo">Correo</label>
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