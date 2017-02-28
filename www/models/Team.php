<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property integer $id
 * @property string $short_name
 * @property double $balance
 */
class Team extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['short_name', 'balance'], 'required'],
            [['balance'], 'number'],
            [['short_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'short_name' => Yii::t('app', 'Short Name'),
            'balance' => Yii::t('app', 'Balance'),
        ];
    }

    /**
     * ------------------------------------------------------------
     * Implementation of the IdentityInterface
     */
    
    /**
     * generate random auth key to enable auto login
     * @param array $insert 
     * @return boolean
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                //@todo: set balance dynamically   
                $team->balance      = 0;
                $team->active       = false;
                $team->management   = false;
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }

    
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new \BadMethodCallException("Access tokens are disabled");
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key
;    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
    
    public function getName(){
        return $this->short_name;
    }
    
    public function validatePassword($pass){
        //note that the salt is part of the hash string; therefore, no separate salt is necessary. 
        return Yii::$app->getSecurity()->validatePassword($pass, $this->pw_hash);
    }

}
