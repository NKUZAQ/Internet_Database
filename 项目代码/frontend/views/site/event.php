<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use frontend\models\Athletes;

?>

<h1 align="center">一些国家运动员的扇形统计图</h1>

<div id="main" style="width: 1400px;height: 600px;"></div>
<script type="text/javascript">
var chartDom = document.getElementById('main');
var myChart = echarts.init(chartDom,'wonderland');
var option;

option = {
  tooltip: {
    trigger: 'item'
  },
  legend: {
    top: '5%',
    left: 'center'
  },
  series: [
    {
      name: 'Access From',
      type: 'pie',
      radius: ['40%', '70%'],
      avoidLabelOverlap: false,
      label: {
        show: false,
        position: 'center'
      },
      emphasis: {
        label: {
          show: true,
          fontSize: '40',
          fontWeight: 'bold'
        }
      },
      labelLine: {
        show: false
      },
      data: [
        { value: 1048,name :'CHN' },
        { value: 735 ,name :'USA'},
        { value: 580,name :'BRA'},
        { value: 484,name:'RUS'},
        { value: 300,name:'RNI'}
      ]
    }
  ]
};

option && myChart.setOption(option);

</script>
