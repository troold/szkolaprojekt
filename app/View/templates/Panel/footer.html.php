
<footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>

  

<!-- Bootstrap 3.3.7 -->
<script src='{$router->publicWeb("bower_components/bootstrap/dist/js/bootstrap.min.js")}'></script>
<!-- SlimScroll -->
<script src='{$router->publicWeb("bower_components/jquery-slimscroll/jquery.slimscroll.min.js")}'></script>
<!-- FastClick -->
<script src='{$router->publicWeb("bower_components/fastclick/lib/fastclick.js")}'></script>
<!-- AdminLTE App -->
<script src='{$router->publicWeb("dist/js/adminlte.min.js")}'></script>
<!-- AdminLTE for demo purposes -->
<script src='{$router->publicWeb("dist/js/demo.js")}'></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>