<!-- Main content -->

        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>DATA_BUZZER</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" enctype="multipart/form-data" method="post"><table class='table table-bordered'>
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
            <td>
            <select multiple name="backround_tags[]" class="form-control select2" multiple="multiple"  data-placeholder="Select a State" id="backround">
            <?php

            $active = '';
            $total = count($cat_b);

            $selected = '';
            // Looping All Tags
            for ($i=0; $i < $total ; $i++):
                // Looping Post_tag jika ada
                $p = explode(',', $backround);

                foreach ($p as $bt){
                    $active = $bt;

                    if($active == $cat_b[$i]['n_backround']){
                        $selected = ' selected=selected';
                        break;
                    }else{
                        $selected = '';
                    }
                }
            ?>
            <option value="<?php echo $cat_b[$i]['n_backround'];?>" <?php echo $selected ?> ><?php echo $cat_b[$i]['n_backround'];?></option>
            <?php endfor; ?>
            </select>
            <!-- <input type="text" class="form-control" name="backround" id="backround" placeholder="Backround" value="<?php echo $backround; ?>" /> -->
            </td>
	    <tr><td>Interest <?php echo form_error('interest') ?></td>
            <td>
                <select multiple class="form-control select2" name="interest_tags[]" multiple="multiple"  data-placeholder="Select a State" id="interest">
                    <?php
                         $active = '';
                         $total = count($cat_i);
         
                         $selected = '';
                         // Looping All Tags
                         for ($i=0; $i < $total ; $i++):
                             // Looping Post_tag jika ada
                             $p = explode(',', $interest);
         
                             foreach ($p as $in){
                                 $active = $in;
         
                                 if($active == $cat_i[$i]['n_interest']){
                                     $selected = ' selected=selected';
                                     break;
                                 }else{
                                     $selected = '';
                                 }
                             }
                    ?>
                    <option value="<?php echo $cat_i[$i]['n_interest'];?>" <?php echo $selected ?> ><?php echo $cat_i[$i]['n_interest'];?></option>
                    <?php endfor; ?>
                </select>
            <!-- <input type="text" class="form-control" name="interest" id="interest" placeholder="Interest" value="<?php echo $interest; ?>" /> -->
            </td>
	    <tr><td>Client <?php echo form_error('client') ?></td>
            <td><input type="text" class="form-control" name="client" id="client" placeholder="Client" value="<?php echo $client; ?>" />
        </td>
	    <tr><td>Gender Audiens <?php echo form_error('gender_audiens') ?></td>
        <td>
            <select name="gender_audiens" id="gender_audiens">
                <option value="L" <?php if($gender_audiens == 'L') echo 'selected="selected"'; ?>>Laki-laki</option>
                <option value="P" <?php if($gender_audiens == 'P') echo 'selected="selected"'; ?>>Perempuan</option>
            </select>
            <!-- <td><input type="text" class="form-control" name="gender_audiens" id="gender_audiens" placeholder="Gender Audiens" value="<?php echo $gender_audiens; ?>" /> -->
        </td>
        <tr><td>Domisili <?php echo form_error('domisili') ?></td>
        <td>
            <select name="domisili" id="domisili">
                <?php
                    foreach ($dom as $d):
                ?>
                <option value="<?php echo $d->n_domisili;?>" <?php if($domisili==$d->n_domisili) echo 'selected="selected"'; ?> ><?php echo $d->n_domisili;?></option>
                <?php endforeach; ?>
            </select>
            <!-- <td><input type="text" class="form-control" name="gender_audiens" id="gender_audiens" placeholder="Gender Audiens" value="<?php echo $gender_audiens; ?>" /> -->
        </td>
	    <tr><td>Target Audiens <?php echo form_error('target_audiens') ?></td>
            <td><input type="text" class="form-control" name="target_audiens" id="target_audiens" placeholder="Target Audiens" value="<?php echo $target_audiens; ?>" />
        </td>
        <tr><td>Price <?php echo form_error('price') ?></td>
            <td><input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo $price; ?>" />
        </td>
	    <tr><td>Capture Profile <?php echo form_error('capture_profile') ?></td>
            <td><input type="file" class="form-control" name="capture_profile" id="capture_profile" placeholder="Capture Profile" value="<?php echo $capture_profile; ?>" />
        </td>
        <input type="hidden" name="path" value="<?php echo $capture_profile; ?>">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('data_buzzer') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        <script type="text/javascript">
            $(function (){
                //Initialize Select2 Elements
                $('.select2').select2({
                    
                    // alert('OK');
                    // type:"POST",
		            placeholder: 'searching',
                    ajax: {
                        url: '<?php echo site_url("backround/getBackround"); ?>',
                        dataType :'json',
                        delay:250,
                        processResults : function(data){
                            return {
                                results : data
                            };
                        },
                        

                        cache: true

                    }
                });
            })    
        </script>