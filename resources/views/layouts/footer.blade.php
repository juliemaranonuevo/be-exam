<!-- jQuery 3 -->
<script src="/vendor/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/vendor/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- PACE -->
<script src="/vendor/AdminLTE/bower_components/PACE/pace.min.js"></script>
<!-- SlimScroll -->
<script src="/vendor/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/vendor/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/vendor/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/vendor/AdminLTE/dist/js/demo.js"></script>
<!-- <script src="/template/ajax.js"></script> -->
<!-- DataTables -->
<script src="/vendor/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/vendor/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- date-range-picker -->
<script src="/vendor/AdminLTE/bower_components/moment/min/moment.min.js"></script>
<script src="/vendor/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- iCheck 1.0.1 -->
<script src="/vendor/AdminLTE/plugins/iCheck/icheck.min.js"></script>

<!-- Select2 -->
<script src="/vendor/AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- CK Editor -->
<script src="/vendor/AdminLTE/bower_components/ckeditor/ckeditor.js"></script>

<!-- bootstrap datepicker -->
<script src="/vendor/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- bootstrap time picker -->
<script src="/vendor/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- <script src="https://vjs.zencdn.net/7.10.2/video.min.js"></script> -->

<script>
$( function () {
    $('.select2').select2({
        tags: true
    });
})
// $(function () {
//     CKEDITOR.replace('editor1', {
//         allowedContent: 'p h1 h2 strong em; a[!href]; img[!src,width,height];'
//     });
    
// })

// $('#datepicker').datepicker({
//     // autoclose: true
// });

$('.timepicker').timepicker({
    showInputs: false
})
</script>
