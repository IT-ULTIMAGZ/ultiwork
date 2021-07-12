                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-info">
                                    <div class="panel-body">
                                        <table id="datatable-responsive" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Faktur</th>
                                                    <th>Tanggal Order</th>
                                                    <th>Tanggal Kirim</th>
                                                    <th>Jatuh Tempo</th>
                                                    <th>Jumlah Item</th>
                                                    <th>Total Bayar</th> <?php //    0  = Data Belum Ada , 1  = Sudah Ada Barang, 2  = Kedatangan Barang Ditunda, 3  = Barang Sudah Datang  ?>
                                                    <th>Sts</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php foreach ($datapembelian->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $row->fakturpo; ?></td>
                                                    <td><?php echo $row->tglorder; ?></td>
                                                    <td><?php echo $row->tglkirim; ?></td>
                                                    <td><?php echo $row->tgljatuhtempo; ?></td>
                                                    <td align="right"><?php echo number_format($row->jmlditerima,0,'.','.'); ?></td>
                                                    <td align="right"><?php echo number_format($row->total,0,'.','.'); ?></td>
                                                    <td align="center"><?php if($row->bayar == 0){ echo "<b class='text-danger' title='Belum Dibayar'><i class='fa fa-close' title='Belum Dibayar'></i></b>";}else{echo "<b class='text-success' title='Sudah Dibayar'><i class='fa fa-check'></i></b>";} ?></td>
                                                    <td align="center">
                                                        <?php if($row->bayar == 0){ ?>
                                                        <a class="label label-primary disabled" title="Belum Bisa Melakukan Cetak">Cetak <i class="fa fa-print"></i></a>
                                                        <?php }else{ ?>
                                                        <a href="<?php echo base_url() ?>po/cetakpo/<?php $id=$row->fakturpo; echo $this->encryption->encode($id); ?>" class="label label-primary" target="_BLANK">Cetak <i class="fa fa-print"></i></a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->