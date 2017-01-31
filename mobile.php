<html>
<head>
        <meta charset="utf-8">
        <title>CUBE@HOME:HEATING</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.2/yeti/bootstrap.min.css"><!--/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="/css/mobile-custom.css">
	<link rel="stylesheet" href="/css/jquery.countdown.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script> 
        <script type="text/javascript" src="//cdn.jsdelivr.net/particle-api-js/5/particle.min.js"></script>
	<script type="text/javascript" src="/js/jquery.plugin.min.js"></script> 
	<script type="text/javascript" src="/js/moment.min.js"></script>
	<style>
	.tool {
		background:lightblue;
	}
	.btn-xlarge {
		padding: 48px 64px;
    		font-size: 48px;
    		line-height: normal;
    	}	
	</style>
</head>
<body>
<script type="text/javascript">
var d = new Date(0);

function toHHMMSS(ts) {
    var sec_num = ts/1000; // don't forget the second param
    var hours   = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = Math.floor(sec_num - (hours * 3600) - (minutes * 60));

    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    return hours+':'+minutes+':'+seconds;
}

function sectoHMS(ts){
	ts = Math.floor(ts / 1000);
	var d,h,m,s;

	d = Math.floor(ts % 86400);
	ts %= 86400;
	h = Math.floor(ts % 3600);
	ts %= 3600;
	m = ts % 60;
	ts %= 60;
	s = ts % 60;
	
	var ret = {
		d: d,
		h: h,
		m: m,
		s: s
	};
	
	return ret;
}
$(document).ready(function(){
var sleepseconds = 0;
	window.setInterval(function(){
        requestURL = "https://api.particle.io/v1/devices/21002e001347343432313031/heating/?access_token=18c156831ec742fc9555f10ac4dc29cfb2dfdd08";
        $.getJSON(requestURL, function(json) {
                        if (json.result == 1){
                                $('#boilerstate').css('background','green');
                        }else{
                                $('#boilerstate').css('background','red');
				$('#boilerstate').html('');
                        }
                 });
        },1000);

	window.setInterval(function(){
	requestsleeping = "https://api.particle.io/v1/devices/21002e001347343432313031/sleeping?access_token=18c156831ec742fc9555f10ac4dc29cfb2dfdd08";
        requestsleep = "https://api.particle.io/v1/devices/21002e001347343432313031/sleep_time?access_token=18c156831ec742fc9555f10ac4dc29cfb2dfdd08";
	$.getJSON(requestsleeping, function(sleeping) {
		if(sleeping.result == 1){
			$.getJSON(requestsleep, function(sleeper) {
				sleepseconds = sleeper.result;
				var heattime = new Date(sleepseconds * 1000);
				var time_until_off = (heattime.getTime() - new Date().getTime());
				$('#boilerstate').html("Time for heating to go off in " + toHHMMSS(time_until_off));//+ time_until_off.h + "h " + time_until_off.m + "m " + time_until_off.s + "s");
			});
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

        function sleeper(time)
        {
	if ( time > 0) {
	        $.post("https://api.particle.io/v1/devices/21002e001347343432313031/sleep?access_token=18c156831ec742fc9555f10ac4dc29cfb2dfdd08",
        	    {
                	        args:time       
	            });
		}
        }
});
//	$('#boilerstate').countdown(sleepseconds / 1000,function(event) {
//					$(this).text(
//						event.strftime('%H:%M:%S')
//					);	
//				});

</script>
<div class="container">
            <div class="row">
		<div class="tool">
                    <h1>Boiler Controls</h1>
                            <h2>Turn heating on or off remotely</h2>
                            <div style='width:100%;height:25px;' id='boilerstate'></div>
			    <div id='sleeptime'></div>
                            <button class="btn btn-success btn-xlarge btn-group-justified" type="button" onclick="b0ON()">Heating ON <span class="glyphicon glyphicon-play"></span></button>
                            <button class="btn btn-danger btn-xlarge btn-group-justified" type="button" onclick="b0OFF()">Heating OFF <span class="glyphicon glyphicon-stop"></span></button>
                            <div class="btn-group">
				<button class="btn btn-success btn-xlarge" type="button" onclick="sleeper(1800)">+30m <span class="glyphicon glyphicon-step-forward"></span></button>
                            	<button class="btn btn-success btn-xlarge" type="button" onclick="sleeper(3600)">+1h <span class="glyphicon glyphicon-forward"></span></button>
                            	<button class="btn btn-success btn-xlarge" type="button" onclick="sleeper(7200)">+2h <span class="glyphicon glyphicon-fast-forward"></span></button>
			   </div>
		</div>
            </div>
</div>
</body>
</html>
