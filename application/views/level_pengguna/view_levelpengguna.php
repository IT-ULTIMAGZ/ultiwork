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
                                                    <th>Nama</th>
                                                    <th>Keterangan</th>
                                                    <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2 || $this->session->userdata('level') == 3){ ?>
                                                    <th>Opsi</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>


                                            <tbody>
                                            	<?php $no=1;foreach ($datalevelpengguna->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->level_pengguna; ?></td>
                                                    <td><?php echo $row->menu_akses; ?></td>
                                                    <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2 || $this->session->userdata('level') == 3){ ?>
                                                    <td>
                                                    	<a href="<?php echo base_url() ?>levelpengguna/editlevelpengguna/<?php $id=$row->id; echo $this->encryption->encode($id); ?>" class="label label-warning">Edit</a>
                                                        <?php /* ?>
                                                    	<a href="<?php echo base_url() ?>levelpengguna/deletelevelpengguna/<?php $di=$row->id;echo $this->encryption->encode($di); ?>" class="label label-danger" onclick="return confirm('yakin ingin menghapus level pengguna ini');">Delete</a>
                                                        <?php */ ?>
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