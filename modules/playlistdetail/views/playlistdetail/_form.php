<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\Models\Playlist;
use app\models\Files;
use app\models\Link;
/* @var $this yii\web\View */
/* @var $model app\models\PlaylistDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="playlist-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $listPayment = ArrayHelper::map(Playlist::find()->all(), 'id', 'playlist'); ?>
    <?= $form->field($model, 'playlistid')->widget(Select2::classname(), [
            'data' => $listPayment,
            'language' => 'th',
            'options' => [
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ],
                
        ]);
    ?>

    <?php $listPayment = ArrayHelper::map(Files::find()->all(), 'id', 'filename'); ?>
    <?= $form->field($model, 'fileid')->widget(Select2::classname(), [
            'data' => $listPayment,
            'language' => 'th',
            'options' => [
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ],
                
        ]);
    ?>

    <?php $listPayment = ArrayHelper::map(Link::find()->all(), 'id', 'description'); ?>
    <?= $form->field($model, 'linkid')->widget(Select2::classname(), [
            'data' => $listPayment,
            'language' => 'th',
            'options' => [
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ],
                
        ]);
    ?>
   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
