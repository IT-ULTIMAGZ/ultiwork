<div class="row">
	<?php if(!empty($getrekap)){ ?>
	<div class="col-md-12">
	<?php }else{ ?>
	<div class="col-md-6">
	<?php } ?>
		<div class="panel panel-default">
			<div class="panel-body">
				<?php if(empty($getrekap)){ ?>
				<div class="col-sm-12">
					<form method="get" action="<?php echo base_url() ?>penjualan/getrekap">
					<div class="input-daterange input-group col-sm-12" id="date-range">
						<span class="input-group-addon bg-primary b-0 text-white">Tanggal</span>
						<input type="text" class="form-control" name="start" value="<?php echo date('Y-m-d'); ?>" />
						<span class="input-group-addon bg-primary b-0 text-white">S/D</span>
						<input type="text" class="form-control" name="end" value="<?php echo date('Y-m-d'); ?>" />
					</div>
					<div>&nbsp;</div>
					<div><button type="submit" class="btn btn-success btn-small col-sm-12">Go</button></div>
					</form>
					<div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div>
				</div>
				<?php } ?>
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
							<?php $no=1;foreach ($datapenjualan->result() as $row) {  $id = $row->penjualanid;?>
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
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>