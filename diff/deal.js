var page = require('webpage').create();
var system = require('system');
var fs = require('fs');
if (system.args.length != 3) {
    console.log(JSON.stringify({"status":"error","data":"arguments num not 2"}));
    phantom.exit();
}

page.viewportSize = { width: 1024, height: 768 };
page.zoomFactor = 0.7;
page.open(system.args[1], function (status) {
	if(status != 'success') {
        console.log(JSON.stringify({"status":"error","data":"not open"}));
		phantom.exit();
	} else {
	    window.setTimeout(function() {
			page.render(system.args[2]);
		    console.log(JSON.stringify({"status":"ok"}));
			phantom.exit();
		}, 500);
	}
});

page.onError = function(msg, trace) {
    
};