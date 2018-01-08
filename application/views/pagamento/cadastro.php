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
                        <form action="<?= base_url("index.php/pagamento/add"); ?>" method="POST">
                            <h2 class="content-heading">Dados Pessoais</h2>
                            
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="txtNome" name="txtNome">
                                        <label for="txtNome">Nome Completo</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="email" class="form-control" id="txtEmail" name="txtEmail">
                                        <label for="txtEmail">Email</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" data-mask="000.000.000-00" id="txtCpf" name="txtCpf">
                                        <label for="txtCpf">CPF</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="txtRg" name="txtRg">
                                        <label for="txtRg">Identidade</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" data-mask="(00) 0 0000-0000" id="txtTelefone1" name="txtTelefone1">
                                        <label for="txtTelefone1">Telefone 1:</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" data-mask="(00) 0 0000-0000" id="txtTelefone2" name="txtTelefone2">
                                        <label for="txtTelefone2">Telefone 2</label>
                                    </div>
                                </div>
                            </div>

                            <h2 class="content-heading">Endereço</h2>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="txtLogradouro" name="txtLogradouro">
                                        <label for="txtLogradouro">Logradouro</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="txtNumero" name="txtNumero">
                                        <label for="txtNumero">Numero</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="txtComplemento" name="txtComplemento">
                                        <label for="txtComplemento">Complemento</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="txtBairro" name="txtBairro">
                                        <label for="txtBairro">Bairro</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input type="text" class="form-control" data-mask="00.000-000" id="txtCep" name="txtCep">
                                        <label for="txtCep">Cep</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="txtCidade" name="txtCidade">
                                        <label for="txtCidade">Cidade</label>
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
