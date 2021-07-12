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
					<table id="datatable-buttons" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Date & Time</th>
								<th>ID Penjualan</th>
								<th>Kode Barang</th>
								<th>Item</th>
								<th>Size</th>
								<th>Jumlah</th>
								<th>Total Size</th>
								<th>Harga Beli/Kg</th>
								<th>Harga Jual/Kg</th>
								<th>Profit</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($datapenjualan->result() as $row) { ?>
							<tr>
								<td><?php echo $row->datetime; ?></td>
								<td><?php echo $row->penjualanid; ?></td>
								<td><?php echo $row->itemid; ?></td>
								<td><?php echo $row->category; ?></td>
								<td align="right"><?php echo $size=$row->size;echo number_format($size,2,'.','.'); ?> Kg</td>
								<td align="right"><?php echo $jumlah=$row->jumlah;echo number_format($jumlah,2,'.','.'); ?></td>
								<td align="right"><?php $total=$size*$jumlah;echo number_format($total,2,'.','.'); ?></td>
								<td align="right"><?php echo number_format($row->harga,2,',','.'); ?></td>
								<td align="right"><?php echo number_format($row->hargajual,2,',','.'); ?></td>
								<td align="right"><?php echo number_format($row->hargajual - $row->harga,2,'.','.'); ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
	            <?php } ?>
			</div>
		</div>
	</div>
</div>