<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="aplikasi inventory">
        <meta name="author" content="Inventory2016">

        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favico.jpg">

        <title><?php echo $this_tittle; ?></title>

        <?php if(!empty($autokomplit)){ ?>
        <link href='<?php echo base_url();?>assets/js/jquery.autocomplete.css' rel='stylesheet' />
        <?php } ?>


        <?php if(!empty($moris)){ ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/morris.js/morris.css">
        <?php } ?>

        <?php if(!empty($grafik)){ ?>
        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/morris.js/morris.css">
        <?php } ?>

        <?php if(!empty($datepicker)){ ?>
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/dist/css/daterangepicker.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <?php } ?>

        <?php if(!empty($datatable)){ ?>
        <!-- DataTables -->
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <?php } ?>

        <?php if(!empty($select2)){ ?>
        <link href="<?php echo base_url(); ?>assets/plugins/select2/dist/css/select2.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/plugins/select2/dist/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
        <?php } ?>

        <?php if(!empty($sweetalert)){ ?>
        <link href="<?php echo base_url(); ?>assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
        <?php } ?>

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">

        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-65046120-1', 'auto');
          ga('send', 'pageview');

        </script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        
    </head>


    