<!DOCTYPE html>
<html>
<head>
	<title><?php $tanggal=date('d-m-Y');echo "[PESAN ORDER]_[$tanggal]_[$faktur].pdf" ?></title>
	<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">-->
</head>
<body>
<p align="center"><b>PESAN ORDER</b></p>
<table>
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td width="50"></td>
		<td align="center">
			<p>DINANDA FRAME</p>
			<p>Ruko Serpong Green Park Blok R No. 19</p>
			<p>Serua Ciputat Tangerang Selatan</p>
			<p>Banten 15414 - Indonesia</p>
			<p>Dinandaframe@gmail.com</p>
			<p>Tlp. 8129175670</p>
			<p>Fax. (021) 29431570</p>
		</td>
		<td width="500"></td>
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
	</table>

	<table border="1" cellpadding="5" cellspacing="-0.5">
		<tr>
			<td><b>No</b></td>
			<td><b>Item</b></td>
			<td><b>Ukuran</b></td>
			<td><b>Putih</b></td>
			<td><b>Hitam</b></td>
			<td><b>Coklat</b></td>
			<td><b>Hijau</b></td>
			<td><b>Biru</b></td>
			<td><b>Pink</b></td>
			<td><b>Ungu</b></td>
			<td><b>Merah</b></td>
			<td><b>Silver</b></td>
			<td><b>Oak</b></td>
			<td><b>Walnut</b></td>
			<td><b>Gold</b></td>
			<td><b>CF Been</b></td>
			<td><b>Honay</b></td>
			<td><b>Kuning</b></td>
		</tr>
		<?php $no=1;foreach ($dataitempo->result() as $row) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->namaitem; ?></td>
			<td><?php echo $row->ukuran; ?></td>
			<td><?php echo $row->putih; ?></td>
			<td><?php echo $row->hitam; ?></td>
			<td><?php echo $row->coklat; ?></td>
			<td><?php echo $row->hijau; ?></td>
			<td><?php echo $row->biru; ?></td>
			<td><?php echo $row->pink; ?></td>
			<td><?php echo $row->ungu; ?></td>
			<td><?php echo $row->merah; ?></td>
			<td><?php echo $row->silver; ?></td>
			<td><?php echo $row->oak; ?></td>
			<td><?php echo $row->walnut; ?></td>
			<td><?php echo $row->gold; ?></td>
			<td><?php echo $row->cfbeen; ?></td>
			<td><?php echo $row->honay; ?></td>
			<td><?php echo $row->kuning; ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
