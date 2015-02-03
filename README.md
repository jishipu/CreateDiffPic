# CreateDiffPic
实现方法：生成两个文件的对比网页，然后用PhantomJS将网页生成图片。详情请见example.php：
```PHP
  <?php
    define("SITE_PATH", dirname(__FILE__));
    $old_path = SITE_PATH."/log/old";
    $new_path = SITE_PATH."/log/new";
    $js_path = SITE_PATH."/diff/deal.js";
    $request_url = "http://10.16.15.225/diff/index.php"; //根据自己的网络设置，即访问diff目录下的index.php文件
    $img_path = SITE_PATH."/log/diff.png";
    $command = "/usr/bin/phantomjs {$js_path} {$request_url} {$img_path}";
    shell_exec($command);
  ?>
```

PhantomJS: [http://phantomjs.org](http://phantomjs.org/)
