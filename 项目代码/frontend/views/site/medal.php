<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use frontend\models\TokyoRank;


/**
 * Team: 写的都对, NKU
 * Coding by ZhouAnQi 1911590, 20211127
 * 参赛队奖牌统计
 */

$this->title = '参赛队奖牌统计';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Container fluid Starts -->
<div class="container-fluid">

    <!-- Top Bar Starts -->
    <div class="top-bar clearfix">
        <div class="row gutter">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="page-title">
                    <h3>参赛队奖牌统计</h3>
                    <p><a href="?r=site/index">首页</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar Ends -->
    <!-- Row start -->
    <div class="row gutter">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <h4>参赛队奖牌表（按照金牌排序）</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover no-margin">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Team</th>
                                    <th>Gold</th>
                                    <th>Silver</th>
                                    <th>Bronze</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $rank=TokyoRank::find()
                                    ->select(['Rank','Team','Gold','Silver','Bronze','Total'])
                                    ->asArray()
                                    ->orderBy('rank',SORT_DESC)
                                    ->all();

                                    $tmp=0;
                                    foreach($rank as $i){
                                        if($tmp==0){
                                            echo '<tr class="danger">';
                                        }elseif($tmp==1){
                                            echo '<tr class="info">';
                                        }elseif($tmp==2){
                                            echo '<tr class="warning">';
                                        }else{
                                            echo "<tr>";
                                        }
                                        foreach($i as $j){
                                            echo "<td>";

                                            echo $j;
                                            echo "</td>";
                                        }
                                        echo "</tr>";
                                        $tmp=$tmp+1;

                                    }
                                    ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row ends -->       

</div>
<!-- Container fluid ends -->

