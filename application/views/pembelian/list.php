<?php 
if($this->session->flashdata('info')):
  echo $this->session->flashdata('info'); 
endif;
?>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <a href="<?php echo site_url()."/pembelian/form" ?>"><h3 class="box-title">Tambah Data</h3></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>NOTA</th>
                  <th>Kode Supplier</th>
                  <th>Total Pembelian</th>
                  <th>Tanggal</th>
                  <th>Total Bayar</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no =1;
                  foreach ($getData as $value) {
                  ?>
                  <tr>
                    <td><a href="<?php echo site_url()."/pembelian/detail_pembelian/".$value['id']; ?>"><?php echo $no;?></a></td>
                    <td><?php echo $value['nota']; ?></td>
                    <td><a href="<?php echo site_url()."/supplier/detail_supplier/".$value['kdsupplier']; ?>"><?php echo $value['nmsupplier']; ?></a></td>
                    <td><?php echo $value['jumlahbeli']; ?></td>
                    <td><?php echo $value['tgl']; ?></td>
                    <td><?php echo $value['total']; ?></td>
                     <td><a href="<?php echo site_url()."/pembelian/form_edit/".$value['id']; ?>">Edit</a> | 
                      <a href="<?php echo site_url()."/pembelian/do_delete/".$value['id']; ?>">Hapus</a>
                    </td>
                  </tr>
                  <?php 
                  $no++;
                  }
                  // echo "<pre>";
                  // print_r($getData);
                  // echo "</pre>";
                  ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Kode Supplier</th>
                  <th>Total Pembelian</th>
                  <th>Tanggal</th>
                  <th>Total Bayar</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

