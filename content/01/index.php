<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <title>14A-Server Information</title>
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.blue-indigo.min.css">
    <script src="/lib/material.min.js"></script>
	<link rel="stylesheet" href="/lib/icon.css">
    <style type="text/css">

div.container
		{padding:90px;}
.demo-card-wide > .mdl-card__title {
        color: #fff;
        height: 70px;
        background: #666dfc;
      }
.mdl-card--border{
	height: 10px;
}
.demo-card-wide.mdl-card {
  width: 850px;
}
.mdl-card__actions{
  color: #fff;
  height: 5px;
}
    </style>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    	<header class="mdl-layout__header ">
        	<div class="mdl-layout__header-row ">
        	<span class="mdl-layout-title">14A-Server Information</span></div>
			
        </header>
	<script language="javascript">
     var t = null;
    t = setTimeout(time,0);//开始执行
    function time()
    {
       clearTimeout(t);//清除定时器
       dt = new Date();
	   var d=dt.getTime();
	   var S=dt.toLocaleDateString();
	   var MM=dt.getMilliseconds();
	   var M=dt.getDate();
	   var D=dt.getMonth();
	   var y=dt.getFullYear();
       var h=dt.getHours();
       var m=dt.getMinutes();
       var s=dt.getSeconds();
       document.getElementById("timeShow").innerHTML =  "Time:"+h+":"+m+":"+s+"."+MM+" "+S+" UTC Time:"+d+"";
       t = setTimeout(time,1000); //设定定时器，循环执行             
    } 
  </script>	
</head>
<body>
        <div class="container">
		<div class="mdl-card mdl-shadow--4dp demo-card-wide" id="Layer0">
    <div class="mdl-card__title">
      <h2 class="mdl-card__title-text">Statistical Data&Information</h2>
    </div>
    <div class="mdl-card__supporting-text">
	<div><label id="timeShow"></label></div>
	<?php
$sysos = $_SERVER["SERVER_SOFTWARE"];      //获取服务器标识的字串
$sysversion = PHP_VERSION;                   //获取PHP服务器版本
//以下两条代码连接MySQL数据库并获取MySQL数据库版本信息
mysql_connect("localhost", "root", "2000403");
$mysqlinfo = mysql_get_server_info();
//从服务器中获取GD库的信息
if(function_exists("gd_info")){                  
$gd = gd_info();
$gdinfo = $gd['GD Version'];
}else {
$gdinfo = "未知";
}
//从GD库中查看是否支持FreeType字体
$freetype = $gd["FreeType Support"] ? "True" : "False";
//从PHP配置文件中获得是否可以远程文件获取
$allowurl= ini_get("allow_url_fopen") ? "True" : "False";
//从PHP配置文件中获得最大上传限制
$max_upload = ini_get("file_uploads") ? ini_get("upload_max_filesize") : "Disabled";
//从PHP配置文件中获得脚本的最大执行时间
$max_ex_time= ini_get("max_execution_time")."秒";
//以下两条获取服务器时间，中国大陆采用的是东八区的时间,设置时区写成Etc/GMT-8
date_default_timezone_set("Etc/GMT-8");
$systemtime = date("Y-m-d H:i:s",time());
/*  *******************************************************************  */
/*   以HTML表格的形式将以上获取到的服务器信息输出给客户端浏览器          */
/*  *******************************************************************  */
echo "<table align=left cellspacing=0 cellpadding=0>";
echo "<tr> <td> Web Server：    </td> <td> $sysos        </td> </tr>";
echo "<tr> <td> PHP Version：      </td> <td> $sysversion   </td> </tr>";
echo "<tr> <td> MySQL Version：    </td> <td> $mysqlinfo    </td> </tr>";
echo "<tr> <td> GD Lib Version：     </td> <td> $gdinfo       </td> </tr>";
echo "<tr> <td> FreeType：     </td> <td> $freetype     </td> </tr>";
echo "<tr> <td> 远程文件获取： </td> <td> $allowurl     </td> </tr>";
echo "<tr> <td> Max Upload Limit： </td> <td> $max_upload   </td> </tr>";
echo "<tr> <td> 最大执行时间： </td> <td> $max_ex_time  </td> </tr>";
echo "</table>";
?>
	
</div>     </div>
   </div>
   <div class="container">
   <a href="/" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      return to menu      </a></div>
<div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text"></div>
  <button class="mdl-snackbar__action" type="button"></button>
</div>
<script>
(function() {
  'use strict';
  window['counter'] = 0;
  var snackbarContainer = document.querySelector('#demo-toast-example');
  var showToastButton = document.querySelector('#demo-show-toast');
  showToastButton.addEventListener('click', function() {
    'use strict';
    var data = {message: 'Look,Your Mother And Father Are Flying And Pa Pa Pa!!!     '+　++counter};
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
  });
}());
</script>
</div>
</body>
</html>