<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="javascript:void(0)">Cadastros</a>
            <span class="breadcrumb-item active">Cadastro de Pagamentos</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Pagamentos <small>Cadastro</small></h3>
            </div>
            <div class="col-md-12">
                <!-- Floating Labels -->
                <div class="block">
                    <div class="block-content">
                        <form id="frmCad" action="<?= base_url("index.php/pagamento/add"); ?>" method="POST">
                            <h2 class="content-heading">Dados Pessoais</h2>
                            
                            <input type="hidden" name="txtPagamentoAVista" id="txtPagamentoAVista" value="0" />
                            <input type="hidden" name="txtcodCliente" id="txtcodCliente" />
                            <input type="hidden" name="txtTipoOrigem" id="txtTipoOrigem" value="<?= $tipoOrigem;?>" />
                            <input type="hidden" name="txtCodOrigem" id="txtCodOrigem" value="<?= (isset($codOrigem)) ?$codOrigem :0;?>"/>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <select class="form-control" id="txtNome" name="txtNome">
                                            <option selected hidden value="0">Selecione o Cliente</option>
                                            <?php foreach($dadosCliente->result() as $item){ ?>
                                                <option value="<?= $item->codCliente;?>"><?= $item->nome;?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="txtNome">Nome do Cliente</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="email" class="form-control" readonly id="txtEmail" name="txtEmail">
                                        <label for="txtEmail">Email</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" readonly data-mask="000.000.000-00" id="txtCpf" name="txtCpf">
                                        <label for="txtCpf">CPF</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" readonly id="txtRg" name="txtRg">
                                        <label for="txtRg">Identidade</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" readonly data-mask="(00) 0 0000-0000" id="txtTelefone1" name="txtTelefone1">
                                        <label for="txtTelefone1">Telefone 1:</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" readonly data-mask="(00) 0 0000-0000" id="txtTelefone2" name="txtTelefone2">
                                        <label for="txtTelefone2">Telefone 2</label>
                                    </div>
                                </div>
                            </div>

                            <h2 class="content-heading">Dados do Pagamento</h2>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="txtVencimento" name="txtVencimento">
                                        <label for="txtVencimento">Data de Vencimento</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="txtValor" name="txtValor">
                                        <label for="txtValor">Valor Total</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="txtDescricao" name="txtDescricao">
                                        <label for="txtDescricao">Descrição</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-alt-primary pull-right btnAction">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Floating Labels -->
            </div>
        </div>
    </div>
    <script src="<?= base_url("assets/js/plugins/jquery-mask-plugin/dist/jquery.mask.min.js");?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/pages/cadastro_pagamento.js");?>" type="text/javascript"></script>