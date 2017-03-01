<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $description
 * @property integer $round_id
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'round_id'], 'required'],
            [['description'], 'string'],
            [['round_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'description' => Yii::t('app', 'Beschreibung'),
            'round_id' => Yii::t('app', 'Runde'),
        ];
    }
    
    public function getCharacteristics()
    {
        return $this->hasMany(TaskCharacteristic::className(), ['task_id' => 'id']);
    }
    
    public function getRound()
    {
        return $this->hasOne(Round::className(), ['id' => 'round_id']);
    }
    
    /**
     * @todo: move somewhere else 
     */
    public function getRoundDropDown() {
        return Round::find()->orderBy('counter')->asArray()->all();
    }
    
    

}
