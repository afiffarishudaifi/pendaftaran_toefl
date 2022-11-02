<?php $session = session(); ?>
    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
            data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
            </button>
            <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
            data-toggle="collapse">
            <i class="icon md-more" aria-hidden="true"></i>
            </button>
            <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
            <span class="navbar-brand-text hidden-xs-down"> Pendaftaran Toefl Unipma</span>
            </div>
            <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
            data-toggle="collapse">
            <span class="sr-only">Toggle Search</span>
            <i class="icon md-search" aria-hidden="true"></i>
            </button>
        </div>
        
        <div class="navbar-container container-fluid">
            <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->
            <ul class="nav navbar-toolbar">
                <li class="nav-item hidden-float" id="toggleMenubar">
                <a class="nav-link" data-toggle="menubar" href="#" role="button">
                    <i class="icon hamburger hamburger-arrow-left">
                    <span class="sr-only">Toggle menubar</span>
                    <span class="hamburger-bar"></span>
                    </i>
                </a>
                </li>
                <li class="nav-item hidden-sm-down" id="toggleFullscreen">
                <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                    <span class="sr-only">Toggle fullscreen</span>
                </a>
                </li>
                <li class="nav-item hidden-sm-down">
                <h3>
                </h3>
                </li>
            </ul>
            <!-- End Navbar Toolbar -->
        
            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="nav-item dropdown">
                <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                    data-animation="scale-up" role="button">
                    <span class="avatar avatar-online">
                    <img src="<?= base_url() ?>/docs/themeforest/base/assets/images/favicon.ico" alt="...">
                    <i></i>
                    </span>
                </a>
                <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" disabled href="javascript:void(0)" role="menuitem"><center><b><?= $session->get('nama_login'); ?></b></center></a>
                    <a class="dropdown-item" href="<?= base_url('Admin/Pengaturan'); ?>" role="menuitem"><i class="icon md-settings" aria-hidden="true"></i> Pengaturan</a>
                    <div class="dropdown-divider" role="presentation"></div>
                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#logoutModal" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Keluar</a>
                </div>
                </li>
            </ul>
            <!-- End Navbar Toolbar Right -->
            </div>
            <!-- End Navbar Collapse -->
        </div>
    </nav>  

    <!-- begin modal logout -->
    <div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><i class="fa fa-question-circle"></i> Apakah anda yakin ingin keluar? <br /></p>
                <div class="actionsBtns">
                    <center>
                        <a href="<?php echo base_url('Login/logout'); ?>" class="btn btn-danger">Keluar</a>
                        <button class="btn btn-default" data-dismiss="modal">Batal</button>
                    </center>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- end modal logout -->
