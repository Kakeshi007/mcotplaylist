<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PlaylistDetail;

/**
 * PlaylistDetailSearch represents the model behind the search form of `app\models\PlaylistDetail`.
 */
class PlaylistDetailSearch extends PlaylistDetail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['playlistid', 'fileid', 'linkid', 'order'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PlaylistDetail::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'playlistid' => $this->playlistid,
            'fileid' => $this->fileid,
            'linkid' => $this->linkid,
            'order' => $this->order,
        ]);

        return $dataProvider;
    }
}
