<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="javascript:void(0)">Cadastros</a>
            <span class="breadcrumb-item active">Cadastro de Ordem de Serviço</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title"> Ordem de Serviço <small>Cadastro</small></h3>
            </div>
            <div class="col-md-12">
                <!-- Floating Labels -->
                <div class="block-content">
                    <!-- Form -->
                    <form action="<?= base_url("index.php/ordemservico/add");?>" method="post">
                        <fieldset>
                            <legend><span class="si si-note"></span>&nbsp;Dados da OS</legend>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <div class="form-material">
                                                <label for="material-text">Cliente</label>
                                                <select class="form-control" id="txtCodCliente" name="txtCodCliente">
                                                    <option hidden selected>Selecione o Cliente</option>
                                                    <?php foreach ($listagemClientes->result() as $item) { ?>
                                                        <option value="<?= $item->codCliente; ?>"><?= $item->nome; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-material form-group">
                                                <label for="material-text">Entrada</label>
                                                    <input  id="txtEntrada" name="txtEntrada" type='text' class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-material">
                                                <label for="material-text">Previsao de Saída</label>
                                                <input type="text"  id="txtPrevisaoSaida" class="form-control" name="txtPrevisaoSaida">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-material">
                                                <label for="material-text">Situação</label>
                                                <select class="form-control" id="txtSituacao" name="txtSituacao">
                                                    <option value="<?= STATUS_OS_ABERTA; ?>">ABERTA</option>
                                                    <option value="<?= STATUS_OS_EM_ANDAMENTO; ?>">EM ANDAMENTO</option>
                                                    <option value="<?= STATUS_OS_PENDENTE; ?>">PENDENTE</option>
                                                    <option value="<?= STATUS_OS_FINALIZADA; ?>">RESOLVIDA</option>
                                                    <option value="<?= STATUS_OS_ARMAZENADA; ?>">ARMAZENADA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend><span class="si si-grid"></span>&nbsp;Dados do Serviço</legend>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="form-material">
                                                <label for="material-text">Serviço Prestado</label>
                                                <select class="form-control" id="txtCodServico" name="txtCodServico">
                                                    <option hidden selected>Selecione o Serviço</option>
                                                    <?php foreach ($listagemServicos->result() as $item) { ?>
                                                        <option value="<?= $item->codServico; ?>"><?= $item->descricao; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-material">
                                                <label for="material-text">Valor Padrão do Serviço</label>
                                                <input type='text' readonly name='txtValorServico' id="txtValorServico" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class='col-md-12'>
                                            <div class="form-material">
                                                <label for="material-text">Diagnóstico</label>
                                                <textarea id='txtDiagnostico' name='txtDiagnostico'></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                         <fieldset>
                            <legend><span class="si si-settings"></span>&nbsp;Produtos Utilizados</legend>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="form-material">
                                                <label for="material-text">Produto Utilizado</label>
                                                <select class="form-control" id="txtCodProduto" name="txtCodProduto">
                                                    <option hidden selected>Selecione O Produto</option>
                                                    <?php foreach ($listagemProdutos->result() as $item) { ?>
                                                        <option value="<?= $item->codProduto; ?>"><?= $item->titulo; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-material">
                                                <label for="material-text">Valor Padrão do Produto</label>
                                                <input type='text' readonly name='txtValorProduto' id="txtValorProduto" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <fieldset>
                            <legend><span class="si si-user"></span>&nbsp;Dados do Funcionário</legend>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="form-material">
                                                <label for="material-text">Funcionário Responsável</label>
                                                <select class="form-control" id="txtCodFuncionario" name="txtCodFuncionario">
                                                    <option hidden selected >Selecione o funcionário</option>
                                                    <?php foreach ($listagemFuncionarios->result() as $item) { ?>
                                                        <option value="<?= $item->codUsuario; ?>"><?= $item->nome; ?></option>
                                                    <?php } ?>  
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-material" id="listaServicoAFazer">
                                                <table id="tblPendencias" class="table table-responsive table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Código</th>
                                                            <th>Cliente</th>
                                                            <th>Data de Previsao</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <br><Br>
                                </div>
                            </div>

                        </fieldset>
                        <fieldset>
                            <legend>
                                <span class="si si-speech"></span> &nbsp;Anotações Internas
                            </legend>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <label for="material-text">Anotações Internas</label>
                                                <textarea id='txtObs' name='txtObs'></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend><span class="si si-credit-card"></span>&nbsp;Dados do Pagamento</legend>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <div class="form-material">
                                                <label for="material-text">Valor do Serviço</label>
                                                <input type="text" name="txtValorFinalServico" id="txtValorFinalServico" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-material">
                                                <label for="material-text">Valor Produtos Utilizados</label>
                                                <input type='text' name='txtValorFinalProduto' id="txtValorFinalProduto" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-material">
                                                <label for="material-text">Valor do Desconto</label>
                                                <input type="text" name="txtValorFinalDesconto" id="txtValorFinalDesconto" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-material">
                                                <label for="material-text">Valor Total</label>
                                                <input type="text" name="txtValorFinal" id="txtValorFinal" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br><Br>
                        <div>
                            <input type="hidden" id="txtValorTotal" name="txtValorTotal" />
                            <input type="submit" class="pull-right btn btn-success" />
                        </div>

                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<link rel="stylesheet" type="text/css"  href="<?= base_url("assets/js/plugins/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css");?>" />
<script src="<?= base_url("assets/js/plugins/currencyFormatter/currencyFormatter.min.js"); ?>" type="text/javascript"></script>
<script src="<?= base_url("assets/js/plugins/ckeditor/ckeditor.js"); ?>" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/locale/pt-br.js" type="text/javascript"></script>
<script src="<?= base_url("assets/js/plugins/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"); ?>" type="text/javascript"></script>
<script src="<?= base_url("assets/pages/cadastro_os.js"); ?>" type="text/javascript"></script>

<style>
    fieldset{
        background-color: rgba(52, 58, 64, 0.06);
        padding: 10px;
        border-radius: 15px;
        margin-top: 15px;
    }
</style>