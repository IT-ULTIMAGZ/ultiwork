<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div>
                    <?php $sukses=$this->session->flashdata('sukses');if(!empty($sukses)){ ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $sukses; ?>
                    </div>
                    <?php } ?>

                    <?php $gagal=$this->session->flashdata('gagal');if(!empty($gagal)){ ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $gagal; ?>
                    </div>
                    <?php } ?>
                </div>
				<div class="col-sm-12">
					<table id="datatable-responsive" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>ID Transaksi</th>
								<th>Nama Customer</th>
								<th>Telp</th>
								<th>Jml</th>
								<th>Total</th>
								<th>Metode</th>
								<th>Tgl Transaksi</th>
								<th>Jatuh Tempo</th>
								<th>Status</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($datapenagihan->result() as $row) { ?>
							<tr>
								<td><?php echo $row->penjualanid; ?></td>
								<td><?php echo $row->namacustomer; ?></td>
								<td><?php echo $row->telpcustomer; ?></td>
								<td align="right"><?php echo number_format($row->jumlah,0,'.','.'); ?></td>
								<td align="right"><?php echo number_format($row->hargajual,0,'.','.'); ?></td>
								<td><?php if($row->metodepembayaran == 1){echo "Tunai";}elseif($row->metodepembayaran == 2){echo "Transfer";}elseif($row->metodepembayaran == 3){echo "Cek";}; ?></td>
								<td><?php echo $row->tgltransaksi; ?></td>
								<td><?php echo $row->tgljatuhtempo; ?></td>
								<td>
									<?php
                                $tgl1 = $row->tgljatuhtempo;
                                $tgl2 = date('Y-m-d');
                                
                                $pecah1 = explode("-", $tgl1);
                                $year1 = $pecah1[0];
                                $month1 = $pecah1[1];
                                $date1 = $pecah1[2];
                                
                                $pecah2 = explode("-", $tgl2);
                                $year2 = $pecah2[0];
                                $month2 = $pecah2[1];
                                $date2 = $pecah2[2];
                                
                                    $tgl_dateline = GregorianToJD($month1, $date1, $year1); //jatuh tempo
                            		$tgl_kembali = GregorianToJD($month2, $date2, $year2); //tgl hari ini
                            		$lambat = $tgl_kembali - $tgl_dateline;
                                    
                                    //EDIT NOMINAL 1000 DENGAN NOMINAL YANG ANDA MAU
                            		$denda=$lambat*1000;

                            		if ($lambat>0) {
                            		echo "<font color='red'>$lambat hari<br>(Rp. $denda,00)</font>";
                            		}
									else if($lambat == 0){ echo "<font color='green'>Saatnya Pembayaran <i class='fa fa-phone fa-spin'></i> <i class='fa fa-money fa-spin'></i></font>"; }
									else if($lambat == 3 || $lambat == 2 || $lambat == 1){ echo "<font color='red'>Pembayaran Sisa ".$lambat." Hari <i class='fa fa-phone fa-spin'></i></font>"; }
									else if($lambat == 7){ echo "<font color='red'>Pembayaran Sisa 7 Hari <i class='fa fa-phone fa-spin'></i></font>"; }
									else if($lambat == 14){ echo "<font color='red'>Pembayaran Sisa 14 Hari <i class='fa fa-phone fa-spin'></i></font>"; }
									else if($lambat == 4 || $lambat == 5 || $lambat == 6){ echo "<font color='red'>Sisa ".$lambat." Hari <i class='fa fa-warning fa-spin'></i></font>"; }
									else if($lambat == 7 || $lambat == 8 || $lambat == 9 || $lambat == 10 || $lambat == 11 || $lambat == 12 || $lambat == 13){ echo "<font color='red'>Sisa ".$lambat." Hari <i class='fa fa-warning fa-spin'></i></font>"; }
									else { echo "<font color='#428bca'>Sisa ".$lambat." Hari <i class='fa fa-warning'></i></font>"; }
                                    ?> 
								</td>
								<td align="center">
									<a href="<?php echo base_url() ?>penagihan/editpenagihan/<?php $id=$row->penjualanid; echo $this->encryption->encode($id); ?>" class="label label-warning" title="Update"><i class="fa fa-pencil"></i></a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>