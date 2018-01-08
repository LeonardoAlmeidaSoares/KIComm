<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="<?= base_url("index.,php/servico");?>">Serviços</a>
            <span class="breadcrumb-item active">Alteração de Serviço</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Serviços <small>Alteração</small><span class="pull-right"><b>ID: <?= str_pad($servico->codServico, 8, "0", STR_PAD_LEFT);?></b></span></h3>
            </div>
            <div class="col-md-12">
                <!-- Floating Labels -->
                <div class="block">
                    <div class="block-content">
                        <form id="txtForm" action="<?= base_url("index.php/servico/update"); ?>" method="POST">
                            
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" value="<?= $servico->descricao;?>" id="txtDescricao" name="txtDescricao">
                                        <label for="txtDescricao">Descrição</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" 
                                        value="<?= number_format($servico->valor, 2,",","."); ?>" id="txtValor" name="txtValor">
                                        <label for="txtValor">Valor</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="hidden" value="<?= $servico->codServico;?>" id="txtCodServico" name="txtCodServico" />
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
    