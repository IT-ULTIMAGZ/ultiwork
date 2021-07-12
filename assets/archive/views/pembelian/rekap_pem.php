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
                                                    <th>Lampiran</th>
                                                    <th>Bukti Bayar</th>
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
                                                    <td>
                                                    	<?php if($row->lampiran == null){ ?><a title="Lampiran Tidak Ada"><i class="fa fa-folder-open-o"></i></a><?php }else{ ?><a href="<?php echo base_url(); ?>assets/lampiranpo/<?php echo preg_replace('/ /','_',$row->lampiran); ?>" title="Lampiran ( <?php echo $row->lampiran; ?> )" target="_BLANK"><i class="fa fa-folder-open"></i></a><?php } ?>
                                                    </td>
                                                    <td>
                                                    	<?php if($row->buktipembayaran == null){ ?><a title="Lampiran Tidak Ada"><i class="fa fa-folder-open-o"></i></a><?php }else{ ?><a href="<?php echo base_url(); ?>assets/lampiranpembayaranpembelian/<?php preg_replace('/ /','_',$row->buktipembayaran); ?>" title="Lampiran ( <?php echo $row->buktipembayaran; ?> )" target="_BLANK"><i class="fa fa-folder-open"></i></a><?php } ?>
                                                    </td>
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