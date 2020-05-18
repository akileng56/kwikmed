<?php

namespace bot\controllers;

use backend\models\BusinessUnitLeader;
use common\models\BusinessUnit;
use common\models\Config;
use common\models\TicketTrack;
use Yii;
use yii\console\Controller;
use common\models\User;
use common\models\ReportedTicket;
use common\models\TicketRemarks;
use common\models\HelpToolHelperMethods;


class TicketController extends Controller {

    public function actionId(){
         echo 'The application ID is '.Yii::$app->id;
    }
    /**
     * Automatically change the status of tickets older that 24 hours
     */
    public function actionAutoResolveOldTickets() {
        $resolved = ReportedTicket::find()->where(['status' => 2])->limit(100)->all();
        foreach ($resolved AS $ticket) {
            $interval = time() - $ticket->updated_date;
            if ($interval > Config::getValue('VERIFY_TIMEOUT')) {
                $ticket->status = 8;
                $ticket->updated_by = 2;
                $ticket->updated_date = time();
                $ticket->last_remarks="Ticket automatically flagged as fully resolved after no response from client for more than 24 hours";
                $ticket->save(false);

                //Create a trail about this activity
                $remarks = new TicketRemarks();
                $remarks->created_at = time();
                $remarks->created_by = 2;
                $remarks->status = $ticket->status;
                $remarks->ticket_id = $ticket->report_id;
                $remarks->escalation_level = $ticket->escalation_level;
                $remarks->remarks = "Ticket automatically flagged as fully resolved after no response from client for more than 24 hours";
                $remarks->save();

                // log ticket
                $track = new TicketTrack();
                $track->activity = " - ";
                $track->assigned_to = 2;
                $track->created_by = 2;
                $track->created_date = time();
                $track->prev_assigned_to = $ticket->assigned_to;
                $track->prev_status = 2;
                $track->status = $ticket->status;
                $track->ticket_id = $ticket->report_id;
                $track->remarks = $remarks->remarks;

                // Creating the time Lag
                $previousTrack = $ticket->getLastTrack();
                if(is_null($previousTrack)){
                    $track->time_lag = 0;
                } else {
                    $track->time_lag = ($track->created_date - $previousTrack->created_date);
                }

                $track->save();
            }
        }
    }

    public function actionCleanAbandonedTickets() {
        $resolved = ReportedTicket::find()->where(['status' => 5])->limit(100)->all();
        foreach ($resolved AS $ticket) {
            $interval = time() - $ticket->updated_date;
            if ($interval > Config::getValue('FEEDBACK_REQUIRED_TIMEOUT')) {
                $ticket->status = 10;
                $ticket->updated_by = 2;
                $ticket->updated_date = time();
                $ticket->last_remarks="Ticket automatically closed after no response from client for more than 24 hours";
                $ticket->save();

                //Create a trail about this activity
                $remarks = new TicketRemarks();
                $remarks->created_at = time();
                $remarks->created_by = 2;
                $remarks->status = $ticket->status;
                $remarks->ticket_id = $ticket->report_id;
                $remarks->escalation_level = $ticket->escalation_level;
                $remarks->remarks = "Ticket automatically closed after no response from client for more than 24 hours";
                $remarks->save();

                // log ticket
                $track = new TicketTrack();
                $track->activity = " - ";
                $track->assigned_to = 2;
                $track->created_by = 2;
                $track->created_date = time();
                $track->prev_assigned_to = $ticket->assigned_to;
                $track->prev_status = 5;
                $track->status = $ticket->status;
                $track->ticket_id = $ticket->report_id;
                $track->remarks = $remarks->remarks;

                // Creating the time Lag
                $previousTrack = $ticket->getLastTrack();
                if(is_null($previousTrack)){
                    $track->time_lag = 0;
                } else {
                    $track->time_lag = ($track->created_date - $previousTrack->created_date);
                }

                $track->save();
            }
        }
    }

    /*
 * Tickets that have sent more than 6 hours, email should be sent to Team Leader
 *
 * */
    public function actionFlagOverDueTickets() {
        $supportStaff = User::find()->where(['category' => 'staff_support'])->orWhere(['category' => 'staff_user'])->all();
            foreach($supportStaff AS $staff){
                $staff_tickets = ReportedTicket::find()->where(['assigned_to' => $staff->id])->andWhere(['status' => 1])->andWhere(['over_due' => 0])->all();
                $over_due = array();
                foreach($staff_tickets AS $ticket) {
                    $interval = time() - $ticket->submitted_date;
                    echo 'The interval is ' . $interval;
                    if($interval > (6*60*60)) { // Determine the actual interval
                        $ticket->over_due = 1;
                        $ticket->save();
                        // Add over_due tickets to one array
                        array_push($over_due,$ticket);
                    }

                }
                // Here pick the team Leader and sent mail with the tickets
                // $teamLeaders = $staff->businessUnit->teamLeaders;
                $teamLeaders = BusinessUnitLeader::find(['' => '']);
                foreach($teamLeaders AS $leader){
                    if ($leader->user_id == '4698') {
                        if(Yii::$app->params['enableEmail']){
                            HelpToolHelperMethods::sendTicketOverDueMail($leader->user_id);
                        }
                    }
                }
            }
    }
}
