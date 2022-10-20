<?php
$uri = service('uri');
$session = session();
?>
<div class="site-menubar">
  <div class="site-menubar-body">
    <div>
      <div>
        <ul class="site-menu" data-plugin="menu">
          <li class="site-menu-category">General</li>
          <li class="site-menu-item <?php
                                    if ($uri->getSegment(2) == 'Dashboard') {
                                      echo "active";
                                    } ?>">
            <a class="animsition-link" href="<?= base_url('Admin/Dashboard'); ?>">
              <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
              <span class="site-menu-title">Dashboard</span>
            </a>
          </li>
          <li class="site-menu-item has-sub <?php
                                            if (
                                              $uri->getSegment(2) == 'Admin' ||
                                              $uri->getSegment(2) == 'Pendaftar' || $uri->getSegment(2) == 'Periode' ||
                                              $uri->getSegment(2) == 'Jenis' ||  $uri->getSegment(2) == 'Jadwal'
                                            ) {
                                              echo "active";
                                            } ?>">
            <a href="javascript:void(0)">
              <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
              <span class="site-menu-title">Data Master</span>
              <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item <?php
                                        if ($uri->getSegment(2) == 'Admin') {
                                          echo "active";
                                        } ?>">
                <a class="animsition-link" href="<?= base_url('Admin/Admin'); ?>">
                  <span class="site-menu-title">Admin</span>
                </a>
              </li>
              <li class="site-menu-item <?php
                                        if ($uri->getSegment(2) == 'Pendaftar') {
                                          echo "active";
                                        } ?>">
                <a class="animsition-link" href="<?= base_url('Admin/Pendaftar'); ?>">
                  <span class="site-menu-title">Pendaftar</span>
                </a>
              </li>
              <li class="site-menu-item <?php
                                        if ($uri->getSegment(2) == 'Periode') {
                                          echo "active";
                                        } ?>">
                <a class="animsition-link" href="<?= base_url('Admin/Periode'); ?>">
                  <span class="site-menu-title">Periode</span>
                </a>
              </li>
              <li class="site-menu-item <?php
                                        if ($uri->getSegment(2) == 'Jenis') {
                                          echo "active";
                                        } ?>">
                <a class="animsition-link" href="<?= base_url('Admin/Jenis'); ?>">
                  <span class="site-menu-title">Jenis</span>
                </a>
              </li>
              <li class="site-menu-item <?php
                                        if ($uri->getSegment(2) == 'Jadwal') {
                                          echo "active";
                                        } ?>">
                <a class="animsition-link" href="<?= base_url('Admin/Jadwal'); ?>">
                  <span class="site-menu-title">Jadwal Ujian</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="site-menu-category">Kegiatan Pendaftaran</li>
          <li class="site-menu-item has-sub <?php
                                            if ($uri->getSegment(2) == 'Test') {
                                              echo "active";
                                            } ?>">
            <a href="<?= base_url('Admin/Test'); ?>">
              <i class="site-menu-icon md-calendar" aria-hidden="true"></i>
              <span class="site-menu-title">Jadwal Toefl</span>
            </a>
          </li>
          <li class="site-menu-item has-sub <?php
                                            if ($uri->getSegment(2) == 'RiwayatTest') {
                                              echo "active";
                                            } ?>">
            <a href="<?= base_url('Admin/RiwayatTest'); ?>">
              <i class="site-menu-icon md-border-color" aria-hidden="true"></i>
              <span class="site-menu-title">Riwayat Toefl</span>
            </a>
          </li>
          <li class="site-menu-category">LAPORAN</li>
          <li class="site-menu-item has-sub <?php
                                            if (
                                              $uri->getSegment(2) == 'LaporanToefl'
                                            ) {
                                              echo "active";
                                            } ?>">
            <a href="javascript:void(0)">
              <i class="site-menu-icon md-assignment" aria-hidden="true"></i>
              <span class="site-menu-title">Laporan</span>
              <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item <?php
                                        if ($uri->getSegment(2) == 'LaporanToefl') {
                                          echo "active";
                                        } ?>">
                <a class="animsition-link" href="<?= base_url('Admin/LaporanToefl'); ?>">
                  <span class="site-menu-title">Pelaksanaan Toefl</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
