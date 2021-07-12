                        <div class="row">
                        
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="penggunaForm" method="post" action="<?php echo base_url(); ?>pengguna/getpengguna">
                                                <div class="form-group">
                                                    <label for="ukuran" class="control-label col-lg-2">Divisi *</label>
                                                    <div class="col-lg-3">
                                                        <select class="select2 form-control" data-placeholder="Pilih Divisi Pengguna..." name="level" id="level" required>
                                                          <option value="">&nbsp;</option>
                                                          <?php 
                                                            // ini kondisi kalau admin atau bph yg bisa
                                                            if($this->session->userdata('level')==6||$this->session->userdata('level')==7){ 
                                                                //jabarkan data levelnya
                                                                foreach ($datalevel->result() as $row) { 
                                                                    // jika dia admin atau jika datanya ga administrator atau jika dia wakil pu atau pu
                                                                    if($row->IdLevel!=7 && ($this->session->userdata('level')==7|| ($this->session->userdata('level')==6 && ($this->session->userdata('as')=='Kadiv' || $this->session->userdata('as')=='Wakil')))){ ?>
                                                                    <option value="<?php echo $row->IdLevel ?>"><?php echo $row->NamaLevel; ?></option>
                                                          <?php     }
                                                                }
                                                            }else{ ?>
                                                            <option value="<?php echo $this->session->userdata('level') ?>" selected><?php echo $this->session->userdata('namalevel') ?></option>
                                                          <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ukuran" class="control-label col-lg-2">Status *</label>
                                                    <div class="col-lg-3">
                                                        <select class="select2 form-control" data-placeholder="Pilih Status Pengguna..." name="status" id="status" required>
                                                          <option value="">&nbsp;</option>
                                                          <?php if($this->session->userdata('level')>4){ ?>
                                                          <option value="Kadiv">Pemimpin Divisi</option>
                                                          <?php } ?>
                                                          <option value="Anggota">Anggota</option>
                                                          <option value="Wakil">Wakil</option>
                                                          <?php if($this->session->userdata('level')==6||$this->session->userdata('level')==7){ ?>
                                                          <option value="Sekretaris">Sekretaris</option>
                                                          <option value="Bendahara">Bendahara</option>
                                                          <?php } ?>
                                                          <?php if($this->session->userdata('level')==1||$this->session->userdata('level')==6||$this->session->userdata('level')==7){ ?>
                                                          <option value="Redpel">Redaktur Pelaksana</option>
                                                          <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Nama Lengkap*</label>
                                                    <div class="col-lg-6">
                                                        <?php if($this->session->userdata('level')==5){ ?>
                                                        <input class="form-control" id="nama" name="nama" type="text" required placeholder="John Doe (RnB) atau John Doe (PR)">
                                                        <?php }else{ ?>
                                                        <input class="form-control" id="nama" name="nama" type="text" required>
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                                <?php if($this->session->userdata('as') == 'Anggota'){ ?>
                                                <div class="form-group">
                                                    <label for="nim" class="control-label col-lg-2">NIM *</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="nim" name="nim" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46 || charCode == 8 || charCode == 9 || charCode == 37 || charCode == 39)
                return true;
            return false;" maxlength="16" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="jual" class="control-label col-lg-2">No HP *</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="telepon" name="telepon" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46 || charCode == 8 || charCode == 9 || charCode == 37 || charCode == 39)
                return true;
            return false;">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="total_item" class="control-label col-lg-2">Email *</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="email" name="email" type="email" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="username" class="control-label col-lg-2">Tempat Lahir *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="tmptlahir" name="tmptlahir" type="text" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="username" class="control-label col-lg-2">Tanggal Lahir *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="tanggallahir" name="tanggallahir" type="text" required readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="gender" class="control-label col-lg-2">Gender*</label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="gender" name="gender" required>
                                                            <option></option>
                                                            <option value="L">Laki-laki</option>
                                                            <option value="P">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <?php } ?>

                                                <div class="form-group">
                                                    <label for="username" class="control-label col-lg-2">Username *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="username" name="username" type="text" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password" class="control-label col-lg-2">Password *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="password" name="password" type="password" required>
                                                    </div>
                                                </div>

                                                <?php if($this->session->userdata('as') == 'Anggota'){ ?>
                                                <div class="form-group">
                                                    <label for="total_item" class="control-label col-lg-2">Alamat *</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="alamat" name="alamat" type="text" required>
                                                    </div>
                                                </div>
                                                <?php } ?>

                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Simpan</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>pengguna">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->