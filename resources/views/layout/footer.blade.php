
  

  


<footer class="main-footer">
    <strong>Copyright &copy; 2021-2022 .</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<!-- jQuery -->
<script src="{{ URL::asset('/plugins/jquery/jquery.min.js')  }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::asset('/plugins/jquery-ui/jquery-ui.min.js')  }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')  }}"></script>
<script src="{{ URL::asset('/plugins/select2/js/select2.full.min.js')  }}"></script>
<!-- ChartJS -->
<script src="{{ URL::asset('/plugins/chart.js/Chart.min.js')  }}"></script>
<!-- Sparkline -->
<script src="{{ URL::asset('/plugins/sparklines/sparkline.js')  }}"></script>
<!-- JQVMap -->
<script src="{{ URL::asset('/plugins/jqvmap/jquery.vmap.min.js')  }}"></script>
<script src="{{ URL::asset('/plugins/jqvmap/maps/jquery.vmap.usa.js')  }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ URL::asset('/plugins/jquery-knob/jquery.knob.min.js')  }}"></script>
<!-- daterangepicker -->
<script src="{{ URL::asset('/plugins/moment/moment.min.js')  }}"></script>
<script src="{{ URL::asset('/plugins/daterangepicker/daterangepicker.js')  }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ URL::asset('/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')  }}"></script>
<!-- Summernote -->
<script src="{{ URL::asset('/plugins/summernote/summernote-bs4.min.js')  }}"></script>
<!-- overlayScrollbars -->
<script src="{{ URL::asset('/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')  }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('/js/adminlte.js')  }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ URL::asset('/js/pages/dashboard.js')  }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('/js/demo.js')  }}"></script>

<script src="{{ URL::asset('/plugins/jquery/jquery.min.js')  }}"></script>
<script src="{{ URL::asset('/plugins/jquery-ui/jquery-ui.min.js')  }}"></script>



<script src="{{ URL::asset('/plugins/jquery/jquery.min.js')  }}"></script>

<script src="{{ URL::asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')  }}"></script>

<script src="{{ URL::asset('/plugins/select2/js/select2.full.min.js')  }}"></script>

<script src="{{ URL::asset('/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')  }}"></script>

<script src="{{ URL::asset('/plugins/moment/moment.min.js')  }}"></script>
<script src="{{ URL::asset('/plugins/inputmask/min/jquery.inputmask.bundle.min.js')  }}"></script>

<script src="{{ URL::asset('/plugins/daterangepicker/daterangepicker.js')  }}"></script>

<script src="{{ URL::asset('/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')  }}"></script>

<script src="{{ URL::asset('/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')  }}"></script>

<script src="{{ URL::asset('/plugins/bootstrap-switch/js/bootstrap-switch.min.js')  }}"></script>



<script src="{{ URL::asset('/js/demo.js')  }}"></script>
<script src="{{ URL::asset('/js/jquery.growl.js')  }}"></script>





<script src="{{ URL::asset('/plugins/datatables/jquery.dataTables.min.js')  }}"></script>
<script src="{{ URL::asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')  }}"></script>
<script src="{{ URL::asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js')  }}"></script>
<script src="{{ URL::asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')  }}"></script>
 
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    // $("input[data-bootstrap-switch]").each(function(){
    //   $(this).bootstrapSwitch('state', $(this).prop('checked'));
    // });

  })
</script>




<script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ URL::asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ URL::asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ URL::asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ URL::asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ URL::asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ URL::asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ URL::asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ URL::asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ URL::asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script>
    $(document).ready(function(){

  $('#navbutton').click(function(e) {
    e.preventDefault();
         $('#sidebar').toggle('slow');
   });

});
</script>
<script>
$(document).ready(function(){
 
    $("#example1").addClass("table-responsive");
 
});
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": false,
      "autoWidth": true,
      "buttons": [ "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>



</body>
</html>
