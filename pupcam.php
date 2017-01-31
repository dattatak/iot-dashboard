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
        <li ><a href="/dashboard.php">Dashboard</a></li>
        <li class="active"><a href="/pupcam.php">DogWatch</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>HOME CONTROLS</h2>
      <ul class="nav nav-pills nav-stacked">
        <li ><a href="/dashboard.php">Dashboard</a></li>
        <li class="active"><a href="/pupcam.php">DogWatch</a></li>

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
            <h4>DogWatch</h4>
          <div class="iv-embed" style="margin:0 auto;padding:0;border:0;>
                        <div class="iv-v" style="display:block;margin:0;padding:1px;border:0;background:#000;">
                                <iframe class="iv-i" style="display:block;margin:0;padding:0;border:0;" src="https://open.ivideon.com/embed/v2/?server=100-10e7a5225e856f6cc1751e42f43c0326&amp;camera=0&amp;width=&amp;height=&amp;lang=en" frameborder="0" allowfullscreen>
                                </iframe>
                        </div>
                        <div class="iv-b" style="display:block;margin:0;padding:0;border:0;">
                                <div style="clear:both;height:0;overflow:hidden;">&nbsp;</div>
                                        <script src="https://open.ivideon.com/embed/v2/embedded.js"></script>
                                </div>
                        </div>
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

