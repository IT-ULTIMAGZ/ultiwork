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
					<form method="get" action="<?php echo base_url() ?>penagihan/getrekap">
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
								<th>ID Transaksi</th>
								<th>Tgl Bayar</th>
								<th>Bayar</th>
								<th>Sisa Bayar</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($datapenagihan->result() as $row) { ?>
							<tr>
								<td><?php echo $row->datetime; ?></td>
								<td><?php echo $row->penjualanid; ?></td>
								<td><?php echo $row->tglbayar; ?></td>
								<td><?php echo $row->bayar; ?></td>
								<td><?php echo $row->sisa;if($row->sisa == 0){ echo " [LUNAS]";} ?></td>
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