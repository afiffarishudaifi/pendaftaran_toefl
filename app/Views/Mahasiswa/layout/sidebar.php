<?php
$uri = service('uri');
// $session = session();
?>
<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <ul class="site-menu" data-plugin="menu">
            <li class="site-menu-category">General</li>
            <li class="site-menu-item <?php
                                        if ($uri->getSegment(2) == 'Dashboard') {
                                        echo "active";
                                        } ?>">
                <a class="animsition-link" href="<?= base_url('Mahasiswa/Dashboard'); ?>">
                <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Dashboard</span>
                </a>
            </li>
            <li class="site-menu-category">Kegiatan Toefl</li>
            <li class="site-menu-item has-sub <?php
                                                if ($uri->getSegment(2) == 'Test') {
                                                echo "active";
                                                } ?>">
                <a href="<?= base_url('Mahasiswa/Test'); ?>">
                <i class="site-menu-icon md-notifications" aria-hidden="true"></i>
                <span class="site-menu-title">Jadwal Test</span>
                </a>
            </li>
            <li class="site-menu-item has-sub <?php
                                                if ($uri->getSegment(2) == 'RiwayatTest') {
                                                echo "active";
                                                } ?>">
                <a href="<?= base_url('Mahasiswa/RiwayatTest'); ?>">
                <i class="site-menu-icon md-border-color" aria-hidden="true"></i>
                <span class="site-menu-title">Riwayat Toefl</span>
                </a>
            </li>
            </ul>
        </div>
    </div>
</div>
