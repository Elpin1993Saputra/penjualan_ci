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
              <a href="<?php echo site_url()."/kategori/form" ?>"><h3 class="box-title">Tambah Data</h3></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="col-xs-10"> 
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Kategori</th>
                  <th style="width: 300px">Keterangan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no =1;
                  foreach ($getKategori as $value) {
                  ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $value['nm_kategori']; ?></td>
                    <td><?php echo $value['keterangan']; ?></td>
                    <td><a href="<?php echo site_url()."/kategori/form_edit/".$value['id']; ?>">Edit</a> | 
                      <a href="<?php echo site_url()."/kategori/do_delete/".$value['id']; ?>">Hapus</a>
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
                  <th>Nama Kategori</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
               </div>
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

