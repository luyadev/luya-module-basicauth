<?php

use yii\widgets\ActiveForm;
use luya\helpers\Html;
use luya\basicauth\Module;

$this->title = Module::t('index_title');
?>
<h1><?= Yii::$app->siteTitle; ?></h1>
<p><?= Module::t('index_text'); ?></p>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'input')->passwordInput(); ?>
    <?= Html::submitButton(Module::t('index_form_submit_label')); ?>
<?php $form::end(); ?>