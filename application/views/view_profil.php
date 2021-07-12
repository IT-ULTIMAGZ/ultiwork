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
                                            <?php  /*<tr>
                                                <td>Foto Profil</td>
                                                <td>
                                                    <img src="<?php echo base_url(); ?>assets/images/users/<?php 
                                        
                                             if($this->session->userdata('level') == 1){ echo "avatar-1.jpg"; }else if($this->session->userdata('level') == 2){ echo "avatar-2.jpg"; }else if($this->session->userdata('level') == 3){ echo "avatar-3.jpg";}else if($this->session->userdata('level') == 4){ echo "avatar-4.jpg";}else if($this->session->userdata('level') == 5){ echo "avatar-5.jpg";}else if($this->session->userdata('level') == 6){ echo "avatar-6.jpg";} 
                                         ?>" alt="user-img">
                                                </td>
                                            </tr> */ ?>
                                            <tr>
                                                <td>Divisi</td>
                                                <td>
                                                    <?php echo $level ?>    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td><?php if($as=='Kadiv' && $levelid<6){echo "Kepala Divisi";}else if($as=='Kadiv' && $levelid==6){echo "Pemimpin";}else{echo $as;}; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Lengkap</td>
                                                <td><?php echo $nama; ?></td>
                                            </tr>
                                            <tr>
                                                <td>NIM</td>
                                                <td><?php echo $nim; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Telepon</td>
                                                <td><?php echo $telepon; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?php echo $email; ?></td>
                                            </tr>
                                            <tr>
                                                <td>TTL</td>
                                                <td><?php if($tmptlahir!=''||$tanggallahir!=''){echo $tmptlahir.", ".$tanggallahir;} ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis kelamin</td>
                                                <td><?php if($gender=='L'){echo"Laki-laki";}else if($gender=='P'){echo"Perempuan";}; ?></td>
                                            </tr>

                                            <tr>
                                                <td>Login</td>
                                                <td><?php echo $username; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Sandi</td>
                                                <td>*****</td>
                                            </tr>

                                            <tr>
                                                <td>Alamat</td>
                                                <td><?php echo $alamat; ?></td>
                                            </tr>

                                        	<tr>
                                        		<td></td>
                                        		<td>
                                        			<a href="<?php echo base_url() ?>main/editprofil" class="btn btn-warning btn-small">Edit Profil</a>
                                                    <a href="<?php echo base_url() ?>main/editpassword" class="btn btn-success btn-small">Edit Password</a>
                                        		</td>
                                        	</tr>
                                        </table>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->