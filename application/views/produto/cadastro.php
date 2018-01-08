
<!-- Main Container -->
<main id="main-container">
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('assets/img/photos/photo8@2x.jpg');">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10 escreve_nome" id="lblNomeProduto"></h1>
                    <!--h2 class="h4 font-w400 text-white-op mb-0">In <a class="text-primary-light link-effect" href="#">video game</a> category.</h2-->
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Breadcrumb -->
    <div class="bg-body-light border-b">
        <div class="content py-5 text-center">
            <nav class="breadcrumb bg-body-light mb-0">
                <a class="breadcrumb-item" href="be_pages_ecom_dashboard.html">Cadastro</a>
                <a class="breadcrumb-item" href="be_pages_ecom_products.html">Produtos</a>
                <span class="breadcrumb-item active escreve_nome" id="spnNomeProduto"></span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <!-- Overview -->
        <?php if (!$cadastro) { ?>}
            <h2 class="content-heading">Overview</h2>
            <div class="row gutters-tiny">
                <div class="col-md-6 col-xl-4">
                    <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                        <div class="block-content block-content-full block-sticky-options">
                            <div class="block-options">
                                <div class="block-options-item">
                                    <i class="fa fa-shopping-basket fa-2x text-info-light"></i>
                                </div>
                            </div>
                            <div class="py-20 text-center">
                                <div class="font-size-h2 font-w700 mb-0 text-info" data-toggle="countTo" data-to="39">0</div>
                                <div class="font-size-sm font-w600 text-uppercase text-muted">In Orders</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-xl-4">
                    <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                        <div class="block-content block-content-full block-sticky-options">
                            <div class="block-options">
                                <div class="block-options-item">
                                    <i class="fa fa-check fa-2x text-success-light"></i>
                                </div>
                            </div>
                            <div class="py-20 text-center">
                                <div class="font-size-h2 font-w700 mb-0 text-success" data-toggle="countTo" data-to="85">0</div>
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Stock</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4">
                    <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                        <div class="block-content block-content-full block-sticky-options">
                            <div class="block-options">
                                <div class="block-options-item">
                                    <i class="fa fa-archive fa-2x text-danger-light"></i>
                                </div>
                            </div>
                            <div class="py-20 text-center">
                                <div class="font-size-h2 font-w700 mb-0 text-danger">
                                    <i class="fa fa-times"></i>
                                </div>
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Delete Product</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- END Overview -->
        <?php } ?>
        <!-- Update Product -->
        <h2 class="content-heading">Dados do Produto</h2>
        <div class="row gutters-tiny">
            <!-- Basic Info -->
            <form action="<?= base_url("index.php/produto/add"); ?>" method="POST">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="block block-rounded block-themed">
                                <div class="block-header bg-gd-primary">
                                    <h3 class="block-title">Informações Básicas</h3>
                                    <?php if (!$cadastro) { ?>
                                        <div class="block-options">
                                            <button type="submit" class="btn btn-sm btn-alt-primary">
                                                <i class="fa fa-save mr-5"></i>Salvar
                                            </button>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="form-group row">
                                        <label class="col-12">Código</label>
                                        <div class="col-12">
                                            <div class="form-control-plaintext" id="idProduto"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12" for="ecom-product-name">Nome</label>
                                        <div class="col-12">
                                            <input type="text" class="form-control" id="txtNomeProduto" name="txtNomeProduto" placeholder="Nome do produto" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12" for="example-select2">Categoria</label>
                                        <div class="col-12">
                                            <select class="categoria form-control" id="txtCodCategoria" name="txtCodCategoria" style="width: 100%;" data-placeholder="Selecione Uma Categoria">
                                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                <?php foreach ($categorias->result() as $item) { ?>}
                                                    <option value="<?= $item->codCategoria; ?>"><?= $item->descricao; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12">Descrição</label>
                                        <div class="col-12">
                                            <textarea class="form-control" id="txtDescricao" name="txtDescricao" placeholder="Descricao do Produto" rows="8"></textarea>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- END Basic Info -->

                        <!-- More Options -->
                        <div class="col-md-5">
                            <!-- Status -->
                            <div class="block block-rounded block-themed">
                                <div class="block-header bg-gd-primary">
                                    <h3 class="block-title">Status</h3>
                                    <?php if (!$cadastro) { ?>
                                        <div class="block-options">
                                            <button type="submit" class="btn btn-sm btn-alt-primary">
                                                <i class="fa fa-save mr-5"></i>Salvar
                                            </button>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="form-group row">
                                        <label class="col-12">Condição</label>
                                        <div class="col-12">
                                            <label class="css-control css-control-primary css-radio">
                                                <input type="radio" class="css-control-input" value='1' id="ecom-product-condition-new" name="txtCondicao" checked>
                                                <span class="css-control-indicator"></span> Novo
                                            </label>
                                            <label class="css-control css-control-secondary css-radio">
                                                <input type="radio" class="css-control-input" value="0" id="ecom-product-condition-old" name="txtCondicao">
                                                <span class="css-control-indicator"></span> Usado
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-12">Estoque Mínimo</label>
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-fw fa-usd"></i>
                                                </span>
                                                <input type="text" class="form-control" id="txtMinimo" name="txtMinimo" placeholder="Estoque Mínimo" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-12">Disponível para Venda</label>
                                        <div class="col-12">
                                            <label class="css-control css-control-success css-switch">
                                                <input type="checkbox" class="css-control-input" id="ecom-product-published" name="txtStatus" checked>
                                                <span class="css-control-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Status -->

                            <!-- Status -->
                            <div class="block block-rounded block-themed">
                                <div class="block-header bg-gd-primary">
                                    <h3 class="block-title">Valores</h3>
                                    <?php if (!$cadastro) { ?>
                                        <div class="block-options">
                                            <button type="submit" class="btn btn-sm btn-alt-primary">
                                                <i class="fa fa-save mr-5"></i>Salvar
                                            </button>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="block-content block-content-full">

                                    <div class="form-group row">
                                        <label class="col-12" for="ecom-product-stock">Estoque</label>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-fw fa-archive"></i>
                                                </span>
                                                <input type="text" class="form-control" id="txtEstoque" name="txtEstoque" placeholder="0" value="">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-fw fa-usd"></i>
                                                </span>
                                                <input type="text" class="form-control" id="txtValor" name="txtValor" placeholder="Valor" value="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                            <input type="submit" class="btn btn-info btnAction" />
                            
                        </div>
                    </div>
                </div>
            </form>
            <!-- END More Options -->
        </div>
        <!-- END Update Product -->
    </div>
    <!-- END Page Content -->
    <link rel="stylesheet" href="<?= base_url("assets/js/plugins/select2/select2.min.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/js/plugins/select2/select2-bootstrap.min.css"); ?>">
    <script src="<?= base_url("assets/js/plugins/select2/select2.full.min.js"); ?>"></script>
    <script src="<?= base_url("assets/js/plugins/ckeditor/ckeditor.js"); ?>"></script>
    <script src="<?= base_url("assets/pages/cadastro_produto.js"); ?>"></script>

