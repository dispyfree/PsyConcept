<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_acquirement".
 *
 * @property integer $id
 * @property integer $test_id
 * @property integer $team_id
 * @property integer $round_id
 *
 * @property Test $test
 * @property Team $team
 * @property Round $round
 */
class TestAcquirement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_acquirement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['test_id', 'team_id', 'round_id'], 'required'],
            [['test_id', 'team_id', 'round_id'], 'integer'],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Test::className(), 'targetAttribute' => ['test_id' => 'id']],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Team::className(), 'targetAttribute' => ['team_id' => 'id']],
            [['round_id'], 'exist', 'skipOnError' => true, 'targetClass' => Round::className(), 'targetAttribute' => ['round_id' => 'id']],
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
            'team_id' => Yii::t('app', 'Team ID'),
            'round_id' => Yii::t('app', 'Round ID'),
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
    public function getTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'team_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRound()
    {
        return $this->hasOne(Round::className(), ['id' => 'round_id']);
    }
}
