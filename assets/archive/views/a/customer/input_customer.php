						<div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="customerForm" method="post" action="<?php echo base_url(); ?>customer/getcustomer">
                                                <div class="form-group">
                                                    <label for="kode" class="control-label col-lg-2">Kode Customer</label>
                                                    <div class="col-lg-3">
                                                        <?php 
                                                            $query = $this->db->query("SELECT max(customerid) as kode from customer WHERE customerid LIKE '%CUS%'");
                                                            foreach ($query->result() as $row) {
                                                                $nf = substr($row->kode,7,11);
                                                                $plus = $nf+1; 
                                                                $thn = date('y');
                                                                $bln = date('m');
                                                                $tgl = date('d');

                                                                if($plus<10){
                                                                    $nof = "CUS".$bln.$thn."0000".$plus;
                                                                    echo "<input class='form-control' type='text' name='kode' id='kode' readonly='readonly' value='$nof' />";
                                                                }elseif($plus<99) {
                                                                    $nof = "CUS".$bln.$thn."000".$plus;
                                                                    echo "<input class='form-control' type='text' name='kode' id='kode' readonly='readonly' value='$nof' />";
                                                                }
                                                                elseif ($plus<=999) {
                                                                    $nof = "CUS".$bln.$thn."00".$plus;
                                                                    echo "<input class='form-control' type='text' name='kode' id='kode' readonly='readonly' value='$nof' />";    
                                                                }
                                                                elseif ($plus<=9999) {
                                                                    $nof = "CUS".$bln.$thn."0".$plus;
                                                                    echo "<input class='form-control' type='text' name='kode' id='kode' readonly='readonly' value='$nof' />";    
                                                                }elseif ($plus<=99999) {
                                                                    $nof = "CUS".$bln.$thn.$plus;
                                                                    echo "<input class='form-control' type='text' name='kode' id='kode' readonly='readonly' value='$nof' />";    
                                                                }
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Nama *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="nama" name="nama" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pic" class="control-label col-lg-2">Pic. *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="pic" name="pic" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat" class="control-label col-lg-2">Alamat *</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="alamat" name="alamat" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="notelp" class="control-label col-lg-2">No Telp / HP *</label>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" id="notelp" name="notelp" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Simpan</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>customer">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div> <!-- End row -->