                        <div class="row">
                        
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
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
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="penjualanForm" name="penjualanForm" method="post" action="<?php echo base_url(); ?>penjualan/getpenjualan">
                                                <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="firstname" class="control-label col-lg-3">ID Transaksi Penjualan</label>
                                                    <div class="col-lg-4">
                                                        <?php 
                                                            /*$query = $this->db->query("SELECT max(penjualanid) as kode from penjualan WHERE tgltransaksi LIKE '%".date('Y-m')."%'");
                                                            foreach ($query->result() as $row) {
                                                                $nf = substr($row->kode,3,4);
                                                                $plus = $nf+1; 
                                                                $thn = date('Y');
                                                                $bln = date('m');

                                                                if ($plus<10) {
                                                                    $nof = "PEN000".$plus.$bln.$thn;
                                                                    echo "<input class='form-control' type='text' name='penjualan' id='penjualan' readonly='readonly' value='$nof' />";
                                                                }
                                                                elseif ($plus<=99) {
                                                                    $nof = "PEN00".$plus.$bln.$thn;
                                                                    echo "<input class='form-control' type='text' name='penjualan' id='penjualan' readonly='readonly' value='$nof' />";    
                                                                }
                                                                elseif ($plus<=999) {
                                                                    $nof = "PEN0".$plus.$bln.$thn;
                                                                    echo "<input class='form-control' type='text' name='penjualan' id='penjualan' readonly='readonly' value='$nof' />";    
                                                                }elseif ($plus<=9990) {
                                                                    $nof = "PEN".$plus.$bln.$thn;
                                                                    echo "<input class='form-control' type='text' name='penjualan' id='penjualan' readonly='readonly' value='$nof' />";    
                                                                }
                                                            }*/
                                                        ?>
                                                        <input class='form-control' type='text' name='penjualan' id='penjualan' required='required'/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgltransaksi" class="control-label col-lg-3">Tgl Transaksi *</label>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" id="tgltransaksi" name="tgltransaksi" type="text" readonly value="<?php echo date('Y-m-d'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jatuhtempo" class="control-label col-lg-3">Tgl Jatuh Tempo *</label>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" id="jatuhtempo" name="jatuhtempo" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="firstname" class="control-label col-lg-3">Customer *</label>
                                                    <div class="col-lg-6">
                                                    	<select class="select2 form-control" name="customer" id="customer">
                                                            <option value=""></option>
                                                            <?php $qCus=$this->db->get('customer');foreach ($qCus->result() as $row) { ?>
                                                            <option value="<?php echo $row->customerid ?>"><?php echo $row->namacustomer; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lastname" class="control-label col-lg-3">Metode Pembayaran *</label>
                                                    <div class="col-lg-4">
                                                        <select class="form-control" id="metode" name="metode">
                                                            <option></option>
                                                            <option value="1">Tunai</option>
                                                            <option value="2">Transfer</option>
                                                            <option value="3">Cek</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="diskon" class="control-label col-lg-3">Diskon *</label>
                                                    <div class="col-lg-2">
                                                        <input class="form-control" id="diskon" name="diskon" type="text" maxlength="5" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username" class="control-label col-lg-3">Keterangan</label>
                                                    <div class="col-lg-9">
                                                        <textarea class="form-control" rows="3" name="keterangan" id="keterangan"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-lg-offset-3 col-lg-10">
                                                        <button class="btn btn-success waves-effect waves-light btn-sm" type="submit" name="simpan">Simpan</button>
                                                        <a class="btn btn-default waves-effect btn-sm" href="<?php echo base_url(); ?>penjualan">Cancel</a>
                                                    </div>
                                                </div>

                                                <div>&nbsp;</div><div>&nbsp;</div>
                                                </div>
                                            </form>
                                            <div class="col-md-12">
                                                <div><small>Step selanjutnya menginput item apa saja yang dibeli oleh pelanggan (dengan cara klik 'ID Transaksi Penjualan' di menu Data Penjualan) *</small></div>
                                            </div>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->