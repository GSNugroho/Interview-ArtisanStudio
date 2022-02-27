<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<h3>Edit Data</h3>
	</center>
	<?php foreach($barang as $b){ ?>
	<form action="<?php echo base_url(). 'test/update'; ?>" method="post">
		<table style="margin:20px auto;">
			<tr>
				<td>Nama Barang</td>
				<td>
					<input type="hidden" name="id_barang" value="<?php echo $b->id_barang ?>">
					<input type="text" name="nama_barang" value="<?php echo $b->nama_barang ?>">
				</td>
			</tr>
			<tr>
				<td>Stock Barang</td>
				<td><input type="text" name="stock_barang" value="<?php echo $b->stock_barang ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>
</body>
</html>