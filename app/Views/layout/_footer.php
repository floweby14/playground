<script src="<?=base_url('assets') ?>/bundles/libscripts.bundle.js"></script>
        <script src="<?=base_url('assets') ?>/bundles/vendorscripts.bundle.js"></script>
        <script src="<? base_url('assets') ?>/bundles/jvectormap.bundle.js"></script>
        <script src="<? base_url('assets') ?>/bundles/sparkline.bundle.js"></script>
        <script src="<? base_url('assets') ?>/bundles/c3.bundle.js"></script>
        <script src="<? base_url('assets') ?>/bundles/mainscripts.bundle.js"></script>
        <script src="<? base_url('assets') ?>/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
        <script src="<? base_url('assets') ?>/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
        <script src="<? base_url('assets') ?>/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
        <script src="<? base_url('assets') ?>/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
        <script src="<? base_url('assets') ?>/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
        <script src="<? base_url('assets') ?>/plugins/jquery-datatable/buttons/print.min.js"></script>

        <script src="<? base_url('assets') ?>/plugins/dropify/js/dropify.min.js"></script>

        <script src="<? base_url('assets') ?>/js/pages/index.js"></script>
        <script src="<? base_url('assets') ?>/js/pages/forms/dropify.js"></script>
        <script src="<? base_url('assets') ?>/js/pages/tables/jquery-datatable.js"></script>
        <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css"></script>

        <script>

            $(document).ready(function() {

                $('#limit-data-10').DataTable({

                    "info": false,
                    "dom": "ftipr",
                    "ordering": false,
                    "pageLength": 10,

                });

            });
            
        </script>

    </body>

</html>