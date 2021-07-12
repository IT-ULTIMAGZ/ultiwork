<!DOCTYPE html>
<html>
<head>
	<title><?php $tanggal = date('d-m-Y H:i:s');echo "[Struk]_[$tanggal]_[$postid].pdf"; ?></title>
	<style type="text/css">
	body{font-family: helvetica;font-size: 10px;}
	.table{border-spacing:0;border-collapse:collapse}td,th{padding:2.5px 4px;}.td{border-bottom: 1px solid #333!important;}
	.table{border-collapse:collapse!important}.table td,.table th{background-color:#fff!important}.table-bordered td{border-bottom:1px solid #333!important}}
	h1{ text-transform: uppercase;}
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
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>Pembayaran Pertama</div>
<div>&nbsp;</div>
<table class="table table-striped table-bordered">
	<tr>
		<td>ID Penjualan</td>
		<td><?php echo $idpenjualan; ?></td>
	</tr>
	<tr>
		<td>Tgl Bayar</td>
		<td><?php echo $tglbayar; ?></td>
	</tr>
	<tr>
		<td>Di Bayar</td>
		<td><?php echo "Rp. ".number_format($bayar,2,',','.'); ?></td>
	</tr>
	<tr>
		<td>Sisa Bayar</td>
		<td><?php echo "Rp. ".number_format($sisa,2,',','.') ?></td>
	</tr>
</table>

</body>
</html>