<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script data-pace-options='{ "restartOnRequestAfter": true }' src="/js/admin/plugin/pace/pace.min.js"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    if (!window.jQuery) {
        document.write('<script src="/js/admin/libs/jquery-3.2.1.min.js"><\/script>');
    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    if (!window.jQuery.ui) {
        document.write('<script src="/js/admin/libs/jquery-ui.min.js"><\/script>');
    }
</script>

<!-- IMPORTANT: APP CONFIG -->
<script src="/js/admin/app.config.js"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<script src="/js/admin/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

<!-- BOOTSTRAP JS -->
<script src="/js/admin/bootstrap/bootstrap.min.js"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="/js/admin/notification/SmartNotification.min.js"></script>

<!-- JARVIS WIDGETS -->
<script src="/js/admin/smartwidgets/jarvis.widget.min.js"></script>

<!-- EASY PIE CHARTS -->
<script src="/js/admin/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

<!-- SPARKLINES -->
<script src="/js/admin/plugin/sparkline/jquery.sparkline.min.js"></script>

<!-- JQUERY VALIDATE -->
<script src="/js/admin/plugin/jquery-validate/jquery.validate.min.js"></script>

<!-- JQUERY MASKED INPUT -->
<script src="/js/admin/plugin/masked-input/jquery.maskedinput.min.js"></script>

<!-- JQUERY SELECT2 INPUT -->
<script src="/js/admin/plugin/select2/select2.min.js"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script src="/js/admin/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

<!-- browser msie issue fix -->
<script src="/js/admin/plugin/msie-fix/jquery.mb.browser.min.js"></script>

<!-- FastClick: For mobile devices -->
<script src="/js/admin/plugin/fastclick/fastclick.min.js"></script>

<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->

<!-- MAIN APP JS FILE -->
<script src="/js/admin/app.min.js"></script>

<!-- MOMENT -->
<script src="/js/admin/plugin/moment/moment.min.js"></script>

<!-- DATA TABLES -->
<script src="/js/admin/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="/js/admin/plugin/datatables/dataTables.colVis.min.js"></script>
<script src="/js/admin/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="/js/admin/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="/js/admin/plugin/datatables/i18n/spanish.js"></script>
<script src="/js/admin/plugin/datatable-responsive/datatables.responsive.min.js"></script>

<!-- JS PROPIOS -->
<script src="/js/admin/DT.js"></script>
<script src="/js/admin/Box.js"></script>

<script>
    $(document).ready(function() {
         pageSetUp();
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
</script>