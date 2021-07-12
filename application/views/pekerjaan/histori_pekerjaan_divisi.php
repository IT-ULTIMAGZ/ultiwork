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
                                        <h3>Pekerjaan Divisi Redaksi</h3>
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
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php 
                                                $no=1;foreach ($dataRedaksi->result() as $row) { ?>
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
                                                    <td>
                                                        <?php echo $row->NamaPekerjaan; ?>
                                                    </td>
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
                                                            echo "Ticket (Belum Dikerjakan)";
                                                        }else if($row->Status==6){
                                                            echo "Belum Diambil";
                                                        }else if($row->Status==7){
                                                            echo "Pekerjaan PR";
                                                        }else if($row->Status==8){
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
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h3>Pekerjaan Divisi Fotografer</h3>
                                        <table id="datatable-responsive-2" class="table table-striped table-bordered">
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
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php 
                                                $no=1;foreach ($dataFotografer->result() as $row) { ?>
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
                                                    <td>
                                                        <?php echo $row->NamaPekerjaan; ?>
                                                    </td>
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
                                                            echo "Ticket (Belum Dikerjakan)";
                                                        }else if($row->Status==6){
                                                            echo "Belum Diambil";
                                                        }else if($row->Status==7){
                                                            echo "Pekerjaan PR";
                                                        }else if($row->Status==8){
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
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h3>Pekerjaan Divisi Visual</h3>
                                        <table id="datatable-responsive-3" class="table table-striped table-bordered">
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
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php 
                                                $no=1;foreach ($dataVisual->result() as $row) { ?>
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
                                                    <td>
                                                        <?php /*if($this->session->userdata('level')==3||$this->session->userdata('level')==7){ ?>
                                                        <a href="<?php echo base_url() ?>pekerjaan/detail_pekerjaan/<?php $id=$row->IdPekerjaan; echo $this->encryption->encode($id); ?>"><?php echo $row->NamaPekerjaan; ?></a>
                                                        <?php }else{echo $row->NamaPekerjaan;}*/
                                                        if($this->session->userdata('level')==3||$this->session->userdata('level')==7||($this->session->userdata('level') == 6 && ($this->session->userdata('as')=='Kadiv')||$this->session->userdata('as')=='Wakil')){
                                                            echo '<a href="'.base_url().'pekerjaan/detail_pekerjaan/'.$this->encryption->encode($row->IdPekerjaan).'/Histori_Pekerjaan_Divisi">'.$row->NamaPekerjaan.'</a>';}else{echo $row->NamaPekerjaan;} ?>
                                                    </td>
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
                                                            echo "Ticket (Belum Dikerjakan)";
                                                        }else if($row->Status==6){
                                                            echo "Belum Diambil";
                                                        }else if($row->Status==7){
                                                            echo "Pekerjaan PR";
                                                        }else if($row->Status==8){
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
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h3>Pekerjaan Divisi IT</h3>
                                        <table id="datatable-responsive-4" class="table table-striped table-bordered">
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
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php 
                                                $no=1;foreach ($dataIT->result() as $row) { ?>
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
                                                    <td>
                                                        <?php echo $row->NamaPekerjaan; ?>
                                                    </td>
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
                                                            echo "Ticket (Belum Dikerjakan)";
                                                        }else if($row->Status==6){
                                                            echo "Belum Diambil";
                                                        }else if($row->Status==7){
                                                            echo "Pekerjaan PR";
                                                        }else if($row->Status==8){
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
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h3>Pekerjaan Divisi Perusahaan</h3>
                                        <table id="datatable-responsive-5" class="table table-striped table-bordered">
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
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php 
                                                $no=1;foreach ($dataPerusahaan->result() as $row) { ?>
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
                                                    <td>
                                                        <?php echo $row->NamaPekerjaan; ?>
                                                    </td>
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
                                                            echo "Ticket (Belum Dikerjakan)";
                                                        }else if($row->Status==6){
                                                            echo "Belum Diambil";
                                                        }else if($row->Status==7){
                                                            echo "Pekerjaan PR";
                                                        }else if($row->Status==8){
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
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h3>Pekerjaan Divisi BPH</h3>
                                        <table id="datatable-responsive-6" class="table table-striped table-bordered">
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
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php 
                                                $no=1;foreach ($dataBPH->result() as $row) { ?>
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
                                                    <td>
                                                        <?php echo $row->NamaPekerjaan; ?>
                                                    </td>
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
                                                            echo "Ticket (Belum Dikerjakan)";
                                                        }else if($row->Status==6){
                                                            echo "Belum Diambil";
                                                        }else if($row->Status==7){
                                                            echo "Pekerjaan PR";
                                                        }else if($row->Status==8){
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
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- col -->

                        </div> <!-- End row -->