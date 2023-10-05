<div class="row">
    <div class="col-md-12">
        <div class="block block-themed">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">Usuarios</h3>
            </div>
            <div class="block-content">
                <div class="ml-3 mt-2">
                    <button type="button" class="btn btn-outline-secondary mr-5 mb-5" data-toggle="modal" data-target="#modalUsuario">
                        <i class="fa fa-plus mr-5"></i>Agregar Usuario
                    </button>
                </div>
                <div class="mt-4">
                    <table id="tbllistadoUsuarios" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="" style="width: 10%;">Opciones</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">DNI</th>
                                <th>Foto</th>
                                <th>Tipo</th>
                                <th>Descripcion</th>
                                <th class="text-center" style="width: 15%;">rol</th>
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
<div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="modal-fromleft" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromleft modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title" id="tituloModal">Agregar Usuario</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form method="post" id="formulario" name="formulario">
                        <div class="form-group row">
                            <div class="col-md-2">
                                <div class="form-material">
                                    <input type="hidden" id="txtIdusuario" name="txtIdusuario">
                                    <input type="hidden" name="txtContraseña" id="txtContraseña">
                                    <input type="text" class="form-control" id="txtDni" name="txtDni" placeholder="Ingrese su DNI" require>
                                    <label for="txtDni">DNI</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtNombres" name="txtNombres" placeholder="Ingrese sus nombres">
                                    <label for="txtNombres">Nombres</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtApellidos" name="txtApellidos" placeholder="Ingrese sus apellidos">
                                    <label for="txtApellidos">Apellidos</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <div class="form-material">
                                    <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="********">
                                    <label for="txtPassword">Contraseña</label>
                                </div>
                            </div>
                            <div class="col-md-4" id="tipouser">
                                <div class="form-material">
                                    <select class="form-control" id="txtTipo" name="txtTipo" style="width: 100%;">
                                    </select>
                                    <label for="txtTipo">Tipo</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <select class="form-control" id="txtRol" name="txtRol" style="width: 100%;">
                                    </select>
                                    <label for="txtRol">Rol</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center" id="contentEsta">
                            <div class="col-md-4">
                                <div class="form-material">
                                    <select class="form-control" id="txtidred" name="txtidred" style="width: 100%;">
                                    </select>
                                    <label for="txtidred">Red</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <select class="form-control" id="txtidmicrored" name="txtidmicrored" style="width: 100%;">
                                    </select>
                                    <label for="txtidmicrored">Micro Red</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <select class="form-control" id="txtideess" name="txtideess" style="width: 100%;">
                                    </select>
                                    <label for="txtideess">Establecimiento</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="contentRed">
                            <div class="col-md-4">
                                <div class="form-material">
                                    <select class="form-control" id="txtidred1" name="txtidred1" style="width: 100%;">
                                    </select>
                                    <label for="txtidred1">Red</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="contentUbigeo">
                            <div class="col-md-4">
                                <div class="form-material">
                                    <select class="form-control" id="txtDepartamento" name="txtDepartamento" style="width: 100%;">
                                    </select>
                                    <label for="txtDepartamento">Departamento</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <select class="form-control" id="txtProvincia" name="txtProvincia" style="width: 100%;">
                                    </select>
                                    <label for="txtProvincia">Provincia</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material">
                                    <select class="form-control" id="txtDistrito" name="txtDistrito" style="width: 100%;">
                                    </select>
                                    <label for="txtDistrito">Distrito</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="contentEntidad">
                            <div class="col-md-4">
                                <div class="form-material">
                                    <select class="form-control" id="txtidentidad" name="txtidentidad" style="width: 100%;">
                                    </select>
                                    <label for="txtidentidad">Entidad</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <input type="file" class="form-control" name="txtImagen" id="txtImagen">
                                    <input type="hidden" name="imagenactual" id="imagenactual">
                                    <img src="" width="150px" height="120px" id="imagenmuestra">
                                    <label for="txtImagen">Imagen</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal" id="btnCancelar">Cancelar</button>
                                <button type="submit" class="btn btn-alt-success">
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

<script src="pages/scripts/usuarios.js"></script>