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
                <div class="block">
                    <div class="block-content">
                        <div class="col-md-12">
                            <!-- Progress Wizard 2 -->
                            <div class="js-wizard-simple block">
                                <!-- Wizard Progress Bar -->
                                <div class="progress rounded-0" data-wizard="progress">
                                    <div id="pBar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 14.4%; height: 8px;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!-- END Wizard Progress Bar -->

                                <!-- Form -->
                                <form action="#" method="post">
                                    <div class="navbar">
                                        <div class="navbar-inner">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <a class="itemTab" href="#tabDadosGerais" id="tab1" data-toggle="tab">
                                                            Dados do Serviço
                                                        </a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a class="itemTab" href="#tabServico" id="tab2" data-toggle="tab">
                                                            Serviço
                                                        </a>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <a class="itemTab" href="#tabPagto" id="tab3" data-toggle="tab">
                                                            Pagamento
                                                        </a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a class="itemTab" href="#tabResponsavel" id="tab4" data-toggle="tab">
                                                            Reponsável
                                                        </a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a class="itemTab" href="#tabObs" id="tab5" data-toggle="tab">
                                                            Observações
                                                        </a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a class="itemTab" href="#tabFim" id="tab6" data-toggle="tab">
                                                            Finalização
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <center><img src="<?= base_url("assets/img/contrato.png"); ?>" /></center>
                                        </div>
                                        <div class="tab-pane" id="tabDadosGerais" style="margin-top: 20px">
                                            <fieldset>
                                                <legend>Dados da OS</legend>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="block">
                                                            <div class="block-content">
                                                                <div class="form-group row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-material">
                                                                            <label for="material-text">Cliente</label>
                                                                            <select class="form-control" id="txtCodCliente" name="txtCodCliente">
                                                                                <?php foreach ($listagemClientes->result() as $item) { ?>
                                                                                    <option vlaue="<?= $item->codCliente; ?>"><?= $item->nome; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-material">
                                                                            <label for="material-text">Entrada</label>
                                                                            <input type="text"  id="txtEntrada" class="form-control" name="txtEntrada">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-material">
                                                                            <label for="material-text">Previsao de Saída</label>
                                                                            <input type="text"  id="txtPrevisao" class="form-control" name="txtPrevisao">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
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
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="tab-pane" id="tabServico" style="margin-top: 20px">
                                            <fieldset>
                                                <legend>Dados do Serviço</legend>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="block">
                                                            <div class="block-content">
                                                                <div class="form-group row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-material">
                                                                            <label for="material-text">Serviço Prestado</label>
                                                                            <select class="form-control" id="txtCodServico" name="txtCodServico">
                                                                                <?php foreach ($listagemServicos->result() as $item) { ?>
                                                                                    <option vlaue="<?= $item->codServico; ?>"><?= $item->descricao; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-material">
                                                                            <label for="material-text">Valor Padrão do Serviço</label>
                                                                            <input type='text' disabled name='txtValorServico' id="txtValorServico" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class='col-md-12'>
                                                                            <div class="form-material">
                                                                                <textarea id='txtObsServico' name='txtObsServico'>Informações para o técnico</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="tab-pane" id="tabPagto" style="margin-top: 20px">
                                            Pagamento
                                        </div>
                                        <div class="tab-pane" id="tabResponsavel" style="margin-top: 20px">
                                            <fieldset>
                                                <legend>Dados do Serviço</legend>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="block">
                                                            <div class="block-content">
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="tab-pane" id="tabObs" style="margin-top: 20px">
                                            <fieldset>
                                                <legend>Anotações Internas</legend>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="block">
                                                            <div class="block-content">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-material">
                                                                            <label for="material-text">Anotações Internas</label>
                                                                            <textarea id='txtObsServico' name='txtObs'></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="tab-pane" id="tabFim" style="margin-top: 20px">
                                            Finalizar
                                        </div>

                                        <hr class='hr' />

                                        <div class="wizardFooter">
                                            <div class='left-side'>
                                                <a href="#" class='first btn btn-info'>Primeiro</a>
                                                <a class="previous btn btn-info" href="#">Anterior</a>
                                            </div>
                                            <div class='right-side'>
                                                <a class="next btn btn-info" href="#">Próximo</a>
                                                <a class="last btn btn-info" href="#">Último</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?= base_url("assets/js/plugins/ckeditor/ckeditor.js"); ?>" type="text/javascript"></script>
<script src="<?= base_url("assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"); ?>" type="text/javascript"></script>
<script src="<?= base_url("assets/pages/cadastro_os.js"); ?>" type="text/javascript"></script>

<style>
    .wizardFooter a {
        width: 120px;
    }
    .left-side{
        width: 50%;
        float:left;
    }
    .right-side{
        text-align: right;
        width: 50%;
        float:right;
    }
</style>