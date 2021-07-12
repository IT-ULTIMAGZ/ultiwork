<!DOCTYPE html>
<html>
<head>
	<title><?php $tanggal = date('d-m-Y H:i:s');echo "[Inventory]_[$tanggal]_[$postid].pdf"; ?></title>
	<style type="text/css">
	table{border-spacing:0;border-collapse:collapse}td,th{padding:7.5px 10px;}
	.table{border-collapse:collapse!important}.table td,.table th{background-color:#fff!important}.table-bordered td,.table-bordered th{border:1px solid #ddd!important}}
	</style>
</head>
<body>
<table class="table table-striped table-bordered">
	<?php foreach ($tampildataprint->result() as $row) { ?>
	<tr>
		<td>ID Transaksi</td>
		<td><?php echo $row->penjualanid; ?></td>
	</tr>
	<tr>
		<td>Kode Barang</td>
		<td><?php echo $row->itemid; ?></td>
	</tr>
	<tr>
		<td>Category</td>
		<td><?php echo $row->category; ?></td>
	</tr>
	<tr>
		<td>Size</td>
		<td><?php echo $size=$row->size;echo number_format($size,2,'.','.') ?> Kg</td>
	</tr>
	<tr>
		<td>Jumlah</td>
		<td><?php echo $jumlah=$row->jumlah;echo number_format($jumlah,2,'.','.') ?></td>
	</tr>
	<tr>
		<td>Total Size</td>
		<td><?php $total=$size*$jumlah;echo number_format($total,2,'.','.'); ?></td>
	</tr>
	<tr>
		<td>Total</td>
		<td><?php echo "Rp. ".number_format($row->hargajual,2,',','.'); ?></td>
	</tr>
	<tr>
		<td>Date & Time</td>
		<td><?php echo $row->datetime; ?></td>
	</tr>
	<?php } ?>
</table>
</body>
</html>