
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Data_buzzer Read</h3>
        <table class="table table-bordered">
	    <tr><td>Domisili</td><td><?php echo $domisili; ?></td></tr>
	    <tr><td>Akun</td><td><?php echo $akun; ?></td></tr>
	    <tr><td>Follower</td><td><?php echo $follower; ?></td></tr>
	    <tr><td>Backround</td><td><?php echo $backround; ?></td></tr>
	    <tr><td>Interest</td><td><?php echo $interest; ?></td></tr>
	    <tr><td>Client</td><td><?php echo $client; ?></td></tr>
	    <tr><td>Gender Audiens</td><td><?php echo $gender_audiens; ?></td></tr>
	    <tr><td>Target Audiens</td><td><?php echo $target_audiens; ?></td></tr>
	    <tr><td>Capture Profile</td><td><img src="<?php echo base_url().$capture_profile ?>"/></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('data_buzzer') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->