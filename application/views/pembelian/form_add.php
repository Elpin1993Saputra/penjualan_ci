<style>
.footer {
  margin-bottom: 22px;
}
.panel-primary .form-group {
  margin-bottom: 10px;
}
.form-control {
  border-radius: 0px;
  box-shadow: none;
}
.error_validasi { margin-top: 0px; }
</style>

    <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
              <div class="box-header with-border">
<!--                 <div class="form-group">
                  <label class="col-md-1 control-label">Nota </label>

                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="nota" value="">
                  </div>
                  <div class="col-sm-1"></div>
                  <label class="col-sm-1 control-label">Tanggal </label>

                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="tgl" value="">
                  </div>
                  
                </div>
 -->          </div>

              <!-- /.box-header -->
              <!-- form start -->
              <div class="box-body">
                 <div class="form-group col-sm-4" >
                     <button id='BarisBaru' class='btn btn-default pull-left'><i class='fa fa-plus fa-fw'></i> Baris Baru (F7)</button>
                     <a href="<?php echo site_url('pembelian/form'); ?>" class='pull-right'><i class='fa fa-refresh fa-fw'></i> Refresh Halaman</a>
                  </div>

              </div>     
 <!--              <div class="box-body">

                  <div class="col-sm-2">
                          <select id="kd_brg">
                            
                          </select>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                          <input type="text" name="harga" class="form-control" id="harga" value="<?php echo set_value('harga');?>" placeholder="Harga">
                    </div>
                    <div class="col-sm-2">
                          <input type="text" name="stok" class="form-control" id="stok" value="<?php echo set_value('stok');?>" placeholder="Stok">
                    </div>
                    <div class="col-sm-2">
                          <input type="text" name="jumlah" class="form-control" id="jumlah" value="<?php echo set_value('jumlah');?>" placeholder="Jumlah">
                    </div>
                    
                    <div class="col-sm-4">
                      <button type="submit" class="btn btn-info">Tambah</button>
                    </div>
                         
                  </div>
              </div> -->
              <form class="form-horizontal" action="<?php echo site_url()."/pembelian/add"; ?>" method="POST">
              
              <div class="box-header">
               <table style="font-weight: bold;font-size: 15px" class="table table-condensed">
                  <tr>
                    <!-- <td style="width: 100px"> Nota</td>
                    <td>: <?php echo $nota;?></td>
                    <td style="width: 300px"></td> -->
                    <td style="width: 100px">Tanggal</td>
                    <td>: <?php $tgl =date('Y-m-d'); echo $tgl ;?><input type="hidden" name="tgl_beli" value="<?php echo $tgl; ?>"></td>
                    <td style="width: 300px;"></td>
                    <td> Supplier</td>
                    <td>
                     : <select name="supplier" id="supplier">
                      <?php foreach ($getSupplier as $key) { ?>
                        <option value="<?php echo $key['id']; ?>"><?php echo $key['nmsupplier']; ?></option>
                      <?php } ?> 
                      </select>
  
                    </td>
                    
                  </tr>
                  <tr>
                    <!-- <td style="width: 100px"> Nota</td>
                    <td>: <?php echo $nota;?></td>
                    <td style="width: 300px"></td> -->
                    <td style="width: 100px">Nota</td>
                    <td>: <?php $tgl =date('Ymd'); $no_id=$tgl.$idBeli;?><input type="text" name="nota" value="<?php echo $no_id; ?>" readonly></td>
                    <td style="width: 300px;" colspan="3" ></td>
                    
                      </select>
  
                    </td>
                    
                  </tr>
                </table>
              </div>



              <div class="box-body">
                <table class="table table-bordered table-striped" id='TabelTransaksi'>
                  <thead>
                  <tr>
                    <th style='width:35px;'>No</th>
                    <th style='width:235px;'>Nama Barang</th>
                    <th style='width:210px;'>Harga</th>
                    <th style='width:75px;'>Stok</th>
                    <th style='width:75px;'>Qty</th>
                    <th style='width:170px;'>Sub Total</th>
                    <th style='width:75px;'>Aksi</th>
                   </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="4" style="text-align: center;">Total</th>
                    <th></th>
                    <th><span id='TotalBayar' style="text-align: right;"> 0</span><input type="hidden" id='TotalBayarHidden'></th>
                    <th></th>                    
                  </tr>
                </tfoot>
              </table>
            </div>

            <div class="box-body">
              <div class="form-group">
                <div class="col-sm-2">
                  <button type='submit' class='btn btn-primary btn-block'>
                      <i class='fa fa-floppy-o'></i> Proses 
                  </button>
              </div>
            </div>
            </div>
            </form>
          </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>


