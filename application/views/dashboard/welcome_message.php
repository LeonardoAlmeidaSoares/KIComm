<?php 
    function getStatus($codStatus){
        
        $ret = "";
        
        switch($codStatus){
            case STATUS_OS_ABERTA: $ret = "<span class='badge badge-primary'>OS EM ABERTO</span>"; break;
            case STATUS_OS_EM_ANDAMENTO: $ret = "<span class='badge badge-info'>OS EM ANDAMENTO</span>"; break;
            case STATUS_OS_PENDENTE: $ret = "<span class='badge badge-danger'>OS PENDENTE</span>"; break;
            case STATUS_OS_FINALIZADA: $ret = "<span class='badge badge-success'>OS FINALIZADA</span>"; break;
            case STATUS_OS_ARMAZENADA: $ret = "<span class='badge badge-warning'>OS ARMAZENADA</span>"; break;
        }
        return $ret;

    }

?>
<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->

    <div class="content">
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Olá, <?= $_SESSION["msg"]["text"]; ?>
        </div>
        <div class="row invisible" data-toggle="appear">
            <!-- Row #1 -->
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-15 d-none d-sm-block">
                            <i class="si si-bag fa-2x text-primary-light"></i>
                        </div>
                        <div class="font-size-h3 font-w600 text-primary" data-toggle="countTo" data-speed="1000" data-to="<?= $totalVendasMes; ?>"><b><?= $totalVendasMes; ?></b></div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Vendas No Mês</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-15 d-none d-sm-block">
                            <i class="si si-wallet fa-2x text-earth-light"></i>
                        </div>
                        <div class="font-size-h3 font-w600 text-earth"><span data-toggle="countTo" data-speed="1000" data-to="<?= $totalOSs;?>"><?= $totalOSs;?></span></div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Os No Mês</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-15 d-none d-sm-block">
                            <i class="si si-envelope-open fa-2x text-elegance-light"></i>
                        </div>
                        <div class="font-size-h3 font-w600 text-elegance" data-toggle="countTo" data-speed="1000" data-to="<?= $clientesCadastrados;?> "><?= $clientesCadastrados;?></div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Clientes</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-15 d-none d-sm-block">
                            <i class="si si-users fa-2x text-pulse"></i>
                        </div>
                        <div class="font-size-h3 font-w600 text-pulse" data-toggle="countTo" data-speed="1000" data-to="<?= $clientesCadastrados;?>"><?= $clientesCadastrados;?></div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Clientes</div>
                    </div>
                </a>
            </div>
            <!-- END Row #1 -->
        </div>
        <div class="row invisible" data-toggle="appear">
            <!-- Row #2 -->
            <div class="col-md-6">
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default border-b">
                        <h3 class="block-title">
                            Sales <small>This week</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="pull-all pt-50">
                            <!-- Lines Chart Container -->
                            <canvas class="js-chartjs-dashboard-lines"></canvas>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row items-push text-center">
                            <div class="col-6 col-sm-4">
                                <div class="font-w600 text-success">
                                    <i class="fa fa-caret-up"></i> +16%
                                </div>
                                <div class="font-size-h4 font-w600">720</div>
                                <div class="font-size-sm font-w600 text-uppercase text-muted">This Month</div>
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="font-w600 text-danger">
                                    <i class="fa fa-caret-down"></i> -3%
                                </div>
                                <div class="font-size-h4 font-w600">160</div>
                                <div class="font-size-sm font-w600 text-uppercase text-muted">This Week</div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="font-w600 text-success">
                                    <i class="fa fa-caret-up"></i> +9%
                                </div>
                                <div class="font-size-h4 font-w600">24.3</div>
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Average</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default border-b">
                        <h3 class="block-title">
                            Earnings <small>This week</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="pull-all pt-50">
                            <!-- Lines Chart Container -->
                            <canvas class="js-chartjs-dashboard-lines2"></canvas>
                        </div>
                    </div>
                    <div class="block-content bg-white">
                        <div class="row items-push text-center">
                            <div class="col-6 col-sm-4">
                                <div class="font-w600 text-success">
                                    <i class="fa fa-caret-up"></i> +4%
                                </div>
                                <div class="font-size-h4 font-w600">$ 6,540</div>
                                <div class="font-size-sm font-w600 text-uppercase text-muted">This Month</div>
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="font-w600 text-danger">
                                    <i class="fa fa-caret-down"></i> -7%
                                </div>
                                <div class="font-size-h4 font-w600">$ 1,525</div>
                                <div class="font-size-sm font-w600 text-uppercase text-muted">This Week</div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="font-w600 text-success">
                                    <i class="fa fa-caret-up"></i> +35%
                                </div>
                                <div class="font-size-h4 font-w600">$ 9,352</div>
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Balance</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Row #2 -->
        </div>
        <div class="row invisible" data-toggle="appear">
            <!-- Row #3 -->
            <div class="col-md-12">
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default border-b">
                        <h3 class="block-title">Latest Orders</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 100px;">Código</th>
                                    <th>Status</th>
                                    <th class="text-centert d-none d-sm-table-cell">Cliente</th>
                                    <th class="text-centert">Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($ultimas10OS->result() as $item){?>
                                <tr>
                                    <td>
                                        <a class="font-w600" href="be_pages_ecom_order.html"><?= str_pad($item->codOrdemServico, 6, "0", STR_PAD_LEFT);?></a>
                                    </td>
                                    <td>
                                        <?= getStatus($item->status);?>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-center">
                                        <a href="be_pages_ecom_customer.html"><?= $item->cliente;?></a>
                                    </td>
                                    <td class="text-right">
                                        <span class="text-black">R$<?= number_format($item->valorTotal, 2, ",", ".");?></span>
                                    </td>
                                </tr>
                                <?php } ?>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default border-b">
                        <h3 class="block-title">Produtos Mais Vendidos</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th class="d-none d-sm-table-cell" style="width: 100px;">Código</th>
                                    <th>Produto</th>
                                    <th class="text-center">Vendas</th>
                                    <th class="d-none d-sm-table-cell text-center">Estoque</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listagemMaisVendidos->result() as $item) { ?>
                                    <tr>
                                        <td class="d-none d-sm-table-cell">
                                            <a class="font-w600" href="#"><?= str_pad($item->codProduto, 6, "0", STR_PAD_LEFT); ?></a>
                                        </td>
                                        <td>
                                            <a href="#"><?= $item->titulo; ?></a>
                                        </td>
                                        <td class="text-center">
                                            <a class="text-gray-dark" href="#"><?= $item->qtd; ?></a>
                                        </td>
                                        <td class="d-none d-sm-table-cell text-center">
                                            <?php if ($item->estoque <= 3) { ?>
                                                <div class="text-danger">
                                                    <b><?= str_pad($item->estoque, 4, "0", STR_PAD_LEFT); ?></b>
                                                </div>
                                            <?php } else if ($item->estoque <= 10) { ?>
                                                <div class="text-warning">
                                                    <b><?= str_pad($item->estoque, 4, "0", STR_PAD_LEFT); ?></b>
                                                </div>
                                            <?php } else if ($item->estoque <= 30) { ?>
                                                <div class="text-info">
                                                    <b><?= str_pad($item->estoque, 4, "0", STR_PAD_LEFT); ?></b>
                                                </div>
                                            <?php } else { ?>
                                                <div class="text-success">
                                                    <b><?= str_pad($item->estoque, 4, "0", STR_PAD_LEFT); ?></b>
                                                </div>
                                            <?php } ?>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Row #3 -->
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<!-- Codebase Core JS -->
<script src="<?= base_url("assets/js/core/jquery.min.js"); ?>"></script>
<script src="<?= base_url("assets/js/core/popper.min.js"); ?>"></script>
<script src="<?= base_url("assets/js/core/bootstrap.min.js"); ?>"></script>
<script src="<?= base_url("assets/js/core/jquery.slimscroll.min.js"); ?>"></script>
<script src="<?= base_url("assets/js/core/jquery.scrollLock.min.js"); ?>"></script>
<script src="<?= base_url("assets/js/core/jquery.appear.min.js"); ?>"></script>
<script src="<?= base_url("assets/js/core/jquery.countTo.min.js"); ?>"></script>
<script src="<?= base_url("assets/js/core/js.cookie.min.js"); ?>"></script>


<!-- Page JS Plugins -->
<script src="<?= base_url("assets/js/plugins/chartjs/Chart.bundle.min.js"); ?>"></script>

<!-- Page JS Code -->
<script src="<?= base_url("assets/js/pages/be_pages_dashboard.js"); ?>"></script>
</body>
</html>