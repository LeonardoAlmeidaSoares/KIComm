<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="javascript:void(0)">Cadastros</a>
            <span class="breadcrumb-item active">Cadastro de Venda</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Venda <small>Cadastro</small></h3>
            </div>
            <div class="col-md-12">
                <!-- Floating Labels -->
                <form id="frmCadVenda" action="<?= base_url("index.php/venda/add"); ?>" method="POST">
                    <div class="block">
                        <div class="block-content">
                            
                            <h2 class="content-heading">Cliente</h2>
                            
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="txtNome" name="txtNome">
                                        <label for="txtNome">Nome Completo</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-material">
                                        <input type="text" disabled="disabled" class="form-control" id="txtCPF" name="txtCPF">
                                        <label for="txtCPF">CPF</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-material">
                                        <input type="text" disabled="disabled" class="form-control" id="txtRG" name="txtRG">
                                        <label for="txtRG">RG</label>
                                    </div>
                                </div>

                            </div>

                            <h2 class="content-heading">Produtos</h2>

                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" class="form-control"  name="txtAddProd" id="txtAddProd" placeholder="Buscar Produtos">
                                </div>

                                <div class="col-md-2">
                                    <input type="text" class="form-control"  name="txtQtdProd" id="txtQtdProd" placeholder="Quantidade">
                                </div>

                                <div class="col-md-2">
                                    <a href="#" class="btn btn-info" id="txtAdd">Adicionar <span class="fa fa-plus"></span></a>
                                </div>

                            </div>

                            <h2 class="content-heading"></h2>

                            <table id="table" class="table table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                        <th>Valor Unitário</th>
                                        <th>Valor Total</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th>CÓDIGO</th>
                                        <th>PRODUTO</th>
                                        <th>QUANTIDADE</th>
                                        <th>VALOR UNITÁRIO</th>
                                        <th>VALOR TOTAL</th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Valor Total do Pedido</th>
                                        <th class="pull-left" id="LblValorTotal">R$0,00</th>
                                    </tr>
                                </tfoot>
                            </table>

                            <h2 class="content-heading">Observações</h2>

                            <div class="block-content">
                                <div class="form-group row">
                                    <textarea id="txtObs" name="txtObs" style="width: 100%;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="hidden" name="txtCodCliente" id="txtCodCliente" />
                            <input type="hidden" name="txtLista" id="txtLista" />
                            <input type="hidden" name="txtValorTotal" id="txtValorTotal" /> 
                            <input type="hidden" name="txtValorDesconto" id="txtValorDesconto" />
                            <button type="submit" class="btn btn-alt-primary pull-right btnAction">Cadastrar</button>
                        </div>
                    </div>
                </form>
                <!-- END Floating Labels -->
            </div>
        </div>
    </div>
    <script src="<?= base_url("assets/js/plugins/ckeditor/ckeditor.js"); ?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/js/plugins/light-autocomplete/light-autocomplete.js"); ?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/js/plugins/jquery-mask-plugin/dist/jquery.mask.min.js"); ?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/js/plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?= base_url("assets/js/plugins/datatables/dataTables.bootstrap4.min.js"); ?>"></script>
    <script src="<?= base_url("assets/js/plugins/currencyFormatter/currencyFormatter.min.js"); ?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/pages/cadastro_venda.js"); ?>" type="text/javascript"></script>
    <link href="<?= base_url("assets/js/plugins/light-autocomplete/css/style.css"); ?>" rel="stylesheet" type="text/css"/>
