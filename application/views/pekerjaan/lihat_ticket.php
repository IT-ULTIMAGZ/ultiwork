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
                                        <h3>List Ticket Pekerjaan "Belum Dikerjakan"</h3>
                                        <table id="datatable-responsive" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Pekerjaan dari</th>
                                                    <th>Dari Divisi</th>
                                                    <th>Nama Pekerjaan</th>
                                                    <th>Deskripsi Pekerjaan</th>
                                                    <th>Tgl Mulai</th>
                                                    <th>Tgl Deadline</th>
                                                    <th>Yang Ditunjuk</th>
                                                    <th>Status Pekerjaan</th>
                                                    <th>Link Drive</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php 
                                                $no=1;foreach ($dataTicketBelum->result() as $row) { ?>
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
                                                    <td><?php echo $row->NamaLevel ?></td>
                                                    <td><?php echo $row->NamaPekerjaan; ?></td>
                                                    <td><?php echo $row->Deskripsi; ?></td>
                                                    <td><?php echo $row->TglMulai ?></td>
                                                    <td><?php echo $row->TglDeadline; ?></td>
                                                    <td><?php echo $row->NamaLengkap ?></td>
                                                    <td>
                                                        <?php
                                                        if($row->Status==5){
                                                            echo "Ticket (Pending)";
                                                        }else if($row->Status==8){
                                                            echo "Ticket (Dikerjakan)";
                                                        }
                                                        ?>  
                                                    </td>
                                                    <td>
                                                        <?php if ($row->LinkDrive!='-'){ ?>
                                                        <a href="<?php echo $row->LinkDrive ?>" target="_BLANK">Link Drive</a>
                                                        <?php }else if ($row->LinkDrive=='-') {echo"Tidak Pakai Link Drive";} ?>
                                                    </td>
                                                    <td>
                                                        <?php if($row->IdPengguna==$this->session->userdata('penggunaid')&&$row->Status==5){ ?>
                                                        <a href="<?php echo base_url() ?>pekerjaan/ambil/<?php $idx=$row->IdPekerjaan; echo $idx = $this->encryption->encode($idx); ?>/<?php echo $this->encryption->encode($row->Status); ?>" class="label label-primary">Kerjakan</a>
                                                        <?php } ?>
                                                        <?php  if($row->PekerjaanDari==$this->session->userdata('penggunaid')){ ?>
                                                        <a href="<?php echo base_url() ?>pekerjaan/edit_pekerjaan/<?php $id=$row->IdPekerjaan; echo $this->encryption->encode($id); ?>/Lihat_Ticket" class="label label-success">Edit Pekerjaan</a>
                                                        <a href="<?php echo base_url() ?>pekerjaan/hapus_pekerjaan/<?php $id=$row->IdPekerjaan; echo $this->encryption->encode($id); ?>/Lihat_Ticket" class="label label-danger" onclick="return confirm('yakin ingin menghapus data pekerjaan ini');">Hapus</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>                                        
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->

                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h3>List Ticket Pekerjaan "Sedang & Selesai Dikerjakan"</h3>
                                        <table id="datatable-responsive-2" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Pekerjaan dari</th>
                                                    <th>Dari Divisi</th>
                                                    <th>Nama Pekerjaan</th>
                                                    <th>Deskripsi Pekerjaan</th>
                                                    <th>Tgl Mulai</th>
                                                    <th>Tgl Deadline</th>
                                                    <th>Yang Ditunjuk</th>
                                                    <th>Status Pekerjaan</th>
                                                    <th>Link Drive</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php 
                                                $no=1;foreach ($dataTicketSudah->result() as $row) { ?>
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
                                                    <td><?php echo $row->NamaLevel ?></td>
                                                    <td><?php echo $row->NamaPekerjaan; ?></td>
                                                    <td><?php echo $row->Deskripsi; ?></td>
                                                    <td><?php echo $row->TglMulai ?></td>
                                                    <td><?php echo $row->TglDeadline; ?></td>
                                                    <td><?php echo $row->NamaLengkap ?></td>
                                                    <td>
                                                        <?php
                                                        if($row->Status==8){
                                                            echo "Ticket (Dikerjakan)";
                                                        }else if($row->Status==9){
                                                            echo "Ticket (Telah Selesai)";
                                                        }
                                                        ?>  
                                                    </td>
                                                    <td>
                                                        <?php if ($row->LinkDrive!='-'){ ?>
                                                        <a href="<?php echo $row->LinkDrive ?>" target="_BLANK">Link Drive</a>
                                                        <?php }else if ($row->LinkDrive=='-') {echo"Tidak Pakai Link Drive";} ?>
                                                    </td>
                                                    <td>
                                                        <?php if($row->IdPengguna==$this->session->userdata('penggunaid')&&$row->Status==8){ ?>
                                                        <a href="<?php echo base_url() ?>pekerjaan/selesai/<?php $idx=$row->IdPekerjaan; echo $idx = $this->encryption->encode($idx); ?>/<?php echo $this->encryption->encode($row->Status); ?>" class="label label-success">Sudah Selesai?</a>
                                                        <?php }else if($row->Status==9){echo "Ticket Telah Selesai";} ?>
                                                        <?php  if($row->PekerjaanDari==$this->session->userdata('penggunaid')&&$row->Status!=9){ ?>
                                                        <a href="<?php echo base_url() ?>pekerjaan/edit_pekerjaan/<?php $id=$row->IdPekerjaan; echo $this->encryption->encode($id); ?>/Lihat_Ticket" class="label label-success">Edit Pekerjaan</a>
                                                        <a href="<?php echo base_url() ?>pekerjaan/hapus_pekerjaan/<?php $id=$row->IdPekerjaan; echo $this->encryption->encode($id); ?>/Lihat_Ticket" class="label label-danger" onclick="return confirm('yakin ingin menghapus data pekerjaan ini');">Hapus</a>
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