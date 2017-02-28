<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $mail_address;
    public $password;

    private $_team = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['mail_address', 'password'], 'required'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }
    
    public function attributeLabels(){
        return [
            'mail_address'  => Yii::t('app', 'Mailaddresse'),
            'password'      => Yii::t('app', 'Passwort')
            ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('app', 'Der Benutzername oder das Passwort sind nicht korrekt'));
            }
            return true;
        }
        return false;
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            
            if($user->active)
                //Login valid for 30 days
                return Yii::$app->user->login($this->getUser(), 3600*24*30 );
            else{
                $this->addError('mail_address', Yii::t('app','Der Account wurde noch nicht aktiviert'));
            }
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_team === false) {
            $this->_team = Team::findOne(['mail_address' => $this->mail_address]);
        }

        return $this->_team;
    }
}
