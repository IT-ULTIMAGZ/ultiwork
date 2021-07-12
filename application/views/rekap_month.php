<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <title>[Rekap Bulanan]_[<?php echo date('m-Y'); ?>].pdf</title>

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        
        <style type="text/css">
        body{font-size:12px;}
        td,th{padding: 5;}
        </style>

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
		<h5>
			<table>
				<tr>
					<td width="200"><p>Periode</p></td>
					<td width="20"><p>:</p></td>
					<td><p><?php echo $dari." s/d ".$sampai; ?></p></td>
				</tr>
				<tr>
					<td><p>Jumlah Item</p></td>
					<td><p>:</p></td>
					<td><p><?php echo number_format($jumlahitem,0,'.','.'); ?></p></td>
				</tr>
				<tr>
					<td><p>Jumlah Pembelian</p></td>
					<td><p>:</p></td>
					<td><p><?php echo number_format($jumlahpembelian,0,'.','.'); ?></p></td>
				</tr>
				<tr>
					<td><p>Jumlah Barang Masuk</p></td>
					<td><p>:</p></td>
					<td><p><?php echo number_format($barangmasuk,0,'.','.'); ?></p></td>
				</tr>
				<tr>
					<td><p>Jumlah Penjualan</p></td>
					<td><p>:</p></td>
					<td><p><?php echo number_format($jumlahpenjualan,0,'.','.'); ?></p></td>
				</tr>
				<tr>
					<td><p>Jumlah Barang Terjual</p></td>
					<td><p>:</p></td>
					<td><p><?php echo number_format($barangkeluar,0,'.','.'); ?></p></td>
				</tr>
				<tr>
					<td><p>Jumlah Profit</p></td>
					<td><p>:</p></td>
					<td><p><?php echo "Rp. ".number_format($jumlahprofit,2,',','.'); ?></p></td>
				</tr>
			</table>
			<?php /*
			<div class="row-fluid col-md-12">
				<span class="col-md-2"><p>Periode</p></span>
				<span class="col-md-4"><p>: <?php echo $dari." s/d ".$sampai; ?></p></span>
			</div>
			<div class="row-fluid col-md-12">
				<span class="col-md-2"><p>Jumlah Item</p></span>
				<span class="col-md-4"><p>: <?php echo $jumlahitem; ?></p></span>
			</div>
			<div class="row-fluid col-md-12">
				<div class="col-md-2"><p>Jumlah Pembelian</p></div>
				<div class="col-md-4"><p>: <?php echo $jumlahpembelian; ?></p></div>
			</div>
			<div class="row-fluid col-md-12">
				<div class="col-md-2"><p>Jumlah Barang Masuk</p></div>
				<div class="col-md-4"><p>: <?php echo $barangmasuk; ?></p></div>
			</div>
			<div class="row-fluid col-md-12">
				<div class="col-md-2"><p>Jumlah Penjualan</p></div>
				<div class="col-md-4"><p>: <?php echo $jumlahpenjualan; ?></p></div>
			</div>
			<div class="row-fluid col-md-12">
				<div class="col-md-2"><p>Jumlah Barang Terjual</p></div>
				<div class="col-md-4"><p>: <?php echo $barangkeluar; ?></p></div>
			</div>
			<div class="row-fluid col-md-12">
				<div class="col-md-2"><p>Jumlah Profit</p></div>
				<div class="col-md-4"><p>: <?php echo $jumlahprofit; ?></p></div>
			</div>*/ ?>
		</h5>
	</div>





	<div class="col-md-12">
		<div class="row-fluid"><h3>Penjualan</h3></div>
		<?php if(!empty($getrekap)){ ?>
				<div class="col-sm-12">
					<table class="table table-bordered">
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
							<?php $no=1;$subtotal = 0;foreach ($datapenjualan->result() as $row) {  $id = $row->penjualanid;?>
							<?php $crows = $this->db->query("SELECT COUNT(penjualanid) AS rowcount FROM detailpenjualan WHERE penjualanid='".$row->penjualanid."'");foreach ($crows->result() as $srows) { $countrows = $srows->rowcount;  ?>
							<tr>
								<td rowspan="<?php echo $countrows; ?>"><?php echo $no++; ?></td>
								<td rowspan="<?php echo $countrows; ?>"><?php echo $row->tgltransaksi; ?></td>
								<td rowspan="<?php echo $countrows; ?>"><?php echo $row->namatoko; ?></td>
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
								<td rowspan="<?php echo $countrows; ?>" align="center"><?php 
									$hargaawal = $this->db->query("select sum(hargaasli) as hargaawal from detailpenjualan where penjualanid = '".$id."'");
									foreach ($hargaawal->result() as $showhargaawal) {
										$hargadis = $showhargaawal->hargaawal * ( $row->diskon / 100 );echo "Rp ".number_format($hargadis,0,'.','.');	
									} 
								?></td>
								<td><?php echo number_format($smin->totalharga,0,',','.'); ?></td>
								<?php } ?>
								<td rowspan="<?php echo $countrows; ?>" align="right"><?php echo "Rp ".number_format($row->hargajual,0,'.','.'); $subtotal += $row->hargajual; ?></td>
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
							<tr>
								<td colspan="12" align="right">
									<b>Sub total </b>
								</td>
								<td><b><?php echo number_format($subtotal,0,',','.'); ?></b></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php } ?>
	</div>





	<div class="col-md-12">
		<div class="row-fluid"><h3>Pembelian</h3></div>
		<?php if(!empty($getrekap)){ ?>
		<table class="table table-striped table-bordered">
			<thead>
                                                <tr>
                                                    <th>Faktur</th>
                                                    <th>Tanggal Order</th>
                                                    <th>Tanggal Kirim</th>
                                                    <th>Jatuh Tempo</th>
                                                    <th>Jumlah Item</th>
                                                    <th>Total Bayar</th> <?php //    0  = Data Belum Ada , 1  = Sudah Ada Barang, 2  = Kedatangan Barang Ditunda, 3  = Barang Sudah Datang  ?>
                                                    <th>Sts</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php foreach ($datapembelian->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $row->fakturpo; ?></td>
                                                    <td><?php echo $row->tglorder; ?></td>
                                                    <td><?php echo $row->tglkirim; ?></td>
                                                    <td><?php echo $row->tgljatuhtempo; ?></td>
                                                    <td align="right">
                                                        <?php 
                                                            $total1 = $this->model_security->showdatasum1($row->fakturpo);
                                                            foreach ($total1->result() as $row1) {
                                                                echo number_format($row1->jmlditerima,0,'.','.');
                                                            }
                                                        ?>
                                                    </td>
                                                    <td align="right">
                                                        <?php 
                                                            $total2 = $this->model_security->showdatasum2($row->fakturpo);
                                                            foreach ($total2->result() as $row2) {
                                                                echo number_format($row2->total,0,'.','.');
                                                            }
                                                        ?>
                                                    </td>
                                                    <td align="center"><?php if($row->bayar == 0){ echo "Belum Dibayar";}else{echo "Sudah Dibayar";} ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
		</table>
		<?php } ?>
	</div>

</div>

</body>
</html>