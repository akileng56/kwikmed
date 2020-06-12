<?php
use yii\helpers\Html;
use yii\helpers\Url;

$formatter = \Yii::$app->formatter;
$class = 'round';
?>

<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Weekly Schedule</h3>
        <span class="qwikmed-subheading">Start and end of each day together with breaks periods</span>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-block">
                <p>
                    <?= Html::a('<i class="mdi mdi-plus-circle"></i> Create Daily Schedule ', ['newschedule'], ['class' => 'btn btn-success']) ?>
                </p>
                <div class="table-responsive">
                    <table class="table stylish-table">
                        <thead>
                        <tr>
                            <th colspan="2">Day Of The Week</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Break Start</th>
                            <th>Break End</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($schedules As $schedule){
                            $cssClass = '';
                            if($schedule['day_of_week'] == 'monday'){
                                $cssClass = $class;
                            } else if ($schedule['day_of_week'] == 'tuesday') {
                                $cssClass = $class.' round-success';
                            } else if ($schedule['day_of_week'] == 'wednesday') {
                                $cssClass = $class.' round-primary';
                            } else if ($schedule['day_of_week'] == 'thursday') {
                                $cssClass = $class.' round-warning';
                            } else if ($schedule['day_of_week'] == 'friday') {
                                $cssClass = $class.' round-danger';
                            } else if ($schedule['day_of_week'] == 'saturday') {
                                $cssClass = $class.' round-default';
                            } else {
                                $cssClass = $class.' round-success';
                            }
                            ?>
                            <tr>
                                <td style="width:50px;"><span class="schedule-text <?= $cssClass ?>"><?= substr($schedule['day_of_week'],0,1)  ?></span></td>
                                <td><h6 class="schedule-text"><?= $schedule['day_of_week'] ?></h6></td>
                                <td><?= date('h:i A', $schedule['start_time']); ?></td>
                                <td><?= date('h:i A', $schedule['end_time']); ?></td>
                                <td><?= date('h:i A', $schedule['break_start_time']); ?></td>
                                <td><?= date('h:i A', $schedule['break_end_time']); ?></td>
                                <td>
                                    <a href='<?= Url::to(['doctor/edit-schedule', 'id' => $schedule['schedule_id']]); ?>' class='btn btn-default'>
                                        <i class='fa fa-pencil'></i> Edit
                                    </a>
                                </td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
