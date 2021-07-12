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
                                        <div class="row">
                                            <form class="form-search" action="<?php echo base_url() ?>dpthp" name="form-search">
                                            <div class="col-md-12">
                                                <h3>Filter Data DPTHP</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="nama" id="nama" placeholder="Cari berdasarkan nama" class="form-control">
                                            </div>
                                            <div class="col-md-3">
                                                <select class="select2 form-control" name="kecamatan" id="kecamatan">
                                                    <option>Pilih Kecamatan</option>
                                                    <?php
                                                        $qKec = $this->db->query("select distinct kec from dpshp");
                                                        foreach ($qKec->result() as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->kec ?>"><?php echo $row->kec ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-control" name="kelurahan" id="kelurahan">
                                                    <option>Pilih Kelurahan</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select class="form-control" name="tps" id="tps">
                                                    <option>Pilih TPS</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-md">
                                            </div>
                                            </form>
                                        </div>
                                        <div class="panel-heading" id="heading"></div>
                                        <div class="panel-body" id="body"></div>
                                        <div>&nbsp;</div>

<?php if(!empty($switchtoggle)){ ?>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 40px;
  height: 20px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 12px;
  width: 12px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(18px);
  -ms-transform: translateX(18px);
  transform: translateX(18px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<?php } ?>

                                        <?php 
                                            if(!empty($_GET['submit'])){
                                        ?>
                                        <div class="hidden-xs hidden-sm">
                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NKK</th>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Tempat, Tgl Lahir</th>
                                                    <th>Umur</th>
                                                    <th>Kawin</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Alamat</th>
                                                    <th>Difabel</th>
                                                    <th>TPS</th>
                                                    <th>Kel</th>
                                                    <th>Kec</th>
                                                    <th>No Telp.</th>
                                                    <th>Alamat Per</th>
                                                    <th>Dikunjungi</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                    <th>Dikunjungi?</th>
                                                    <th>Pemilih <?php echo $nama_caleg ?>?</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>                                            
                                            <tbody>
                                            	<?php $no=1;foreach ($datadpthp->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo substr($row->nkk,0,10)."******" ?></td>
                                                    <?php if($row->flagvisited==0){ ?>
                                                    <td style="color:lightblue"><?php echo substr($row->nik,0,10)."******"; ?></td>
                                                    <?php }else{ ?>
                                                    <td><?php echo substr($row->nik,0,10)."******"; ?></td>
                                                    <?php } ?>
                                                    <td><?php echo $row->nama ?></td>
                                                    <td><?php echo $row->tempat_lahir.", ".$row->tanggal_lahir; ?></td>
                                                    <td><?php echo $row->umur; ?></td>
                                                    <td><?php echo $row->kawin ?></td>
                                                    <td><?php echo $row->jenis_kelamin ?></td>
                                                    <td><?php echo $row->alamat ?></td>
                                                    <td><?php echo $row->difabel ?></td>
                                                    <td><?php echo $row->tps ?></td>
                                                    <td><?php echo $row->kel ?></td>
                                                    <td><?php echo $row->kec ?></td>
                                                    <td><?php echo $row->notelp ?></td>
                                                    <td><?php echo $row->alamatper ?></td>
                                                    <td>
                                                        <span id="valvisited">
                                                            <?php if($row->flagvisited==1){ echo 'Belum'; }else{ echo 'Sudah'; } ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span id="valmilih">
                                                        <?php if($row->flagmilih==1){ echo ''; }else if($row->flagmilih==2){ echo 'Pemilih '.$nama_caleg; }else if($row->flagmilih==3){ echo "Tidak"; }else{
                                                        } ?>
                                                        </span>
                                                    </td>
                                                    <td><?php echo $row->ketgerilya ?></td>
                                                    <td>
                                                        <form method="post" id="formvisited" name="formvisited" action="<?php echo site_url() ?>dpthp/test">
                                                        <label class="switch">
                                                          <?php if($row->flagvisited!=1){ ?>
                                                          <input type="checkbox" checked id="visited" name="visited" value="<?php $di=$row->id;echo $this->encryption->encode($di); ?>">
                                                          <?php }else{ ?>
                                                            <input type="checkbox" id="visited" name="visited" value="<?php $di=$row->id;echo $this->encryption->encode($di); ?>">
                                                          <?php } ?>
                                                          <span class="slider round"></span>
                                                        </label>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <label class="switch">
                                                          <?php if($row->flagvisited!=1){ ?>
                                                          <input type="checkbox" checked id="milih" name="milih" value="<?php $di=$row->id;echo $this->encryption->encode($di); ?>">
                                                          <?php }else{ ?>
                                                            <input type="checkbox" id="milih" name="milih" value="<?php $di=$row->id;echo $this->encryption->encode($di); ?>">
                                                          <?php } ?>
                                                          <span class="slider round"></span>
                                                        </label>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <?php if($row->flagmilih==1){ ?>
                                                        <a href="<?php echo base_url() ?>dpthp/aktifmilih/<?php $di=$row->id;echo $this->encryption->encode($di); ?>" class="label label-success">Pemilih <?php echo $nama_caleg ?></a>
                                                        <?php } ?>
                                                        <?php if($row->flagvisited==1){ ?>
                                                        <a href="<?php echo base_url() ?>dpthp/aktifvisited/<?php $di=$row->id;echo $this->encryption->encode($di); ?>" class="label label-primary">Sudah Dikunjungi?</a>
                                                        <?php } ?>
                                                    	<a href="<?php echo base_url() ?>dpthp/editdpthp/<?php $id=$row->id; echo $this->encryption->encode($id); ?>" class="label label-warning">Edit</a>
                                                        <?php if($this->session->userdata('level') == 1){ /*?>
                                                    	<a href="<?php echo base_url() ?>dpthp/deletedpthp/<?php $di=$row->id;echo $this->encryption->encode($di); ?>" class="label label-danger" onclick="return confirm('yakin ingin menghapus data ini');">Hapus</a>
                                                        <?php */} ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody> 
                                        </table>
                                        </div>
                                        <div class="hidden-md hidden-lg">
                                        <table id="datatable-responsive" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Tempat, Tgl Lahir</th>
                                                    <th>Umur</th>
                                                    <th>TPS</th>
                                                    <th>Kel</th>
                                                    <th>Kec</th>
                                                    <th>No Telp.</th>
                                                    <th>Alamat Per</th>
                                                    <th>Dikunjungi</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no=1;foreach ($datadpthp->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <?php if($row->flagvisited==0){ ?>
                                                    <td style="color:lightblue"><?php echo $row->nama; ?></td>
                                                    <?php }else{ ?>
                                                    <td><?php echo $row->nama; ?></td>
                                                    <?php } ?>
                                                    <td><?php echo $row->tempat_lahir.", ".$row->tanggal_lahir; ?></td>
                                                    <td><?php echo $row->umur; ?></td>
                                                    <td><?php echo $row->tps ?></td>
                                                    <td><?php echo $row->kel ?></td>
                                                    <td><?php echo $row->kec ?></td>
                                                    <td><?php echo $row->notelp ?></td>
                                                    <td><?php echo $row->alamatper ?></td>
                                                    <td><?php if($row->flagvisited==1){ echo 'Belum'; }else{ echo 'Sudah'; } ?></td>
                                                    <td>
                                                        <?php if($row->flagmilih==1){ echo ''; }else if($row->flagmilih==2){ echo 'Pemilih '.$nama_caleg; }else if($row->flagmilih==3){ echo "Tidak"; }else{
                                                        } ?>
                                                    </td>
                                                    <td><?php echo $row->ketgerilya ?></td>
                                                    <td>
                                                        <?php if($row->flagmilih==1){ ?>
                                                        <a href="<?php echo base_url() ?>dpthp/aktifmilih/<?php $di=$row->id;echo $this->encryption->encode($di); ?>" class="label label-success">Pemilih <?php echo $nama_caleg ?></a>
                                                        <?php } ?>
                                                        <?php if($row->flagvisited==1){ ?>
                                                        <a href="<?php echo base_url() ?>dpthp/aktifvisited/<?php $di=$row->id;echo $this->encryption->encode($di); ?>" class="label label-primary">Sudah Dikunjungi?</a>
                                                        <?php } ?>
                                                        <a href="<?php echo base_url() ?>dpthp/editdpthp/<?php $id=$row->id; echo $this->encryption->encode($id); ?>" class="label label-warning">Edit</a>
                                                        <?php if($this->session->userdata('level') == 1){ ?>
                                                        <a href="<?php echo base_url() ?>dpthp/deletedpthp/<?php $di=$row->id;echo $this->encryption->encode($di); ?>" class="label label-danger" onclick="return confirm('yakin ingin menghapus data ini');">Hapus</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody> 
                                        </table>
                                        </div>
                                        <?php } ?>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->