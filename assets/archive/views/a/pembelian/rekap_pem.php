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
					<form method="get" action="<?php echo base_url() ?>pembelian/getrekap">
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
                                                    <td align="right"><?php echo number_format($row->jmlditerima,0,'.','.'); ?></td>
                                                    <td align="right"><?php echo number_format($row->total,0,'.','.'); ?></td>
                                                    <td align="center"><?php if($row->bayar == 0){ echo "Belum Dibayar";}else{echo "Sudah Dibayar";} ?></td>
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