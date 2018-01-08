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
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="javascript:void(0)">Cadastros</a>
            <span class="breadcrumb-item active">Listagem de Ordens de Serviço</span>
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
                            <div class="font-size-h2 font-w700 mb-0 text-info js-count-to-enabled" data-toggle="countTo" data-to="<?= $nao_finalizadas;?>"><?= $nao_finalizadas;?></div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">OS Abertas</div>
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
                            <div class="font-size-h2 font-w700 mb-0 text-warning js-count-to-enabled" data-toggle="countTo" data-to="<?= $vencendo_hj?>"><?= $vencendo_hj;?></div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Vencendo Hoje</div>
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
                            <div class="font-size-h2 font-w700 mb-0 text-danger js-count-to-enabled" data-toggle="countTo" data-to="<?= $pendentes;?>"><?= $pendentes;?></div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">OS com Pendencia</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Out of Stock -->

            <!-- Add Product -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="<?= base_url("index.php/ordemservico/novo");?>">
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
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Nova Ordem de Serviço</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Add Product -->
        </div>

        
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Ordem de Serviço <small>Listagem</small></h3>
            </div>
            <div class="block-content">
                <table id="table" class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Funcionario</th>
                            <th>Previsão de Entrega</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ordens->result() as $item) { ?>
                            <tr>
                                <td><?= str_pad($item->codOrdemServico, 8, "0", STR_PAD_LEFT);?></td>
                                <td><?= $item->cliente; ?></td>
                                <td><?= $item->funcionario; ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($item->dataPrevisao)); ?></td>
                                <td><?= getStatus($item->status); ?></td>
                                <td>
                                    <a href="<?= base_url("index.php/pagamento/pagamentoOS/$item->codOrdemServico");?>"><span class="fa fa-credit-card"></span></a>
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
<script src="<?= base_url("assets/js/plugins/datatables/dataTables.bootstrap4.min.js");?>"></script>
<script src="<?= base_url("assets/pages/listagem_clientes.js");?>"></script>