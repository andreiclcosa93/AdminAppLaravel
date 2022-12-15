 <!--   Core JS Files   -->
 <script src="{{asset('../admin/assets/js/core/popper.min.js')}}"></script>
 <script src="{{asset('../admin/assets/js/core/bootstrap.min.js')}}"></script>
 <script src="{{asset('../admin/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
 <script src="{{asset('../admin/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
 <script src="{{asset('../admin/assets/js/plugins/chartjs.min.js')}}"></script>

 <script>
   var win = navigator.platform.indexOf('Win') > -1;
   if (win && document.querySelector('#sidenav-scrollbar')) {
     var options = {
       damping: '0.5'
     }
     Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
   }
</script>

 <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
 <script src="{{asset('../admin/assets/js/material-dashboard.min.js?v=3.0.0')}}"></script>

 @yield('customJs')
</body>

</html>
