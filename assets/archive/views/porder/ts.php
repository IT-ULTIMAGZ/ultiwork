                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-info">
                                    <div class="panel-body">
                                        <table id="datatable-responsive" class="table table-striped table-bordered">
                                            <thead>
                                                    <th>Faktur</th>
                                                    <th>Tanggal Order</th>
                                                    <th>Tanggal Kirim</th>
                                                    <th>Jatuh Tempo</th>
                                                    <th>Sisa Hari</th>
                                                    <th>Jumlah Item</th>
                                                    <th>Total Bayar</th> <?php /*    0  = Data Belum Ada , 1  = Sudah Ada Barang, 2  = Kedatangan Barang Ditunda, 3  = Barang Sudah Datang*/  ?>
                                                    <th>Sts</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php foreach ($datacekpembelian->result() as $row) { ?>
                                                <?php 
	                                            $tampiltotal =  $this->db->query("SELECT DISTINCT
																SUM(detailkonfirmasipo.jmlditerima) AS jmlditerima,
																SUM(detailkonfirmasipo.total) AS total
																FROM
																po
																INNER JOIN detailkonfirmasipo ON po.fakturpo = detailkonfirmasipo.fakturpo
																WHERE po.fakturpo = '".$row->fakturpo."'");
	                                            foreach ($tampiltotal->result() as $trows) {
                                                ?>
                                                    <td><?php echo $row->fakturpo; ?></td>
                                                    <td><?php echo $row->tglorder; ?></td>
                                                    <td><?php echo $row->tglkirim; ?></td>
                                                    <td><?php echo $row->tgljatuhtempo; ?></td>
                                                    <td>
                                                        <?php
                                                        if(!empty($row->tgljatuhtempo)){
                                                        $tgl1 = $row->tgljatuhtempo;
                                                        $tgl2 = date('Y-m-d');
                                                        
                                                        $datetime1 = new DateTime($tgl1);
                                                        $datetime2 = new DateTime($tgl2);
                                                        $difference = $datetime1->diff($datetime2);
                                                        $lambat = $difference->format('%r%d days');;
                                                            
                                                        $pecah1 = explode("-", $tgl1);
                                                        $year1 = $pecah1[0];
                                                        $month1 = $pecah1[1];
                                                        $date1 = $pecah1[2];
                                                            
                                                        $pecah2 = explode("-", $tgl2);
                                                        $year2 = $pecah2[0];
                                                        $month2 = $pecah2[1];
                                                        $date2 = $pecah2[2];
                                                        
                                                        //$tgl_dateline = gregoriantojd($month1, $date1, $year1); //jatuh tempo
                                                        //$tgl_kembali = gregoriantojd($month2, $date2, $year2); //tgl hari ini
                                                        //$lambat = $tgl_kembali - $tgl_dateline;
                                                            
                                                        //EDIT NOMINAL 1000 DENGAN NOMINAL YANG ANDA MAU
                                                        $denda=$lambat*1000;

                                                        if ($lambat>0) {
                                                        echo "<font color='red'>$lambat</font>";//<br>(Rp. $denda,00)
                                                        }
                                                        else if($lambat == 0){ echo "<font color='green'>Saatnya Pembayaran <i class='fa fa-phone fa-spin'></i> <i class='fa fa-money fa-spin'></i></font>"; }
                                                        else if($lambat == 3 || $lambat == 2 || $lambat == 1){ echo "<font color='red'>Pembayaran Sisa ".$lambat." <i class='fa fa-phone fa-spin'></i></font>"; }
                                                        else if($lambat == 7){ echo "<font color='red'>Pembayaran Sisa 7 Hari <i class='fa fa-phone fa-spin'></i></font>"; }
                                                        else if($lambat == 14){ echo "<font color='red'>Pembayaran Sisa 14 Hari <i class='fa fa-phone fa-spin'></i></font>"; }
                                                        else if($lambat == 4 || $lambat == 5 || $lambat == 6){ echo "<font color='red'>Sisa ".$lambat." <i class='fa fa-warning fa-spin'></i></font>"; }
                                                        else if($lambat == 7 || $lambat == 8 || $lambat == 9 || $lambat == 10 || $lambat == 11 || $lambat == 12 || $lambat == 13){ echo "<font color='red'>Sisa ".$lambat." Hari <i class='fa fa-warning fa-spin'></i></font>"; }
                                                        else { echo "<font color='#428bca'>Sisa ".$lambat." <i class='fa fa-warning'></i></font>"; }
                                                        }
                                                        ?> 
                                                    </td>
                                                    <td align="right"><?php if(!empty($trows->jmlditerima)){ echo number_format($trows->jmlditerima,0,'.','.'); } ?></td>
                                                    <td align="right"><?php if(!empty($trows->total)){ echo number_format($trows->total,0,'.','.'); } ?></td>
                                                    <td align="center"><?php if(!empty($row->bayar)){ echo "";}else{ if($row->bayar == "0"){ echo "<b class='text-danger' title='Belum Dibayar'><i class='fa fa-close' title='Belum Dibayar'></i></b>";}else{echo "<b class='text-success' title='Sudah Dibayar'><i class='fa fa-check'></i></b>";} } ?></td>
                                                    <td align="center">
                                                        <?php if(!empty($row->fakturpo)){ ?>
                                                        <a href="<?php echo base_url() ?>pembelian/updatepembayaran/<?php $id=$row->fakturpo; echo $this->encryption->encode($id); ?>" class="btn btn-xs btn-warning" title="Update"><i class="fa fa-upload text-white"></i></a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->