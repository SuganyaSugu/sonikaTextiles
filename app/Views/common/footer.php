
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?= base_url('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/extra-libs/sparkline/sparkline.js');?>"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('dist/js/waves.js');?>"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('dist/js/sidebarmenu.js');?>"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('dist/js/custom.min.js');?>"></script>
    <!--This page JavaScript -->
    <script src="<?= base_url('dist/js/pages/dashboards/dashboard1.js');?>"></script>
    <!-- Charts js Files -->
    <script src="<?= base_url('assets/libs/flot/excanvas.js');?>"></script>
    <script src="<?= base_url('assets/libs/flot/jquery.flot.js');?>"></script>
    <script src="<?= base_url('assets/libs/flot/jquery.flot.pie.js');?>"></script>
    <script src="<?= base_url('assets/libs/flot/jquery.flot.time.js');?>"></script>
    <script src="<?= base_url('assets/libs/flot/jquery.flot.stack.js');?>"></script>
    <script src="<?= base_url('assets/libs/flot/jquery.flot.crosshair.js');?>"></script>
    <script src="<?= base_url('assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js');?>"></script>
    <script src="<?= base_url('dist/js/pages/chart/chart-page-init.js');?>"></script>
    <script src="<?= base_url('assets/extra-libs/DataTables/datatables.min.js');?>"></script>
    <script>
        function change_language(value){
            $.ajax({
                url:"<?php echo base_url('changeLanguage');?>/"+value,
                method:"POST",
                success:function(res){
                    console.log(res);
                    location.reload();
                },
                error:function(res){
                    console.log(res)
                }
            })
        }
        
    </script>
</body>

</html>