<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <?php if(!empty($rekapperday)){ ?>
        <title>Rekap_Penjualan_<?php echo date('d-m-Y'); ?></title>
        <?php }elseif(!empty($rekappermonth)){ ?>
        <title>Rekap_Penjualan_<?php echo date('m-Y'); ?></title>
        <?php } ?>

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">
        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        
    </head>
<body>
    
<div>&nbsp;</div>
<div class="row-fluid">
	<div class="col-md-12">
		<?php if(!empty($getrekap)){ ?>
		<table class="table table-striped table-bordered">
			<thead>
							<tr>
								<th>No</th>
								<th>Tanggal</th>
								<th>Nama Outlet</th>
								<th>No. Transaksi</th>
								<th>Pelanggan</th>
								<th>Nama Barang</th>
								<th>Ukuran</th>
								<th>Jml Jual</th>
								<th>Harga Satuan</th>
								<th>Disc</th>
								<th>Total (Disc Rp)</th>
								<th>Total</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1;foreach ($datapenjualan->result() as $row) {  $id = $row->penjualanid;?>
							<?php $crows = $this->db->query("SELECT COUNT(penjualanid) AS rowcount FROM detailpenjualan WHERE penjualanid='".$row->penjualanid."'");foreach ($crows->result() as $srows) { $countrows = $srows->rowcount;  ?>
							<tr>
								<td rowspan="<?php echo $countrows; ?>"><?php echo $no++; ?></td>
								<td rowspan="<?php echo $countrows; ?>"><?php echo $row->tgltransaksi; ?></td>
								<td rowspan="<?php echo $countrows; ?>"><?php echo $row->pic; ?></td>
								<td rowspan="<?php echo $countrows; ?>"><?php echo $row->penjualanid; ?></td>
								<td rowspan="<?php echo $countrows; ?>"><?php echo $row->namacustomer; ?></td>
								<?php $min = $this->db->query("SELECT
																Min(detailpenjualan.detailpenjualanid),
																detailpenjualan.detailpenjualanid,
																detailpenjualan.totalharga,
																item.namaitem,
																item.ukuran,
																detailpenjualan.jumlahjual,
																item.hargajual
																FROM
																detailpenjualan
																INNER JOIN item ON detailpenjualan.itemid = item.itemid
																WHERE detailpenjualan.penjualanid = '".$row->penjualanid."'
																");foreach ($min->result() as $smin) { $iddet = $smin->detailpenjualanid; ?>
								<td><?php echo $smin->namaitem; ?></td>
								<td><?php echo $smin->ukuran; ?></td>
								<td align="center"><?php echo number_format($smin->jumlahjual,0,',','.'); ?></td>
								<td align="right"><?php echo number_format($smin->hargajual,0,',','.'); ?></td>
								<td rowspan="<?php echo $countrows; ?>" align="center"><?php echo $row->diskon; ?>%</td>
								<td rowspan="<?php echo $countrows; ?>" align="center"><?php $hargadis = $row->hargajual * ( $row->diskon / 100 );echo "Rp ".number_format($hargadis,0,'.','.') ?></td>
								<td><?php echo number_format($smin->totalharga,0,',','.'); ?></td>
								<?php } ?>
								<td rowspan="<?php echo $countrows; ?>" align="right"><?php echo "Rp ".number_format($row->hargajual,0,'.','.') ?></td>
							</tr>
							<?php $detailpenjualan	= $this->db->query("SELECT
															item.itemid,
															item.namaitem,
															item.ukuran,
															detailpenjualan.jumlahjual,
															detailpenjualan.totalharga,
															detailpenjualan.hargaasli,
															item.hargajual
															FROM
															detailpenjualan
															INNER JOIN item ON detailpenjualan.itemid = item.itemid
															WHERE detailpenjualan.penjualanid = '".$row->penjualanid."'
															AND detailpenjualan.detailpenjualanid != '".$iddet."'
															");
								foreach ($detailpenjualan->result() as $show) { ?>
							<tr>
								<td><?php echo $show->namaitem; ?> Kg</td>
								<td><?php echo $show->ukuran; ?></td>
								<td align="center"><?php echo number_format($show->jumlahjual,0,'.','.'); ?></td>
								<td align="right"><?php echo number_format($show->hargajual,0,',','.'); ?></td>
								<td align="right"><?php echo number_format($show->totalharga,0,',','.'); ?></td>
							</tr>
							<?php } ?>
							<?php } ?>
							<?php } ?>
						</tbody>
		</table>
		<?php } ?>
	</div>
</div>
<script type="text/javascript">
	window.print();
</script>
</body>
</html>