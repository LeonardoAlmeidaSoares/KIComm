<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="javascript:void(0)">Pagamentos</a>
            <span class="breadcrumb-item active">Listagem de Pagamentos</span>
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
                            <div class="font-size-h2 font-w700 mb-0 text-info js-count-to-enabled" data-toggle="countTo" data-to="<?= $vencimentosEsseMes;?>"><?= $vencimentosEsseMes;?></div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Vencendo Esse Mês</div>
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
                            <div class="font-size-h2 font-w700 mb-0 text-warning js-count-to-enabled" data-toggle="countTo" data-to="<?= $ContasVencidas;?>"><?= $ContasVencidas;?></div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Vencidas</div>
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
                            <div class="font-size-h2 font-w700 mb-0 text-danger js-count-to-enabled" data-toggle="countTo" data-to="<?= $vencimentosHoje;?>"><?= $vencimentosHoje;?></div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Vencendo Hoje</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Out of Stock -->

            <!-- Add Product -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="<?= base_url("index.php/pagamento/novo");?>">
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
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Novo Pagamento</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Add Product -->
        </div>

        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Pagamentos <small>Listagem</small></h3>
            </div>
            <div class="block-content">
                <table id="table" class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descrição</th>
                            <th>Cliente</th>
                            <th>Data de Vencimento</th>
                            <th>Status</th>
                            <th>Valor</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pagamentos->result() as $item) { ?>
                            <tr>
                                <td><?= str_pad($item->codPagamento, 8, "0", STR_PAD_LEFT); ?></td>
                                <td><?= $item->descricao; ?></td>
                                <td><?= $item->nome; ?></td>
                                <td><?= $item->data; ?></td>
                                <td><?= $item->nome; ?></td>
                                <td>R$ <?= number_format($item->valor, 2, ',', '.'); ?></td>
                                <td>
                                    <a href="<?= base_url("index.php/pagamento/pagamentoCompra/$item->codPagamento");?>"><span class="fa fa-2x fa-credit-card"></span></a>
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