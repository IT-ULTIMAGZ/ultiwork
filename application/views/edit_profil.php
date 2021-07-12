                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="penggunaForm" method="post" action="<?php echo base_url(); ?>main/updateprofil">
                                                <input type="hidden" name="id" value="<?php echo $id ?>" readonly>
                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Username*</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="username" name="username" type="text" value="<?php echo $username ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Nama Lengkap*</label>
                                                    <div class="col-lg-6">
                                                        <?php if($this->session->userdata('level')==5){ ?>
                                                        <input class="form-control" id="nama" name="nama" type="text" value="<?php echo $nama ?>" required placeholder="John Doe (RnB) atau John Doe (PR)">
                                                        <?php }else{ ?>
                                                        <input class="form-control" id="nama" name="nama" type="text" value="<?php echo $nama ?>" required>
                                                        <?php } ?>
                                                        
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">NIM*</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="nim" name="nim" type="text" value="<?php echo $nim ?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nohp" class="control-label col-lg-2">Nomor HP*</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="nohp" name="nohp" type="text" value="<?php echo $nohp ?>" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46 || charCode == 8 || charCode == 9 || charCode == 37 || charCode == 39)
                return true;
            return false;" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Email*</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="email" name="email" type="email" value="<?php echo $email ?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Tempat Lahir*</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="tmptlahir" name="tmptlahir" type="text" value="<?php echo $tmptlahir ?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Tanggal Lahir*</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="tanggallahir" name="tanggallahir" type="text" value="<?php echo $tanggallahir ?>" required readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="gender" class="control-label col-lg-2">Gender*</label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="gender" name="gender" required>
                                                            <?php if($gender == "L"){ ?>
                                                                <option value="L" selected>Laki-laki</option>
                                                                <option value="P">Perempuan</option>
                                                            <?php }else if($gender == "P"){ ?>
                                                                <option value="L">Laki-laki</option>
                                                                <option value="P" selected>Perempuan</option>
                                                            <?php }else{ ?>
                                                                <option></option>
                                                                <option value="L">Laki-laki</option>
                                                                <option value="P">Perempuan</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Alamat</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="alamat" name="alamat" type="text" value="<?php echo $alamat ?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>main/profil">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->