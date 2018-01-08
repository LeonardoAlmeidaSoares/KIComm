<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="<?= base_url("index.php/usuario/");?>">Usuário</a>
            <span class="breadcrumb-item active">Alteração de Usuário</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Usuarios <small>Alteração</small><span class="pull-right"><b>ID: <?= str_pad($usuario->codUsuario, 8, "0", STR_PAD_LEFT);?></b></span></h3>
            </div>
            <div class="col-md-12">
                <!-- Floating Labels -->
                <div class="block">
                    <div class="block-content">
                        <form id="txtForm" action="<?= base_url("index.php/usuario/update"); ?>" method="POST">
                            
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" value="<?= $usuario->nome;?>" class="form-control" id="txtNome" name="txtNome">
                                        <label for="txtNome">Nome</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="email" value="<?= $usuario->email;?>" class="form-control" id="txtEmail" name="txtEmail">
                                        <label for="txtEmail">Email</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text"  value="<?= $usuario->telefone_1;?>" class="form-control" data-mask="(00) 0 0000-0000" id="txtTelefone1" name="txtTelefone1">
                                        <label for="txtTelefone1">Telefone 1:</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text"  value="<?= $usuario->telefone_2;?>" class="form-control" data-mask="(00) 0 0000-0000" id="txtTelefone2" name="txtTelefone2">
                                        <label for="txtTelefone2">Telefone 2</label>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="hidden" name="txtCodUsuario" id="txtCodUsuario" value="<?= $usuario->codUsuario;?>" />
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
    <script src="<?= base_url("assets/js/plugins/jquery-validation/jquery.validate.min.js");?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/pages/cadastro_usuario.js");?>" type="text/javascript"></script>
    