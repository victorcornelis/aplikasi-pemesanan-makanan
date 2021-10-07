    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    </div><!--End wrapper-->
   
  <!-- Bootstrap core JavaScript
  <script src="../assets/js/jquery.min.js"></script>-->
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  
  <!-- simplebar js -->
  <script src="../assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- waves effect js -->
  <script src="../assets/js/waves.js"></script>
  <!-- sidebar-menu js -->
  <script src="../assets/js/sidebar-menu.js"></script>
  <!-- Custom scripts -->
  <script src="../assets/js/app-script.js"></script>

  <!--Sweet Alerts -->
  <script src="../assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>
  <script src="../assets/plugins/alerts-boxes/js/sweet-alert-script.js"></script>

  <!--Data Tables js-->
  <script src="../assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
  <script src="../assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
  <script src="../assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
  <script src="../assets/plugins/bootstrap-datatable/js/jszip.min.js"></script>
  <script src="../assets/plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
  <script src="../assets/plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
  <script src="../assets/plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
  <script src="../assets/plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
  <script src="../assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js"></script>

  <script>
   $(document).ready(function(){
    //Default data table
     $('#default-datatable').DataTable();

    var table = $('#example').DataTable({
      lengthChange: false,
      order: [[ 1, "asc" ]],
      pageLength: 5,
    });

    var table = $('#example2').DataTable({
      lengthChange: false,
      order: [[ 1, "asc" ]],
      pageLength: 10,
    });

    var table = $('#aa').DataTable( {
      dom: 'Bfrtip',
      lengthChange: true,
      pageLength: 10,
      buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    
  });
  </script>

</body>
</html>