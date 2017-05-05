<?php
error_reporting(E_ALL^E_NOTICE);
include "connect.php";
include "comment.class.php";

$comments = array();
$result = mysql_query("SELECT * FROM comments ORDER BY id ASC");

while($row = mysql_fetch_assoc($result))
{
	$comments[] = new Comment($row);
}

?>
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
		{padding:75px;}
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
        	<span class="mdl-layout-title">14A-Comments</span></div>
			
        </header>
	
</head>
<body>
        <div class="container">
		<div class="mdl-card mdl-shadow--4dp demo-card-wide" id="Layer0">
    <div class="mdl-card__title">
      <h2 class="mdl-card__title-text">Comments</h2>
    </div>
    <div class="mdl-card__supporting-text">
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
<div id="main">

<?php
foreach($comments as $c){
	echo $c->markup();
}

?>

<div id="addCommentContainer">
	<form id="addCommentForm" method="post" action="">
    	<div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input class="mdl-textfield__input" type="text" id="name" name="name">
  <label class="mdl-textfield__label" for="addr1">Name</label>
        </div>
		
		<div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input class="mdl-textfield__input" type="text" id="url" name="url">
  <label class="mdl-textfield__label" for="addr1">Website</label>
        </div>
			
			<div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input class="mdl-textfield__input" type="text" id="email" name="email">
  <label class="mdl-textfield__label" for="addr1">Email</label>
        </div>
		
		<div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" rows= "5" id="body" name="body" cols="20"></textarea>
    <label class="mdl-textfield__label" for="body">Contents</label>
  </div>
            
            
            
            <input type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" id="submit" value="Submit" />
        </div>
    </form>
</div>

</div>

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
	
</div>     </div>
   </div>
   
<div class="container">
   <a href="/" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      return to menu      </a></div>
</body>
</html>