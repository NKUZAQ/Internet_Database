<?php
/**
 * Team:写的都队
 * Codeing by 郑梦瑶
 * 历史奥运会的可视化图表
 */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = '历史数据';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>历史奥运数据</title>
</head>
<body>
	<h1 align="center" style="color:#ffffff">历史奥运会信息可视化图表</h1>
	<?php
    	$codes = json_encode($countrycode);
    	$golds = json_encode($gold);
    	$silvers=json_encode($silver);
    	$bronzes=json_encode($bronze);
    	$citynames=json_encode($cityname);
    	$citytimes=json_encode($citytime);  
    	$countrynames=json_encode($countryname); 
    	$medalnums=json_encode($medalnum);
    ?>
    
    <div id="main1" style="height: 500px;margin-top:30px;"></div>
	<!--<div id="bar" style="width: 600px;height:400px"></div>-->
	<script type="text/javascript">
        var myecharts=echarts.init(document.getElementById("main1"),'wonderland');
			// 指定图表的配置项和数据 
			var option = {
				color:["#9370DB","#6495ED","#7FFFAA"],
				title: {
    				text: '1924-2018冬奥会奖牌数量',
    				textStyle:{
    					color:'#ffffff'
    				}
  				},
  				tooltip: {
    				trigger: 'axis'
  				},
  				legend: {
    				data: ['gold', 'silver', 'bronze']
  				},
  				grid: {
    				left: '3%',
    				right: '4%',
    				bottom: '3%',
    				containLabel: true
  				},
  				toolbox: {
    				feature: {
      				saveAsImage: {}
    				}
  				},
  				xAxis: {
    				type: 'category',
    				data: <?php echo $codes; ?>
  				},
  				yAxis: {
    				type: 'value'
  				},
  				series: [
   					{
    					name:'gold',
      					data: <?php echo $golds;?>,
      					type: 'line'
    					},
    				{
    					name:'silver',
      					data: <?php echo $silvers;?>,
      					type: 'line'
    				},
    				{
    					name:'bronze',
      					data: <?php echo $bronzes;?>,
      					type: 'line'
    				},
  				]
			};
			myecharts.setOption(option);
	</script>
	<div id="main2" style="height: 500px;margin-top:70px;"></div>
    <script type="text/javascript">
    	var myecharts2=echarts.init(document.getElementById("main2"),'wonderland');
    	var option2={
    		color:["#DA70D6"],
    		title: {
    			text: '1896-2020夏季奥运会奖牌总数榜',
    			textStyle:{
    				color:'#ffffff'
    			}
  			},
  			tooltip: {
    			trigger: 'axis'
  			},
  			legend: {
    			data: ['奖牌总数']
  			},
  			grid: {
    			left: '3%',
    			right: '4%',
    			bottom: '3%',
    			containLabel: true
  			},
  			toolbox: {
    			feature: {
      			saveAsImage: {}
    			}
  			},
  			xAxis: {
    			type: 'category',
    			data: <?php echo $countrynames;?>,
  			},
  			yAxis: {
    			type: 'value'
  			},
  			series: [
    			{
      				data: <?php echo $medalnums;?>,
      				type: 'bar'
    			}
  			]
		};
    	myecharts2.setOption(option2);
    </script>
	<div id="main" style="height: 500px;margin-top:70px;margin-left:200px;margin-right:200px;"></div>
    <script type="text/javascript">
    	var myecharts1=echarts.init(document.getElementById("main"),'wonderland');
    	var option1 = {
    		color:['#FA8072'],
    		title: {
    			text: '1896-2020夏季奥运会举办国家（次数>1）',
    			textStyle:{
    				color:'#ffffff'
    			}
  			},
    		xAxis: {
		    	type: 'category',
		    	data:<?php echo $citynames; ?>,
			},
			yAxis: {
			    type: 'value'
			},
			series: [
			    {
			    	data: <?php echo$citytimes; ?>,
			      	type: 'bar'
			    }
			]
		};
    	myecharts1.setOption(option1);
    </script>
	
</body>
</html>