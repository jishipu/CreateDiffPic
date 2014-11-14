<?php
define("SITE_PATH", dirname(__FILE__));
$old_path = SITE_PATH."/log/old";
$new_path = SITE_PATH."/log/new";
$js_path = SITE_PATH."/diff/deal.js";
$request_url = "http://10.16.15.225/diff/index.php"; //根据自己的网络设置
$img_path = SITE_PATH."/log/diff.png";
$command = "/usr/bin/phantomjs {$js_path} {$request_url} {$img_path}";
shell_exec($command);
?>