                        <div class="row">
                            <div class="col-sm-12">
                                <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2){ ?>
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
                                <?php } ?>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <table id="datatable-responsive" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID Penjualan</th>
                                                    <th>Customer</th>
                                                    <th>Tgl</th>
                                                    <th>Metode</th>
                                                    <th>Jumlah</th>
                                                    <th>Total</th>
                                                    <th>Diskon</th>
                                                    <th>Bukti Trans</th>
                                                    <th>Keterangan</th>
                                                    <th>Sts</th>
                                                    <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2){ ?>
                                                    <th>Opsi</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>


                                            <tbody>
                                            	<?php $no=1;foreach ($datapenjualan->result() as $row) { ?>
                                                <tr>
                                                    <td><a href="<?php echo base_url() ?>penjualan/detail/<?php $id=$row->penjualanid;echo $this->encryption->encode($id); ?>"><?php echo $row->penjualanid; ?></a></td>
                                                    <td><?php echo $row->namacustomer; ?></td>
                                                    <td><?php echo $row->tgltransaksi; ?></td>
                                                    <td><?php if($row->metodepembayaran == 1){echo "Tunai";}elseif($row->metodepembayaran == 2){echo "Transfer";}elseif($row->metodepembayaran == 3){echo "Cek";}; ?></td>
                                                    <td align="right"><?php echo number_format($row->jumlah,0,'.','.'); ?></td>
                                                    <td align="right"><?php echo number_format($row->hargajual,0,'.','.'); ?></td>
                                                    <td><?php echo $row->diskon; ?> %</td>
                                                    <td align="center"><?php if($row->buktitransaksi == null){ ?><a title="Lampiran Tidak Ada"><i class="fa fa-folder-open-o"></i></a><?php }else{ ?><a href="<?php echo base_url(); ?>assets/lampiranpembayaran/<?php echo $row->buktitransaksi; ?>" title="Lampiran ( <?php echo $row->buktitransaksi; ?> )" target="_BLANK"><i class="fa fa-folder-open"></i></a><?php } ?></td>
                                                    <td><?php echo $row->keterangan; ?></td>
                                                    <td align="center"><?php if($row->bayar == 0){ echo "<b class='text-danger' title='belum lunas'><i class='fa fa-close' title='Belum Lunas'></i></b>";}else{echo "<b class='text-success' title='Sudah Lunas'><i class='fa fa-check'></i></b>";} ?></td>
                                                    <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2){ ?>
                                                    <td>
                                                    	<a href="<?php echo base_url() ?>penjualan/editpenjualan/<?php $id=$row->penjualanid; echo $this->encryption->encode($id); ?>" class="label label-warning" title="Edit"><i class="fa fa-pencil"></i>&nbsp;</a>
                                                    	<a href="<?php echo base_url() ?>penjualan/deletepenjualan/<?php $id=$row->penjualanid; echo $this->encryption->encode($id); ?>" class="label label-danger" onclick="return confirm('yakin ingin menghapus penjualan ini');" title="Delete"><i class="fa fa-trash"></i>&nbsp;</a>
                                                    	<a href="<?php echo base_url() ?>penjualan/printpenjualan/<?php $id=$row->penjualanid; echo $this->encryption->encode($id); ?>" class="label label-primary" target="_BLANK" title="Cetak"><i class="fa fa-print"></i>&nbsp;</a>
                                                    </td>
                                                    <?php } ?>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->