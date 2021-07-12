                        <div class="row">
                            <div class="col-sm-12">
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
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <table id="datatable-responsive" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Jk</th>
                                                    <th>Alamat</th>
                                                    <th>Telp</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Level</th>
                                                    <th>Last Login</th>
                                                    <th>Status Login</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                            	<?php $no=1;foreach ($datapetugas->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->nmpetugas; ?></td>
                                                    <td><?php echo $row->jk; ?></td>
                                                    <td><?php echo $row->almtpetugas; ?></td>
                                                    <td><?php echo $row->telppetugas; ?></td>
                                                    <td><?php echo $row->username; ?></td>
                                                    <td><?php echo "******" ?></td>
                                                    <td><?php if($row->level == "1"){ echo "Master Admin"; }else{ echo "Admin"; } ?></td>
                                                    <td><?php echo $row->lastlogin ?></td>
                                                    <td><?php if($row->status == "1"){ echo "Sedang Login"; }else{ echo "Tidak Login"; }?></td>
                                                    <td>
                                                    	<a href="<?php echo base_url() ?>petugas/editpetugas/<?php $id=$row->petugasid; echo $this->encryption->encode($id); ?>" class="label label-warning">Edit</a>
                                                        <a href="<?php echo base_url() ?>petugas/editPasswordpetugas/<?php $id=$row->petugasid; echo $this->encryption->encode($id); ?>" class="label label-primary">Edit Password</a>
                                                    	<a href="<?php echo base_url() ?>petugas/delettpetugas/<?php $id=$row->petugasid; echo $this->encryption->encode($id); ?>" class="label label-danger" onclick="return confirm('yakin ingin menghapus akun petugas ini');">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->