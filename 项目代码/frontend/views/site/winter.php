<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use frontend\models\Tokyorank;

/**
 * Team: 写的都对, NKU
 * Coding by ZhouAnQi 1911590, 20211127
 * 这是北京冬奥会资讯页，主要是文字资料
 */

$this->title = '2022北京冬奥会';
$this->params['breadcrumbs'][] = $this->title;
?>


<!-- echarts依赖的配色 -->
<script src="https://www.runoob.com/static/js/wonderland.js"></script>


<!-- Top Bar Starts -->
<div class="top-bar clearfix">
	<div class="row gutter">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="page-title">
				<h3>2022北京冬奥会</h3>
				<p><a href="?r=site/index">首页</a></p>
			</div>
		</div>
	</div>
</div>
<!-- Top Bar Ends -->


<!-- 可以用php循环写 -->

<!-- Row starts -->
<div class="row gutter">
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog">
		<div class="blog-wrapper animated">
			<a href="?r=site/detail1" class="image-wrapper">
				<img src="../assets/img/timeline3.jpg" class="img-responsive" alt="Blog" />
			</a>
			<h4>北京冬奥会制服装备正式亮相</h4>
			<p>在北京2022年冬奥会倒计时100天之际，冬奥赛场的流动风景线——北京冬奥会和冬残奥会制服装备正式亮相。这套从600多套外观设计作品中脱颖而出的制服装备，前后进行了8轮版型优化...</p>
			<div class="">
				<a href="javascript:void(0)" class="btn btn-default btn-xs">奥运会</a>
				<a href="javascript:void(0)" class="btn btn-default btn-xs">冬奥会</a>
				<a href="javascript:void(0)" class="btn btn-default btn-xs">2022</a>
				<a href="?r=site/detail1" class="btn btn-info btn-xs">更多...</a>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog">
		<div class="blog-wrapper animated">
			<a href="?r=site/detail2" class="image-wrapper">
				<img src="../assets/img/timeline2.jpg" class="img-responsive" alt="Blog" />
			</a>
			<h4>北京冬奥会奖牌发布</h4>
			<p>10月26日，北京2022年冬奥会与冬残奥会奖牌在北京发布。奖牌是冬奥会景观元素的重要内容，奖牌的设计既体现举办国的文化内涵与精神追求，也凝聚着设计者的巧妙构思和精彩创意。北京冬奥会和冬残奥会...</p>
			<div class="">
				<a href="javascript:void(0)" class="btn btn-default btn-xs">奥运会</a>
				<a href="javascript:void(0)" class="btn btn-default btn-xs">冬奥会</a>
				<a href="javascript:void(0)" class="btn btn-default btn-xs">2022</a>
				<a href="?r=site/detail2" class="btn btn-info btn-xs">更多...</a>
				<!-- https://baijiahao.baidu.com/s?id=1714685407079962447&wfr=spider&for=pc -->
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog">
		<div class="blog-wrapper animated">
			<a href="?r=site/detail3" class="image-wrapper">
				<img src="../assets/img/timeline.jpg" class="img-responsive" alt="Blog" />
			</a>
			<h4>“相约北京2022”冬奥主题活动在瑞士举办</h4>
			<p>本报布鲁塞尔11月28日电 （记者任彦）中国驻瑞士大使馆日前在瑞士洛桑国际奥林匹克博物馆举办“相约北京2022”冬奥主题活动，并正式发布冬奥主题音乐片《2022相约北京：来自冰雪运动王国瑞士的祝福...</p>
			<div class="">
				<a href="javascript:void(0)" class="btn btn-default btn-xs">奥运会</a>
				<a href="javascript:void(0)" class="btn btn-default btn-xs">冬奥会</a>
				<a href="javascript:void(0)" class="btn btn-default btn-xs">2022</a>
				<a href="?r=site/detail3" class="btn btn-info btn-xs">更多...</a>
				<!-- https://baijiahao.baidu.com/s?id=1717708552208887874&wfr=spider&for=pc -->
			</div>
		</div>
	</div>

</div>
<!-- Row ends -->