<!-- <?php //echo form_open('barang/add');?>
		<form action="<?php echo site_url()."/barang/add/"; ?>" method="POST">
		<?php echo validation_errors(); ?>
		<fieldset>
			<legend>Kode Barang</legend>
			<input type="text" name="kode" placeholder="Masukkan Kode Barang">
			<legend>Nama Barang</legend>
			<input type="text" name="nama" placeholder="Masukkan Nama Barang">
			<legend>Satuan Barang</legend>
			<input type="text" name="satuan" placeholder="Masukan Satuan Barang">
			<legend>Jumlah Barang</legend>
			<input type="text" name="jumlah" placeholder="Masukan Jumlah Barang">
			<legend>Harga Barang</legend>
			<input type="text" name="harga" placeholder="Masukan Harga Barang">
			<input type="submit" name="submit" value="Simpan Data">
		</fieldset>
		</form>
 <?php //form_close(); ?>
 -->


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
            <form class="form-horizontal" action="<?php echo site_url()."/barang/do_edit"; ?>" method="POST">
              <div class="box-body">
                  <input  type="text" value="<?php echo $id; ?>" name="id" hidden>
                <div class="form-group">
                  <label for="nama_barang" class="col-sm-2 control-label">Nama Barang</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama"  id="nama_barang" placeholder="Inputkan Nama Barang" value="<?php echo $nmbrg; ?>">
                  </div>
                
                  <label for="satuan" class="col-sm-2 control-label">Satuan Barang</label>

                  <div class="col-sm-4">
                    <input type="text" name="satuan" value="<?php echo $satuan; ?>" class="form-control" id="satuan" placeholder="Inputkan Satuan Barang">
                  </div>
                </div>

                <div class="form-group">
                  <label for="jumlah"  class="col-sm-2 control-label">Jumlah Barang</label>

                  <div class="col-sm-4">
                    <input type="text" name="jumlah" value="<?php echo $jumlah; ?>" class="form-control" id="jumlah"  placeholder="Inputkan Jumlah Barang">
                  </div>
                
                  <label for="harga" class="col-sm-2 control-label">Harga Barang</label>

                  <div class="col-sm-4">
                    <input type="text" name="harga" value="<?php echo $harga; ?>" class="form-control" id="harga" placeholder="Inputkan Harga Barang">
                  </div>
                </div>

                <div class="form-group">
                  <label for="kategori"  class="col-sm-2 control-label">Kategori</label>

                  <div class="col-sm-4">
                    <select class="form-control select2" name="kategori" id="kategori" style="width: 100%;" onchange="showKategori(this.value)">
                    <option value="" <?php echo  set_select('kategori', "", false); ?>>Pilih Kategori</option>	
                    <?php
                    foreach ($getKategori as $key) {
                    ?>
                    <option value="<?php echo $key['id'];?>"
                     <?php 
                     if($key['id']==$kategori) echo "selected";
                      echo  set_select('kategori', $key['id']); ?>><?php echo $key['nm_kategori']; ?></option>

                    <?php	
                    }
                    ?>
	                </select>
                  </div>
                
                  <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>

                  <div class="col-sm-4">
                    <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Inputkan Keterangan" disabled></textarea>
                  </div>
                </div>

              <!-- /.box-body -->
              <div class="box-footer">
              	<div class="col-sm-5"></div>
              	<div class="col-sm-5">
		            <button type="submit" class="btn btn-info ">UbahData</button>
		            <button type="reset" class="btn btn-default">Batal</button>
		         </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
