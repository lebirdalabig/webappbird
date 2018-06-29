<div class='row'>
	<div class='col-md-6' style="border-right: 1px solid black;">
		<img src= "<?php echo base_url("resources/{$res[0]->movie_poster}"); ?>" style="margin: 50px; margin-left:200px">		
	</div>
	<div  style="margin: 50px;">
	<p style="margin: 50px; padding-left: 20px"> <?php echo $res[0]->movie_desc; ?> </p>
	</div>
</div>
<div class="form-div">
		<hr>
		<form action="set-appointment.php" method="POST" id="appt-form">
			<label>Branch:</label>
			<select id="branslct" class="watchthis">
			<?php
				echo "<option value=\"0\">--Select Branch--</option>";
				foreach ($brn_rsa as $row) {
					echo "<option value=\"{$row['branch_id']}\">{$row['branch_name']}</option>";
				}
			?>
			</select><br>
			<label>Date:</label>
			<input type="date" name="appt_date" placeholder="E-mail" required id="dateslct" class="watchthis"><br>
			<label>Time:</label>
			<select name="appt_time" required id="appt_time">
				<!--Possible appointment times are determined by branch [operating] hours, thus can only be determined after user has selected the branch and the date of appointment-->
				<?php
				echo "<option value=\"0\">--Select Time--</option>";
				foreach ($hr_rsa as $row) {
					echo "<option value=\"{$row['opening']}\">{$row['closing']}</option>";
				}
			?>
				<!--CODE HERE to be injected by result of AJAX query upon SUCCESS-->
			</select><br>
			<label>Service:</label>
			<select id="svc" name="svc" required="">
			<?php
				echo "<option value=\"0\">--Select Service--</option>";
				foreach ($svc_rsa as $row) {
					echo "<option value=\"{$row['svc_id']}\">{$row['svc_name']}</option>";
				}
			?>
			</select>
			<input type="submit" name="set-appointment" value="Set Appointment">
		</form>
	</div>

	<script type="text/javascript">
		$('#branch').change(function(){
			var url = "";
			var data;
			
			$.ajax({
				method: 'post',
				url: url,
				data: data,
				async: false,
				dataType: 'json',
				success: function(response){
					
				},
				error: function(){
					alert('D:');
				}
			})
		});
	</script>