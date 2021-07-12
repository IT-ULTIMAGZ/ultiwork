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
                                                    <th>No</th>
                                                    <th>Kode Customer</th>
                                                    <th>Pic.</th>
                                                    <th>Nama Toko</th>
                                                    <th>Alamat Toko</th>
                                                    <th>Telp Toko</th>
                                                    <?php if($this->session->userdata('level') == 1){ ?>
                                                    <th>Petugas</th>
                                                    <?php } ?>
                                                    <th>Waktu Daftar</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                            	<?php $no=1;foreach ($datacustomer->result() as $row) { ?>
                                                <tr>
                                                    <td width="20"><?php echo $no++; ?></td>
                                                    <td><?php echo $row->customerid; ?></td>
                                                    <td><?php echo $row->namacustomer; ?> </td>
                                                    <td><?php echo $row->namatoko; ?> Photo</td>
                                                    <td><?php echo $row->alamatcustomer; ?></td>
                                                    <td><?php echo $row->telpcustomer; ?></td>
                                                    <?php if($this->session->userdata('level') == 1){ ?>
                                                    <td><?php echo $row->nmpetugas; ?></td>
                                                    <?php } ?>
                                                    <td><?php echo $row->datetime; ?></td>
                                                    <td>
                                                    	<a href="<?php echo base_url() ?>customer/editcustomer/<?php $id=$row->customerid; echo $this->encryption->encode($id); ?>" class="label label-warning">Edit</a>
                                                    	<a href="<?php echo base_url() ?>customer/deletecustomer/<?php $di=$row->customerid;echo $this->encryption->encode($di); ?>" class="label label-danger" onclick="return confirm('yakin ingin menghapus customer ini');">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->