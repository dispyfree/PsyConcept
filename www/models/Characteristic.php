<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "characteristic".
 *
 * @property integer $id
 * @property string $name
 * @property integer $criterion_category_id
 */
class Characteristic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'characteristic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'criterion_category_id'], 'required'],
            [['criterion_category_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'criterion_category_id' => Yii::t('app', 'Criterion Category ID'),
        ];
    }
}
