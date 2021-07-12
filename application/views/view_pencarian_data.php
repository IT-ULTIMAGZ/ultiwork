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
                                        <p>
                                            <button class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Pencarian Data</button>
                                        </p>
                                        <div>&nbsp;</div>
                                        <table id="datatable-responsive" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>NIK</th>
                                                    <th>TPS</th>
                                                    <th>Usia</th>
                                                    <th>Alamat</th>
                                                    <th>Status</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                if(!empty($_GET['submit'])){
                                                    $con = "";
                                                    $nik = $_GET['nik'];
                                                    if($nik==""){
                                                        $nik = "";
                                                    }else{
                                                        if($_GET['nokk'] == "" && $_GET['nama'] == "" && $_GET['usia'] == "" && $_GET['statusperkawinan'] == "Pilih" && $_GET['perumahan'] == "" && $_GET['kelurahan'] == "Pilih" && $_GET['tps'] == "" && $_GET['rt'] == "" && $_GET['rw'] == ""){
                                                            $con .= "dpshp.nik='".$nik."'";
                                                        }else{
                                                            $con .= "dpshp.nik='".$nik."' AND ";
                                                        }
                                                    }
                                                    $nokk = $_GET['nokk'];
                                                    if($nokk==""){
                                                        $nokk = "";
                                                    }else{
                                                        if($_GET['nama'] == "" && $_GET['usia'] == "" && $_GET['statusperkawinan'] == "Pilih" && $_GET['perumahan'] == "" && $_GET['kelurahan'] == "Pilih" && $_GET['tps'] == "" && $_GET['rt'] == "" && $_GET['rw'] == ""){
                                                            $con .= "dpshp.nkk='".$nokk."'";
                                                        }else{
                                                            $con .= "dpshp.nkk='".$nokk."' AND ";
                                                        }
                                                    }
                                                    $nama = $_GET['nama'];
                                                    if($nama==""){
                                                        $nama = "";
                                                    }else{
                                                        if($_GET['usia'] == "" && $_GET['statusperkawinan'] == "Pilih" && $_GET['perumahan'] == "" && $_GET['kelurahan'] == "Pilih" && $_GET['tps'] == "" && $_GET['rt'] == "" && $_GET['rw'] == ""){
                                                            $con .= "dpshp.nama LIKE '%".$nama."%'";
                                                        }else{
                                                            $con .= "dpshp.nama LIKE '%".$nama."%' AND ";
                                                        }
                                                    }

                                                    $usia = $_GET['usia'];
                                                    if($usia==""){
                                                        $usia = "";
                                                    }else{
                                                        if($_GET['statusperkawinan'] == "Pilih" && $_GET['perumahan'] == "" && $_GET['kelurahan'] == "Pilih" && $_GET['tps'] == "" && $_GET['rt'] == "" && $_GET['rw'] == ""){
                                                            $con .= "umur LIKE '%".$usia."%'";
                                                        }else{
                                                            $con .= "umur LIKE '%".$usia."%' AND ";   
                                                        }
                                                    }

                                                    $statusperkawinan = $_GET['statusperkawinan'];
                                                    if($statusperkawinan=="Pilih"){
                                                        $statusperkawinan = "";
                                                    }else{
                                                        if($_GET['perumahan'] == "" && $_GET['kelurahan'] == "Pilih" && $_GET['tps'] == "" && $_GET['rt'] == "" && $_GET['rw'] == ""){
                                                            $con .= "dpshp.kawin = '".$statusperkawinan."'";
                                                        }else{
                                                            $con .= "dpshp.kawin = '".$statusperkawinan."' AND ";
                                                        }
                                                    }

                                                    $perumahan = $_GET['perumahan'];
                                                    if($perumahan==""){
                                                        $perumahan = "";
                                                    }else{
                                                        if($_GET['kelurahan'] == "" && $_GET['tps'] == "" && $_GET['rt'] == "" && $_GET['rw'] == ""){
                                                            $con .= "dpshp.alamat like '%".$perumahan."%'";
                                                        }else{
                                                            $con .= "dpshp.alamat like '%".$perumahan."%' AND ";
                                                        }
                                                    }

                                                    $kelurahan = $_GET['kelurahan'];
                                                    if($kelurahan=="Pilih"){
                                                        $kelurahan = "";
                                                    }else{
                                                        if($_GET['tps'] == "" && $_GET['rt'] == "" && $_GET['rw'] == ""){
                                                            $con .= "dpshp.kel='".$kelurahan."'";
                                                        }else{
                                                            $con .= "dpshp.kel='".$kelurahan."' AND ";
                                                        }
                                                    }

                                                    $tps = $_GET['tps'];
                                                    if($tps==""){
                                                        $tps = "";
                                                    }else{
                                                        if($_GET['rt'] == "" && $_GET['rw'] == ""){
                                                            $con .= "dpshp.tps='".$tps."'";
                                                        }else{
                                                            $con .= "dpshp.tps='".$tps."' AND ";
                                                        }
                                                    }

                                                    $rt = $_GET['rt'];
                                                    if($rt==""){
                                                        $rt = "";
                                                    }else{
                                                        if($_GET['rw'] == ""){
                                                            $con .= "dpshp.rt='".$rt."'";
                                                        }else{
                                                            $con .= "dpshp.rt='".$rt."' AND ";
                                                        }
                                                    }

                                                    $rw = $_GET['rw'];
                                                    if($rw==""){
                                                        $rw = "";
                                                    }else{
                                                        $con .= "dpshp.rw='".$rw."'";
                                                    }

                                                    $datapemilih = $this->db->query("select *, YEAR(CURDATE()) - YEAR(tanggal_lahir) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(tanggal_lahir),'-',DAY(tanggal_lahir)), '%Y-%c-%e') > CURDATE(), 1, 0) as umur from dpshp where $con");

                                                    $no=1;foreach ($datapemilih->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->nama; ?></td>
                                                    <?php if($row->flagvisited==0){ ?>
                                                    <td style="color:lightblue"><?php echo substr($row->nik,0,10)."******"; ?></td>
                                                    <?php }else{ ?>
                                                    <td><?php echo substr($row->nik,0,10)."******"; ?></td>
                                                    <?php } ?>
                                                    <td><?php echo $row->tps ?></td>
                                                    <td><?php echo $row->umur; ?></td>
                                                    <td><?php echo $row->alamat ?></td>
                                                    <td>
                                                        <?php if($row->flagmilih==1){ echo ''; }else if($row->flagmilih==2){ echo 'Pemilih '.$nama_caleg; }else if($row->flagmilih==3){ echo "Tidak"; }else{
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if($row->flagmilih==1){ ?>
                                                        <a href="<?php echo base_url() ?>dpthp/aktifmilih/<?php $di=$row->id;echo $this->encryption->encode($di); ?>" class="label label-success">Pemilih <?php echo $nama_caleg ?></a>
                                                        <?php } ?>
                                                        <a href="<?php echo base_url() ?>dpthp/editdpthp/<?php $id=$row->id; echo $this->encryption->encode($id); ?>" class="label label-warning">Edit</a>
                                                    </td>
                                                </tr>
                                                <?php } 
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->
                        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
                                            <div class="modal-dialog"> 
                                                <div class="modal-content"> 
                                                    <div class="modal-header"> 
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                                        <h4 class="modal-title">Parameter Pencarian</h4> 
                                                    </div> 
                                                    <div class="modal-body"> 
                                                        <form action="<?php echo base_url() ?>main/pencarian_data" method="get">
                                                        <div class="row"> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <label for="nik" class="control-label">NIK</label> 
                                                                    <input type="text" class="form-control" id="nik" name="nik"> 
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <label for="nokk" class="control-label">No KK</label> 
                                                                    <input type="text" class="form-control" id="nokk" name="nokk"> 
                                                                </div> 
                                                            </div> 
                                                        </div>
                                                        <div class="row"> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <label for="nama" class="control-label">Nama</label> 
                                                                    <input type="text" class="form-control" id="nama" name="nama"> 
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <label for="usia" class="control-label">Usia</label> 
                                                                    <input type="text" class="form-control" id="usia" name="usia"> 
                                                                </div> 
                                                            </div> 
                                                        </div>
                                                        <div class="row"> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <label for="statusperkawinan" class="control-label">Status Perkawinan</label><select name="statusperkawinan" id="statusperkawinan" class="form-control">
                                                                        <option value="Pilih">-- Pilih Status --</option>
                                                                        <option value="B">Belum</option>
                                                                        <option value="S">Sudah</option>
                                                                        <option value="P">Perceraian</option>
                                                                    </select> 
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <label for="perumahan" class="control-label">Perumahan</label> 
                                                                    <input type="text" class="form-control" id="perumahan" name="perumahan"> 
                                                                </div> 
                                                            </div> 
                                                        </div>
                                                        <div class="row"> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <label for="field-2" class="control-label">Kelurahan</label> 
                                                                    <select name="kelurahan" id="kelurahan" class="form-control">
                                                                        <option value="Pilih">-- Pilih --</option>
                                                                        <?php 
                                                                        $qKel = $this->db->query("select distinct kel from dpshp order by 1 asc");
                                                                        foreach ($qKel->result() as $row) {
                                                                            echo '<option value="'.$row->kel.'">'.$row->kel.'</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <label for="tps" class="control-label">TPS</label> 
                                                                    <input type="text" class="form-control" id="tps" name="tps"> 
                                                                </div> 
                                                            </div> 
                                                        </div>
                                                        <div class="row"> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <label for="rt" class="control-label">RT</label> 
                                                                    <input type="text" class="form-control" id="rt" name="rt"> 
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <label for="rw" class="control-label">RW</label> 
                                                                    <input type="text" class="form-control" id="rw" name="rw"> 
                                                                </div> 
                                                            </div> 
                                                        </div>
                                                    </div> 
                                                    <div class="modal-footer"> 
                                                        <input type="submit" name="submit" value="submit" value="Cari Data" class="pull-left btn btn-primary">
                                                        <button type="reset" class="pull-right btn btn-default waves-effect waves-light">Reset</button>
                                                        </form>
                                                    </div> 
                                                </div> 
                                            </div>
                                        </div><!-- /.modal -->