<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_package".
 *
 * @property integer $id
 * @property integer $parent_test_id
 * @property integer $child_test_id
 *
 * @property Test $parentTest
 * @property Test $childTest
 */
class TestPackage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_package';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_test_id', 'child_test_id'], 'required'],
            [['parent_test_id', 'child_test_id'], 'integer'],
            [['parent_test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Test::className(), 'targetAttribute' => ['parent_test_id' => 'id']],
            [['child_test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Test::className(), 'targetAttribute' => ['child_test_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_test_id' => Yii::t('app', 'Parent Test ID'),
            'child_test_id' => Yii::t('app', 'Child Test ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentTest()
    {
        return $this->hasOne(Test::className(), ['id' => 'parent_test_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildTest()
    {
        return $this->hasOne(Test::className(), ['id' => 'child_test_id']);
    }
}
