<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use frontend\models\Athletes;

?>
<h1 align="center">Athletes</h1>
<ul>
<?php foreach ($athletes as $athlete): ?>
    <li>
        <?= Html::encode("{$athlete->id} ({$athlete->name})") ?>:
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>


<h2 align='center'>里约奥运会所有运动员体重<h2>
<?php
$heights = json_encode($height);
$weights = json_encode($weight);
$ids = json_encode($id);
?>
<div id="main" style="width: 1400px;height: 600px;"></div>
<script type="text/javascript">
                        var chartDom = document.getElementById('main');
                        var myChart = echarts.init(chartDom,'wonderland');
                        var option;
                        option = {
                                                    xAxis: {
                                                      type: 'category',
                                                      boundaryGap: false,
                                                      data: <?php echo $ids; ?>
                                                    },
                                                    yAxis: {
                                                      type: 'value'
                                                    },
                                                    series: [
                                                      {

                                                        type: 'line',
                                                        areaStyle: {},
                                                        data: <?php echo $weights; ?>
                                                      }
                                                    ]
                                                  };

                                                  if (option && typeof option === 'object') {
                                                      myChart.setOption(option);
                                                  }
</script>

 <h2 align='center'>各个项目参加的男女分布情况</h2>
 <div id="main2" style="width: 1400px;height: 600px;"></div>
 <script type="text/javascript">

var chartDom = document.getElementById('main2');
var myChart = echarts.init(chartDom,'wonderland');
var option;

option = {
  tooltip: {
    trigger: 'axis',
    axisPointer: {
      // Use axis to trigger tooltip
      type: 'shadow' // 'shadow' as default; can also be 'line' or 'shadow'
    }
  },
  legend: {},
  grid: {
    left: '3%',
    right: '4%',
    bottom: '3%',
    containLabel: true
  },
  xAxis: {
    type: 'value'
  },
  yAxis: {
    type: 'category',
    data: ['volleyball', 'athletics', 'boxing', 'table tennis', 'cycling', 'gymnastics', 'aquatics']
  },
  series: [
    {
      name: '男',
      type: 'bar',
      stack: 'total',
      label: {
        show: true
      },
      emphasis: {
        focus: 'series'
      },
      data: [729,1226,250,325,114,86,192]
    },
    {
      name: '女',
      type: 'bar',
      stack: 'total',
      label: {
        show: true
      },
      emphasis: {
        focus: 'series'
      },
      data: [716,1137,36,200,210,86,192]
    }
  ]
};
  if (option && typeof option === 'object') {
                                                      myChart.setOption(option);
                                                  }



 </script>
 <div id="main3" style="width: 950px;height: 600px;"></div>
 <script type="text/javascript">

 </script>