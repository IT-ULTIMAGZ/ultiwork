                        <div class="row">
                            <div class="col-sm-12">
                                <!-- BAR Chart -->
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Grafik Kelurahan</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <div id="morris-bar-example" style="height: 300px"></div>
                                    </div> 
                                </div>
                            </div>
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
                                        <table id="datatable-responsive" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kelurahan</th>
                                                    <th>Total Pemilih</th>
                                                    <th>Pemilih <?=$namacaleg?></th>
                                                    <th>Telah Dikunjungi</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $no=1;foreach ($data_kel->result() as $row) { 
                                                    $sData = $this->model_security->countKel($row->kel);
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->kel; ?></td>
                                                    <td><?php echo number_format($sData['kel3'],0,'.','.'); ?></td> 
                                                    <td><?php echo $sData['kel2']; ?></td>
                                                    <td><?php echo $sData['kel1']; ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                        <!--<canvas id="bar" data-type="Bar" height="300" width="800"></canvas>-->
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->