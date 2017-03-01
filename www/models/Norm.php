<?php

namespace app\models;

use Yii;
use app\models\Test;

/**
 * This is the model class for table "norm".
 *
 * @property integer $id
 * @property integer $test_id
 * @property integer $applicability_bottom_age_bound
 * @property integer $applicability_upper_age_bound
 */
class Norm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'norm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['test_id', 'applicability_bottom_age_bound', 'applicability_upper_age_bound'], 'required'],
            [['test_id', 'applicability_bottom_age_bound', 'applicability_upper_age_bound'], 'integer'],
            'lower_upper' => ['applicability_bottom_age_bound', 'compare', 'compareAttribute' => 'applicability_upper_age_bound',
                'type' => 'number', 'operator' => '<=']
        ];
    }
    
    public function getTest()
    {
        return $this->hasOne(Test::className(), ['id' => 'test_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'test_id' => Yii::t('app', 'Test ID'),
            'applicability_bottom_age_bound' => Yii::t('app', 'Untere Altersgrenze'),
            'applicability_upper_age_bound' => Yii::t('app', 'Obere Altersgrenze'),
        ];
    }
}
