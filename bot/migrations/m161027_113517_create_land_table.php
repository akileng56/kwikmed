<?php
use yii\db\Migration;
use common\models\Database;
/**
 * Handles the creation of tables in the LAND module.
 */
//Defines
require('C:/wamp64/www/casetracker/lawfirm/console/config/defines.php');

class m161027_113517_create_land_table extends Migration {

    /**
     * @inheritdoc
     */
    public function up() {
 //switch db
        $file = PATH_SQL_DIRECTORY . "/land.sql";
        $db = Yii::$app->kms;
        //import it
        if (Database::populateDatabaseFromFile($db, $file)) {
            echo "Congs! The tables have been created<br/>";
        } else {
            echo "Sorry, there was a problem";
        }
    }

    /**
     * @inheritdoc
     */
    public function down() {
        /***
         * Not sure if we should remove all the tables with all the data gathered!
         */
        return true;
    }

}
