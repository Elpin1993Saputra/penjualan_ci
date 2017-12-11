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

<script>
$(document).ready(function(){
    $("input").focus(function(){
        $(this).css("background-color", "#cccccc");
    });
    $("input").blur(function(){
        $(this).css("background-color", "#ffffff");
    });

    // $("#kategori").change(function(){
    // 	alert($(this).val());
    // });
});



// function showKategori(str) {
//   if (str=="") {
//     document.getElementById("keterangan").innerHTML="";
//     return;
//   } 
//   if (window.XMLHttpRequest) {
//     // code for IE7+, Firefox, Chrome, Opera, Safari
//     xmlhttp=new XMLHttpRequest();
//   } else { // code for IE6, IE5
//     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//   }
//   xmlhttp.onreadystatechange=function() {
//     if (this.readyState==4 && this.status==200) {
//       document.getElementById("keterangan").innerHTML=this.responseText;
//     }
//   }
//   xmlhttp.open("GET","getKategori.php?q="+str,true);
//   xmlhttp.send();
// }
</script>

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
            <form class="form-horizontal" action="<?php echo site_url()."/barang/add"; ?>" method="POST">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="nama_barang" class="col-sm-2 control-label">Nama Barang</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama" value="<?php set_value('nama');?>" id="nama_barang" placeholder="Inputkan Nama Barang">
                  </div>
                
                  <label for="satuan" class="col-sm-2 control-label">Satuan Barang</label>

                  <div class="col-sm-4">
                    <input type="text" name="satuan" value="<?php set_value('satuan');?>" class="form-control" id="satuan" placeholder="Inputkan Satuan Barang">
                  </div>
                </div>
                <div class="form-group">
                  <label for="jumlah"  class="col-sm-2 control-label">Jumlah Barang</label>

                  <div class="col-sm-4">
                    <input type="text" value="<?php set_value('jumlah');?>" name="jumlah" class="form-control" id="jumlah" placeholder="Inputkan Jumlah Barang">
                  </div>
                
                  <label for="harga" class="col-sm-2 control-label">Harga Barang</label>

                  <div class="col-sm-4">
                    <input type="text" name="harga" value="<?php set_value('harga');?>" class="form-control" id="harga" placeholder="Inputkan Harga Barang">
                  </div>
                </div>

                <div class="form-group">
                  <label for="kategori"  class="col-sm-2 control-label">Kategori</label>

                  <div class="col-sm-4">
                    <select class="form-control select2" onchange="changest(this)" name="kategori" id="kategori" style="width: 100%;" >
                    <option value="" <?php echo  set_select('kategori', "", false); ?>>Pilih Kategori</option>	
                    <?php
                    foreach ($getKategori as $key) {
                    ?>
                    <option value="<?php echo $key['id'];?>" <?php echo  set_select('kategori', $key['id']); ?>><?php echo $key['nm_kategori']; ?></option>

                    <?php	
                    }
                    ?>
	                </select>
                  </div>
                
                  <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>

                  <div class="col-sm-4">
                    <textarea class="form-control keterangan" id="keterangan" rows="3" placeholder="Pilih Kategori" readonly></textarea>
                  </div>
                </div>


              <!-- /.box-body -->
              <div class="box-footer">
              	<div class="col-sm-5"></div>
              	<div class="col-sm-5">
		            <button type="submit" class="btn btn-info ">Simpan</button>
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

    <script type="text/javascript">
    function changest(val){
      var id=$(val).val();
      
          $.ajax({
            url : "<?php echo site_url();?>/barang/getKetKategori",
            method : "POST",
            data : {id : id},
           
            dataType : 'json',
            success: function(data){
              //console.log(data);
              var html = '';
              
                html = data.keterangan;
                $('#keterangan').text(html);
            }
             
            
          });
    }
    
    </script>
