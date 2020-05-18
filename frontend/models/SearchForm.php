<?php
/**
 * Created by PhpStorm.
 * User: ewakoko
 * Date: 3/27/2017
 * Time: 10:02 AM
 */

namespace frontend\models;

use Yii;
use yii\base\Model;

class SearchForm extends Model
{
    public $searchValue;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['searchValue'], 'safe'],
        ];
    }

}