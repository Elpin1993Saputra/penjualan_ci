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
              <a href="<?php echo site_url()."/barang/form" ?>"><h3 class="box-title">Tambah Data</h3></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Satuan</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no =1;
                  // print_r($getData);


                  foreach ($getData as $value) {
                  ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $value['nmbrg']; ?></td>
                    <td><?php echo $value['nm_kategori']; ?></td>
                    <td><?php echo $value['satuan']; ?></td>
                    <td><?php echo $value['jumlah']; ?></td>
                    <td><?php echo $value['harga']; ?></td>
                    <td><a href="<?php echo site_url()."/barang/form_edit/".$value['id']; ?>">Edit</a> | 
                      <a href="<?php echo site_url()."/barang/do_delete/".$value['id']; ?>">Hapus</a>
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
                  <th>Nama Barang</th>
                  <th>Satuan</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
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

