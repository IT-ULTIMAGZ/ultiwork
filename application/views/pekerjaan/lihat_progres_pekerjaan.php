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
                                                    <th>Opsi</th>
                                                    <th>Pekerjaan dari</th>
                                                    <th>Nama Pekerjaan</th>
                                                    <th>Deskripsi Pekerjaan</th>
                                                    <th>Tgl Mulai (YYmmDD)</th>
                                                    <th>Tgl Deadline (YYmmDD)</th>
                                                    <th>Yg ditunjuk</th>
                                                    <th>Status Pekerjaan</th>
                                                    <th>Link Drive</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php 
                                                $no=1;foreach ($dataPekerjaan->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td>
                                                        <?php
                                                        $qCdet = $this->db->query("select count(Judul) as c from detailpekerjaan where IdPekerjaan='".$row->IdPekerjaan."'");
                                                        foreach ($qCdet->result() as $rows) {
                                                            $conCount = $rows->c;
                                                        }
                                                        if($conCount==0&&$this->session->userdata('level')==3){
                                                        ?>
                                                        <form action="<?php echo base_url() ?>pekerjaan/updatestatus" method="POST">
                                                        <div>
                                                            <small>Ubah Status</small>
                                                            <div>
                                                                <select class="form-control" name="status" id="status" required>
                                                                <option value="2" selected>Dikerjakan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <small>Judul</small>
                                                            <div><input class="form-control" type="text" name="judul" id="judul" required placeholder="Sudah Selesai -> Asistensi"></div>
                                                        </div>
                                                        <div>
                                                            <small>Catatan</small>
                                                            <div><input class="form-control" type="text" name="deskripsi" id="deskripsi" required placeholder="cth: sudah diupload di drive sesuai link"></div>
                                                        </div>
                                                        <div>
                                                            <input type="hidden" name="id" id="id" value="<?php $idx=$row->IdPekerjaan; echo $idx = $this->encryption->encode($idx); ?>" readonly>
                                                            <div><button type="submit" class="btn btn-xs btn-primary" name="submit" id="submit">Submit</button></div>
                                                        </div>
                                                        </form>
                                                        <?php }else if($this->session->userdata('level')!=3){ ?>
                                                        <a href="<?php echo base_url() ?>pekerjaan/selesai/<?php $id=$row->IdPekerjaan; echo $this->encryption->encode($id); ?>" class="btn btn-xs btn-success"  onclick="return confirm('yakin telah menyelesaikan pekerjaan ini?');">Sudah Selesai?</a>
                                                        <?php }else{echo "Silahkan klik '".$row->NamaPekerjaan."' untuk melihat detail";} ?>
                                                        <?php /*<a href="<?php echo base_url() ?>pekerjaan/selesai/<?php $idx=$row->IdPekerjaan; echo $idx = $this->encryption->encode($idx); echo "/".$this->encryption->decode($idx) ?>" class="label label-success">Selesai</a>*/ ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        $qDari=$this->db->query("select NamaLengkap from pengguna where IdPengguna='".$row->PekerjaanDari."'");
                                                        foreach ($qDari->result() as $rows) {
                                                            echo $rows->NamaLengkap;
                                                        }
                                                        ?>
                                                    </td>
                                                    
                                                    <td><?php if($this->session->userdata('level')==3||$this->session->userdata('level')==7){ ?>
                                                        <a href="<?php echo base_url() ?>pekerjaan/detail_pekerjaan/<?php $id=$row->IdPekerjaan; echo $this->encryption->encode($id); ?>"><?php echo $row->NamaPekerjaan; ?></a>
                                                        <?php }else{echo $row->NamaPekerjaan;} ?></td>
                                                    <td><?php echo $row->Deskripsi; ?></td>
                                                    <td><?php echo $row->TglMulai ?></td>
                                                    <td><?php echo $row->TglDeadline; ?></td>
                                                    <td><?php echo $row->NamaLengkap; ?></td>
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
                                                        <?php if ($row->LinkDrive!='-'){ ?>
                                                        <a href="<?php echo $row->LinkDrive ?>" target="_BLANK">Link Drive</a>
                                                        <?php }else if ($row->LinkDrive=='-') {echo"Tidak Pakai Link Drive";} ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>                                        
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                                <?php if($this->session->userdata('as') != "Anggota"){ ?>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h3>Pekerjaan Divisi</h3>
                                        <table id="datatable-responsive-2" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Opsi</th>
                                                    <th>Pekerjaan dari</th>
                                                    <th>Nama Pekerjaan</th>
                                                    <th>Deskripsi Pekerjaan</th>
                                                    <th>Tgl Mulai</th>
                                                    <th>Tgl Deadline</th>
                                                    <th>Yg ditunjuk</th>
                                                    <th>Status Pekerjaan</th>
                                                    <th>Link Drive</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php 
                                                $no=1;foreach ($dataDivisi->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td>
                                                        <?php /*<a href="<?php echo base_url() ?>pekerjaan/selesai/<?php $idx=$row->IdPekerjaan; echo $idx = $this->encryption->encode($idx); echo "/".$this->encryption->decode($idx) ?>" class="label label-success">Selesai</a>*/ ?>

                                                        <?php  if($this->session->userdata('as') != 'Anggota'){ ?>
                                                        <a href="<?php echo base_url() ?>pekerjaan/edit_pekerjaan/<?php $id=$row->IdPekerjaan; echo $this->encryption->encode($id); ?>" class="label label-primary">Edit Password</a>
                                                        <a href="<?php echo base_url() ?>pekerjaan/hapus_pekerjaan/<?php $id=$row->IdPekerjaan; echo $this->encryption->encode($id); ?>" class="label label-danger" onclick="return confirm('yakin ingin menghapus data pekerjaan ini');">Delete</a>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        $qDari=$this->db->query("select NamaLengkap from pengguna where IdPengguna='".$row->PekerjaanDari."'");
                                                        foreach ($qDari->result() as $rows) {
                                                            echo $rows->NamaLengkap;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php if($this->session->userdata('level')==3||$this->session->userdata('level')==7){ ?>
                                                        <a href="<?php echo base_url() ?>pekerjaan/detail_pekerjaan/<?php $id=$row->IdPekerjaan; echo $this->encryption->encode($id); ?>"><?php echo $row->NamaPekerjaan; ?></a>
                                                        <?php }else{echo $row->NamaPekerjaan;} ?></td>
                                                    <td><?php echo $row->Deskripsi; ?></td>
                                                    <td><?php echo $row->TglMulai ?></td>
                                                    <td><?php echo $row->TglDeadline; ?></td>
                                                    <td><?php echo $row->NamaLengkap; ?></td>
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
                                                        <?php if ($row->LinkDrive!='-'){ ?>
                                                        <a href="<?php echo $row->LinkDrive ?>" target="_BLANK">Link Drive</a>
                                                        <?php }else if ($row->LinkDrive=='-') {echo"Tidak Pakai Link Drive";} ?>
                                                    </td>
                                                    
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php } ?>
                            </div> <!-- col -->

                        </div> <!-- End row -->