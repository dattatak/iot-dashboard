<!DOCTYPE html>
 <html>
 <head>
         <meta charset="utf-8">
         <title>Barney's Address Book</title>
         <link rel="stylesheet" href="css/bootstrap.min.css">
	 <link rel="stylesheet" href="css/datepicker.css">
	 <link rel="stylesheet" href="css/custom.css">
 </head>
 <body>
<?php
## DB Stuff

$server="localhost";
$user="baddressb";
$pass="curlsbear";
$db="baddressb";

$conn = mysql_connect($server,$user,$pass);

$r=mysql_select_db($db);
function showaddresses(){
	
$range=range('A','Z');

foreach ($range as $val){

	$sql = "SELECT * from addresses WHERE upper(name) LIKE '$val%' ORDER by name ASC";

	$res = mysql_query($sql);
	if (mysql_num_rows($res)>0){
		if (!$res) {
		    echo "Could not execute query: $sql";
		    trigger_error(mysql_error(), E_USER_ERROR); 
		}

		echo "	<tr class='info'>
				<td colspan=5><a name='$val'>$val</a></td>
			</tr>";

		while ($row = mysql_fetch_assoc($res)){
			echo "
			<tr>
				<td>" . $row['name'] . "</td>
				<td>" . $row['phone'] . "</td>
				<td>" . $row['address'] . "</td>
				<td>" . $row['birthday'];if (date("d/m/Y")==$row['birthday']){echo "  <span class='label label-danger label-as-badge'><i class='glyphicon glyphicon-gift'></i></span>";}
			echo "</td>
				<td>
					<form action='form.php' method='post'>
					<fieldset>
						<input type='hidden' name='id' value='".$row['id']."'>
						<input type='hidden' name='mode' value='1'>
						<button class='btn btn-danger btn-block' type='submit' name='submit'><span class='glyphicon glyphicon-trash'></span></button>
					</fieldset>
					</form>
				</td>
			</tr>";
		}
	}
}
}
?>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-datepicker.js"></script>
 <div class="container">
         
        <div class="jumbotron">
		<div class="container">
			<img src="img/barns.jpg" class="pull-right img-rounded img-responsive" style='min-height:200px;height:200px;box-shadow: 10px 5px 15px rgba(0,0,0,.5);'/>
	        	<h1>Barney's Address Book</h1>
		        <p>All Barney's friend's addresses</p>
			<h2>I <span class='label label-danger label-as-badge'><b class='glyphicon glyphicon-heart'></b></span> my bunny</h2>
		</div>
	
       	</div><!-- .hero-unit -->

<div class="panel panel-primary">

	<div class="panel-heading">Menu</div>
	<div class="panel-body"> 
		<ul class=" nav nav-tabs">
			<li class="active"><a data-toggle="tab" href='#view'>View</a></li>
			<li><a data-toggle="tab" href='#add'>Add</a></li>
		</ul>
		<div class="tab-content">
			<div id="view" class="tab-pane fade in active">
			<div class="btn-toolbar" role="toolbar" aria-label="Rollodex">
				<div class='btn-group' role='group' aria-label='Rollodex'>
					<?php
					$range=range('A','Z');
						foreach ($range as $value){
							echo "<a href='#$value' class='btn btn-default' role='button'>$value</a>";
						}
					?>
				</div>
			</div>
				<h2>Look at all these friends!</h2>


				<table class="table table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Phone Number</th>
							<th>Address</th>
							<th>Birthday</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php showaddresses(); ?>
					</tbody>
				</table>
			</div>
			<div id="add" class="tab-pane fade">
				<h2>User this form to add to the Address book</h2>
				<form class="form-horizontal" role="form" method="post" action="form.php">
					<fieldset>
						<input type='hidden' name='mode' value='0'>
						<div class="form-group">
							<label class="control-label col-sm-2" for="name">Name</label>
							<div class="col-sm-4 input-group">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-user"></span>
								</span>
								<input type="text" class="form-control" id="name" placeholder="Enter name here" name="name"/>
							</div>
						</div>
						<div class="form-group">
                                                        <label class="control-label col-sm-2" for="phone">Phone number</label>
                                                        <div class="col-sm-4 input-group">
								<span class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-phone-alt"></span>
                                                                </span>	
                                                                <input type="text" class="form-control" id="phone" placeholder="Enter phone number here" name="phone"/>
                                                        </div>
                                                </div>
						<div class="form-group">
                                                        <label class="control-label col-sm-2" for="dob">Date of Birth</label>
                                                        <div class="col-sm-4 input-group date" data-date-format="dd/mm/yyyy" id="datepicker1">
								<span class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                                <input type="text" class="form-control" size="16" id="dob" data-provide="datepicker" placeholder="15/02/2001" name="dob"/>
                                                        </div>
                                                </div>
						<div class="form-group">
                                                        <label class="control-label col-sm-2" for="addr">Address</label>
                                                        <div class="col-sm-4 input-group">
								<span class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-envelope"></span>
                                                                </span>
                                                                <textarea class="form-control" id="addr" placeholder="Enter address here" name="addr"></textarea>
                                                        </div>
                                                </div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="submit">Finished</label>
							<div class="col-sm-4 input-group">
								
								<button type="submit" class="form-control btn-block btn-success" id="submit" name="submit">
								<span class="glyphicon glyphicon-pencil"></span> Add entry</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>	 
</div><!-- panel -->
 </div><!-- .container -->
     <script type="text/javascript">
            $('#dob').datepicker({
		format: 'dd/mm/yyyy',
		startDate: '-1d'
	})
        </script>
 </body>
</html>
