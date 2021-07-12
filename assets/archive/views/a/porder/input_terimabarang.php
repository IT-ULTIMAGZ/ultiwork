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
                                    	<b>
                                    	<div class="pull-left">
                                    		Faktur : <?php echo $faktur; ?>
                                    	</div>
                                    	</b>
                                    	<div>&nbsp;</div>
                                    	<div>&nbsp;</div>
                                    	<form method="post" action="<?php echo base_url(); ?>po/getterimabarang" name="terimabarangForm" id="terimabarangForm" enctype="multipart/form-data">
                                    	<input type="hidden" name="count" id="count" value="<?php echo $count; ?>" readonly>
                                    	<input type="hidden" name="faktur" id="faktur" value="<?php echo $faktur; ?>" readonly>
                                        <table id="datatable-responsive" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Ukuran</th>
                                                    <th>Sat</th>
                                                    <th>Jml Order</th>
                                                    <th>Jml Kirim</th>
                                                    <th>Harga</th>
                                                    <th>Total</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                            	<?php $no=1;$a=1;$b=1;$c=1;$d=1;$e=1;$f=1;$g=1;$h=1;$i=1;$j=1;$k=1;$l=1;$m=1;foreach ($dataterima->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td>
                                                    	<?php echo $row->namaitem; ?>
                                                    	<input type="hidden" class="form-control col-md-1" name="item<?php echo $j++; ?>" id="item<?php echo $k++; ?>" required="required" value="<?php echo $row->itemid; ?>" readonly>
                                                    </td>
                                                    <td><?php echo $row->ukuran; ?></td>
                                                    <td>Pcs</td>
                                                    <td>
                                                    <?php echo $jmlorder = $row->putih+$row->hitam+$row->coklat+$row->hijau+$row->biru+$row->pink+$row->ungu+$row->merah+$row->silver+$row->oak+$row->walnut+$row->gold+$row->cfbeen+$row->honay+$row->kuning; ?>
                                                    <input type="hidden" class="form-control col-md-1" name="jmlorder<?php echo $l++; ?>" id="jmlorder<?php echo $m++; ?>" required="required" value="<?php echo $jmlorder; ?>" readonly>
                                                    </td>
                                                    <td width="75">
                                                    	<input type="text" class="form-control col-md-1" name="jmlkirim<?php echo $a++; ?>" id="jmlkirim<?php echo $b++; ?>" required="required" onchange="sumtotal<?php echo $i++; ?>()"></td>
                                                    <td>
                                                    	<?php echo number_format($row->hargajual,0,'.','.'); ?>
                                                    	<input type="hidden" class="form-control col-md-1" name="hargajual<?php echo $c++; ?>" id="hargajual<?php echo $d++; ?>" required="required" value="<?php echo $row->hargajual; ?>" readonly></td>
                                                    </td>
                                                    <td width="175"><input type="text" class="form-control col-md-1" name="total<?php echo $e++; ?>" id="total<?php echo $f++; ?>" readonly></td>
                                                    <td><textarea type="text" class="form-control col-md-1" name="keterangan<?php echo $g++; ?>" id="keterangan<?php echo $h++; ?>"></textarea></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <div>
                                        
                                        <div class="col-md-7">
                                        <div class="pull-left">Lampiran (dianjurkan memberi nama file seperti no faktur agar tidak terjadi data ganda)</p>
                                        <div><input type="file" name="lampiran" id="lampiran" required="required" class="form-control"></div></div>
                                        <div class="pull-left">Diserahkan :</p>
                                        <div><input type="text" name="diserahkan" id="diserahkan" required="required" class="form-control"></div>
                                        <div class="pull-left">Diterima :</p>
                                        <div><input type="text" name="diterima" id="diterima" required="required" class="form-control"></div>
                                        </div>
                                        <div class="pull-right">
                                        	<p>&nbsp;</p>
                                        	<button type="submit" class="btn btn-sm btn-success" onclick="return confirm('anda yakin sudah memeriksa nya');">Selesai <i class="fa fa-check"></i></button>
                                        	<a href="<?php echo base_url(); ?>po" class="btn btn-sm btn-default">Cancel</a>
                                    	</div>
                                        </form>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->