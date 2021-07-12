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
                                                    <th>Nama Customer</th>
                                                    <th>Pic.</th>
                                                    <th>Alamat Customer</th>
                                                    <th>Telp Customer</th>
                                                    <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2){ ?>
                                                    <th>Petugas</th>
                                                    <th>Waktu Daftar</th>
                                                    <th>Opsi</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>


                                            <tbody>
                                            	<?php $no=1;foreach ($datacustomer->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->namacustomer; ?></td>
                                                    <td><?php echo $row->pic; ?></td>
                                                    <td><?php echo $row->alamatcustomer; ?></td>
                                                    <td><?php echo $row->telpcustomer; ?></td>
                                                    <?php if($this->session->userdata('level') == 1){ ?>
                                                    <td><?php echo $row->nmpetugas; ?></td>
                                                    <td><?php echo $row->datetime; ?></td>
                                                    <td>
                                                    	<a href="<?php echo base_url() ?>customer/editcustomer/<?php $id=$row->customerid; echo $this->encryption->encode($id); ?>" class="label label-warning">Edit</a>
                                                    	<a href="<?php echo base_url() ?>customer/deletecustomer/<?php $di=$row->customerid;echo $this->encryption->encode($di); ?>" class="label label-danger" onclick="return confirm('yakin ingin menghapus customer ini');">Delete</a>
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