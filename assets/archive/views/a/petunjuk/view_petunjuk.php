<div class="row">
	<div class="col-sm-12">
    	<div class="panel panel-default">
            <div class="panel-body">
	           <form role="form">
                    <div class="form-group">
                    	<?php foreach ($datapetunjuk->result() as $row) { ?>
                        <label><?php echo $row->judulpetunjuk ?></label>
                        <div>
                        <?php echo $row->nmpetunjuk ?>
                        <a href="<?php echo base_url() ?>petunjuk/editpetunjuk/<?php $id=$row->petunjukid; echo $this->encryption->encode($id); ?>" class="label label-warning"><i class="fa fa-pencil"></i></a>
                        <?php if($this->session->userdata('level') == 1){ ?>
						<a href="<?php echo base_url() ?>petunjuk/deletepetunjuk/<?php $di=$row->petunjukid;echo $this->encryption->encode($di); ?>" class="label label-danger" onclick="return confirm('yakin ingin menghapus petunjuk ini');"><i class="fa fa-trash"></i></a>
						<?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </form>
			</div>
		</div>
	</div>
</div>