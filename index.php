<!DOCTYPE html>
 <html>
 <head>
         <meta charset="utf-8">
         <title>CUBE@HOME</title>
         <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.2/yeti/bootstrap.min.css"><!--/css/bootstrap.min.css">-->
	 <link rel="stylesheet" href="/css/custom.css">
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>	
	 <script type="text/javascript" src="//cdn.jsdelivr.net/particle-api-js/5/particle.min.js"></script>
 </head>
 <body>
<script type="text/javascript">
window.setInterval(function(){
        requestURL = "https://api.particle.io/v1/devices/21002e001347343432313031/heating/?access_token=18c156831ec742fc9555f10ac4dc29cfb2dfdd08";
        $.getJSON(requestURL, function(json) {
			if (json.result == 1){
				$('#boilerstate').css('background','green');
			}else{
				$('#boilerstate').css('background','red');
			}
                 });
},1000);

	function b0ON()
	{
	$.post("https://api.particle.io/v1/devices/21002e001347343432313031/boiler?access_token=18c156831ec742fc9555f10ac4dc29cfb2dfdd08",
	    {
			args:"on"	
	    });
	}
	function b0OFF()
	{
	 $.post("https://api.particle.io/v1/devices/21002e001347343432313031/boiler?access_token=18c156831ec742fc9555f10ac4dc29cfb2dfdd08",
	    {
			args:"off"	
	    });
	}
	

</script>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function clientInSameSubnet($client_ip=false,$server_ip=false) {
    if (!$client_ip)
        $client_ip = $_SERVER['REMOTE_ADDR'];
    if (!$server_ip)
        $server_ip = $_SERVER['SERVER_ADDR'];

    // echo "c_ip:$client_ip s_ip:$server_ip";
    // Extract broadcast and netmask from ifconfig
    if (!($p = popen("ifconfig","r"))) return false;
    $out = "";
    while(!feof($p))
        $out .= fread($p,1024);
    fclose($p);
    // This is because the php.net comment function does not
    // allow long lines.
    $match  = "/^.*".$server_ip;
    $match .= ".*Bcast:(\d{1,3}\.\d{1,3}i\.\d{1,3}\.\d{1,3}).*";
    $match .= "Mask:(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})$/im";
    if (!preg_match($match,$out,$regs))
        return false;
    $bcast = ip2long($regs[1]);
    $smask = ip2long($regs[2]);
    $ipadr = ip2long($client_ip);
    $nmask = $bcast & $smask;
    return (($ipadr & $smask) == ($nmask & $smask));
}

function showbuttons($item){

echo "<div class='col-xs-3'>
	<div class='thumbnail'>
	 <img src='/img/".$item['img']."' alt='".$item['title']."' style='min-height:100px;height:100px;'>
	 <div class='caption'>
	<h4>".$item['title']."</h4>
	<p>".$item['desc']."</p>
	<p><a class='btn btn-default btn' href='".$item['link']."' target='".$item['target']."'>".$item['title']."</a></p>
	 </div>
       </div>
</div>";

}

function showbuttons_tool_OnOff($item){

echo "<div class='col-xs-3'>
        <div class='thumbnail'>
         <img src='/img/".$item['img']."' alt='".$item['title']."' class='tool-button-icon'>
         <div class='caption'>
        <h4>".$item['title']."</h4>
	<p>".$item['desc']."</p>
        <p><a class='btn btn-default btn' href='".$item['link1']."' >".$item['title1']."</a></p>
        <p><a class='btn btn-default btn' href='".$item['link2']."' >".$item['title1']."</a></p>
         </div>
       </div>
</div>";

}


if (clientInSameSubnet()){
	$host = $_SERVER['SERVER_ADDR'];
}else{
	$host = "cube.home.ag33k.net";
}
?>
         
 <div class="container">
         
        <div class="jumbotron">
        <h1>CUBE@HOME</h1>
        <p>Make your selection below</p>
	<div class="alert alert-info" role="alert">
		<p><b>WIFI:</b> Reevas Castle > littleeddie</p>
	</div><!-- .alert -->
       	</div><!-- .hero-unit -->

<div class="panel panel-primary">

	<div class="panel-heading">Tool and options</div>
	<div class="panel-body">        
	 <div class="row">
		<?php 
			$data=array(
				"title"=>"CouchPotato",
				"desc"=>"Find movies to download",
				"link"=>"http://$host:5050",
				"img"=>"couchpotato-icon.jpg",
				"target"=>"_blank");
			showbuttons($data);
$data=array(
                                "title"=>"Transmission",
                                "desc"=>"Remote Downloader",
                                "link"=>"http://$host:9091",
				"img"=>"deluge-icon.png",
                                "target"=>"_blank");
                        showbuttons($data);
$data=array(
                                "title"=>"Plex",
                                "desc"=>"Movie Manager and Streamer",
                                "link"=>"http://$host:32400/web",
				"img"=>"plex.png",
                                "target"=>"_blank");
                        showbuttons($data);

$data=array(
                                "title"=>"NZBGet",
                                "desc"=>"NZB Downloader",
                                "link"=>"http://$host:6789",
				"img"=>"nzbget.png",
                                "target"=>"_blank");
                        showbuttons($data);

		?>
    		<div class='col-xs-3'>
		        <div class='thumbnail'>
		         <img src='/img/boiler.jpg' alt='Boiler' class='tool-button-icon'>
		         <div class='caption'>
		        <h4>Boiler Controlls</h4>
		        <p>Turn heating on or off remotely</p>
			<div style='width:25px;height:25px;' id='boilerstate'>   </div>
			</div>
			<button type="button" onclick="b0ON()">Heating ON</button>
			<button type="button" onclick="b0OFF()">Heating OFF</button>
		       </div>
		</div>
	 </div><!-- .row -->
	</div><!-- panel -->
 </div><!-- .container -->
    <a href='wol.php'>wol</a> 
 </body>
</html>
