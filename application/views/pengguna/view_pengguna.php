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
                                                    <th>Divisi</th>
                                                    <th>Status</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Username</th>
                                                    <th>NIM</th>
                                                    <th>Email</th>
                                                    <?php if($this->session->userdata('level')==6||$this->session->userdata('level')==7){ ?>
                                                    <th>Telepon</th>
                                                    <th>TTL</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Alamat</th>
                                                    <?php } ?>
                                                    <?php if($this->session->userdata('level')==7){ ?>
                                                    <th>InputOleh</th>
                                                    <th>InputTgl</th>
                                                    <th>UpdateOleh</th>
                                                    <th>UpdateTgl</th>
                                                    <?php } ?>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                            	<?php 
                                                $no=1;foreach ($datapengguna->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->NamaLevel; ?></td>
                                                    <td><?php if($row->As=='Kadiv'){ echo "Kepala Divisi"; }else{ echo $row->As; } ?></td>
                                                    <td><?php echo $row->NamaLengkap; ?></td>
                                                    <td><?php if($this->session->userdata('level')==$row->IdLevel){echo $row->Login;}else{echo'-';} ?></td>
                                                    <td><?php echo $row->NIM ?></td>
                                                    <td><?php echo $row->Email ?></td>
                                                    <?php if($this->session->userdata('level')==6||$this->session->userdata('level')==7){ ?>
                                                    <td><?php echo $row->Telepon ?></td>
                                                    <td><?php if($row->TmpLahir!="" || $row->TglLahir !=""){ echo $row->TmpLahir.", ".$row->TglLahir; }  ?></td>
                                                    <td><?php if($row->LP=="L"){ echo "Laki-laki"; }else if($row->LP=="P"){ echo "Perempuan"; } ?></td>
                                                    <td><?php echo $row->Alamat ?></td>
                                                    <?php } ?>
                                                    <?php if($this->session->userdata('level')==7){ ?>
                                                    <td><?php echo $row->InputOleh ?></td>
                                                    <td><?php echo $row->InputTgl ?></td>
                                                    <td><?php echo $row->UpdateOleh ?></td>
                                                    <td><?php echo $row->UpdateTgl ?></td>
                                                    <?php } ?>
                                                    <td>
                                                        <?php if($this->session->userdata('level')==7){ ?>
                                                    	<a href="<?php echo base_url() ?>pengguna/editpengguna/<?php $id=$row->IdPengguna; echo $this->encryption->encode($id); ?>" class="label label-warning">Edit</a>
                                                        <a href="<?php echo base_url() ?>pengguna/editPasswordpengguna/<?php $id=$row->IdPengguna; echo $this->encryption->encode($id); ?>" class="label label-primary">Edit Password</a>
                                                        <?php } ?>
                                                        
                                                    	<a href="<?php echo base_url() ?>pengguna/deletepengguna/<?php $id=$row->IdPengguna; echo $this->encryption->encode($id); ?>" class="label label-danger" onclick="return confirm('yakin ingin menghapus akun pengguna ini');">Hapus</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->