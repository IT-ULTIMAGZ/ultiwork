                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h3>Sudah Melengkapi Data</h3>
                                        <table id="datatable-buttons-1" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Provinsi</th>
                                                    <th>Login</th>
                                                    <th>Nama</th>
                                                    <th>Telepon</th>
                                                    <th>Gender</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                
                                                $no=1;foreach ($dataprovDone->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->provinsi; ?></td>
                                                    <td><?php echo $row->Login; ?></td>
                                                    <td><?php echo $row->NamaLengkap; ?></td>
                                                    <td><?php echo $row->Telepon; ?></td>
                                                    <td><?php echo $row->LP; ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->

                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h3>Belum Melengkapi Data</h3>
                                        <table id="datatable-buttons-2" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Provinsi</th>
                                                    <th>Login</th>
                                                    <th>Nama</th>
                                                    <th>Telepon</th>
                                                    <th>Gender</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                
                                                $no=1;foreach ($dataprovNot->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->provinsi; ?></td>
                                                    <td><?php echo $row->Login; ?></td>
                                                    <td><?php echo $row->NamaLengkap; ?></td>
                                                    <td><?php echo $row->Telepon; ?></td>
                                                    <td><?php echo $row->LP; ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->