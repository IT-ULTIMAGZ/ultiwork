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
                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Barang</th>
                                                    <th>Nama Item</th>
                                                    <th>Ukuran</th>
                                                    <th>Harga Beli</th>
                                                    <th>Harga Jual</th>
                                                    <th>Total Item</th>
                                                    <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2){ ?>
                                                    <th>Opsi</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>


                                            <tbody>
                                            	<?php $no=1;foreach ($dataitem->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->itemid; ?></td>
                                                    <td><?php echo $row->namaitem; ?></td>
                                                    <td><?php echo $row->ukuran; ?></td>
                                                    <td align="right"><?php echo number_format($row->hargabeli,2,'.',','); ?></td>
                                                    <td align="right"><?php echo number_format($row->hargajual,2,'.',','); ?></td>
                                                    <td align="right"><?php echo number_format($row->totalitem,0,'.','.'); ?></td>
                                                    <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2){ ?>
                                                    <td>
                                                    	<a href="<?php echo base_url() ?>item/edititem/<?php $id=$row->itemid; echo $this->encryption->encode($id); ?>" class="label label-warning">Edit</a><!--item/edititem/-->
                                                    	<a href="<?php echo base_url() ?>item/deleteitem/<?php $di=$row->itemid;echo $this->encryption->encode($di); ?>" class="label label-danger" onclick="return confirm('yakin ingin menghapus item ini');">Delete</a>
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