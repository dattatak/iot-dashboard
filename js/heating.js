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
	$(document).ready(function() {
	var time_until_off=0;
	
	var sleepseconds = 0;
		window.setInterval(function(){
        requestURL = "https://api.particle.io/v1/devices/21002e001347343432313031/heating/?access_token=18c156831ec742fc9555f10ac4dc29cfb2dfdd08";
        $.getJSON(requestURL, function(json) {
                        if (json.result == 1){
                                $('#heatingState').attr('class', 'btn btn-success');
                        }else{
                                $('#heatingState').attr('class', 'btn btn-danger');
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
				time_until_off = (heattime.getTime() - new Date().getTime());
				$('#heattime').html(toHHMMSS(time_until_off));
				$('#heattime').attr('class',"text-center alert alert-success");
			});
		}else{
			$('#heattime').html('00:00:00');
			$('#heattime').attr('class',"text-center alert alert-info");
		}
	});
	},250);
	});
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

