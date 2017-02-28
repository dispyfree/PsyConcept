<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class InputInfoWidget extends Widget
{
    public $model;
    public $formId;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('/widgets/inputInfo', array('model' => $this->model, 'formId' => $this->formId));
    }
}
