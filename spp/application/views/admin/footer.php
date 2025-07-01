<footer class="page-footer">
                <div class="font-13"><?php echo date('Y'); ?> © <b>SMA LAZUARDI GCS</b> - All rights reserved.</div>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <script src="assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <?php if($this->uri->segment(3) == 'flat') { ?>
        <script src="assets/js/webdesignpurbalingga.js" type="text/javascript"></script>
    <?php }elseif($this->uri->segment(3) == 'efektif') { ?>
        <script src="assets/js/webdesignpurbalingga2.js" type="text/javascript"></script>
    <?php } ?>
    <script src="assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
    <script src="assets/js/morris.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script>
        function Goback() {
            window.history.back();
        }
    </script>
    <script src="assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                scrollX: true,
                language: {
                    // lengthMenu: 'Display _MENU_ records per page',
                    zeroRecords: 'Maaf, data tidak ditemukan.',
                    // info: 'Showing page _PAGE_ of _PAGES_',
                    infoEmpty: 'Tidak ada data',
                    // infoFiltered: '(filtered from _MAX_ total records)',
                },
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });
        })
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script src='assets/lib/main.js'></script>
    <script src='assets/lib/locales-all.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
              },
          initialView: 'dayGridMonth',
          navLinks: true,
          // businessHours: true,
          editable: true,
          selectable: true,
          locale: 'id',
          events: "<?php echo base_url(); ?>admin/load"
          // events: [
          // {
          //   title: 'Rapat',
          //   start: '2022-08-10T08:00:00',
          //   // end: '2022-08-15',
          //   color: '#ff7373'
          // },
          // {
          //   title: 'Kumpul',
          //   start: '2022-08-10T10:00:00',
          //   // end: '2022-08-15',
          //   color: '#321cba'
          // },
          // ]
        });
        calendar.render();
      });
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').selectpicker();
    });
</script>
</body>

</html>