						<div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-info">
                                	<div class="panel-heading"><h3 class="panel-title text-white">Data History PO</h3></div>
                                    <div class="panel-body">
                                        <table id="datatable-responsive" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Faktur</th>
                                                    <th>Tanggal Order</th>
                                                    <th>Tanggal Kirim</th>
                                                    <th>Perkiraan Sampai</th>
                                                    <th>Keterangan</th> <?php //	0  = Data Belum Ada , 1  = Sudah Ada Barang, 2  = Kedatangan Barang Ditunda, 3  = Barang Sudah Datang  ?>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                            	<?php $no=1;foreach ($datapo1->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->fakturpo; ?></td>
                                                    <td><?php echo $row->tglorder; ?></td>
                                                    <td><?php echo $row->tglkirim; ?></td>
                                                    <td>Jam <?php echo $row->kirajamsampai; ?></td>
                                                    <td><?php if($row->ok == 0){ echo "Data Belum Ada";}elseif($row->ok == 1){ echo "Sudah Ada Barang";}elseif($row->ok == 2){ echo "Kedatangan Barang Ditunda";}elseif($row->ok == 3){ echo "Barang Sudah Datang"; }elseif($row->ok == 4){ echo "Barang Sudah Diterima"; } ?></td>
                                                    <td>
                                                    	<?php if($row->ok == 4){ ?>
                                                    	<a class="label label-pink">Sudah Konfirmasi <i class="fa fa-star"></i>&nbsp;</a>
                                                    	<a href="<?php echo base_url() ?>po/cetakpo/<?php $id=$row->fakturpo; echo $this->encryption->encode($id); ?>" class="label label-primary" target="_BLANK" title="Cetak"><i class="fa fa-print"></i>&nbsp;</a>
                                                    	<?php }else{ ?>
                                                    	<a href="<?php echo base_url() ?>po/editpo/<?php $id=$row->fakturpo; echo $this->encryption->encode($id); ?>" class="label label-warning" title="Edit"><i class="fa fa-pencil"></i>&nbsp;</a>
                                                    	<a href="<?php echo base_url() ?>po/deletepo/<?php $di=$row->fakturpo;echo $this->encryption->encode($di); ?>" class="label label-danger" onclick="return confirm('yakin ingin menghapus item ini');" title="Delete"><i class="fa fa-trash"></i>&nbsp;</a>
                                                    	<?php } ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-success">
                                	<div class="panel-heading"><h3 class="panel-title text-white">Pesan Order SIAP</h3></div>
                                    <div class="panel-body">
                                        <table id="datatable-responsive-2" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Faktur</th>
                                                    <th>Tanggal Order</th>
                                                    <th>Tanggal Kirim</th>
                                                    <th>Perkiraan Sampai</th>
                                                    <th>Keterangan</th> <?php //	0  = Data Belum Ada , 1  = Sudah Ada Barang, 2  = Kedatangan Barang Ditunda, 3  = Barang Sudah Datang  ?>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                            	<?php $no=1;foreach ($datapo3->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->fakturpo; ?></td>
                                                    <td><?php echo $row->tglorder; ?></td>
                                                    <td><?php echo $row->tglkirim; ?></td>
                                                    <td>Jam <?php echo $row->kirajamsampai; ?></td>
                                                    <td><?php if($row->ok == 0){ echo "Data Belum Ada";}elseif($row->ok == 1){ echo "Sudah Ada Barang";}elseif($row->ok == 2){ echo "Kedatangan Barang Ditunda";}elseif($row->ok == 3){ echo "Barang Sudah Datang"; } ?></td>
                                                    <td>
                                                    	<a href="<?php echo base_url() ?>po/cetakawalpo/<?php $id=$row->fakturpo; echo $this->encryption->encode($id); ?>" class="label label-primary" target="_BLANK">Cetak <i class="fa fa-print"></i>&nbsp;</a>
                                                    	<a href="<?php echo base_url() ?>po/urungkanpo/<?php $di=$row->fakturpo;echo $this->encryption->encode($di); ?>" class="label label-purple">Urungkan</a>
                                                    	<a href="<?php echo base_url() ?>po/sudahditerima/<?php $id=$row->fakturpo; echo $this->encryption->encode($id); ?>" class="label label-pink">Sudah Diterima ?</a>
                                                    	<a href="<?php echo base_url() ?>po/ditunda/<?php $id=$row->fakturpo; echo $this->encryption->encode($id); ?>" class="label label-danger">Ditunda</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-pink">
                                	<div class="panel-heading"><h3 class="panel-title text-white">Konfirmasi Kedatangan Barang (Bahwa barang sudah diterima)</h3></div>
                                    <div class="panel-body">
                                        <table id="datatable-responsive-3" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Faktur</th>
                                                    <th>Tanggal Order</th>
                                                    <th>Tanggal Kirim</th>
                                                    <th>Perkiraan Sampai</th>
                                                    <th>Keterangan</th> <?php //	0  = Data Belum Ada , 1  = Sudah Ada Barang, 2  = Kedatangan Barang Ditunda, 3  = Barang Sudah Datang  ?>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                            	<?php $no=1;foreach ($datapo5->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->fakturpo; ?></td>
                                                    <td><?php echo $row->tglorder; ?></td>
                                                    <td><?php echo $row->tglkirim; ?></td>
                                                    <td>Jam <?php echo $row->kirajamsampai; ?></td>
                                                    <td><?php if($row->ok == 0){ echo "Data Belum Ada";}elseif($row->ok == 1){ echo "Sudah Ada Barang";}elseif($row->ok == 2){ echo "Kedatangan Barang Ditunda";}elseif($row->ok == 3){ echo "Barang Sudah Datang"; } ?></td>
                                                    <td>
                                                    	<?php $cekkonfirmasi = $this->db->query("select * from konfirmasipo where fakturpo = '".$row->fakturpo."'");if($cekkonfirmasi->num_rows > 0) { ?>
                                                    	<a class="label label-pink">Sudah Konfirmasi <i class="fa fa-star"></i>&nbsp;</a>
                                                    	<a href="<?php echo base_url() ?>po/editpo/<?php $id=$row->fakturpo; echo $this->encryption->encode($id); ?>" class="label label-primary">Cetak <i class="fa fa-print"></i>&nbsp;</a>
                                                    	<?php }else{ ?>
                                                    	<a href="<?php echo base_url() ?>po/terimabarang/<?php $id=$row->fakturpo; echo $this->encryption->encode($id); ?>" class="label label-pink">Konfirmasi Sekarang !</a>
                                                    	<a href="<?php echo base_url() ?>po/urungkanpo/<?php $di=$row->fakturpo;echo $this->encryption->encode($di); ?>" class="label label-purple">Urungkan</a>
                                                    	<?php } ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-danger">
                                	<div class="panel-heading"><h3 class="panel-title text-white">Konfirmasi Kedatangan Barang Bahwa Ada Penundaan Pengiriman</h3></div>
                                    <div class="panel-body">
                                        <table id="datatable-responsive-4" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Faktur</th>
                                                    <th>Tanggal Order</th>
                                                    <th>Tanggal Kirim</th>
                                                    <th>Perkiraan Sampai</th>
                                                    <th>Keterangan</th> <?php //	0  = Data Belum Ada , 1  = Sudah Ada Barang, 2  = Kedatangan Barang Ditunda, 3  = Barang Sudah Datang  ?>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                            	<?php $no=1;foreach ($datapo4->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->fakturpo; ?></td>
                                                    <td><?php echo $row->tglorder; ?></td>
                                                    <td><?php echo $row->tglkirim; ?></td>
                                                    <td>Jam <?php echo $row->kirajamsampai; ?></td>
                                                    <td><?php if($row->ok == 0){ echo "Data Belum Ada";}elseif($row->ok == 1){ echo "Sudah Ada Barang";}elseif($row->ok == 2){ echo "Kedatangan Barang Ditunda";}elseif($row->ok == 3){ echo "Barang Sudah Datang"; } ?></td>
                                                    <td>
                                                    	<?php if($row->keterangan == null){ ?>
                                                    	<a href="<?php echo base_url() ?>po/tundapo/<?php $id=$row->fakturpo; echo $this->encryption->encode($id); ?>" class="label label-purple">Konfirmasi Sekarang !</a>
                                                    	<?php }else{ ?>
                                                    	<a href="<?php echo base_url() ?>po/sudahditerima/<?php $id=$row->fakturpo; echo $this->encryption->encode($id); ?>" class="label label-pink">Sudah Diterima ?</a>
                                                    	<?php } ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->