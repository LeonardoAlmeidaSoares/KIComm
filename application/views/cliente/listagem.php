<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="javascript:void(0)">Cadastros</a>
            <span class="breadcrumb-item active">Listagem de Clientes</span>
        </nav>

        <div class="row gutters-tiny">
            <!-- All Products -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-circle-o fa-2x text-info-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-info js-count-to-enabled" data-toggle="countTo" data-to="<?= $numClientes;?>"><?= $numClientes;?></div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Todos Os Clientes</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END All Products -->

            <!-- Top Sellers -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-star fa-2x text-warning-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-warning js-count-to-enabled" data-toggle="countTo" data-to="<?= $clientes_com_debito;?>"><?= $clientes_com_debito;?></div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Clientes com Débito</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Top Sellers -->

            <!-- Out of Stock -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-warning fa-2x text-danger-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-danger js-count-to-enabled" data-toggle="countTo" data-to="<?= $numClientesProibido;?>"><?= $numClientesProibido;?></div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Lista Negra</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Out of Stock -->

            <!-- Add Product -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="<?= base_url("index.php/cliente/novo");?>">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-archive fa-2x text-success-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-success">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Novo Cliente</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Add Product -->
        </div>

        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Clientes <small>Listagem</small></h3>
            </div>
            <div class="block-content">
                <table id="table" class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes->result() as $item) { ?>
                            <tr>
                                <td><?= str_pad($item->codCliente, 8, "0", STR_PAD_LEFT); ?></td>
                                <td><?= $item->nome; ?></td>
                                <td><?= $item->telefone_1; ?></td>
                                <td>
                                    <a href="<?= base_url("index.php/cliente/edit/$item->codCliente");?>"><span class="fa fa-edit fa-2x btnEditCss"></span></a>
                                    <a href="#" cod="<?= $item->codCliente;?>" id="btnRemove"><span class="fa fa-remove fa-2x btnRemoveCss"></span></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<!-- Page JS Plugins -->
<script src="<?= base_url("assets/js/plugins/datatables/jquery.dataTables.js"); ?>"></script>
<script src="<?= base_url("assets/js/plugins/datatables/dataTables.bootstrap4.min.js"); ?>"></script>
<script src="<?= base_url("assets/pages/listagem_clientes.js"); ?>"></script>