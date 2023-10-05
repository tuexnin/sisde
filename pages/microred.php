<div class="row">
    <div class="col-md-12">
        <div class="block block-themed">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">MicroRed</h3>
            </div>
            <div class="block-content">
                <div class="ml-3 mt-2">
                    <button type="button" class="btn btn-outline-secondary mr-5 mb-5" data-toggle="modal" data-target="#modalMicroRed">
                        <i class="fa fa-plus mr-5"></i>Agregar MicroRed
                    </button>
                </div>
                <div class="mt-4 col-8">
                    <table id="tbllistado" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="" style="width: 10%;">Opciones</th>
                                <th>Red</th>
                                <th>MicroRed</th>
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
<div class="modal fade" id="modalMicroRed" tabindex="-1" role="dialog" aria-labelledby="modal-fromleft" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromleft" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title" id="tituloModal">Agregar MicroRed</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form method="post" id="formulario" name="formulario">
                        <div class="form-group row justify-content-center" id="redMaestro">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <select class="form-control" id="txtRed" name="txtRed" style="width: 100%;" >
                                    </select>
                                    <label for="txtRed">Seleccione Red</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center" id="microredMaestro">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <select class="form-control" id="txtMicroRed" name="txtMicroRed" style="width: 100%;" >
                                    </select>
                                    <label for="txtMicroRed">Seleccione MicroRed</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center" id="red">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtRedL" name="txtRedL" readonly>
                                    <label for="txtRedL">Red</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <input type="hidden" id="txtIdMicroRed" name="txtIdMicroRed">
                                    <input type="hidden" id="txtIdRed" name="txtIdRed">
                                    <input type="text" class="form-control" id="txtMicroRedL" name="txtMicroRedL" readonly>
                                    <label for="txtMicroRedL">MicroRed</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtCodigoMicro" name="txtCodigoMicro" readonly>
                                    <label for="txtCodigoMicro">Codigo MicroRed</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-md-9">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="txtCodigo" name="txtCodigo" readonly>
                                    <label for="txtCodigo">Codigo Cocadenado</label>
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

<script src="pages/scripts/microred.js"></script>