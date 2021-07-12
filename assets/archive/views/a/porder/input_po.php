						<div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-success">
                                	<div class="panel-heading"><h3 class="panel-title text-white">Form Surat PO</h3></div>
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="inputpoForm" method="post" action="<?php echo base_url(); ?>po/getpo">
                                                <div class="form-group">
                                                    <label for="kode" class="control-label col-lg-3">No Faktur</label>
                                                    <div class="col-lg-3">
                                                        <?php 
                                                        	$thn = date('Y');
                                                        	$bln = date('m');

                                                        	if($bln == "01"){ $bulan = "I";}elseif($bln == "02"){ $bulan = "II";}elseif($bln == "03"){ $bulan = "III";}
                                                            elseif($bln == "04"){ $bulan = "IV";}elseif($bln == "05"){ $bulan = "V";}elseif($bln == "06"){ $bulan = "VI";}
                                                            elseif($bln == "07"){ $bulan = "VII";}elseif($bln == "08"){ $bulan = "VIII";}elseif($bln == "09"){ $bulan = "IX";}
                                                            elseif($bln == "10"){ $bulan = "X";}elseif($bln == "11"){ $bulan = "XI";}elseif($bln == "12"){ $bulan = "XII";}
                                                            
                                                            $datafak = "DF-PO/PTA/".$bulan."/".$thn;
                                                            $query = $this->db->query("SELECT max(fakturpo) as kode from po WHERE fakturpo LIKE '%".$datafak."%'");
                                                            foreach ($query->result() as $row) {
                                                                $nf = substr($row->kode,0,5);
                                                                $plus = $nf+1; 

                                                                if($plus<10){
                                                                    $nof = "0000".$plus."/DF-PO/PTA/".$bulan."/".$thn;
                                                                    echo "<input class='form-control' type='text' name='kode' id='kode' readonly='readonly' value='$nof' />";
                                                                }elseif($plus<99) {
                                                                    $nof = "000".$plus."/DF-PO/PTA/".$bulan."/".$thn;
                                                                    echo "<input class='form-control' type='text' name='kode' id='kode' readonly='readonly' value='$nof' />";
                                                                }
                                                                elseif ($plus<=999) {
                                                                    $nof = "00".$plus."/DF-PO/PTA/".$bulan."/".$thn;
                                                                    echo "<input class='form-control' type='text' name='kode' id='kode' readonly='readonly' value='$nof' />";    
                                                                }
                                                                elseif ($plus<=9999) {
                                                                    $nof = "0".$plus."/DF-PO/PTA/".$bulan."/".$thn;
                                                                    echo "<input class='form-control' type='text' name='kode' id='kode' readonly='readonly' value='$nof' />";    
                                                                }elseif ($plus<=99999) {
                                                                    $nof = $plus."/DF-PO/PTA/".$bulan."/".$thn;
                                                                    echo "<input class='form-control' type='text' name='kode' id='kode' readonly='readonly' value='$nof' />";    
                                                                }
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggalorder" class="control-label col-lg-3">Tanggal Order *</label>
                                                    <div class="col-lg-3">
                                                        <input class="form-control" id="tanggalorder" name="tanggalorder" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggalkirim" class="control-label col-lg-3">Tanggal Kirim *</label>
                                                    <div class="col-lg-3">
                                                        <input class="form-control" id="tanggalkirim" name="tanggalkirim" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jatuhtempo" class="control-label col-lg-3">Tgl Jatuh Tempo *</label>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" id="jatuhtempo" name="jatuhtempo" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jamsampai" class="control-label col-lg-3">Perkiraan Jam Sampai *</label>
                                                    <div class="col-lg-2">
                                                        <input class="form-control" id="jamsampai" name="jamsampai" type="text" placeholder="Ex: 14.30">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-3 col-lg-10">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Simpan</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>po">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div> <!-- End row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2){ ?>
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
                                <?php } ?>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <table id="datatable-responsive" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Faktur</th>
                                                    <th>Tanggal Order</th>
                                                    <th>Tanggal Kirim</th>
                                                    <th>Perkiraan Sampai</th>
                                                    <th>Keterangan</th> <?php //	0  = Data Belum Ada , 1  = Sudah Ada Barang, 2  = Kedatangan Barang Ditunda, 3  = Barang Sudah Datang  ?>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                            	<?php $no=1;foreach ($datapo->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->fakturpo; ?></td>
                                                    <td><?php echo $row->tglorder; ?></td>
                                                    <td><?php echo $row->tglkirim; ?></td>
                                                    <td><?php echo $row->kirajamsampai; ?></td>
                                                    <td>
                                                    	<?php 
                                                    		$cekitem = $this->db->query("SELECT COUNT(itemid) as hitung FROM detail_po WHERE fakturpo = '".$row->fakturpo."'");
                                                    		if($cekitem->num_rows > 0){
                                                    			foreach ($cekitem->result() as $rows) {
                                                    				echo "Data Sudah Ada = ".$rows->hitung;
                                                    			}
                                                    		}else{
                                                    			echo "Data Belum Ada";
                                                    		}
                                                    	?>
                                                    </td>
                                                    <td>
                                                    	<a href="<?php echo base_url() ?>po/tambahitempo/<?php $id=$row->fakturpo; echo $this->encryption->encode($id); ?>" class="label label-primary">Tambahkan Item PO</a>
                                                    	<a href="<?php echo base_url() ?>po/editpo/<?php $id=$row->fakturpo; echo $this->encryption->encode($id); ?>" class="label label-warning">Edit</a>
                                                    	<a href="<?php echo base_url() ?>po/deletepo/<?php $di=$row->fakturpo;echo $this->encryption->encode($di); ?>" class="label label-danger" onclick="return confirm('yakin ingin menghapus item ini');">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->