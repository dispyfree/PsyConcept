<?php

namespace app\controllers;
use yii\web\Controller;

class BaseController extends Controller{

    public $denyCallback = 'isAdmin';
    
    public function isAdmin($rule, $action){
        if(Yii::$app->user->isGuest)
            return false;
        var_dump(Yii::$app->user->management); die();
        return Yii::$app->user->management;
    }
    
}

class adminAccessRule extends \yii\filters\AccessRule
{
    public function allows($action, $user, $request)
    {
        //@todo: make it configurable
        if($user->getIdentity()->short_name == "admin" && $user->getIdentity()->management == true){
            return true;
        }
        else{
            return parent::allows($action, $user, $request);
        }
    }
}


