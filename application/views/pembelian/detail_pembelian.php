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
            <div class="box-body">
              <div class="col-md-10">
              <div class="box-header">
                <table style="font-weight: bold;font-size: 15px" class="table table-condensed">
                  <tr>
                    <!-- <td style="width: 100px"> Nota</td>
                    <td>: <?php echo $nota;?></td>
                    <td style="width: 300px"></td> -->
                    <td style="width: 100px">Tanggal</td>
                    <td>: <?php echo $tgl;?></td>
                  </tr>
                  <!-- <tr>
                    <td> Supplier</td>
                    <td>: <?php echo $nm_sup; ?></td>
                    <td colspan="3"></td>
                  </tr> -->
                </table>
              </div>
               <table class="table table-bordered" style="border-width: 5px solid black">
                 <tr>
                   <th>Nama Barang</th>
                   <th>Satuan</th>
                   <th style="width: 70px">Jumlah</th>
                   <th style="width: 130px">Jumlah Bayar</th>
                 </tr>
                 <?php foreach ($getData2 as $key) { ?>
                 <tr>
                   <td><?php echo$key['nmbrg']; ?></td>
                   <td><?php echo$key['satuan'];?></td>
                   <td style="text-align: right;"><?php echo$key['jumlah'];?></td>
                   <td style="text-align: right;"><?php echo$key['jml_bayar'];?></td>
                 </tr>
                 <?php } ?>
                 <tr>
                   <td style="font-weight: bold;text-align: center;" colspan="2">Total</td>
                   <td style="text-align: right;"><?php echo $jml_beli; ?></td>
                   <td style="text-align: right;"><?php echo $total; ?></td>
                 </tr>
               </table> 
             </div>
              
            </div>
          </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>



