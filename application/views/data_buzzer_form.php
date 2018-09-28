<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>DATA_BUZZER</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Domisili <?php echo form_error('domisili') ?></td>
            <td><input type="text" class="form-control" name="domisili" id="domisili" placeholder="Domisili" value="<?php echo $domisili; ?>" />
        </td>
	    <tr><td>Akun <?php echo form_error('akun') ?></td>
            <td><input type="text" class="form-control" name="akun" id="akun" placeholder="Akun" value="<?php echo $akun; ?>" />
        </td>
	    <tr><td>Follower <?php echo form_error('follower') ?></td>
            <td><input type="text" class="form-control" name="follower" id="follower" placeholder="Follower" value="<?php echo $follower; ?>" />
        </td>
	    <tr><td>Backround <?php echo form_error('backround') ?></td>
            <td><input type="text" class="form-control" name="backround" id="backround" placeholder="Backround" value="<?php echo $backround; ?>" />
        </td>
	    <tr><td>Interest <?php echo form_error('interest') ?></td>
            <td><input type="text" class="form-control" name="interest" id="interest" placeholder="Interest" value="<?php echo $interest; ?>" />
        </td>
	    <tr><td>Client <?php echo form_error('client') ?></td>
            <td><input type="text" class="form-control" name="client" id="client" placeholder="Client" value="<?php echo $client; ?>" />
        </td>
	    <tr><td>Gender Audiens <?php echo form_error('gender_audiens') ?></td>
            <td><input type="text" class="form-control" name="gender_audiens" id="gender_audiens" placeholder="Gender Audiens" value="<?php echo $gender_audiens; ?>" />
        </td>
	    <tr><td>Target Audiens <?php echo form_error('target_audiens') ?></td>
            <td><input type="text" class="form-control" name="target_audiens" id="target_audiens" placeholder="Target Audiens" value="<?php echo $target_audiens; ?>" />
        </td>
	    <tr><td>Capture Profile <?php echo form_error('capture_profile') ?></td>
            <td><input type="text" class="form-control" name="capture_profile" id="capture_profile" placeholder="Capture Profile" value="<?php echo $capture_profile; ?>" />
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('data_buzzer') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->