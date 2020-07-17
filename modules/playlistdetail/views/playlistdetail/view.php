<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PlaylistDetail */

$this->title = $model->playlistid;
$this->params['breadcrumbs'][] = ['label' => 'Playlist Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="playlist-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'playlistid' => $model->playlistid, 'fileid' => $model->fileid, 'linkid' => $model->linkid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'playlistid' => $model->playlistid, 'fileid' => $model->fileid, 'linkid' => $model->linkid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'playlistid',
            'fileid',
            'linkid',
            'order',
        ],
    ]) ?>

</div>
