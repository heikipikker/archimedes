<?php
require "login/loginheader.php";
require_once "functions.php";
require_once 'DBconnect.php';

$arrResults = fetchTable($mysqli, "notification");
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Whisper - View Files Based on Modified </title>

	<link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="img/favicon.png" rel="icon" type="image/png">
	<link href="img/favicon.ico" rel="shortcut icon">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body class="with-side-menu">

		<header class="site-header">
	    <div class="container-fluid">
	
	        <a href="#" class="site-logo">
	            <img class="hidden-md-down" src="img/logo-2.png" alt="">
	            <img class="hidden-lg-up" src="img/logo-2-mob.png" alt="">
	        </a>
	
	        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
	            <span>toggle menu</span>
	        </button>
	
	        <button class="hamburger hamburger--htla">
	            <span>toggle menu</span>
	        </button>
	        <div class="site-header-content">
	            <div class="site-header-content-in">
	                <div class="site-header-shown">
	                    
	
	                   
	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <img src="img/avatar-2-64.png" alt="">
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
	                            
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>User Settings</a>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Help</a>
	                            <div class="dropdown-divider"></div>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
	                        </div>
	                    </div>
	
	                    <button type="button" class="burger-right">
	                        <i class="font-icon-menu-addl"></i>
	                    </button>
	                </div><!--.site-header-shown-->
	
	            </div><!--site-header-content-in-->
	        </div><!--.site-header-content-->
	    </div><!--.container-fluid-->
	</header><!--.site-header-->

	<div class="mobile-menu-left-overlay"></div>
	<nav class="side-menu">
	    <ul class="side-menu-list">
	        <li class="grey with-sub">
	            <span>
	                <i class="font-icon font-icon-dashboard"></i>
	                <span class="lbl">Users</span>
	            </span>
	            <ul>
	                <li><a href="adduser.html"><span class="lbl">Add User</span></a></li>
	                <li><a href="changepass.html"><span class="lbl">Change password</span></a></li>
	                <li><a href="delusers.html"><span class="lbl">Remove users</span></a></li>

	            </ul>
	        </li>
	        <li class="brown with-sub">
	            <span>
	                <i class="font-icon glyphicon glyphicon-tint"></i>
	                <span class="lbl">Servers Settings</span>
	            </span>
	            <ul>
	                <li><a href="hostname.html"><span class="lbl">Add/Del HostName</span></a></li>
	                <li><a href="viewhostname.html"><span class="lbl">View Hostnames</span></a></li>
	            </ul>
	        </li>
	        <li class="purple with-sub">
	            <span>
	                <i class="font-icon font-icon-comments active"></i>
	                <span class="lbl">Files Settings</span>
	            </span>
	            <ul>
	                <li><a href="hashes.html"><span class="lbl">Add/Del hashes</span></a></li>
	                <li><a href="banword.html"><span class="lbl">add Ban words</span></a></li>
	                <li><a href="delhash.html"><span class="lbl">View All Hashes</span></a></li>
	            </ul>
	        </li>
	        <li class="red;purple with-sub">
	            <span>
	                <i class="font-icon glyphicon glyphicon-send"></i>
	                <span class="lbl">Alert</span></span>
	           	            </span>
	            <ul>
	                <li><a href="mfile.html"><span class="lbl">View Modified files</span></a></li>
	                <li><a href="bhash.html"><span class="lbl">View based on Hash</span></a></li>
	                <li><a href="bname.html"><span class="lbl">View based on Name</span></a></li>
	            </ul>
	        </li>
	
	    </section>
	</nav><!--.side-menu-->

	<div class="page-content">
		<div class="container-fluid">
		<table id="table-edit" class="table table-bordered table-hover">
				<thead>
				<tr>
					<th width="1">
						#
					</th>
					<th>File</th>
					<th>Host Name</th>
					<th>Old Hash</th>
					<th>New Hash</th>
				
				</thead>
				<tbody>
								
      <?php foreach ($arrResults as $key => $value):
        echo '
  	  					<tr id="1">
						<td><span class="tabledit-span tabledit-identifier">'.$value["id"].'</span><input class="tabledit-input tabledit-identifier" name="id" value="1" disabled="" type="hidden"></td>
						<td class="tabledit-view-mode"><span class="tabledit-span">'.$value["file"].'</span><input class="tabledit-input form-control input-sm" name="name" value="Last quarter revene" style="display: none;" disabled="" type="text"></td>
						<td class="tabledit-view-mode"><span class="tabledit-span">'.$value["hostname"].'</span><input class="tabledit-input form-control input-sm" name="name" value="Last quarter revene" style="display: none;" disabled="" type="text"></td>
						<td class="tabledit-view-mode"><span class="tabledit-span">'.$value["old_hash"].'</span><input class="tabledit-input form-control input-sm" name="name" value="Last quarter revene" style="display: none;" disabled="" type="text"></td>
						<td class="color-blue-grey-lighter tabledit-view-mode"><span class="tabledit-span">'.$value["new_hash"].'</span><input class="tabledit-input form-control input-sm" name="description" value="Revene for last quarter in state America for year 2013, whith..." style="display: none;" disabled="" type="text"></td>

	</tr>
        ';
      endforeach; ?>
					

				
				</tbody>
			</table>
		</div><!--.container-fluid-->
	</div><!--.page-content-->

	<script src="js/lib/jquery/jquery.min.js"></script>
	<script src="js/lib/tether/tether.min.js"></script>
	<script src="js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>

<script src="js/app.js"></script>
</body>
</html>
