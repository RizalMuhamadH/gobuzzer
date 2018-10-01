        <style type="text/css">
        img  {
            width: 75px;
            text-align: center;
        }
        </style>
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>DATA_BUZZER LIST <?php echo anchor('data_buzzer/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('data_buzzer/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('data_buzzer/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Domisili</th>
		    <th>Akun</th>
		    <th>Follower</th>
		    <th>Backround</th>
		    <th>Interest</th>
		    <th>Client</th>
		    <th>Gender Audiens</th>
		    <th>Target Audiens</th>
		    <th>Capture Profile</th>
		    <th>Price</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($data_buzzer_data as $data_buzzer)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $data_buzzer->domisili ?></td>
		    <td> <a href="<?php echo site_url('data_buzzer/read/'.$data_buzzer->id) ?>"> <?php echo $data_buzzer->akun ?> </a></td>
		    <td><?php echo $data_buzzer->follower ?></td>
		    <td><?php echo $data_buzzer->backround ?></td>
		    <td><?php echo $data_buzzer->interest ?></td>
		    <td><?php echo $data_buzzer->client ?></td>
		    <td><?php echo $data_buzzer->gender_audiens ?></td>
		    <td><?php echo $data_buzzer->target_audiens ?></td>
		    <td><img src="<?php echo base_url().$data_buzzer->capture_profile ?>"/></td>
		    <td><?php echo $data_buzzer->price ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('data_buzzer/read/'.$data_buzzer->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('data_buzzer/update/'.$data_buzzer->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('data_buzzer/delete/'.$data_buzzer->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->