<script>
$(document).ready(function(){
    $("input").focus(function(){
        $(this).css("background-color", "#cccccc");
    });
    $("input").blur(function(){
        $(this).css("background-color", "#ffffff");
    });

    // $("#kategori").change(function(){
    //  alert($(this).val());
    // });

    for(B=1; B<=1; B++)
    {
      BarisBaru();
    }

    $('#BarisBaru').click(function(){
      BarisBaru();

      $("#TabelTransaksi tbody").find('input[type=text,textarea,select').filter(':visible:first').focus();
    });
});  

function BarisBaru()
{
  var Nomor = $('#TabelTransaksi tbody tr').length + 1;
  var Baris = "<tr>";
    Baris += "<td>"+Nomor+"</td>";
    Baris += "<td>";
      Baris += "<input type='text' class='form-control' name='nama_barang[]' id='pencarian_kode' placeholder='Ketik Kode / Nama Barang'>";
      Baris += "<div id='hasil_pencarian'></div>";
    Baris += "</td>";
    Baris += "<td>";
      Baris += "<input type='hidden' name='harga_satuan[] id='harga_satuan'>";
      Baris += "<span></span>";
    Baris += "</td>";
   Baris += "<td>";
      Baris += "<input type='hidden' name='stok[]'>";
      Baris += "<span></span>";
    Baris += "</td>";
    Baris += "<td><input type='text' class='form-control' id='jumlah_beli' name='jumlah_beli[]' onkeypress='return check_int(event)' disabled></td>";
    Baris += "<td>";
      Baris += "<input type='hidden' name='sub_total[]'>";
      Baris += "<span></span>";
    Baris += "</td>";
    Baris += "<td><button class='btn btn-default' id='HapusBaris'><i class='fa fa-times' style='color:red;'></i></button></td>";
    Baris += "<td style='display:none'><input type='hidden' name='id_barang[]' id='id_barang' ></td>"
    Baris += "</tr>";

  $('#TabelTransaksi tbody').append(Baris);

  $('#TabelTransaksi tbody tr').each(function(){
    $(this).find('td:nth-child(2) input').focus();
  });

  HitungTotalBayar();
}

$(document).on('click', '#HapusBaris', function(e){
  e.preventDefault();
  $(this).parent().parent().remove();

  var Nomor = 1;
  $('#TabelTransaksi tbody tr').each(function(){
    $(this).find('td:nth-child(1)').html(Nomor);
    Nomor++;
  });

  HitungTotalBayar();
});


function AutoCompleteGue(Lebar, KataKunci, Indexnya)
{
  $('div#hasil_pencarian').hide();
  var Lebar = Lebar + 25;

  var Registered = '';
  $('#TabelTransaksi tbody tr').each(function(){
    if(Indexnya !== $(this).index())
    {
      if($(this).find('td:nth-child(2) input').val() !== '')
      {
        Registered += $(this).find('td:nth-child(2) input').val() + ',';
      }
    }
  });

  if(Registered !== ''){
    Registered = Registered.replace(/,\s*$/,"");
  }

  $.ajax({
    url: "<?php echo site_url('pembelian/ajax_kode'); ?>",
    type: "POST",
    cache: false,
    data:'keyword=' + KataKunci + '&registered=' + Registered,
    dataType:'json',
    success: function(json){
      if(json.status == 1)
      {
        $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2)').find('div#hasil_pencarian').css({ 'width' : Lebar+'px' });
        $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2)').find('div#hasil_pencarian').show('fast');
        $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2)').find('div#hasil_pencarian').html(json.datanya);
      }
      if(json.status == 0)
      {
        $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(3) input').val('');
        $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(3) span').html('');
        $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) input').val('');
        $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) span').html('');
        $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(5) input').prop('disabled', true).val('');
        $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) input').val(0);
        $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) span').html('');
        $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(8) input').val('');
      }
    }
  });

  HitungTotalBayar();
}

