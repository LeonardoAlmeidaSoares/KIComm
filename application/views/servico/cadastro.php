<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="javascript:void(0)">Cadastros</a>
            <span class="breadcrumb-item active">Cadastro de Serviços</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Serviços <small>Cadastro</small></h3>
            </div>
            <div class="col-md-12">
                <!-- Floating Labels -->
                <div class="block">
                    <div class="block-content">
                        <form id="txtForm" action="<?= base_url("index.php/servico/add"); ?>" method="POST">
                            
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="txtDescricao" name="txtDescricao">
                                        <label for="txtDescricao">Descrição</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="number" class="form-control" id="txtValor" name="txtValor">
                                        <label for="txtValor">Valor</label>
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
    <script src="<?= base_url("assets/js/plugins/jquery-validation/jquery.validate.min.js");?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/pages/cadastro_servico.js");?>" type="text/javascript"></script>
    