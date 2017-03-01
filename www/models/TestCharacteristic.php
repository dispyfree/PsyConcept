<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_characteristic".
 *
 * @property integer $id
 * @property integer $test_id
 * @property integer $characteristic_id
 * @property double $value
 *
 * @property Test $test
 * @property Characteristic $characteristic
 */
class TestCharacteristic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_characteristic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['test_id', 'characteristic_id', 'value'], 'required'],
            [['test_id', 'characteristic_id'], 'integer'],
            [['value'], 'number'],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Test::className(), 'targetAttribute' => ['test_id' => 'id']],
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
            'test_id' => Yii::t('app', 'Test ID'),
            'characteristic_id' => Yii::t('app', 'Characteristic ID'),
            'value' => Yii::t('app', 'Value'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTest()
    {
        return $this->hasOne(Test::className(), ['id' => 'test_id']);
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