$(document).on('keyup', '#pencarian_kode', function(e){
  if($(this).val() !== '')
  {
    var charCode = e.which || e.keyCode;
    if(charCode == 40)
    {
      if($('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').length > 0)
      {
        var Selanjutnya = $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').next();
        $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').removeClass('autocomplete_active');

        Selanjutnya.addClass('autocomplete_active');
      }
      else
      {
        $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li:first').addClass('autocomplete_active');
      }
    } 
    else if(charCode == 38)
    {
      if($('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').length > 0)
      {
        var Sebelumnya = $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').prev();
        $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').removeClass('autocomplete_active');
      
        Sebelumnya.addClass('autocomplete_active');
      }
      else
      {
        $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li:first').addClass('autocomplete_active');
      }
    }
    else if(charCode == 13)
    {
      var Field = $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)');
      var Kodenya = Field.find('div#hasil_pencarian li.autocomplete_active span#kodenya').html();
      var Barangnya = Field.find('div#hasil_pencarian li.autocomplete_active span#barangnya').html();
      var Harganya = Field.find('div#hasil_pencarian li.autocomplete_active span#harganya').html();
      var Stoknya = Field.find('div#hasil_pencarian li.autocomplete_active span#stoknya').html();
      
      Field.find('div#hasil_pencarian').hide();
      Field.find('input').val(Kodenya);

      $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(3) input').val(Harganya);
      $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(3) span').html(to_rupiah(Harganya));
      $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(4) input').val(Stoknya);
      $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(4) span').html(Stoknya);
      $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(5) input').removeAttr('disabled').val(1);
      $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(6) input').val(Harganya);
      $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(6) span').html(to_rupiah(Harganya));
      $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(8) input').val(Kodenya);
  
      var IndexIni = $(this).parent().parent().index() + 1;
      var TotalIndex = $('#TabelTransaksi tbody tr').length;
      if(IndexIni == TotalIndex){
        BarisBaru();

        $('html, body').animate({ scrollTop: $(document).height() }, 0);
      }
      else {
        $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(5) input').focus();
      }
    }
    else 
    {
      AutoCompleteGue($(this).width(), $(this).val(), $(this).parent().parent().index());
    }
  }
  else
  {
    $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian').hide();
  }

  HitungTotalBayar();
});


$(document).on('click', '#daftar-autocomplete li', function(){
  $(this).parent().parent().parent().find('input').val($(this).find('span#barangnya').html());
  
  var Indexnya = $(this).parent().parent().parent().parent().index();
  var Harganya = $(this).find('span#harganya').html();
  var Stoknya = $(this).find('span#stoknya').html();
  var Kodenya = $(this).find('span#kodenya').html();
 
  $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2)').find('div#hasil_pencarian').hide();
  $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(3) input').val(Harganya);
  $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(3) span').html(to_rupiah(Harganya));
  $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) input').val(Stoknya);
  $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) span').html(Stoknya);
  $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(5) input').removeAttr('disabled').val(1);
  $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) input').val(Harganya);
  $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) span').html(to_rupiah(Harganya));
  $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(8) input').val(Kodenya);
  
  var IndexIni = Indexnya + 1;
  var TotalIndex = $('#TabelTransaksi tbody tr').length;
  if(IndexIni == TotalIndex){
    BarisBaru();
    $('html, body').animate({ scrollTop: $(document).height() }, 0);
  }
  else {
    $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(5) input').focus();
  }

  HitungTotalBayar();
});

$(document).on('keyup', '#jumlah_beli', function(){
  var Indexnya = $(this).parent().parent().index();
  var Harga = $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(3) input').val();
  var JumlahBeli = $(this).val();
  var KodeBarang = $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(8) input').val();

  $.ajax({
    url: "<?php echo site_url('barang/cek_stok'); ?>",
    type: "POST",
    cache: false,
    data: "kode_barang="+encodeURI(KodeBarang)+"&stok="+JumlahBeli,
    dataType:'json',
    success: function(data){
      if(data.status == 1)
      {
        var SubTotal = parseInt(Harga) * parseInt(JumlahBeli);
        if(SubTotal > 0){
          var SubTotalVal = SubTotal;
          SubTotal = to_rupiah(SubTotal);
        } else {
          SubTotal = '';
          var SubTotalVal = 0;
        }

        $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) input').val(SubTotalVal);
        $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) span').html(SubTotal);
        HitungTotalBayar();
      }
      if(data.status == 0)
      {
        $('.modal-dialog').removeClass('modal-lg');
        $('.modal-dialog').addClass('modal-sm');
        $('#ModalHeader').html('Oops !');
        $('#ModalContent').html(data.pesan);
        $('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok, Saya Mengerti</button>");
        $('#ModalGue').modal('show');

        $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(5) input').val('1');
      }
    }
  });
});

