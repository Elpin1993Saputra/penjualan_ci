<?php 
if($this->session->flashdata('info')):
	echo $this->session->flashdata('info'); 
endif;
?>
<table border="1">
	<tr>
		<td colspan="7"><a href="<?php echo site_url()."/barang/form" ?>">Tambah Data</td>
	</tr>
	<tr>
		<td>No.</td>
		<td>Kode Barang</td>
		<td>Nama Barang</td>
		<td>Satuan</td>
		<td>Jumlah</td>
		<td>Harga</td>
		<td>Aksi</td>

	</tr>
	
	<?php
	$no =1;
	foreach ($getData as $value) {
	?>
	<tr>
		<td><?php echo $no;?></td>
		<td><?php echo $value['kdbrg']; ?></td>
		<td><?php echo $value['nmbrg']; ?></td>
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

</table>
