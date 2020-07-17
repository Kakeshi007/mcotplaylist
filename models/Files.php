<?php

namespace app\models;

use Yii;
use \yii\web\UploadedFile;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string $filename
 * @property string|null $uploaddaye
 * @property int|null $uploadby
 * @property int|null $stationid
 */
class Files extends \yii\db\ActiveRecord
{
    public $upload_foler ='mp3';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filename'], 'required'],
            [['uploaddaye'], 'safe'],
            [['uploadby', 'stationid'], 'integer'],
            [['filename'], 'file', 'extensions' => 'mp3','skipOnEmpty' => true],
            [['filename'], 'required', 'on'=>'create']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'Filename',
            'uploaddaye' => 'Uploaddaye',
            'uploadby' => 'Uploadby',
            'stationid' => 'Stationid',
        ];
    }
    
    public function upload($model,$attribute)
    {
        $mp3  = UploadedFile::getInstance($model, $attribute);
        $path = $this->getUploadPath();
        
        if ($mp3) {
            //$fileName = md5($mp3->baseName.time()) . '.' . $mp3->extension;
            $fileName = $mp3->baseName . '.' . $mp3->extension;
            echo $path.$fileName;
            if($mp3->saveAs($path.$fileName)){
                 return $fileName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getUploadPath(){
        return Yii::getAlias('@webroot').'/'.$this->upload_foler.'/';
    }

    public function getUploadUrl(){
        return Yii::getAlias('@web').'/'.$this->upload_foler.'/';
    }

    public function getmp3Viewer(){
        return empty($this->mp3) ? Yii::getAlias('@web').'/img/none.png' : $this->getUploadUrl().$this->mp3;
    }
}