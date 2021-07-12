                        <div class="row">
                        
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="penggunaForm" method="post" action="<?php echo base_url(); ?>pengguna/updatepengguna">
                                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                                <div class="form-group">
                                                    <label for="ukuran" class="control-label col-lg-2">Level Pengguna *</label>
                                                    <div class="col-lg-3">
                                                        <select class="select2 form-control" data-placeholder="Pilih Level Pengguna..." name="level">
                                                          <option value="<?php echo $levelid ?>"><?php echo $level ?></option>
                                                          <?php foreach ($datalevel->result() as $row) { ?>
                                                              <option value="<?php echo $row->id ?>"><?php echo $row->level_pengguna; ?></option>
                                                          <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Nama Lengkap*</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="nama" name="nama" type="text" value="<?php echo $nama ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username" class="control-label col-lg-2">Username *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="username" name="username" type="text" value="<?php echo $username ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="jabatan" class="control-label col-lg-2">Jabatan*</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="jabatan" name="jabatan" type="text" value="<?php echo $jabatan ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="jual" class="control-label col-lg-2">Telepon *</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="telepon" name="telepon" type="text" value="<?php echo $telepon ?>" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46 || charCode == 8 || charCode == 9 || charCode == 37 || charCode == 39)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_item" class="control-label col-lg-2">Email *</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="email" name="email" type="email" value="<?php echo $email ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="total_item" class="control-label col-lg-2">Alamat *</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="alamat" name="alamat" type="text" required value="<?php echo $alamat ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="instansi" class="control-label col-lg-2">Instansi*</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="instansi" name="instansi" type="text" value="<?php echo $instansi ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="keterangan" class="control-label col-lg-2">Keterangan*</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="keterangan" name="keterangan" type="text" value="<?php echo $keterangan ?>">
                                                    </div>
                                                </div>

                                                <?php if($this->session->userdata('penggunaid') == 1){ ?>
                                                <div class="form-group">
                                                    <label for="kecamatan" class="control-label col-lg-2">Kecamatan</label>
                                                    <div class="col-lg-6">
                                                        <select id="kecamatan" name="kecamatan" class="form-control">
                                                            <option value=""></option>
                                                            <option value="<?php echo $kecamatan ?>"></option>
                                                            <?php $kec = $this->db->query("select distinct kec from dpshp"); foreach ($kec->result() as $row) { ?>
                                                                <option value="<?php echo $row->kec ?>"><?php echo $row->kec ?></option>
                                                            <?php  } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="kelurahan" class="control-label col-lg-2">Kelurahan</label>
                                                    <div class="col-lg-6">
                                                        <select id="kelurahan" name="kelurahan" class="form-control">
                                                            <option value="<?php echo $kelurahan ?>"></option>
                                                            <option value=""></option>
                                                            <?php $kel = $this->db->query("select distinct kel from dpshp"); foreach ($kel->result() as $row) { ?>
                                                                <option value="<?php echo $row->kel ?>"><?php echo $row->kel ?></option>
                                                            <?php  } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tps" class="control-label col-lg-2">TPS</label>
                                                    <div class="col-lg-6">
                                                        <select id="tps" name="tps" class="form-control">
                                                            <option value="<?php echo $tpsdata ?>"></option>
                                                            <option value=""></option>
                                                            <?php $tps = $this->db->query("select distinct tps from dpshp"); foreach ($tps->result() as $row) { ?>
                                                                <option value="<?php echo $row->tps ?>"><?php echo $row->tps ?></option>
                                                            <?php  } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <?php } ?>

                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>pengguna">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->