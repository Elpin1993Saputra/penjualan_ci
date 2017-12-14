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

<script>
       $(document).ready(function(){
        $("input").focus(function(){
          $(this).css("background-color", "#cccccc");
        });
        $("input").blur(function(){
          $(this).css("background-color", "#ffffff");
        });

      }); 

</script>
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
                  <label for="kode" class="col-sm-2 control-label">Kode Barang</label>

                  <div class="col-sm-4">
                    <input type="text" name="kode" class="form-control" id="kode" value="<?php echo $kode; ?>" placeholder="Kode Barang" readonly>
                  </div>

                  <label for="nama_barang" class="col-sm-2 control-label">Nama Barang</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama"  id="nama_barang" placeholder="Inputkan Nama Barang" value="<?php echo $nama; ?>">
                  </div>

                </div>

                <div class="form-group">
                
                  <label for="satuan" class="col-sm-2 control-label">Satuan Barang</label>

                  <div class="col-sm-4">
                    <input type="text" name="satuan" value="<?php echo $satuan; ?>" class="form-control" id="satuan" placeholder="Inputkan Satuan Barang">
                  </div>

                  <label for="jumlah"  class="col-sm-2 control-label">Jumlah Barang</label>

                  <div class="col-sm-4">
                    <input type="text" name="jumlah" value="<?php echo $jumlah; ?>" class="form-control" id="jumlah"  placeholder="Inputkan Jumlah Barang">
                  </div>

                </div>

                <div class="form-group">
                
                  <label for="harga" class="col-sm-2 control-label">Harga Barang</label>

                  <div class="col-sm-4">
                    <input type="text" name="harga" value="<?php echo $harga; ?>" class="form-control" id="harga" placeholder="Inputkan Harga Barang">
                  </div>
                  <label for="kategori"  class="col-sm-2 control-label">Kategori Barang</label>

                  <div class="col-sm-4">
                    <select class="form-control" name="kategori" id="kategori" style="width: 100%;" onchange="changest(this)">
                    <option value="" >Pilih Kategori</option>
                    <?php
                    foreach ($getKategori as $key) {
                    ?>
                    <option value="<?php echo $key['id'];?>"
                     <?php 
                     if($key['id']==$kategori) echo "selected";?>><?php echo $key['nm_kategori']; ?></option>

                    <?php 
                    }
                    ?>
                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-6 text-center">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <?php echo "<input type='button' class='btn btn-warning' value='Kembali' onclick=\"window.location.href='".site_url()."/barang';\">"; ?>
 
                  </div>
                
                  <label for="keterangan" class="col-sm-2 control-label">Keterangan Kategori</label>

                  <div class="col-sm-4">
                    <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Inputkan Keterangan" readonly><?php echo $keterangan; ?></textarea>
                  </div>

                </div>

              <!-- /.box-body -->
              <div class="box-footer">
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


    <script>


      function changest(val){
        var id=$(val).val();

          $.ajax({
            url : "<?php echo site_url();?>/barang/getKetKategori",
            method : "POST",
            data : {id : id},

            dataType : 'json',
            success: function(data){
              var html = '';

                html = data.keterangan;
                $('#keterangan').text(html);
            }
          });
      }

    </script>
