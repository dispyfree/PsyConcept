<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "round".
 *
 * @property integer $id
 * @property integer $counter
 */
class Round extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'round';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['counter', 'active', 'scheduled_activation'], 'required'],
            [['counter'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'counter' => Yii::t('app', 'Runde'),
            'active' => Yii::t('app', 'Runde aktiv'),
            'scheduled_activation' => Yii::t('app', 'Voraussichtlicher Start'),
        ];
    }
}
