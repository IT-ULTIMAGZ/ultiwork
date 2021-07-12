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
                                        <div class="row">
                                            <form class="form-search" action="<?php echo base_url() ?>main/history_user" name="form-search">
                                            <div class="col-md-12">
                                                <h3>Filter Data History User</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="sejak" id="sejak" class="form-control" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="sampai" id="sampai" class="form-control" readonly>
                                            </div>
                                            <div class="col-md-1">
                                                <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-md">
                                            </div>
                                            </form>
                                        </div>
                                        <div>&nbsp;</div>

                                        <?php 
                                            if(!empty($_GET['submit'])){
                                        ?>
                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kategori</th>
                                                    <th>Keterangan</th>
                                                    <th>Level</th>
                                                    <th>Nama Pengguna</th>
                                                    <th>Waktu</th>
                                                </tr>
                                            </thead>                                            
                                            <tbody>
                                            	<?php $no=1;foreach ($datahistory->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->kategori; ?></td>
                                                    <td><?php echo $row->keterangan ?></td>
                                                    <td><?php echo $row->level_pengguna ?></td>
                                                    <td><?php echo $row->nama_lengkap ?></td>
                                                    <td><?php echo $row->diinput_waktu ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody> 
                                        </table>
                                        <?php } ?>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->