</div>
</div>
</div>
<script src="js/sb-admin-2.min.js"></script>
<script src="css/js/sb-admin-2.min.js"></script>
<!-- <script src="assets/js/jquery-1.10.2.js"></script> -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.metisMenu.js"></script>
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="assets/js/morris/morris.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script src="assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/DataTables/JSZip-2.5.0/jszip.min.js"></script>
<script src="assets/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="assets/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="assets/DataTables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
<script src="assets/DataTables/Buttons-1.5.6/js/buttons.print.min.js"></script>
<script src="assets/DataTables/Buttons-1.5.6/js/buttons.colvis.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#table').DataTable({
            buttons: ['csv', 'print', 'excel', 'pdf'],
            dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "ALL"]
            ]
        });

        table.buttons().container()
            .appendTo('#table_wrapper .col-md-5:eq(0)');
    });
</script>
</body>

</html>