<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="<?= base_url("index.php/cliente");?>">Clientes</a>
            <span class="breadcrumb-item active">Alteração de Cliente</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Clientes <small>Alteração</small><span class="pull-right"><b>ID: <?= str_pad($cliente->codCliente, 8, "0", STR_PAD_LEFT);?></b></span></h3>
            </div>
            <div class="col-md-12">
                <!-- Floating Labels -->
                <div class="block">
                    <div class="block-content">
                        <form action="<?= base_url("index.php/cliente/update"); ?>" method="POST">
                            <h2 class="content-heading">Dados Pessoais</h2>
                            
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" value="<?= $cliente->nome;?>" id="txtNome" name="txtNome">
                                        <label for="txtNome">Nome Completo</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="email" class="form-control" value="<?= $cliente->email;?>" id="txtEmail" name="txtEmail">
                                        <label for="txtEmail">Email</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" data-mask="000.000.000-00" value="<?= $cliente->cpf;?>" id="txtCpf" name="txtCpf">
                                        <label for="txtCpf">CPF</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" value="<?= $cliente->rg;?>" class="form-control" id="txtRg" name="txtRg">
                                        <label for="txtRg">Identidade</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" value="<?= $cliente->telefone_1;?>" data-mask="(00) 0 0000-0000" id="txtTelefone1" name="txtTelefone1">
                                        <label for="txtTelefone1">Telefone 1:</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" value="<?= $cliente->telefone_2;?>" data-mask="(00) 0 0000-0000" id="txtTelefone2" name="txtTelefone2">
                                        <label for="txtTelefone2">Telefone 2</label>
                                    </div>
                                </div>
                            </div>

                            <h2 class="content-heading">Endereço</h2>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input type="text" value="<?= $cliente->logradouro;?>"  class="form-control" id="txtLogradouro" name="txtLogradouro">
                                        <label for="txtLogradouro">Logradouro</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input type="text" value="<?= $cliente->numero;?>"  class="form-control" id="txtNumero" name="txtNumero">
                                        <label for="txtNumero">Numero</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input type="text" value="<?= $cliente->complemento;?>"  class="form-control" id="txtComplemento" name="txtComplemento">
                                        <label for="txtComplemento">Complemento</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input type="text" value="<?= $cliente->bairro;?>" class="form-control" id="txtBairro" name="txtBairro">
                                        <label for="txtBairro">Bairro</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input type="text" value="<?= $cliente->cep;?>"  class="form-control" data-mask="00.000-000" id="txtCep" name="txtCep">
                                        <label for="txtCep">Cep</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input type="text" value="<?= $cliente->cidade;?>"  class="form-control" id="txtCidade" name="txtCidade">
                                        <label for="txtCidade">Cidade</label>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="hidden" name="txtCodCliente" id="txtCodCliente" value="<?= $cliente->codCliente;?>" />
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