<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task_characteristic".
 *
 * @property integer $id
 * @property integer $task_id
 * @property integer $characteristic_id
 * @property double $value
 *
 * @property Task $task
 * @property Characteristic $characteristic
 */
class TaskCharacteristic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task_characteristic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_id', 'characteristic_id', 'value'], 'required'],
            [['task_id', 'characteristic_id'], 'integer'],
            [['value'], 'number'],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
            [['characteristic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Characteristic::className(), 'targetAttribute' => ['characteristic_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'task_id' => Yii::t('app', 'Task ID'),
            'characteristic_id' => Yii::t('app', 'Characteristic ID'),
            'value' => Yii::t('app', 'Wert'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristic()
    {
        return $this->hasOne(Characteristic::className(), ['id' => 'characteristic_id']);
    }
    
    public function getCharacteristicsDropDown() {
        return Characteristic::find()->asArray()->all();
    }
}
