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
				foreach ($building as $row) {
					echo "<option value=\"{$row->building_id}\">{$row->building_name}</option>";
				}
			?>
			</select><br>
			<label>Cinema:</label>
			<select required id="cineslct" class="watchthis">
			<?php
				echo "<option value=\"0\">--Select Branch--</option>";
				foreach ($cinema as $row) {
					echo "<option value=\"{$row->cinema_id}\">{$row->cinema_number}</option>";
				}
			?>
			</select><br>
			<label>Date:</label>
			<input type="date" name="appt_date" placeholder="E-mail" required id="dateslct" class="watchthis"><br>
			<label>Time:</label>
			<select name="appt_time" required id="appt_time">
				
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
		$('#watchthis').change(function(){
			if($('#cineslct').val() != 0 && $('#dateslct').val())
			{
				$.ajax({
					method: 'GET',
					url: 'moviepage.php',
					data: {date:$('#dateslct').val(),cinema:$('#cineslct').val()},
					dataType: 'json',
					success: function(data){
						var toEcho = '';
						var i;
						for(i = 0; toecho < 5; toEcho++)
						{
							toEcho +='<option value="'+toEcho+'">'+toEcho+'</option>';
						}
					$('#appt_time').html(toEcho);
					}
				},
					error: function(){
						alert('Could not get Data from Database');
				}
			})
		}
	</script>