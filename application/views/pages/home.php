<?php $this->load->view('pages/head');?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php $this->load->view('pages/header');?>
  <!-- Left side column. contains the logo and sidebar -->
<?php $this->load->view('pages/left_side');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<?php $this->load->view('pages/content_wrapper',array('judul'=>$judul));?>
    <!-- Main content -->
<?php $this->load->view($content);?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('pages/footer');?>
  <!-- Control Sidebar -->
<?php $this->load->view('pages/control_sidebar');?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script>
  $(function () {
    $("#example1").DataTable();
    
  });
</script>
</body>
</html>
