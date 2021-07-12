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
                                        <h3>Pekerjaan Personal</h3>
                                        <table id="datatable-responsive" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Pekerjaan dari</th>
                                                    <th>Nama Pekerjaan</th>
                                                    <th>Deskripsi Pekerjaan</th>
                                                    <th>Tgl Mulai</th>
                                                    <th>Tgl Deadline</th>
                                                    <th>Yg ditunjuk</th>
                                                    <th>Status Pekerjaan</th>
                                                    <th>Link Drive</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php 
                                                $no=1;foreach ($dataPekerjaan->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td>
                                                        <?php 
                                                        $qDari=$this->db->query("select NamaLengkap from pengguna where IdPengguna='".$row->PekerjaanDari."'");
                                                        foreach ($qDari->result() as $rows) {
                                                            echo $rows->NamaLengkap;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row->NamaPekerjaan; ?></td>
                                                    <td><?php echo $row->Deskripsi; ?></td>
                                                    <td><?php echo $row->TglMulai ?></td>
                                                    <td><?php echo $row->TglDeadline; ?></td>
                                                    <td>Public Relations</td>
                                                    <td>
                                                        <?php
                                                        if($row->Status==0){
                                                            echo "Selesai";
                                                        }else if($row->Status==1){
                                                            echo "Pending";
                                                        }else if($row->Status==2){
                                                            echo "Dikerjakan";
                                                        }else if($row->Status==3){
                                                            echo "Asistensi";
                                                        }else if($row->Status==4){
                                                            echo "Revisi";
                                                        }else if($row->Status==5){
                                                            echo "Ticket";
                                                        }else if($row->Status==6){
                                                            echo "Belum Diambil";
                                                        }else if($row->Status==7){
                                                            echo "Pekerjaan Tetap";
                                                        }
                                                        ?>  
                                                    </td>
                                                    <td>
                                                        <?php if ($row->LinkDrive!='-'){ ?>
                                                        <a href="<?php echo $row->LinkDrive ?>" target="_BLANK">Link Drive</a>
                                                        <?php }else if ($row->LinkDrive=='-') {echo"Tidak Pakai Link Drive";} ?>
                                                    </td>
                                                    <td>
                                                        <?php  if($this->session->userdata('as') != 'Anggota'){ ?>
                                                        <a href="<?php echo base_url() ?>pekerjaan/edit_pekerjaan/<?php $id=$row->IdPekerjaan; echo $this->encryption->encode($id); ?>/Lihat_Pekerjaan_PR" class="label label-success">Edit Pekerjaan</a>
                                                        <a href="<?php echo base_url() ?>pekerjaan/hapus_pekerjaan/<?php $id=$row->IdPekerjaan; echo $this->encryption->encode($id); ?>/PR" class="label label-danger" onclick="return confirm('yakin ingin menghapus data pekerjaan ini');">Hapus</a>
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