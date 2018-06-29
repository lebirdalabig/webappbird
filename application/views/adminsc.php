
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url('resources/css/bootstrap.min.css');?>" >
  <script src="<?php echo base_url('resources/js/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('resources/js/bootstrap.min.js');?>"></script>

<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="<?php echo base_url('admin/adminbc"');?>">Building Management</a>
  <a href="<?php echo base_url('admin/adminci"');?>">Cinema Management</a>
  <a href="<?php echo base_url('admin/adminms"');?>">Movie Management</a>
  <a href="<?php echo base_url('admin/adminsc"');?>">Screening Management</a>
  <a href="<?php echo base_url('admin/adminut"');?>">User Management</a>
  <a href="<?php echo base_url('admin/admintr"');?>">Transaction Management</a>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; LIST OF SCREENING</span>
  
  <div>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD SCREENING</button>
  </div>
  
  
  <div>
    <div class="container">
    <div class="table-responsive">
      <table class="table">
      <thead>
        <tr>
        <th>Screening ID</th>
        <th>Screening Date</th>
        <th>Screening Schedule</th>
        <th>Movie ID</th>
        <th>Cinema ID</th>
        <th>EDIT</th>
        <th>DELETE</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach($rs as $row){
            
            $id =  ("{$row->screening_id}");
            $date =  ("{$row->screening_date}");
            $sched =  ("{$row->screening_sched}");
            $m_id =  ("{$row->movie_id}");
            $c_id =  ("{$row->cinema_id}");
              
              echo "<tr>";
              echo  "<td>".$id."</td>
                <td>".$date."</td>
                <td>".$sched."</td>
                <td>".$m_id."</td> 
                <td>".$c_id."</td>
                <td>
				
				  <button type='button' class='btn' onclick='setVal(".$id.");' data-toggle='modal' data-target='#updateModal'  .style.display='block'\>
                    <span class='glyphicon glyphicon-cog'></span> 
                  </button>

				  
                </td>
                <td>
                  <a href='".base_url('admin/deleteScreening/').$id."'><button type='button' class='btn' .style.display='block'\">
                    <span class='glyphicon glyphicon-cog'></span> 
                  </button></a>
                </td>             
              ";
              echo "</tr>";
          }
          ?> 
      </tbody>
      </table>
    </div>
    </div>
  </div>
</div>

<div class='container'>
                <!-- Modal -->
                <div class='modal fade' id='myModal' role='dialog'>
                <div class='modal-dialog'>
                
                  <!-- Modal content-->
                  <div class='modal-content'>
                  <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>Modal Header</h4>
                  </div>
                  <div class='container'>
                  <form method = 'POST' class='form-horizontal' action='<?php echo site_url('admin/addScreening')?>'>



//CHANGE THIS PART

</select><br>

      <label>Screening Date:</label>
      <input type="date" name="appt_date" placeholder="E-mail" required id="dateslct" class="watchthis"><br>
      <label>Screening Time:</label>
      <select name="appt_time" required id="appt_time">
        <!--Possible appointment times are determined by branch [operating] hours, thus can only be determined after user has selected the branch and the date of appointment-->
        <?php
        echo "<option value=\"0\">--Select Time--</option>";
        foreach ($hr_rsa as $row) {
          echo "<option value=\"{$row['opening']}\">{$row['closing']}</option>";
        }
        ?>

<label>Movie:</label>
      <select id="movieSelect" class="watchthis">
      <?php
        echo "<option value=\"0\">--Select Movie--</option>";
        foreach ($brn_rsa as $row) {
          echo "<option value=\"{$row['branch_id']}\">{$row['branch_name']}</option>";
        }
      ?>
      </select><br>
<label>Cinema:</label>
      <select id="branslct" class="watchthis">
      <?php
        echo "<option value=\"0\">--Select Cinema--</option>";
        foreach ($brn_rsa as $row) {
          echo "<option value=\"{$row['branch_id']}\">{$row['branch_name']}</option>";
        }
      ?>
      
//end


                    <div class='form-group'> 
                    <div class='col-sm-offset-2 col-sm-10'>
                      <button type='submit' class='btn btn-default'>Save</button>
                    </div>
                    </div>
                  </form>
                </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                  </div>
                  </div>
                </div>
              </div>
