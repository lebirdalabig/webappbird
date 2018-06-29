
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
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; LIST OF TRANSACTIONS</span>
  
  <div>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD MOVIE</button>
  </div>
  
  
  <div>
    <div class="container">
    <div class="table-responsive">
      <table class="table">
      <thead>
        <tr>
        <th>Transaction ID</th>
        <th>Trans Reference</th>
        <th>Trans Date </th>
        <th>Trans Amount </th>
        <th>Tran Rating</th>
		<th>Screening ID</th>
		<th>Customer ID</th>
        <th>EDIT</th>
        <th>DELETE</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach($rs as $row){
            
            $id =  ("{$row->transaction_id}");
            $ref =  ("{$row->trans_ref}");
            $date =  ("{$row->trans_date}");
            $amount =  ("{$row->trans_amount}");
            $type =  ("{$row->trans_type}");
			$s_id =  ("{$row->screening_id}");
			$c_id =  ("{$row->cust_id}");
              
              echo "<tr>";
              echo  "<td>".$id."</td>
                <td>".$ref."</td>
                <td>".$date."</td>
                <td>".$amount."</td> 
                <td>".$type."</td>
				<td>".$s_id."</td>
				<td>".$c_id."</td>
                <td>
				
				  <button type='button' class='btn' onclick='setVal(".$id.");' data-toggle='modal' data-target='#updateModal'  .style.display='block'\>
                    <span class='glyphicon glyphicon-cog'></span> 
                  </button>

				  
                </td>
                <td>
                  <a href='".base_url('admin/deleteTransaction/').$id."'><button type='button' class='btn' .style.display='block'\">
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
                  <form method = 'POST' class='form-horizontal' action='<?php echo site_url('admin/addTransaction')?>'>
				  
                    <div class='form-group'>
                    <label class='control-label col-sm-2' for='email'>Transaction Reference:</label>
                    <div class='col-sm-3'>
                      <input type='text' class='form-control' name='trans_ref' placeholder="Reference Number">
                    </div>
                    </div>
                    <div class='form-group'>
                    <label class='control-label col-sm-2' for='address'>Transaction Date:</label>
                    <div class='col-sm-3'>
                      <input type='text' class='form-control' name='trans_date' placeholder="YYYY/MM/DD">
                    </div>
                    </div>
                    <div class='form-group'>
                    <label class='control-label col-sm-2' for='email'>Transaction Amount:</label>
                    <div class='col-sm-3'>
                      <input type='text' class='form-control' name='trans_amount' placeholder="Amount">
                    </div>
                    </div>
                    <div class='form-group'>
                    <label class='control-label col-sm-2' for='email'>Transaction Type:</label>
                    <div class='col-sm-3'>
                      <input type='text' class='form-control' name='trans_type' placeholder="Cash/Credit">
                    </div>
                    </div>
					<div class='form-group'>
                    <label class='control-label col-sm-2' for='email'>Screening ID:</label>
                    <div class='col-sm-3'>
                      <input type='text' class='form-control' name='screening_id' placeholder="Screening ID">
                    </div>
                    </div>
					<div class='form-group'>
                    <label class='control-label col-sm-2' for='email'>Customer ID:</label>
                    <div class='col-sm-3'>
                      <input type='text' class='form-control' name='cust_id' placeholder="Customer ID">
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
                  <form method = 'POST' class='form-horizontal' action='<?php echo site_url('admin/updateMovie')?>'>
                    
					
                     <div class='form-group'>
							<input id="val" type="hidden" name="transcation_id" value="">
                    <label class='control-label col-sm-2' for='email'>Transaction Reference:</label>
                    <div class='col-sm-3'>
                      <input type='text' class='form-control' name='trans_ref' placeholder="Reference Number">
                    </div>
                    </div>
                    <div class='form-group'>
                    <label class='control-label col-sm-2' for='address'>Transaction Date:</label>
                    <div class='col-sm-3'>
                      <input type='text' class='form-control' name='trans_date' placeholder="YYYY/MM/DD">
                    </div>
                    </div>
                    <div class='form-group'>
                    <label class='control-label col-sm-2' for='email'>Transaction Amount:</label>
                    <div class='col-sm-3'>
                      <input type='text' class='form-control' name='trans_amount' placeholder="Amount">
                    </div>
                    </div>
                    <div class='form-group'>
                    <label class='control-label col-sm-2' for='email'>Transaction Type:</label>
                    <div class='col-sm-3'>
                      <input type='text' class='form-control' name='trans_type' placeholder="Cash/Credit">
                    </div>
                    </div>
					<div class='form-group'>
                    <label class='control-label col-sm-2' for='email'>Screening ID:</label>
                    <div class='col-sm-3'>
                      <input type='text' class='form-control' name='screening_id' placeholder="Screening ID">
                    </div>
                    </div>
					<div class='form-group'>
                    <label class='control-label col-sm-2' for='email'>Customer ID:</label>
                    <div class='col-sm-3'>
                      <input type='text' class='form-control' name='cust_id' placeholder="Customer ID">
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
</script>

