 <?php
 //echo form_open('barang/add');
  echo validation_errors(); 
?>
    <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo site_url()."/kategori/do_edit"; ?>" method="POST">
              <div class="box-body">

                <div class="form-group">
                  <label for="kode" class="col-sm-2 control-label">Kode Kategori</label>

                  <div class="col-sm-4">
                    <input type="text" name="kode" class="form-control" id="kode" value="<?php echo $kode; ?>" placeholder="Kode Kategori" readonly>
                  </div>
                </div>                

                <div class="form-group">
                  <label for="nama_kategori" class="col-sm-2 control-label">Nama Kategori</label>

                  <div class="col-sm-4">
                    <input type="text" name="id" value="<?php echo $id;?>" hidden>
                    <input type="text" name="nama" class="form-control" name="nama" id="nama_kategori" placeholder="Nama Kategori" value="<?php echo $nama; ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="keterangan"  class="col-sm-2 control-label">Keterangan</label>

                  <div class="col-sm-4">
                    <textarea name="keterangan" class="form-control" id="keterangan" rows="3" placeholder="Pilih Kategori" readonly><?php echo $keterangan;?></textarea>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer" >
                <div class="col-sm-2"></div>
                  <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Edit</button>
    		            <?php echo "<input type='button' class='btn btn-warning' value='Kembali' onclick=\"window.location.href='".site_url()."/kategori';\">"; ?>
                    
		          </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>



