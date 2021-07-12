<div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <form class="form-search" action="<?php echo base_url() ?>laporan/tim" name="form-search">
                                            <div class="col-md-12">
                                                <h3>Filter Data Grafik</h3>
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
                                            <div class="col-md-3">
                                                <select class="form-control" name="tps" id="tps">
                                                    <option>Pilih TPS</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-md">
                                            </div>
                                            </form>
                                        </div>
                                        <div>&nbsp;</div>

                                        <?php 
                                            if(!empty($_GET['submit'])){
                                        ?>
                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Petugas</th>
                                                    <th>Pemilih</th>
                                                    <th>Memilih</th>
                                                    <th>Belum Memilih</th>
                                                    <th>Sudah Dikunjungi</th>
                                                    <th>Belum Dikunjungi</th>
                                                </tr>
                                            </thead>                                            
                                            <tbody>
                                            	<?php $no=1;foreach ($datapengguna->result() as $row) { 
                                                $sData1 = $this->model_security->countPemilih($_GET['kecamatan'],$_GET['kelurahan'],$_GET['tps']);
                                                $sData2 = $this->model_security->countMemilih($row->id);
                                                $sData3 = $this->model_security->countBelumMemilih($_GET['kecamatan'],$_GET['kelurahan'],$_GET['tps']);
                                                $sData4 = $this->model_security->countSudahDikunjungi($row->id);
                                                $sData5 = $this->model_security->countBelumDikunjungi($_GET['kecamatan'],$_GET['kelurahan'],$_GET['tps']);
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->nama_lengkap; ?></td>
                                                    <td><?php echo $sData1['data']; ?></td>
                                                    <td><?php echo $sData2['data']; ?></td>
                                                    <td><?php echo $sData3['data']; ?></td>
                                                    <td><?php echo $sData4['data']; ?></td>
                                                    <td><?php echo $sData5['data']; ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody> 
                                        </table>
                                        <?php } ?>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->