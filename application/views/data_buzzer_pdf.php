<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Data_buzzer List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Domisili</th>
		<th>Akun</th>
		<th>Follower</th>
		<th>Backround</th>
		<th>Interest</th>
		<th>Client</th>
		<th>Gender Audiens</th>
		<th>Target Audiens</th>
		<th>Capture Profile</th>
		
            </tr><?php
            foreach ($data_buzzer_data as $data_buzzer)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $data_buzzer->domisili ?></td>
		      <td><?php echo $data_buzzer->akun ?></td>
		      <td><?php echo $data_buzzer->follower ?></td>
		      <td><?php echo $data_buzzer->backround ?></td>
		      <td><?php echo $data_buzzer->interest ?></td>
		      <td><?php echo $data_buzzer->client ?></td>
		      <td><?php echo $data_buzzer->gender_audiens ?></td>
		      <td><?php echo $data_buzzer->target_audiens ?></td>
		      <td><?php echo $data_buzzer->capture_profile ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>