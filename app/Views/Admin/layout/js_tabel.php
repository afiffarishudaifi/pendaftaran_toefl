<?php $session = session(); ?>

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
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/datatables.net/jquery.dataTables.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/datatables.net-rowgroup/dataTables.rowGroup.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/datatables.net-scroller/dataTables.scroller.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/datatables.net-responsive/dataTables.responsive.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/asrange/jquery-asRange.min.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/bootbox/bootbox.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/dropify/dropify.min.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/select2/select2.full.min.js"></script>

    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/toastr/toastr.min.js"></script>
    
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
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/datatables.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/dropify.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/select2.js"></script>

    <script src="<?= base_url() ?>/docs/themeforest/base/assets/examples/js/tables/datatable.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/examples/js/uikit/icon.js"></script>
    

    <!-- form -->
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/jquery-placeholder.js"></script>


    <script src="<?= base_url() ?>/docs/tambahan/assets/plugins/parsleyjs/dist/parsley.min.js"></script>
    <script src="<?= base_url() ?>/docs/tambahan/assets/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>/docs/tambahan/assets/plugins/daterangepicker/daterangepicker.js"></script>

    <script type="text/javascript">

        $( document ).ready(function() {
            if ('<?= $session->getFlashdata('sukses'); ?>' != '') {
                toastr.success('<?= $session->getFlashdata('sukses'); ?>')
            } else if ('<?= $session->getFlashdata('gagal'); ?>' != '') {
                toastr.error('<?= $session->getFlashdata('gagal'); ?>')
            }
        });</script>