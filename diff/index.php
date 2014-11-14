<?php
define("SITE_PATH", dirname(__DIR__));
$base = @file_get_contents(SITE_PATH."/log/old");
$new = file_get_contents(SITE_PATH."/log/new");
?>
<html>
  <head>
  <script type='text/javascript' src='dojo.js'></script>
  <script type='text/javascript' src='diffview.js'></script>
  <script type='text/javascript' src='difflib.js'></script>
  <script type='text/javascript' src='jsbeautify.js'></script>
  <link rel="stylesheet" type="text/css" href="diffview.css">
  <style type='text/css'>
     .txt {display:none}
     #diffoutput {width:100%}
  </style>
  </head>
  <body>
    <div class='txt'>
    	<textarea id="baseText"><?=$base?></textarea>
    	<textarea id="newText"><?=$new?></textarea>
	  </div>
    <div id="diffoutput"> </div>
  <script type='text/javascript'>
    var $ = dojo.byId;
    dojo.require("dojo.io");
    function diffUsingJS() {
        var base_text = js_beautify($("baseText").value, 4, '');
    		var new_text = js_beautify($("newText").value, 4, '');
    		var base = difflib.stringAsLines(base_text);
    		var newtxt = difflib.stringAsLines(new_text);
    		var sm = new difflib.SequenceMatcher(base, newtxt);
    		var opcodes = sm.get_opcodes();
    		var diffoutputdiv = $("diffoutput");
    		while (diffoutputdiv.firstChild)
    			diffoutputdiv.removeChild(diffoutputdiv.firstChild);
    		diffoutputdiv.appendChild(diffview.buildView({baseTextLines: base,newTextLines: newtxt,opcodes: opcodes,baseTextName: "Base Text",newTextName: "New Text",contextSize: 10,viewType: 0}));
    }
    diffUsingJS();
  </script>
  </body>
</html>