$(document).on('keydown', '#jumlah_beli', function(e){
  var charCode = e.which || e.keyCode;
  if(charCode == 9){
    var Indexnya = $(this).parent().parent().index() + 1;
    var TotalIndex = $('#TabelTransaksi tbody tr').length;
    if(Indexnya == TotalIndex){
      BarisBaru();
      return false;
    }
  }

  HitungTotalBayar();
});





function HitungTotalBayar()
{
  var Total = 0;
  $('#TabelTransaksi tbody tr').each(function(){
    if($(this).find('td:nth-child(6) input').val() > 0)
    {
      var SubTotal = $(this).find('td:nth-child(6) input').val();
      Total = parseInt(Total) + parseInt(SubTotal);
    }
  });

  $('#TotalBayar').html(to_rupiah(Total));
  $('#TotalBayarHidden').val(Total);

  $('#UangCash').val('');
  $('UangKembali').val('');
}

function to_rupiah(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return 'Rp. ' + rev2.split('').reverse().join('');
}

function check_int(evt) {
  var charCode = ( evt.which ) ? evt.which : event.keyCode;
  return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
}

$(document).on('keydown', 'body', function(e){
  var charCode = ( e.which ) ? e.which : event.keyCode;

  if(charCode == 118) //F7
  {
    BarisBaru();
    return false;
  }

  if(charCode == 119) //F8
  {
    $('#UangCash').focus();
    return false;
  }

  if(charCode == 120) //F9
  {
    CetakStruk();
    return false;
  }

  if(charCode == 121) //F10
  {
    $('.modal-dialog').removeClass('modal-lg');
    $('.modal-dialog').addClass('modal-sm');
    $('#ModalHeader').html('Konfirmasi');
    $('#ModalContent').html("Apakah anda yakin ingin menyimpan transaksi ini ?");
    $('#ModalFooter').html("<button type='button' class='btn btn-primary' id='SimpanTransaksi'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
    $('#ModalGue').modal('show');

    setTimeout(function(){ 
        $('button#SimpanTransaksi').focus();
      }, 500);

    return false;
  }
});

// $(document).on('click', '#Simpann', function(){
//   $('.modal-dialog').removeClass('modal-lg');
//   $('.modal-dialog').addClass('modal-sm');
//   $('#ModalHeader').html('Konfirmasi');
//   $('#ModalContent').html("Apakah anda yakin ingin menyimpan transaksi ini ?");
//   $('#ModalFooter').html("<button type='button' class='btn btn-primary' id='SimpanTransaksi'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
//   $('#ModalGue').modal('show');

//   setTimeout(function(){ 
//       $('button#SimpanTransaksi').focus();
//     }, 500);
// });

// $(document).on('click', 'button#SimpanTransaksi', function(){
//   SimpanTransaksi();
// });

// function SimpanTransaksi()
// {
//   var FormData = "nomor_nota="+encodeURI($('#nomor_nota').val());
//   FormData += "&tanggal="+encodeURI($('#tanggal').val());
//   FormData += "&id_kasir="+$('#id_kasir').val();
//   FormData += "&id_pelanggan="+$('#id_pelanggan').val();
//   FormData += "&" + $('#TabelTransaksi tbody input').serialize();
//   FormData += "&cash="+$('#UangCash').val();
//   FormData += "&catatan="+encodeURI($('#catatan').val());
//   FormData += "&grand_total="+$('#TotalBayarHidden').val();

//   $.ajax({
//     url: "<?php echo site_url('pembelian/add'); ?>",
//     type: "POST",
//     cache: false,
//     data: FormData,
//     dataType:'json',
//     success: function(data){
//       if(data.status == 1)
//       {
//         alert(data.pesan);
//         window.location.href="<?php echo site_url('pembelian/add'); ?>";
//       }
//       else 
//       {
//         $('.modal-dialog').removeClass('modal-lg');
//         $('.modal-dialog').addClass('modal-sm');
//         $('#ModalHeader').html('Oops !');
//         $('#ModalContent').html(data.pesan);
//         $('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
//         $('#ModalGue').modal('show');
//       } 
//     }
//   });
// }


</script>
