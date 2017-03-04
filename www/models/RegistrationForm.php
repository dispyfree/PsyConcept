<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Team;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegistrationForm extends Model
{
    public $short_name;
    public $mail_address;
    public $password_1, $password_2;



    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['short_name', 'mail_address', 'password_1', 'password_2'], 'required', 
                'message' => Yii::t('app', '{attribute} muss angegeben werden')],
            'short_name_unique'     => [['short_name'], 'unique', 'targetClass' => 'app\models\Team', 'targetAttribute' => 'short_name',
                'message'               => Yii::t('app', 'Dieser Teamname ist leider schon vergeben')],
            'short_name_length'     => [['short_name'], 'string', 'length' => [5, 50], 
                'message'               => 'Der Teamname darf nicht weniger als 5 und nicht mehr als 50 Zeichen enthalten'],
            
            'passwords_min_length'  => [['password_1', 'password_2'], 'string', 
                'min' => 6, 'tooShort' => Yii::t('app', 'Die Passwörter müssen mindestens 6 Zeichen lang sein')],
            'passwords_equal'       => [['password_1'], 'compare', 'compareAttribute' => 'password_2',
                'message'               => Yii::t('app', 'Die Passwörter müssen übereinstimmen')],
            'mail_address_unique'          => [['mail_address'], 'unique', 'targetClass' => 'app\models\Team', 'targetAttribute' => 'mail_address', 
                'message'               => Yii::t('app', 'Diese E-Mail-Adresse wird schon verwendet')],
            'mail_address_valid'          => [['mail_address'], 'email', 
                'message'               => Yii::t('app', 'Diese E-Mail-Adresse ist nicht valide')]
        ];
    }
    
    public function attributeLabels(){
        return [
            'short_name'    => Yii::t('app', 'Teamname'),
            'mail_address'  => Yii::t('app', 'Mail'),
            'password_1'    => Yii::t('app', 'Passwort'),
            'password_2'    => Yii::t('app', 'Wiederholung'),
        ];
    }
    
    public function attributeDescriptions(){
        return [
          'short_name' => Yii::t('app', 'Sie können Ihren Teamnamen frei wählen. Der Teamname wird unter Anderem in Ranglisten und Gesamtauswertungen verwendet'),
          'mail_address' => Yii::t('app', 'Die angegebene E-Mail-Adresse wird verwendet, um Ankündigungen an Sie zu versenden. Des Weiteren werden Erinnerungen und Statusmeldungen des Planspiels an die angegebene Adresse verschickt.'
                                        .' <p>Die angegebene Adresse ist nicht öffentlich zugänglich.</p>'),
          'password_1' => Yii::t('app', 'Wählen Sie bitte ein sicheres Passwort. Sichere Passwörter enthalten Groß- und Kleinbuchstaben, Zahlen und Sonderzeichen. Ihr Passwort muss mindestens 6 Zeichen lang sein.')  
        ];
    }
    
    public function register(){
        if($this->validate()){
            $team = new Team();
            $team->short_name   = $this->short_name;
            $team->mail_address = $this->mail_address;
            $team->pw_hash      = Yii::$app->getSecurity()->generatePasswordHash($this->password_1);
            
            if(!$team->save()){
                var_dump($team->getErrors()); die();
                return false;
            }
            else{
                Yii::$app->session->setFlash('success', Yii::t('app', 'Willkommen bei PsyConcept! Sie können Sich einloggen, sobald Ihr Account freigeschaltet ist'));
                
                return true;
            }
        }
        return false;
    }

}
