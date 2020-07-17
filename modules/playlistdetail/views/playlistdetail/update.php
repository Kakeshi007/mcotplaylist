<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlaylistDetail */

$this->title = 'Update Playlist Detail: ' . $model->playlistid;
$this->params['breadcrumbs'][] = ['label' => 'Playlist Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->playlistid, 'url' => ['view', 'playlistid' => $model->playlistid, 'fileid' => $model->fileid, 'linkid' => $model->linkid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="playlist-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
