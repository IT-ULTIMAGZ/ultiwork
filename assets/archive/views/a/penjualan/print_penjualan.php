<!DOCTYPE html>
<html>
<head>
	<title><?php $tanggal = date('d-m-Y H:i:s');echo "[Struk]_[$tanggal]_[$judul].pdf"; ?></title>
	<style type="text/css">
	body{font-family: helvetica;}
	.table{border-spacing:0;border-collapse:collapse}td,th{padding:5px 10px;}.td{border-bottom: 1px solid #333!important;}
	.table{border-collapse:collapse!important}.table td,.table th{background-color:#fff!important}.table-bordered td,.table-bordered th{border:1px solid #333!important}}
	h1{ text-transform: uppercase;}
	</style>
</head>
<body>
<table>
	<tr>
		<td width="200"><img src="<?php echo base_url() ?>assets/images/logo.png" width="100"></td>
		<td>
			<center>
				<div><h1>STRUK PEMBELIAN</h1></div>
				<div><h1>FARHAN CHICK</h1></div>
				<div>Perum BNR Jalan Bukit Nirwana Raya I No. 151 RT/RW 004/012, Mulyaharja, Bogor Selatan</div>
				<div></div>
			</center>
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<?php foreach ($tampildataprint->result() as $row) { ?>
	<tr>
		<td width="100">CUST ID</td>
		<td>: </td>
	</tr>
	<tr>
		<td width="100">Tgl Pembelian</td>
		<td>: <?php echo $row->datetime; ?></td>
	</tr>
	<tr>
		<td width="100">No Nota</td>
		<td>: <?php echo $row->penjualanid ?></td>
	</tr>
	<?php } ?>
</table>
<div>&nbsp;</div>
<table class="table table-bordered ">
	<thead>
		<tr>
			<th>No</th>
			<th></th>
			<th>Harga /Kg</th>
			<th>qty</th>
			<th>ppn</th>
			<th>Jumlah (Rp)</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1;foreach ($tampildataprint->result() as $row) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td width="400"><?php echo $row->category; ?></td>
			<td width="200" align="right"><?php $harga=$row->hargajual;echo "Rp. ".number_format($harga,2,',','.'); ?></td>
			<td width="150" align="right">
				<?php $size=$row->size;//echo number_format($size,2,'.','.'); ?>
				<?php $jumlah=$row->jumlah;//echo number_format($jumlah,2,'.','.'); ?>
				<?php $total=$size*$jumlah;echo number_format($total,2,'.','.'); ?></td>
			<td width="150" align="right">10%</td>
			<td width="200" align="right"><?php ($harga*$total)*10/100; ?></td>
		</tr>
		<tr>
			<td colspan="2" align="center">Jumlah Belanja</td>
			<td align="right"><?php $harga=$row->hargajual;echo "Rp. ".number_format($harga,2,',','.'); ?></td>
			<td align="right">
				<?php $size=$row->size;//echo number_format($size,2,'.','.'); ?>
				<?php $jumlah=$row->jumlah;//echo number_format($jumlah,2,'.','.'); ?>
				<?php $total=$size*$jumlah;echo number_format($total,2,'.','.'); ?></td>
			<td align="right">10%</td>
			<td align="right"><?php echo $total*10/100; ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<table>
	<tr>
		<td colspan="6" width="1150">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" width="575">&nbsp;</td>
		<td colspan="3" width="575">
			<center>
				Bogor,<br>N. Safira
			</center>
		</td>
	</tr>
</table>
</body>
</html>