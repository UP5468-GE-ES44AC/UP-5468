<!doctype html>
<?php 
require_once ('config.php'); 
if(empty($_SESSION['member'])){
	echo "<script>alert('请进行登陆或注册');location='index.php';</script>";
}
?>
<html>
<head>
	<meta charset="utf-8">
    <title>14A-Index Area</title>
    <link rel="stylesheet" href="/content/lib/material.min.css">
    <script src="lib/material.min.js"></script>
	<link rel="stylesheet" href="lib/icon.css">
    <style type="text/css">

div.container
		{padding:45px;}
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
        	<span class="mdl-layout-title">14A-Index Area</span></div>
			
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
       document.getElementById("timeShow").innerHTML =  "Time:"+h+":"+m+":"+s+"."+MM+" "+S+"";
       t = setTimeout(time,1000); //设定定时器，循环执行             
    } 
  </script>	
</head>
<body>

<?
// start at the top of the page since we start a session
session_name('mysite_hit_counter');
//
$fn = 'hits_counter.txt';
$hits = 0;
// read current hits
if (($hits = file_get_contents($fn)) === false)
{
    $hits = 0;
}
// write one more hit
if (!isset($_SESSION['page_visited_already']))
{
    if (($fp = @fopen($fn, 'w')) !== false)
    {
        if (flock($fp, LOCK_EX))
        {
            $hits++;
            fwrite($fp, $hits, strlen($hits));
            flock($fp, LOCK_UN);
            $_SESSION['page_visited_already'] = 1;
        }
        fclose($fp);
    }
}
?>

        <div class="container">
    	<div class="mdl-typography--title" id="Layer1">Welcome To 14A! Please Choose Where You Want To Go.</div>
        <div class="container">
		<div class="mdl-card mdl-shadow--4dp demo-card-wide" id="Layer0">
    <div class="mdl-card__title">
      <h2 class="mdl-card__title-text">Statistical Data&Information</h2>
    </div>
    <div class="mdl-card__supporting-text">
     <div class="counter">
    <p>This page has <span><?=$hits;?></span> hits</p>
	<div><label id="timeShow"></label></div>
	<div><a href="/01" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
       advanced     </a></div>
	
	
</div>     </div>
   </div>
   </div>
   
		<div class="container">
		<div class="mdl-card mdl-shadow--4dp demo-card-wide" id="Layer3">
    <div class="mdl-card__title">
      <h2 class="mdl-card__title-text">Anti-DWB Union</h2>
    </div>
    <div class="mdl-card__supporting-text">
      DuoWanMCbOX Steal source code from Block Launcher And also steal works from Baidu Tieba.So we are against it. If you want to join us,please click the button below to join. </div>
	<div class="mdl-card__actions mdl-card--border">
      <a href="/01" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Click To Join      </a></div>
</div>
<body>
</div>
	  <div class="container">
		<div class="mdl-card mdl-shadow--4dp demo-card-wide" id="Layer0">
    <div class="mdl-card__title">
      <h2 class="mdl-card__title-text">N.S. Railway Administration</h2>
    </div>
    <div class="mdl-card__supporting-text">This is my privately studio.If you like buliding railways in Minecraftpe,you can join us
          </div>
	<div class="mdl-card__actions mdl-card--border">
      <a href="/02" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Click To Join      </a></div>
   </div>
   </div>
   <div class="container">
		<div class="mdl-card mdl-shadow--4dp demo-card-wide" id="Layer3">
    <div class="mdl-card__title">
      <h2 class="mdl-card__title-text">Comment Area</h2>
    </div>
    <div class="mdl-card__supporting-text">
      Test text </div>
	<div class="mdl-card__actions mdl-card--border">
      <a href="/03" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Click To Enter     </a></div>
</div>
<body>
</div>
   <div class="container">
   <button id="demo-show-toast" class="mdl-button mdl-js-button mdl-button--raised" type="button">click to boom your mother！</button>
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
<div class="container">
<div class="mdl-typography--title" id="Layer1">Administrator:BaiDu TieBa @xbcdtime</div>
</div>
<div class="container">
  <button type="button" class="mdl-button mdl-js-button mdl-button--raised show-modal">Show Modal</button>
  <dialog class="mdl-dialog">
    <div class="mdl-dialog__content">
      <p>
        Look,your mother is flying!!!
      </p>
    </div>
    <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
      <button type="button" class="mdl-button">Agree</button>
      <button type="button" class="mdl-button close">Disagree</button>
    </div>
  </dialog>
  <script>
    var dialog = document.querySelector('dialog');
    var showModalButton = document.querySelector('.show-modal');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    showModalButton.addEventListener('click', function() {
      dialog.showModal();
    });
    dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
  </script>
  </div>
</body>
</html>