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
                                        <?php if($this->session->userdata('as')!='Anggota'){echo "<h3>Pekerjaan Divisi</h3>";}else{echo"<h3>Pekerjaan Personal</h3>";} ?>
                                        
                                        <table id="datatable-responsive-2" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Pekerjaan</th>
                                                    <th>Balasan Dari</th>
                                                    <th>Judul Detail</th>
                                                    <th>Deskripsi Detail</th>
                                                    <th>Status Pekerjaan</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php 
                                                $no=1;foreach ($dataPekerjaan->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->NamaPekerjaan; ?></td>
                                                    <td><?php if($row->As=='Kadiv'){$as='Pemimpin';}else{$as=$row->As;} echo $row->NamaLengkap." (".$as.")"; ?></td>
                                                    <td><?php echo $row->Judul; ?></td>
                                                    <td><?php echo $row->Deskripsi ?></td>
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
                                                        <?php 
                                                        //ketika balasan nya ngga dari diri sendiri muncul form nya
                                                        if($as=='Pemimpin'){$as='Kadiv';}
                                                        if(($no==2 && $as!=$this->session->userdata('as')) || ($no==2 && $row->IdPengguna==$row->PekerjaanDari)){
                                                            if($this->session->userdata('level')==3){
                                                            /*if(($hasilCount>1 && $as=='Pemimpin' && $this->session->userdata('as')=='Anggota')||($hasilCount>0 && $this->session->userdata('as')!='Anggota' && $no==2)){*/ ?>
                                                            <form action="<?php echo base_url() ?>pekerjaan/updatestatus" method="POST">
                                                            <?php if($no==2 && $row->IdPengguna==$row->PekerjaanDari){ ?>
                                                                <div>
                                                                    <?php if($no==2&&$row->Status!=0){ ?>
                                                                    <small>Ubah Status</small>
                                                                    <?php } ?>
                                                                    <div>
                                                                        <?php if($no==2&&$row->Status==0){ 
                                                                            if($row->pStatus==0){
                                                                        ?>
                                                                        Pekerjaan Telah Selesai
                                                                        <?php }else{ ?>
                                                                        <a href="<?php echo base_url() ?>pekerjaan/selesai/<?php $id=$row->IdPekerjaan; echo $this->encryption->encode($id); ?>" class="btn btn-xs btn-success">Selesaikan Sekarang!!!</a>
                                                                        <?php } ?>
                                                                        <?php }else{ ?>
                                                                        <select class="form-control" name="status" id="status" required>
                                                                        <option>&nbsp;</option>
                                                                        <option value="3">Asistensi</option>
                                                                        <option value="4">Revisi</option>
                                                                        <option value="0">Selesai</option>
                                                                        </select>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <?php if($no==2&&$row->Status!=0){ ?>
                                                                <div>
                                                                    <small>Judul</small>
                                                                    <div><input class="form-control" type="text" name="judul" id="judul" required></div>
                                                                </div>
                                                                <div>
                                                                    <small>Catatan</small>
                                                                    <div><input class="form-control" type="text" name="deskripsi" id="deskripsi" required></div>
                                                                </div>
                                                                <div>
                                                                    <input type="hidden" name="id" id="id" value="<?php $idx=$row->IdPekerjaan; echo $idx = $this->encryption->encode($idx); ?>" readonly>
                                                                    <div><button type="submit" class="btn btn-xs btn-primary" name="submit" id="submit">Submit</button></div>
                                                                </div> 
                                                                <?php } ?>
                                                            <?php }else{ ?>
                                                                <div>
                                                                    <?php if($no==2&&$row->Status!=0){ ?>
                                                                    <small>Ubah Status</small>
                                                                    <?php } ?>
                                                                    <div>
                                                                        <?php if ($this->session->userdata('as')=='Anggota') { ?>
                                                                        <?php if($no==2&&$row->Status==0){ ?>
                                                                        <a href="<?php echo base_url() ?>pekerjaan/selesai/<?php $id=$row->IdPekerjaan; echo $this->encryption->encode($id); ?>" class="btn btn-xs btn-success">Selesaikan Sekarang!!!</a>
                                                                        <?php }else{ ?>
                                                                        <select class="form-control" name="status" id="status" required>
                                                                        <option value="2" selected>Dikerjakan</option>
                                                                        </select>
                                                                        <?php } ?>
                                                                        <?php }else{ ?>
                                                                        <?php if($no==2&&$row->Status!=0){ ?>
                                                                        <select class="form-control" name="status" id="status" required>
                                                                        <option>&nbsp;</option>
                                                                        <option value="3">Asistensi</option>
                                                                        <option value="4">Revisi</option>
                                                                        <option value="0">Selesai</option>
                                                                        </select>
                                                                        <?php } ?>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <?php if($no==2&&$row->Status!=0){ ?>
                                                                <div>
                                                                    <small>Judul</small>
                                                                    <div><input class="form-control" type="text" name="judul" id="judul" required></div>
                                                                </div>
                                                                <div>
                                                                    <small>Catatan</small>
                                                                    <div><input class="form-control" type="text" name="deskripsi" id="deskripsi" required></div>
                                                                </div>
                                                                <div>
                                                                    <input type="hidden" name="id" id="id" value="<?php $idx=$row->IdPekerjaan; echo $idx = $this->encryption->encode($idx); ?>" readonly>
                                                                    <div><button type="submit" class="btn btn-xs btn-primary" name="submit" id="submit">Submit</button></div>
                                                                </div>
                                                                <?php } ?>
                                                            <?php } ?>
                                                            </form>
                                                        <?php }else{echo "'Form Disembunyikan'";} }else{echo "Sudah lewat, tunggu instruksi berikutnya";} ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- col -->

                        </div> <!-- End row -->