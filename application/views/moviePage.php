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
				print_r($building);
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
			<!--
			<input type="date" name="appt_date" placeholder="E-mail" required id="dateslct" class="watchthis">
			-->
			<select name="appt_date" placeholder="E-mail" required id="dateslct" class="date">
				
			</select><br>
			
			<label>Time:</label>
			<select name="appt_time" required id="appt_time" class="time">
				
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
$(document).ready(function(){
		$('select.watchthis').change(function(){
			var cinema = $('#cineslct').val();
			var base_url = "<?php echo base_url()?>";
			if($('#cineslct').val() != 0){
				$('.date option').remove();
				$.ajax({
					method: 'POST',
					url: base_url + 'User/getScreening_date',
					data: {
						cinema : cinema
					},
					dataType: 'json',
					success: function(data){
						if(!data.message){
							console.log($('#cineslct').val());
							var i;
							for(i = 0; i != data.length; i++){	
								var toEcho;
								toEcho +='<option value="'+data[i].screening_date+'">'+data[i].screening_date+'</option>';
								$('.date').append(toEcho);
							}	
						}
					}
				});				
			}	
		});

		$('select.date').change(function(){
			var date = $('.date').find(":selected").val();
			var base_url = "<?php echo base_url()?>";
			$('.time option').remove();
			$.ajax({
					method: 'POST',
					url: base_url + 'User/getScreening_time',
					data: {
						date : date
					},
					dataType: 'json',
					success: function(data){
						if(!data.message){
							var i;
							for(i = 0; i != data.length; i++){				
								var toEcho;
								toEcho +='<option value="'+data[i].screening_id+'">'+data[i].screening_sched+'</option>';
								$('.time').append(toEcho);
							}	
						}
					}
			});				
		});/*

		if($('.date option').length > 0){
			console.log("not empty");
			getTime();
		}
	
});
function getTime(){
			var date = $('.date').find(":selected").val();
			var base_url = "<?php echo base_url()?>";
			$('.time option').remove();
			$.ajax({
					method: 'POST',
					url: base_url + 'User/getScreening_time',
					data: {
						date : date
					},
					dataType: 'json',
					success: function(data){
						if(!data.message){
							var i;
							for(i = 0; i != data.length; i++){				
								var toEcho;
								toEcho +='<option value="'+data[i].screening_id+'">'+data[i].screening_sched+'</option>';
								$('.time').append(toEcho);
							}	
						}
					}
			});				
	}*/
	
</script>