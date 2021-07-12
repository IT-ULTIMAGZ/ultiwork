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
                                        <h3>Pekerjaan Divisi</h3>
                                        <table id="datatable-responsive-2" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Pekerjaan dari</th>
                                                    <th>Nama Pekerjaan</th>
                                                    <th>Deskripsi Pekerjaan</th>
                                                    <th>Tgl Mulai</th>
                                                    <th>Tgl Deadline</th>
                                                    <th>Tunjuk Anggota</th>
                                                    <th>Status Pekerjaan</th>
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
                                                    <td>
                                                        <form action="<?php echo base_url() ?>pekerjaan/getTunjuk" method="POST">
                                                        <select class="form-control" name="nama" id="nama" required>
                                                            <option>&nbsp;</option>
                                                            <?php foreach ($dataDivisi->result() as $rows) {
                                                                echo "<option value='".$rows->IdPengguna."'>".$rows->NamaLengkap."</option>";
                                                            } ?>
                                                        </select>
                                                    </td>
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
                                                        }
                                                        ?>  
                                                    </td>
                                                    <td>   
                                                        <input type="hidden" name="id" id="id" value="<?php $idx=$row->IdPekerjaan; echo $idx = $this->encryption->encode($idx); ?>" readonly>
                                                        <button type="submit" class="btn btn-xs btn-primary" name="submit" id="submit">Tunjuk Anggota</button>
                                                        </form>
                                                        <?php  if($this->session->userdata('as') != 'Anggota' && $row->PekerjaanDari==$this->session->userdata('penggunaid')){ ?>
                                                        <a href="<?php echo base_url() ?>pekerjaan/edit_pekerjaan/<?php $id=$row->IdPekerjaan; echo $this->encryption->encode($id); ?>/Tunjuk_Anggota" class="label label-success">Edit Pekerjaan</a>
                                                        <a href="<?php echo base_url() ?>pekerjaan/hapus_pekerjaan/<?php $id=$row->IdPekerjaan; echo $this->encryption->encode($id); ?>/Tunjuk_Anggota" class="btn btn-xs btn-danger" onclick="return confirm('yakin ingin menghapus data pekerjaan ini');">Hapus</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- col -->

                        </div> <!-- End row -->