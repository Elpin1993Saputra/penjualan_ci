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
            <form class="form-horizontal" action="<?php echo site_url()."/pelanggan/do_edit"; ?>" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="nama_pel" class="col-sm-2 control-label">Nama Pelanggan</label>

                  <div class="col-sm-4">
                    <input  type="text" value="<?php echo $id; ?>" name="id" hidden>
                    <input type="text" value="<?php echo $nmpel; ?>" name="nama" class="form-control" id="nama_pel"  placeholder="Nama Pelanggan">
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat"  class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-4">
                    <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat" id="alamat"> <?php echo $alamat; ?></textarea>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="nohp" class="col-sm-2 control-label">No. HP</label>

                  <div class="col-sm-4">
                    <input type="text" value="<?php echo $nohp; ?>" name="nohp" class="form-control" id="nohp"  placeholder="Nomor HP">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer" >
              <div class="col-sm-2"></div>
              <div class="col-sm-4">
                <button type="submit" class="btn btn-info">Simpan</button>
		        <button type="Reset" class="btn btn-default">Batal</button>
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



