<!DOCTYPE html>
<html>
<head>
	<title><?php $tanggal=date('d-m-Y');echo "[Tanda Terima Barang]_[$tanggal]_[$faktur].pdf" ?></title>
	<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">-->
</head>
<body>
<p align="center"><b>PESAN ORDER</b></p>
<table>
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td width="20"></td>
		<td align="center">
			<p>DINANDA FRAME</p>
			<p>Ruko Serpong Green Park Blok R No. 19</p>
			<p>Serua Ciputat Tangerang Selatan</p>
			<p>Banten 15414 - Indonesia</p>
			<p>Dinandaframe@gmail.com</p>
			<p>Tlp. 8129175670</p>
			<p>Fax. (021) 29431570</p>
		</td>
		<td width="300"></td>
		<td align="center">
			<?php 
				$bln = date('m');
				if($bln == "01"){ $bulan = "Januari";}elseif($bln == "02"){ $bulan = "Februari";}elseif($bln == "03"){ $bulan = "Maret";}
                elseif($bln == "04"){ $bulan = "April";}elseif($bln == "05"){ $bulan = "Mei";}elseif($bln == "06"){ $bulan = "Juni";}
                elseif($bln == "07"){ $bulan = "Juli";}elseif($bln == "08"){ $bulan = "Agustus";}elseif($bln == "09"){ $bulan = "September";}
				elseif($bln == "10"){ $bulan = "Oktober";}elseif($bln == "11"){ $bulan = "November";}elseif($bln == "12"){ $bulan = "Desember";}
			?>
			<P>Tangsel, <?php echo date('d')." ".$bulan." ".date('Y'); ?></P>
			<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
		</td>
	</tr>
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td align="left" colspan="4">Bersama ini kami dari DINANDA FRAME telah menerima barang yang telah dikirimkan sebagai berikut :</td>
	</tr>
	</table>

	<table border="1" cellpadding="5" cellspacing="-0.5">
		<tr>
			<td align="center"><b style="font-size:10px;">No</b></td>
			<td align="center"><b style="font-size:10px;">Nama Barang</b></td>
			<td align="center"><b style="font-size:10px;">Ukuran</b></td>
			<td align="center"><b style="font-size:10px;">Sat</b></td>
			<td align="center"><b style="font-size:10px;">Jml Order</b></td>
			<td align="center"><b style="font-size:10px;">Jml Kirim</b></td>
			<td align="center"><b style="font-size:10px;">Harga</b></td>
			<td align="center"><b style="font-size:10px;">Total</b></td>
			<td align="center" width="180"><b style="font-size:10px;">Keterangan</b></td>
		</tr>
		<?php $no=1;foreach ($datapo->result() as $row) { ?>
		<tr>
			<td align="center"><p style="font-size:9px;"><?php echo $no++; ?></p></td>
			<td><p style="font-size:9px;"><?php echo $row->namaitem; ?></p></td>
			<td><p style="font-size:9px;"><?php echo $row->ukuran; ?></p></td>
			<td align="center"><p style="font-size:9px;">Pcs</p></td>
			<td align="right"><p style="font-size:9px;"><?php echo $row->jmlorder; ?></p></td>
			<td align="right"><p style="font-size:9px;"><?php echo $row->jmlditerima; ?></p></td>
			<td align="right"><p style="font-size:9px;"><?php echo "Rp. ".number_format($row->hargajual,0,'.','.'); ?></p></td>
			<td align="right"><p style="font-size:9px;"><?php echo "Rp. ".number_format($row->total,0,'.','.'); ?></p></td>
			<td><p style="font-size:9px;"><?php if($row->keterangan == null){ echo "-";}else{echo $row->keterangan;} ?></p></td>
		</tr>
		<?php } ?>
	</table>

	<table>
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
		<?php foreach ($detailpo->result() as $show) { ?>
		<tr>
			<td width="50"></td>
			<td>
				Diserahkan,
				<br><br><br>
				(<?php echo $show->diserahkan; ?>)
			</td>
			<td width="400"></td>
			<td>
				Diterima,
				<br><br><br>
				(<?php echo $show->diterima; ?>)
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
