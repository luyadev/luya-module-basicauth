<?php

use yii\widgets\ActiveForm;
use luya\helpers\Html;
use luya\basicauth\Module;

$this->title = Module::t('index_title');
?>

<div class="basicauth">
    <div class="basicauth-logo">
        <svg class="basicauth-logo-svg" xmlns="http://www.w3.org/2000/svg" data-name="3d grid" viewBox="0 0 500 445.3"><path fill="#a00093" d="M174.6 0a42.8 42.8 0 0 0-37.8 21.6L6 248a43.3 43.3 0 0 0-.3 43.5l.7 1.2L8 295a43 43 0 0 0 35.3 18.7h77l44-76.2L276.4 43.2l12.4-21.5A43.3 43.3 0 0 1 325.3.1H174.6z"></path><path d="M43.2 313.4h77l44-76.2L8 295a43 43 0 0 0 35.3 18.5z" class="cls-2" data-name="shadow purple" opacity=".1"></path><path fill="#d40043" d="M422 417.4l.9-2.9a43.7 43.7 0 0 0-4.3-32.6l-.3-.4-.2-.3-39.1-67.7H43.2a43.2 43.2 0 0 1-36.9-20.8l63.2 109.5 12.3 21.1a42.7 42.7 0 0 0 37.5 22h261.3a42.8 42.8 0 0 0 37.8-21.6l2.3-3.8 1-1.8a1 1 0 0 1 .3-.7z"></path><path d="M422 417.3l.4-1.3a43.3 43.3 0 0 0-3.8-34l-.3-.5-.2-.3-39.1-67.7H267.7c59.2 41.3 144 100 153.2 106.3l.7-1.1.4-1.4z" class="cls-2" data-name="shadow red" opacity=".1"></path><path fill="#ffa000" d="M494.3 249.6q-24-41.4-47.7-82.8a43.3 43.3 0 0 0-38-21.5H258a42.7 42.7 0 0 1 36.5 21.5l12.4 21.6L379 313.5l39 67.7.2.3.3.4a43.5 43.5 0 0 1 3 37.1l73.2-126.9-.3.4a43.6 43.6 0 0 0-.1-43z"></path></svg>
    </div>

    <p class="basicauth-lead"><?= Module::t('index_text'); ?></p>
    <?php $form = ActiveForm::begin(['options' => ['class' => 'basicauth-form']]); ?>
        <?= $form->field($model, 'input', [
            'template' => '{input}{label}{hint}{error}',
            'labelOptions' => [ 'class' => 'basicauth-label' ]
        ])->passwordInput([
            'class' => 'basicauth-password',
            'autofocus' => true,
        ]); ?>
        <div class="basicauth-buttons">
            <?= Html::submitButton(Module::t('index_form_submit_label'), ['class' => 'basicauth-submit']); ?>
        </div>
    <?php $form::end(); ?>
</div>

<div class="basicauth-info">
    <p class="basicauth-info-title"><?= Yii::$app->siteTitle; ?></p>
    <p class="basicauth-info-text">
        <?php if (Yii::$app->request->isSecureConnection): ?>
            <span class="basicauth-ssl-icon" alt="<?= Module::t('ssl_info');?>" title="<?= Module::t('ssl_info');?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z" fill="#28a745" /></svg>
            </span>
        <?php endif; ?>
        <span><?= Yii::$app->request->hostInfo; ?></span>
    </p>
</div>