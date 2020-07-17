<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "playlist_detail".
 *
 * @property int $playlistid
 * @property int $fileid
 * @property int $linkid
 * @property int|null $order
 */
class PlaylistDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'playlist_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['playlistid', 'fileid', 'linkid'], 'required'],
            [['playlistid', 'fileid', 'linkid', 'order'], 'integer'],
            [['playlistid', 'fileid', 'linkid'], 'unique', 'targetAttribute' => ['playlistid', 'fileid', 'linkid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'playlistid' => 'Playlistid',
            'fileid' => 'Fileid',
            'linkid' => 'Linkid',
            'order' => 'Order',
        ];
    }
}
