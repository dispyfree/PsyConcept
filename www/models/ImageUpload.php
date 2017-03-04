<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
    /**
     * @var UploadedFile
     */
    public $test_id;
    public $imageFile;
    public $description;

    public function rules()
    {
        return [
            [['imageFile'], 'image', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, bmp, gif', 
                //max: 1MB
                'maxSize' => 1 * pow(1024, 2)],
             [['description'], 'string'],
            [['test_id'], 'integer'],
             [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Test::className(), 'targetAttribute' => ['test_id' => 'id']],
        ];
    }
    
    public function getFullFileName(){
        return $this->imageFile->baseName . '.' . $this->imageFile->extension;
    }
    
    public function upload()
    {
        if ($this->validate()) {
            //path relative to web
            $this->imageFile->saveAs('../data/uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}