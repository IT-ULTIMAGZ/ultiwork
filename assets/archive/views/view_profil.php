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
                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                        	<tr>
                                        		<td>Nama</td>
                                        		<td><?php echo $nama; ?></td>
                                        	</tr>
                                        	<tr>
                                        		<td>Jk</td>
                                        		<td><?php if($jk=="L"){echo "Laki-Laki";}elseif($jk=="P"){echo "Perempuan";} ?></td>
                                        	</tr>
                                        	<tr>
                                        		<td>Alamat</td>
                                        		<td><?php echo $alamat; ?></td>
                                        	</tr>
                                        	<tr>
                                        		<td>Telp</td>
                                        		<td><?php echo $telp; ?></td>
                                        	</tr>
                                        	<tr>
                                        		<td>Username</td>
                                        		<td><?php echo $username; ?></td>
                                        	</tr>
                                        	<tr>
                                        		<td>Pasword</td>
                                        		<td>*******</td>
                                        	</tr>
                                        	<tr>
                                        		<td>Last Login</td>
                                        		<td><?php echo $lastlogin; ?></td>
                                        	</tr>
                                        	<tr>
                                        		<td></td>
                                        		<td>
                                        			<a href="<?php echo base_url() ?>v1/editprofil/<?php echo $id; ?>" class="btn btn-warning btn-small">Edit Profil</a>
                                        			<a href="<?php echo base_url() ?>v1/editpassword/<?php echo $id; ?>" class="btn btn-success btn-small">Edit Password</a>
                                        		</td>
                                        	</tr>
                                        </table>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->