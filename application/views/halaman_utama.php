<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>App Top Tracker</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?=base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?=base_url();?>assets/css/font-awesome.min.css" />
		<link rel="shortcut icon" href="<?=base_url('/assets/img/logo.png');?>">

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->

		<link rel="stylesheet" href="<?=base_url();?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?=base_url();?>assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="<?=base_url();?>assets/css/ace-skins.min.css" />

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?=base_url();?>assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?=base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>

		<script src="<?=base_url();?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?=base_url();?>assets/js/jquery.dataTables.bootstrap.js"></script>

		<script src="<?=base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?=base_url();?>assets/js/ace.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>

		<script type="text/javascript">
		// var app=angular.module('app_filter',[]);
		//    app.controller('filter_controller',function($scope,$http){
		//     $scope.data_tabel=[];
		//     $http.get("<?=site_url('/retur/getdata');?>").success(function(result){
		//      $scope.data_tabel=result;
		//     });
		    
		//    });

		</script>

	</head>

	<body>
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="#" class="brand">
						<small>
							Top Tracker Store
						</small>
					</a><!--/.brand-->
					<ul class="nav ace-nav pull-right">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
								<li>
									<a href="#">
										<i class="icon-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?=site_url('/welcome/logout');?>">
										<i class="icon-off"></i>
										Logout
									</a>
						</li>
					</ul>
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-small btn-success">
							<i class="icon-signal"></i>
						</button>

						<button class="btn btn-small btn-info">
							<i class="icon-pencil"></i>
						</button>

						<button class="btn btn-small btn-warning">
							<i class="icon-group"></i>
						</button>

						<button class="btn btn-small btn-danger">
							<i class="icon-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!--#sidebar-shortcuts-->

				<?=$this->load->view('menu'); ?>

				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
				</div>
<!-- 					<div class="nav-search" id="nav-search">
						<form class="form-search" />
							<span class="input-icon">
								<input type="text" placeholder="Cari IMEI" class="input-small nav-search-input" ng-model="filter_data"  />
								<i class="icon-search nav-search-icon"></i>
							</span>
						</form>
					</div><!--#nav-search-->

				<div class="page-content">

					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->

							<?=$this->load->view($content); ?>

							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->


		<!--basic scripts-->

		<!--[if !IE]>-->


		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		

		<!--page specific plugin scripts-->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="<?=base_url();?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="<?=base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?=base_url();?>assets/js/jquery.slimscroll.min.js"></script>
		<script src="<?=base_url();?>assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="<?=base_url();?>assets/js/jquery.sparkline.min.js"></script>
		<script src="<?=base_url();?>assets/js/flot/jquery.flot.min.js"></script>
		<script src="<?=base_url();?>assets/js/flot/jquery.flot.pie.min.js"></script>
		<script src="<?=base_url();?>assets/js/flot/jquery.flot.resize.min.js"></script>
		<script src="<?=base_url();?>assets/js/jquery.maskedinput.min.js"></script>
		<script src="<?=base_url();?>assets/js/bootbox.min.js"></script>

		<!--ace scripts-->

		

		<!--inline scripts related to this page-->

		
	</body>
</html>