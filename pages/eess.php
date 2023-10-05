<div class="row">
    <div class="col-md-12">
        <div class="block block-themed">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">Establecimiento</h3>
            </div>
            <div class="block-content">
                <div class="ml-3 mt-2">
                    <button type="button" class="btn btn-outline-secondary mr-5 mb-5" data-toggle="modal" data-target="#modalEstablecimiento">
                        <i class="fa fa-plus mr-5"></i>Agregar Establecimiento
                    </button>
                </div>
                <div class="mt-4 col-12">
                    <table id="tbllistado" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="" style="width: 10%;">Opciones</th>
                                <th>Red</th>
                                <th>MicroRed</th>
                                <th>Establecimiento</th>
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
<div class="modal fade" id="modalEstablecimiento" tabindex="-1" role="dialog" aria-labelledby="modal-fromleft" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromleft" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title" id="tituloModal">Agregar Establecimiento</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form method="post" id="formulario" name="formulario">
                        <div class="form-group row justify-content-center" id="red">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <select class="form-control" id="txtRed" name="txtRed" style="width: 100%;">
                                    </select>
                                    <label for="txtRed">Seleccione Red</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center" id="microred">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <select class="form-control" id="txtMicroRed" name="txtMicroRed" style="width: 100%;">
                                    </select>
                                    <label for="txtMicroRed">Seleccione MicroRed</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center" id="establecimiento">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <select class="form-control" id="txtEstablecimiento" name="txtEstablecimiento" style="width: 100%;">
                                    </select>
                                    <label for="txtEstablecimiento">Seleccione establecimiento</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center" id="redL">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtRedL" name="txtRedL" readonly>
                                    <label for="txtRedL">Red</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center" id="microredLabel">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <input type="hidden" id="txtIdEstablecimiento" name="txtIdEstablecimiento">
                                    <input type="hidden" id="txtIdMicrored" name="txtIdMicrored">
                                    <input type="text" class="form-control" id="txtMicroRedL" name="txtMicroRedL" readonly>
                                    <label for="txtMicroRedL">MicroRed</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center" id="establecimiento">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtEstablecimientoL" name="txtEstablecimientoL" readonly>
                                    <label for="txtEstablecimientoL">Establecimiento</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtCodigoUnico" name="txtCodigoUnico" readonly>
                                    <label for="txtCodigoUnico">Codigo Unico</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center" id="tenesicoSelect">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <select class="form-control" id="txtSico" name="txtSico" style="width: 100%;">
                                        <option value='0'>NO</option>
                                        <option value='1'>SI</option>
                                    </select>
                                    <label for="txtSico">Tiene Psicólogo?</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center" id="nunsico">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtNunSico" name="txtNunSico">
                                    <label for="txtNunSico">Cantidad de Psicólogos</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center" id="sicomost">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtSicoMost" name="txtSicoMost" readonly>
                                    <label for="txtSicoMost">Tiene Psicólogo</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center" id="nunsicomost">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtNunSicoMost" name="txtNunSicoMost" readonly>
                                    <label for="txtNunSicoMost">Cantidad de Psicólogos</label>
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

<script src="pages/scripts/eess.js"></script>