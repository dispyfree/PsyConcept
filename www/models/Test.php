<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property integer $id
 * @property string $short_name
 * @property string $full_name
 * @property integer $license_costs
 * @property double $duration
 * @property double $required_personnel
 * @property integer $applicability_bottom_age_bound
 * @property integer $applicability_upper_age_bound
 * @property string $description
 *
 * @property Image[] $images
 * @property TestAcquirement[] $testAcquirements
 * @property TestApplication[] $testApplications
 * @property TestCharacteristic[] $testCharacteristics
 * @property TestPackage[] $testPackages
 * @property TestPackage[] $testPackages0
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['short_name', 'full_name', 'license_costs', 'duration', 'required_personnel', 'applicability_bottom_age_bound', 'applicability_upper_age_bound', 'description'], 'required'],
            [['license_costs', 'applicability_bottom_age_bound', 'applicability_upper_age_bound'], 'integer'],
            [['duration', 'required_personnel'], 'number'],
            [['description'], 'string'],
            [['short_name'], 'string', 'max' => 50],
            [['full_name'], 'string', 'max' => 200],
            'license_cost_positive' => ['license_costs', 'compare', 'compareValue' => 0, 'operator' => '>=', 'type' => 'number'],
            'upper_greater_lower_age_bound' => ['applicability_bottom_age_bound', 'compare', 
                'compareAttribute' => 'applicability_upper_age_bound', 'operator' => '<=', 'type' => 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'short_name' => Yii::t('app', 'Kürzel'),
            'full_name' => Yii::t('app', 'Vollständiger Name'),
            'license_costs' => Yii::t('app', 'Lizenzkosten'),
            'duration' => Yii::t('app', 'Dauer'),
            'required_personnel' => Yii::t('app', 'benötigtes Personal'),
            'applicability_bottom_age_bound' => Yii::t('app', 'untere Altersgrenze'),
            'applicability_upper_age_bound' => Yii::t('app', 'obere Altersgrenze'),
            'description' => Yii::t('app', 'Beschreibung'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['test_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestAcquirements()
    {
        return $this->hasMany(TestAcquirement::className(), ['test_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestApplications()
    {
        return $this->hasMany(TestApplication::className(), ['test_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestCharacteristics()
    {
        return $this->hasMany(TestCharacteristic::className(), ['test_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestPackages()
    {
        return $this->hasMany(TestPackage::className(), ['parent_test_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestPackages0()
    {
        return $this->hasMany(TestPackage::className(), ['child_test_id' => 'id']);
    }
}