</div>

<div class='container'>
                <!-- Modal -->
                <div class='modal fade' id='updateModal' role='dialog'>
                <div class='modal-dialog'>
                
                  <!-- Modal content-->
                  <div class='modal-content'>
                  <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>Modal Header</h4>
                  </div>
                  <div class='container'>
                  <form method = 'POST' class='form-horizontal' action='<?php echo site_url('admin/updateScreening')?>'>
                    <div class='form-group'>
					<input id="val" type="hidden" name="screening_id" value="">
                    <label class='control-label col-sm-2' for='email'>Screening Date:</label>
                    <div class='col-sm-3'>
                      <input type='text' class='form-control' name="screening_date" placeholder="YYYY/MM/DD">
                    </div>
                    </div>
                    <div class='form-group'>
                    <label class='control-label col-sm-2' for='address'>Screening Schedule:</label>
                    <div class='col-sm-3'>
                      <input type='text' class='form-control' name="screening_sched" placeholder="HH:MM - HH:MM">
                    </div>
                    </div>
                    <div class='form-group'>
                    <label class='control-label col-sm-2' for='email'>Movie ID:</label>
                    <div class='col-sm-3'>
                      <input type='text' class='form-control' name="movie_id" placeholder="Movie ID">
                    </div>
                    </div>
                    <div class='form-group'>
                    <label class='control-label col-sm-2' for='email'>Cinema ID:</label>
                    <div class='col-sm-3'>
                      <input type='text' class='form-control' name="cinema_id" placeholder="Cinema ID">
                    </div>
                    </div>
                
                    <div class='form-group'> 
                    <div class='col-sm-offset-2 col-sm-10'>
                      <button type='submit' class='btn btn-default'>Save</button>
                    </div>
                    </div>
                  </form>
                </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                  </div>
                  </div>
                </div>
				</div>
</div>
</body>
</html> 

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}

var foo = <?php echo $msg_code; ?>;

switch (foo){
	
	case 1: <?php echo "alert('DELETE SUCCESS!');"; ?>
		break;
	case 2: <?php echo "alert('DELETE FAILED!');";?>
		break;
	case 3: <?php echo "alert('UPDATE SUCCESS!');"; ?>
		break;
	case 4: <?php echo "alert('UPDATE FAILED!');";?>
		break;
	case 5: <?php echo "alert('ADD SUCCESS!');"; ?>
		break;
	case 6: <?php echo "alert('ADD FAILED!');";?>
		break;
}

function setVal(id){
	document.getElementById("val").setAttribute("value",id);
}

$('.watchthis').change(function(){
      if($('#movieSelect').val() != 0 && $('#dateslct').val()){
      //if branch and date are BOTH non-empty...
        $.ajax({
          //start an AJAX request (Note: URL is REQUIRED)
          method: 'GET',  //specify HTTP(S) request method type (e.g. "GET, POST, PUT")
          url: 'get-svcs.php',  //url where to submit this AJAX request...
          data: {branch_id:$('#movieSelect').val(),date:$('#dateslct').val()}, //data to send with the request, uses {key:value} notation.
          dataType: 'json', //specifies the datatype expected to be returned by the url, result to be stored in the parameter of the anonymous function on next line (success:).
          success: function(data){  //code to perform incase server does not encounter errors
            var opening = data[0].opening.split(":"); //get opening time and split into an array of HH, MM, SS
            var closing = data[0].closing.split(":"); //get closing time and split into an array of HH, MM, SS
            var op = parseInt(opening[0]);  //convert hour to int and store into op variable
            var cl = parseInt(closing[0]);  //convert hour to int and store into cl variable
            var toEcho = '';  //what you're going to fill the blankspace with later...
            for(; op < cl;op++){
              //populate toEcho with the option fields you wish to populate the select form field above with
              toEcho +='<option value="'+op+':00">'+op+':00</option>';
              toEcho +='<option value="'+op+':30">'+op+':30</option>';
            }
            $('#appt_time').html(toEcho); //target the element with the "appt-time" ID (i.e. the time select field) and change its inner html() into the value within string toEcho.
          },
          error: function(){  //code to perform incase server encounters an error(s)...
            alert('Could not get Data from Database');
          }
        })
      }
    })

</script>

