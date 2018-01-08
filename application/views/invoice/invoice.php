<!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">#<?= str_pad($pagto["codigo"], 8, "0", STR_PAD_LEFT);?></h3>
                            <div class="block-options">
                                <!-- Print Page functionality is initialized in Codebase() -> uiHelperPrint() -->
                                <button type="button" class="btn-block-option" onclick="Codebase.helpers('print-page');">
                                    <i class="si si-printer"></i> Imprimir
                                </button>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <!-- Invoice Info -->
                            <div class="row my-20">
                                <!-- Company Info -->
                                <div class="col-6">
                                    <p class="h3"><?= $empresa->nome;?></p>
                                    <address>
                                        <?= $empresa->logradouro . " " . $empresa->numero;?><br>
                                        <?= $empresa->bairro . ", " . $empresa->cidade . "/" . $empresa->estado;?><br>
                                        <?= $empresa->email;?>
                                    </address>
                                </div>
                                <!-- END Company Info -->

                                <!-- Client Info -->
                                <div class="col-6 text-right">
                                    <p class="h3"><?= $cliente->nome;?></p>
                                    <address>
                                        <?= $cliente->logradouro . " " . $cliente->numero;?><br>
                                        <?= $cliente->bairro . ", " . $cliente->cidade;?><br>
                                        <?= $cliente->email;?>
                                    </address>
                                </div>
                                <!-- END Client Info -->
                            </div>
                            <!-- END Invoice Info -->

                            <!-- Table -->
                            <div class="table-responsive push">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 60px;"></th>
                                            <th>Descrição</th>
                                            <th class="text-center" style="width: 90px;">Qnt</th>
                                            <th class="text-right" style="width: 120px;">Unit</th>
                                            <th class="text-right" style="width: 120px;">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($listaItens->result() as $item){ ?>
                                        <tr>
                                            <td class="text-center"><?= str_pad($item->codProduto, 6, "0", STR_PAD_LEFT);?></td>
                                            <td>
                                                <p class="font-w600 mb-5"><?= $item->titulo;?></p>
                                                <!--div class="text-muted">Logo and business cards design</div-->
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-pill badge-primary"><?= $item->qtd;?></span>
                                            </td>
                                            <td class="text-right">R$<?= number_format($item->valorUnitario, 2, ",", ".");?></td>
                                            <td class="text-right">R$<?= number_format($item->valorAcumulado, 2, ",", ".");?></td>
                                        </tr>
                                        <?php } ?>
                                        <?php if($pagto["desconto"] > 0){?>
                                        <tr>
                                            <td colspan="4" class="font-w600 text-right">SubTotal</td>
                                            <td class="text-right">R$<?= number_format($pagto["total"] + $pagto["desconto"] , 2, ",", ".");?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="font-w600 text-right">Desconto</td>
                                            <td class="text-right">R$<?= number_format($pagto["desconto"] , 2, ",", ".");?></td>
                                        </tr>
                                        <?php } ?>
                                        
                                        <tr class="table-warning">
                                            <td colspan="4" class="font-w700 text-uppercase text-right">Total</td>
                                            <td class="font-w700 text-right">R$<?= number_format($pagto["total"] , 2, ",", ".");?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Table -->

                            <!-- Footer -->
                            <p class="text-muted text-center">
                                <img src="<?= $empresa->logo;?>" />
                            </p>
                            <!-- END Footer -->
                        </div>
                    </div>
                    <!-- END Invoice -->
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-right">
                        Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="https://goo.gl/po9Usv" target="_blank">Codebase 1.3</a> &copy; <span class="js-year-copy">2017</span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->
