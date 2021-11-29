<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use frontend\models\TokyoRank;
use frontend\models\TokyoAthletes;

/**
 * Team: 写的都对, NKU
 * Coding by ZhouAnQi 1911590, 20211129
 * 东京奥运会数据统计
 */

$this->title = '相关数据统计';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- echarts依赖的配色 -->
<script src="https://www.runoob.com/static/js/wonderland.js"></script>




<!-- Container fluid Starts -->
<div class="container-fluid">
    <!-- Top Bar Starts -->
    <div class="top-bar clearfix">
        <div class="row gutter">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="page-title">
                    <h3>相关数据统计</h3>
                    <p><a href="?r=site/index">首页</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar Ends -->

    <!-- Row starts -->
    <div class="row gutter">

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="panel height4">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <center>
                        <div id="pie" style="width: 500px;height:300px;"></div>
                        <script type="text/javascript">
                        // 基于准备好的dom，初始化echarts实例
                            var myChart = echarts.init(document.getElementById("pie"),"wonderland");

                            var option = {
                                title: {
                                    text: '参会运动员性别统计',
                                    left: 'center',
                                    textStyle:{
                                        color:"#ffffff"
                                    }
                                },
                              tooltip: {
                                trigger: 'item'
                              },
                              legend: {
                                orient: 'vertical',
                                left: 'left'
                              },
                              series: [
                                {
                                  name: 'Access From',
                                  type: 'pie',
                                  radius: '50%',
                                  data: 
                                  <?php

                                        $female = TokyoAthletes::find()
                                            ->where(['gender'=>'Female'])
                                            ->count();
                                        $male = TokyoAthletes::find()
                                            ->where(['gender'=>'Male'])
                                            ->count();
                                        echo "[{ value:";
                                        echo $female;
                                        echo ", name: 'Female' },{ value: ";    
                                        echo $male;
                                        echo ", name: 'Male' }], ";
                                  ?> 

                                  emphasis: {
                                    itemStyle: {
                                      shadowBlur: 10,
                                      shadowOffsetX: 0,
                                      shadowColor: 'rgba(0, 0, 0, 0.5)'
                                    }
                                  }
                                }
                              ]
                            };

                            // 使用刚指定的配置项和数据显示图表。
                            myChart.setOption(option);
                        </script> 
                    </center>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="panel height4">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <center>                
                        <div id="pie2" style="width: 500px;height:300px;"></div>
                        <script type="text/javascript">
                        // 基于准备好的dom，初始化echarts实例
                            var myChart = echarts.init(document.getElementById("pie2"),"wonderland");

                            var option = {
                                title: {
                                    text: '参会运动员国籍统计',
                                    left: 'center',
                                    textStyle:{
                                        color:"#ffffff"
                                    }
                                },
                                tooltip: {
                                    trigger: 'item'
                                },
                                series: [
                                    {
                                        name: 'Access From',
                                        type: 'pie',
                                        radius: ['40%', '70%'],
                                        avoidLabelOverlap: false,
                                        itemStyle: {
                                            borderRadius: 10,
                                            // borderColor: '#2A3039',
                                            borderWidth: 2
                                        },
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
                                            <?php
                                                $countryPeople=TokyoAthletes::find()
                                                    ->groupBy('countryCode')
                                                    ->select(['count(*) as total','countryCode'])

                                                    ->asArray()
                                                    ->all()
                                                    ;

                                                $tmp=0;
                                                foreach ($countryPeople as $i) {
                                                    foreach($i as $j){
                                                        if($tmp%2==0){
                                                            if($tmp!=0)
                                                                echo ",";
                                                            echo "{ value: ";
                                                            echo $j;
                                                            echo ",";
                                                        }
                                                        else{   
                                                            echo "name: '";
                                                            echo $j;
                                                            echo "'}";
                                                        }
                                                        $tmp=$tmp+1;
                                                    }
                                                }

                                            ?>  
                                        ]
                                    }
                                ]
                            };


                            // 使用刚指定的配置项和数据显示图表。
                            myChart.setOption(option);
                        </script>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!-- Row ends -->


    <!-- Row starts -->
    <div class="row gutter">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel height3">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <center>
                        <div id="main" style="width: 1000px;height:2300px;"></div>
                        <script type="text/javascript">
                        //  基于准备好的dom，初始化echarts实例
                            var myChart = echarts.init(document.getElementById("main"),"wonderland");

                            var option = {
                                title: {
                                    text: '参会国家或地区获得奖牌数统计',
                                    textStyle: {
                                        color: '#ffffff'
                                    }
                                },
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
                                    data: 

                                    <?php
                                    // 查询
                                        $rank = TokyoRank::find()
                                            ->select(['Team','Gold','Silver','Bronze'])
                                            ->orderBy(['Gold' => SORT_ASC])
                                            ->asArray()
                                            ->all();

                                    // 国家和地区
                                        $tmp=0;
                                        echo '[';
                                        foreach($rank as $i){  
                                            foreach($i as $j){
                                                if($tmp%4==0)
                                                    if($tmp==0) { 
                                                        echo '"';
                                                        echo $j;
                                                        echo '"';
                                                    }
                                                    else{
                                                        echo ', ';
                                                        echo '"';
                                                        echo $j;
                                                        echo '"';
                                                    }
                                                $tmp=$tmp+1;
                                            }
                                        }
                                        echo ']';
                                    // 国家和地区

                                        echo 
                                            "},
                                            series: 
                                            [
                                            {
                                                name: 'Gold',
                                                type: 'bar',
                                                stack: 'total',
                                                emphasis: {
                                                    focus: 'series'
                                                },
                                                data: 
                                            ";

                                    // 金牌数据
                                        $tmp=0;
                                        echo '[';
                                        foreach($rank as $i){  
                                            foreach($i as $j){
                                                if($tmp%4==1)
                                                    if($tmp==1) { 
                                                        echo $j;
                                                    }
                                                    else{
                                                        echo ', ';
                                                        echo $j;
                                                    }
                                                $tmp=$tmp+1;
                                            }
                                        }
                                        echo ']';
                                    // 金牌数据
                                      
                                        echo
                                            "},
                                            {
                                                name: 'Silver',
                                                type: 'bar',
                                                stack: 'total',
                                                emphasis: {
                                                    focus: 'series'
                                                },
                                                data: ";

                                    // 银牌数据
                                        $tmp=0;
                                        echo '[';
                                        foreach($rank as $i){  
                                            foreach($i as $j){
                                                if($tmp%4==2)
                                                    if($tmp==2) { 
                                                        echo $j;
                                                    }
                                                    else{
                                                        echo ', ';
                                                        echo $j;
                                                    }
                                                $tmp=$tmp+1;
                                            }
                                        }
                                        echo ']';
                                    // 银牌数据

                                        echo
                                            "},
                                            {
                                                name: 'Bronze',
                                                type: 'bar',
                                                stack: 'total',
                                                emphasis: {
                                                    focus: 'series'
                                                },
                                                data: ";

                                    // 铜牌数据
                                        $tmp=0;
                                        echo '[';
                                        foreach($rank as $i){  
                                            foreach($i as $j){
                                                if($tmp%4==3)
                                                    if($tmp==3) { 
                                                        echo $j;
                                                    }
                                                    else{
                                                        echo ', ';
                                                        echo $j;
                                                    }
                                                $tmp=$tmp+1;
                                            }
                                        }
                                        echo ']';
                                    // 铜牌数据

                                        echo
                                            "},
                                            ]};";

                                    ?>

                            // 使用刚指定的配置项和数据显示图表。
                            myChart.setOption(option);
                        </script>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!-- Row ends -->

</div>
<!-- Container fluid ends -->


