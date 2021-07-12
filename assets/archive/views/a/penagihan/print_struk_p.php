<!DOCTYPE html>
<html>
<head>
	<title><?php $tanggal = date('d-m-Y H:i:s');echo "[BayarCicilan]_[$tanggal]_[$penjualanid].pdf"; ?></title>
	<style type="text/css">
	table{border-spacing:0;border-collapse:collapse}td,th{padding:7.5px 10px;}
	.table{border-collapse:collapse!important}.table td,.table th{background-color:#fff!important}.table-bordered td,.table-bordered th{border:1px solid #ddd!important}}
	</style>
</head>
<body>
<table class="table table-striped table-bordered">
	<tr>
		<td>ID Transaksi</td>
		<td><?php echo $penjualanid; ?></td>
	</tr>
	<tr>
		<td>Tanggal Bayar</td>
		<td><?php echo $tglbayar; ?></td>
	</tr>
	<tr>
		<td>Di Bayar</td>
		<td><?php echo "Rp. ".number_format($bayar,2,',','.'); ?></td>
	</tr>
	<tr>
		<td>Sisa Bayar</td>
		<td><?php echo "Rp. ".number_format($sisa,2,',','.');if($sisa == 0){ echo " [LUNAS]"; } ?></td>
	</tr>
</table>
</body>
</html>