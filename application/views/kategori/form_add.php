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
            <form class="form-horizontal" action="<?php echo site_url()."/kategori/add"; ?>" method="POST">
              <div class="box-body">

                <div class="form-group">
                  <label for="kode" class="col-sm-2 control-label">Kode Kategori</label>

                  <div class="col-sm-4">
                    <input type="text" name="kode" class="form-control" id="kode" value="<?php echo $konik; ?>" placeholder="Kode Kategori" readonly>
                  </div>
                </div>                

                <div class="form-group">
                  <label for="nama_kategori" class="col-sm-2 control-label">Nama Kategori</label>

                  <div class="col-sm-4">
                    <input type="text" name="nama" class="form-control" id="nama_kategori" value="<?php echo set_value('nama'); ?>" placeholder="Nama Kategori">
                  </div>
                </div>
                <div class="form-group">
                  <label for="keterangan"  class="col-sm-2 control-label">Keterangan</label>

                  <div class="col-sm-4">
                    <textarea class="form-control" name="keterangan" rows="3" placeholder="Keterangan" id="keterangan"><?php echo set_value('keterangan');?></textarea>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer" >
              <div class="col-sm-2"></div>
              <div class="col-sm-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
		            <?php echo "<input type='button' class='btn btn-warning' value='Kembali' onclick=\"window.location.href='".site_url()."/kategori';\">"; ?>
		      </div>
		      </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>



