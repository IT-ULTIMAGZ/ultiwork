                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form">
                                            <?php 
                                            if($this->uri->segment('4')=='PR'){
                                                echo "<h3>Edit Pekerjaan PR</h3><br>";
                                            }else if($this->uri->segment('4')=='' && $this->session->userdata('level')==5){
                                                echo "<h3>Edit Pekerjaan RnB</h3><br>";
                                            }else if($this->uri->segment('4')=='REDPEL' || $this->uri->segment('4')=='redpel'){
                                                echo "<h3>Edit Pekerjaan Redaktur Pelaksana</h3><br>";
                                            }else if($this->uri->segment('4')=='Lihat_Ticket'){
                                                echo "<h3>Edit Ticket</h3><br>";
                                            }
                                            ?>
                                            <form class="cmxform form-horizontal tasi-form" id="pekerjaanForm" method="post" action="<?php echo base_url(); ?>pekerjaan/updatePekerjaan">
                                                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                                                <input type="hidden" name="tipe" id="tipe" value="<?php echo $this->uri->segment(4) ?>" readonly>
                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Nama Pekerjaan*</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="nama" name="nama" type="text" value="<?php echo $nama ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Deskripsi Pekerjaan*</label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control" id="deskripsi" name="deskripsi" required=""><?php echo $deskripsi ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Tanggal Mulai*</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="sejak" name="sejak" type="text" value="<?php echo $sejak ?>" required readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Tanggal Deadline*</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="sampai" name="sampai" type="text" value="<?php echo $sampai ?>" required readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Link Drive*</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="link" name="link" type="text" value="<?php echo $link ?>" required>
                                                        <small>Jika tidak membutuhkan link drive, beri tanda '-' tanpa tanda kutip</small>
                                                    </div>
                                                </div>

                                                <?php if($this->uri->segment(4)=='Lihat_Ticket' || $dataidpengguna==0){ ?>
                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Ditujukan Ke*</label>
                                                    <div class="col-lg-6">
                                                        <select class="select2 form-control" data-placeholder="Pilih..." name="tunjuk" id="tunjuk" required>
                                                            <option>&nbsp;</option>
                                                            <?php if($dataidpengguna!=0){ ?>
                                                            <option value="<?php echo $dataidpengguna ?>" selected><?php echo $namalengkap.' - '.$as ?></option>
                                                            <?php } ?>
                                                            <?php foreach ($dataPemimpin->result() as $rows) {
                                                                if($rows->As=='Kadiv'&&$rows->IdLevel==6){
                                                                    $as='Pemimpin Umum';
                                                                }else if($rows->As=='Wakil'&&$rows->NamaLevel==6){
                                                                    $as='Wakil PU';
                                                                }else if($rows->As=='Sekretaris'&&$rows->NamaLevel==6){
                                                                    $as='Sekretaris';
                                                                }else if($rows->As=='Bendahara'&&$rows->NamaLevel==6){
                                                                    $as='Bendahara';
                                                                }else if($rows->As=='Redpel'&&$rows->NamaLevel==1){
                                                                    $as='Redaktur Pelaksana Redaksi';
                                                                }else{
                                                                    $as='Pemimpin '.$rows->NamaLevel;
                                                                }
                                                                echo "<option value='".$rows->IdPengguna."'>".$rows->NamaLengkap." - ".$as."</option>";
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php } ?>

                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
                                                        <?php if($this->uri->segment(4)=='Tunjuk_Anggota'){ ?>
                                                        <a href="<?php echo base_url('pekerjaan/tunjuk_anggota'); ?>" class="btn btn-default waves-effect waves-light">Cancel</a>
                                                        <?php }else if($this->uri->segment(4)=='Lihat_Pekerjaan'){ ?>
                                                        <a href="<?php echo base_url('pekerjaan'); ?>" class="btn btn-default waves-effect waves-light">Cancel</a>
                                                        <?php }else if($this->uri->segment(4)=='Lihat_Pekerjaan_PR'){ ?>
                                                        <a href="<?php echo base_url('pekerjaan/lihat_pekerjaan_pr'); ?>" class="btn btn-default waves-effect waves-light">Cancel</a>
                                                        <?php }else if($this->uri->segment(4)=='Lihat_Ticket'){ ?>
                                                        <a href="<?php echo base_url('pekerjaan/lihat_ticket'); ?>" class="btn btn-default waves-effect waves-light">Cancel</a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->