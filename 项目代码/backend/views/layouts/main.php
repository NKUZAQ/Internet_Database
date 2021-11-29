<?php
/*1911574  王玉娇*/

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- <meta charset="UTF-8" /> -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="../assets/img/fav.png">
		<title>首页</title>
		
		<!-- Bootstrap CSS -->
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet" media="screen" />

		<!-- Main CSS -->
		<link href="../assets/css/main.css" rel="stylesheet" media="screen" />

		<!-- Ion Icons -->
		<link href="../assets/fonts/icomoon/icomoon.css" rel="stylesheet" />
		
		<!-- C3 CSS -->
		<link href="../assets/css/c3/c3.css" rel="stylesheet" />

		<!-- NVD3 CSS -->
		<link href="../assets/css/nvd3/nv.d3.css" rel="stylesheet" />

		<!-- Horizontal bar CSS -->
		<link href="../assets/css/horizontal-bar/chart.css" rel="stylesheet" />

		<!-- Calendar Heatmap CSS -->
		<link href="../assets/css/heatmap/cal-heatmap.css" rel="stylesheet" />

		<!-- Circliful CSS -->
		<link rel="stylesheet" href="../assets/css/circliful/circliful.css" />

		<!-- OdoMeter CSS -->
		<link rel="stylesheet" href="../assets/css/odometer.css" />

		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>
	<?php $this->beginBody() ?>

		<!-- Loading starts -->
		<div class="loading-wrapper">
			<div class="loading">
				<h5>Loading...</h5>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<!-- Loading ends -->

		<!-- Header starts -->
		<header>

			<!-- Logo starts -->
			<a href="index.html" class="logo">
				<img src="../assets/img/logo.png" alt="Olympics Logo" />
			</a> 
			<!-- Logo ends -->



		</header> 
		<!-- Header ends -->

		<!-- Left sidebar start -->
		<div class="vertical-nav vertical-nav-sm">

			<!-- Collapse menu starts -->
			<button class="collapse-menu">
				<i class="icon-menu2"></i>
			</button>
			<!-- Collapse menu ends -->

			<!-- Current user starts -->
			<div class="user-details clearfix">
				<a href="" class="user-img"></a>
			</div>
			<!-- Current user ends -->

			<!-- Sidebar menu start -->
			<ul class="menu clearfix">

				<!-- 查看留言 开始 -->
				<li>
					<a href="?r=olym-comment/index">
						<i class="icon-comment-stroke"></i>
						<span class="menu-item">查看游客留言</span>
					</a>
				</li>
				<!-- 查看留言 结束 -->

				<!-- 发布/修改团队信息 开始 -->
				<li>
					<a href="?r=olym-team-info/index">					
						<i class="icon-add-user"></i>
						<span class="menu-item">修改团队信息</span>
					</a>
				</li>
				<!-- 发布/修改团队信息 结束 -->

				<!-- 退出 开始 -->
				<li>
					<a href="http://localhost:4430/advanced/frontend/web/">
						<i class="icon-power"></i>
						<span class="menu-item">退出</span>
					</a>
				</li>
				<!-- 退出 结束 -->


			<!-- Sidebar menu snd -->
		</div>
		<!-- Left sidebar end -->

		<!-- Dashboard Wrapper Start -->
		<div class="dashboard-wrapper">

			<?= $content ?>
			
		</div>
		<!-- Dashboard Wrapper End -->

		<!-- Footer Start -->
		<footer>
			Copyright <a href="https://github.com/NKUZAQ/Internet_Database//">写的都对</a> <span>2021.11</span>
		</footer>
		<!-- Footer end -->

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="../assets/js/jquery.js"></script>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- Sparkline Graphs -->
		<!-- <script src="js/sparkline/sparkline.js"></script> -->
		<script src="../assets/js/sparkline/retina.js"></script>
		<script src="../assets/js/sparkline/custom-sparkline.js"></script>
		
		<!-- jquery ScrollUp JS -->
		<script src="../assets/js/scrollup/jquery.scrollUp.js"></script>

		<!-- D3 JS -->
		<script src="../assets/js/d3/d3.v3.min.js"></script>
		<script src="../assets/js/d3/d3.powergauge.js"></script>

		<!-- C3 Graphs -->
		<script src="../assets/js/c3/c3.min.js"></script>
		<script src="../assets/js/c3/c3.custom.js"></script>

		<!-- NVD3 JS -->
		<script src="../assets/js/nvd3/nv.d3.js"></script>
		<script src="../assets/js/nvd3/nv.d3.custom.boxPlotChart.js"></script>

		<!-- Horizontal Bar JS -->
		<script src="../assets/js/horizontal-bar/horizBarChart.min.js"></script>
		<script src="../assets/js/horizontal-bar/horizBarCustom.js"></script>

		<!-- Gauge Meter JS -->
		<script src="../assets/js/gaugemeter/gaugeMeter-2.0.0.min.js"></script>
		<script src="../assets/js/gaugemeter/gaugemeter.custom.js"></script>

		<!-- Calendar Heatmap JS -->
		<script src="../assets/js/heatmap/cal-heatmap.min.js"></script>
		<script src="../assets/js/heatmap/cal-heatmap.custom.js"></script>

		<!-- Odometer JS -->
		<script src="../assets/js/odometer/odometer.min.js"></script>
		<script src="../assets/js/odometer/custom-odometer.js"></script>

		<!-- Peity JS -->
		<script src="../assets/js/peity/peity.min.js"></script>
		<script src="../assets/js/peity/custom-peity.js"></script>

		<!-- Circliful js -->
		<script src="../assets/js/circliful/circliful.min.js"></script>
		<script src="../assets/js/circliful/circliful.custom.js"></script>		

		<!-- Custom JS -->
		<script src="../assets/js/custom.js"></script>
	<?php $this->endBody() ?>

	</body>
</html>


<?php $this->endPage() ?>
