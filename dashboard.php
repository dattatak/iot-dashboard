<!DOCTYPE html>
<html lang="en">
<head>
  <title>CUBE@HOME:HOME CONTROLS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script type="text/javascript" src="/js/heating.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Dashboard</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>HOME CONTROLS</h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Dashboard</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Dashboard</h4>
        <p>Home automation controls</p>
		<div class="heattime"></div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Heating</h4>
            <p>Turn me on </p>
		<button type='button' class='btn btn-warning' id='heatingState'>   <i class="glyphicons glyphicons-off"></i></button>
		<div class='btn-group btn-group-sm'>
			<button type='button' class='btn btn-success' onclick="sleeper(14400)">On </button>
			<button type='button' class='btn btn-danger' onclick="b0OFF()">Off</button>
		</div> 
		<div class='btn-group btn-group-sm btn-group-vertical'>
			<button type='button' class='btn btn-primary' onclick="sleeper(1800)">+30m</button>
			<button type='button' class='btn btn-primary' onclick="sleeper(3600)">+60m</button>
		</div>
		<div class='btn-group btn-group-sm btn-group-vertical'>
			<button type='button' class='btn btn-primary' onclick="sleeper(5400)">+90m</button>
			<button type='button' class='btn btn-primary' onclick="sleeper(7200)">+120m</button>
		</div>
          </div>
        </div>
	<div class="col-sm-4">
		<div class="well">
			<h4>Time left</h4>
			<p class="text-center alert alert-info" id="heattime" >00:00:00</p>
		</div>
        </div>
      </div>
      <div class="row">
       
      </div>
    </div>
  </div>
</div>

</body>
</html>

