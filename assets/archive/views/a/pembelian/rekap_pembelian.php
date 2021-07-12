<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <?php if(!empty($rekapperday)){ ?>
        <title>Rekap_Pembelian_<?php echo date('d-m-Y'); ?></title>
        <?php }elseif(!empty($rekappermonth)){ ?>
        <title>Rekap_Pembelian_<?php echo date('m-Y'); ?></title>
        <?php } ?>

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">
        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        
    </head>
<body>
    
<div>&nbsp;</div>
<div class="row-fluid">
	<div class="col-md-12">
		<?php if(!empty($getrekap)){ ?>
		<table class="table table-striped table-bordered">
			<thead>
                                                <tr>
                                                    <th>Faktur</th>
                                                    <th>Tanggal Order</th>
                                                    <th>Tanggal Kirim</th>
                                                    <th>Jatuh Tempo</th>
                                                    <th>Jumlah Item</th>
                                                    <th>Total Bayar</th> <?php //    0  = Data Belum Ada , 1  = Sudah Ada Barang, 2  = Kedatangan Barang Ditunda, 3  = Barang Sudah Datang  ?>
                                                    <th>Sts</th>
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
                                                    <td align="center"><?php if($row->bayar == 0){ echo "Belum Dibayar";}else{echo "Sudah Dibayar";} ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
		</table>
		<?php } ?>
	</div>
</div>
<script type="text/javascript">
	window.print();
</script>
</body>
</html>