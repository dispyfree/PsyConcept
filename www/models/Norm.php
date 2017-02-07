<?php

namespace app\models;

use Yii;

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
            'applicability_bottom_age_bound' => Yii::t('app', 'Applicability Bottom Age Bound'),
            'applicability_upper_age_bound' => Yii::t('app', 'Applicability Upper Age Bound'),
        ];
    }
}
