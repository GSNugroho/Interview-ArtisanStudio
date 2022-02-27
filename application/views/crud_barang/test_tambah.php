<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<center><h3>Tambah data baru</h3></center>
	<form action="<?php echo base_url(). 'test/tambah_aksi'; ?>" method="post">
		<table style="margin:20px auto;">
			<tr>
				<td>Nama Barang</td>
				<td><input type="text" name="nama_barang"></td>
			</tr>
			<tr>
				<td>Qty Barang</td>
				<td><input type="text" name="stock_barang"></td>
			</tr>
			<tr>
				<td>Harga Barang</td>
				<td><input type="text" name="harga_barang"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Tambah"></td>
			</tr>
		</table>
	</form>	
</body>
</html>