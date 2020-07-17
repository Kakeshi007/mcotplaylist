<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "playlist".
 *
 * @property int $id
 * @property string|null $playlist
 * @property int|null $createby
 * @property string|null $createdate
 * @property int|null $stationid
 */
class Playlist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'playlist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['createby', 'stationid'], 'integer'],
            [['createdate'], 'safe'],
            [['playlist'], 'string', 'max' => 128],
            [['playlist'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'playlist' => 'Playlist',
            'createby' => 'Createby',
            'createdate' => 'Createdate',
            'stationid' => 'Stationid',
        ];
    }
}
