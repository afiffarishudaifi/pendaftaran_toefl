
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap material admin template">
    <meta name="author" content="">
    
    <title>Pendaftaran Toefl</title>
    
    <link rel="apple-touch-icon" href="<?= base_url() ?>/docs/themeforest/base/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="<?= base_url() ?>/docs/themeforest/base/assets/images/favicon.ico">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/base/assets/css/site.min.css">
    
    <!-- Plugins -->
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/waves/waves.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/chartist/chartist.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/base/assets/examples/css/dashboard/v1.css">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/fonts/material-design/material-design.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    
    <!-- Scripts -->
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
      Breakpoints();
    </script>
  </head>
  <body class="animsition dashboard">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    
    <?= $this->include("Mahasiswa/layout/nav") ?>  

    <?= $this->include("Mahasiswa/layout/sidebar") ?>  

    <!-- Page -->
    <div class="page">
      <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
          <div class="col-xxl-12 col-lg-12">
            <center>
              <img src="<?= base_url() ?>/docs/img/img_logo/logokab.gif" width="150" height="150">
              <br>
                <h3>
                  Selamat Datang di Pendaftaran Toefl<br>
                  Universitas PGRI Madiun
                </h3>
            </center>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page -->


    <!-- Footer -->
    <?= $this->include("Mahasiswa/layout/footer") ?>
    
    <!-- Core  -->
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/popper-js/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/bootstrap/bootstrap.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/animsition/animsition.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/asscrollable/jquery-asScrollable.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/waves/waves.js"></script>
    
    <!-- Plugins -->
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/switchery/switchery.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/intro-js/intro.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/screenfull/screenfull.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/slidepanel/jquery-slidePanel.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/chartist/chartist.min.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/matchheight/jquery.matchHeight-min.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/peity/jquery.peity.min.js"></script>
    
    <!-- Scripts -->
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Component.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Base.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Config.js"></script>
    
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Section/Menubar.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Section/GridMenu.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Section/Sidebar.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Section/PageAside.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Plugin/menu.js"></script>
    
    <script src="<?= base_url() ?>/docs/themeforest/global/js/config/colors.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/config/tour.js"></script>
    <script>Config.set('assets', '<?= base_url() ?>/docs/themeforest/base/assets');</script>
    
    <!-- Page -->
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Site.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/asscrollable.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/slidepanel.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/switchery.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/matchheight.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/jvectormap.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/peity.js"></script>

    <script src="<?= base_url() ?>/docs/themeforest/base/assets/examples/js/dashboard/v1.js"></script>
    
  </body>
</html>
