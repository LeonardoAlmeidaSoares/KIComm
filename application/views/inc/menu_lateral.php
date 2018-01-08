
<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="content-header content-header-fullrow px-15">
                <!-- Mini Mode -->
                <div class="content-header-section sidebar-mini-visible-b">
                    <!-- Logo -->
                    <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                        <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                    </span>
                    <!-- END Logo -->
                </div>
                <!-- END Mini Mode -->

                <!-- Normal Mode -->
                <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <!-- END Close Sidebar -->

                    <!-- Logo -->
                    <div class="content-header-item">
                        <a class="link-effect font-w700" href="<?= base_url("index.php/principal/");?>">
                            <i class="si si-fire text-primary"></i>
                            <span class="font-size-xl text-dual-primary-dark">KI</span><span class="font-size-xl text-primary">Comm</span>
                        </a>
                    </div>
                    <!-- END Logo -->
                </div>
                <!-- END Normal Mode -->
            </div>
            <!-- END Side Header -->

            <!-- Side User -->
            <div class="content-side content-side-full content-side-user px-10 align-parent">
                <!-- Visible only in mini mode -->
                <div class="sidebar-mini-visible-b align-v animated fadeIn">
                    <img class="img-avatar img-avatar32" src="<?= base_url("assets/img/avatars/avatar15.jpg");?>" alt="">
                </div>
                <!-- END Visible only in mini mode -->

                <!-- Visible only in normal mode -->
                <div class="sidebar-mini-hidden-b text-center">
                    <a class="img-link" href="be_pages_generic_profile.html">
                        <img class="img-avatar" src="<?= base_url("assets/img/avatars/avatar15.jpg");?>" alt="">
                    </a>
                    <ul class="list-inline mt-10">
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="be_pages_generic_profile.html"><?= $_SESSION["user_data"]->nome;?></a>
                        </li>
                        <li class="list-inline-item">
                            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                            <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                                <i class="si si-drop"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark" href="<?= base_url("index.php/auth/logout");?>">
                                <i class="si si-logout"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Visible only in normal mode -->
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-cup"></i><span class="sidebar-mini-hide">Principal</span></a>
                        <ul>
                            <li>
                                <a href="<?= base_url("index.php/principal/");?>"><span class="fa fa-dashboard"></span> &nbsp;Dashboard</a>
                            </li>
                        </ul>
                    </li>
                     <li >
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-cup"></i><span class="sidebar-mini-hide">Cadastros</span></a>
                        <ul>
                            <li>
                                
                                <a href="<?= base_url("index.php/cliente");?>"><span class="fa fa-users"></span> &nbsp; Clientes</a>
                            </li>
                            <li>
                                <a href="<?= base_url("index.php/produto");?>"><span class="fa fa-chain"></span> &nbsp; Produtos</a>
                            </li>
                            <li>
                                <a href="<?= base_url("index.php/venda");?>"><span class="fa fa-shopping-cart"></span> &nbsp; Vendas</a>
                            </li>
                            <li>
                                <a href="<?= base_url("index.php/servico");?>"><span class="fa fa-puzzle-piece"></span> &nbsp; Serviços</a>
                            </li>
                            <li>
                                <a href="<?= base_url("index.php/ordemServico");?>"><span class="fa fa-cog"></span> &nbsp; Ordem de Serviço</a>
                            </li>
                            <li>
                                <a href="<?= base_url("index.php/pagamento/");?>"><span class="fa fa-money"></span> &nbsp; Pagamentos</a>
                            </li>
                            <li>
                                <a href="<?= base_url("index.php/usuario");?>"><span class="fa fa-vcard-o"></span> &nbsp; Usuários</a>
                            </li>
                        </ul>
                    </li>
                    
                    
                    
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>
<!-- END Sidebar -->
