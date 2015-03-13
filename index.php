<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- #################### -->
	<!-- Load 3rd-party plugin -->
	<!-- #################### -->
	<!-- Bootstrap CSS -->
		<link href="./3rd-party/bootstrap-3.3.2/css/bootstrap.min.css" rel='stylesheet'>
	<!-- Font Awesome -->
		<link href="./3rd-party/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- malihu-custom-scrollbar-plugin-master -->
		<link rel="stylesheet" href="./3rd-party/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min.css" />
	<!-- My CSS style -->
		<link rel="stylesheet" href="./3rd-party/style.css">
	<!-- jQuery UI -->
		<!-- <link rel="stylesheet" href="./3rd-party/jquery/jquery-ui-1.11.3.css"> -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">

	</head>
	<body>
		<?php
			if (isset($_GET["date"])) {
				$date = date("d/m/Y", strtotime($_GET["date"]));
			} else {
				$date = date('d-m-Y');
			}
			$vcenterArray = scandir("./Archives/");
		?>
		<div class="container-fluid" id="content">
			<div class="row">
				<div class="col-md-2 sidebar" id="sidebar">
					<ul class="nav nav-sidebar">
						<li><i class="glyphicon glyphicon-calendar"></i><input id="datepickerfild" class="datepicker" value="<?=date("d/m/Y", strtotime($date));?>"></li>
					</ul>
					<ul class="nav nav-sidebar">
						<?php
							foreach ($vcenterArray as $vcenter) {
								$filename = "./Archives/".$vcenter."/".date("Y_m_d", strtotime($date)).".html";
								if (file_exists($filename)) {
									echo ("<li id='".$vcenter."'><a href='".$filename."' data-vcenter='".$vcenter."' class='AjaxLink'><i class='glyphicon glyphicon-chevron-right'></i> ".strtoupper($vcenter)."</a></li>");
								}
							}
						?>
					</ul>
					<span style="bottom:0;float:left;position:absolute;text-align:center;">
						Adrien BELLOEIL <br> vCheckReporter - <i class="octicon octicon-repo-forked"></i><a href="https://github.com/kizz1337/vCheckReporter">Fork me on GitHub</a>
					</span>
				</div>
				<div id="report" class="col-md-10 main">
					<div id="main">
						<p>Veuillez selectionner un rapport a afficher.</p>
					</div>
				</div>
			</div>
		</div>
	</body>
	<head>
	<!-- jQuery -->
		<script src="./3rd-party/jquery/jquery-2.1.1.min.js"></script>
	<!-- Bootstrap JS -->
		<script src="./3rd-party/bootstrap-3.3.2/js/bootstrap.min.js"></script>
	<!-- jQuery Confirm -->
		<script src='./3rd-party/jquery/jquery.confirm.js'></script>
	<!-- My jQuery function -->
		<script src='./3rd-party/functions.js'></script>
	<!-- jQuery UI -->
		<!-- <script src="./3rd-party/jquery/jquery-ui-1.11.3.js"></script> -->
		<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
	<!-- malihu-custom-scrollbar-plugin-master -->
		<script src="./3rd-party/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>
	</head>
</html>
