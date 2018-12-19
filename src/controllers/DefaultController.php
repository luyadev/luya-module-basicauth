<?php

namespace luya\basicauth\controllers;

use Yii;
use luya\web\Controller;
use luya\basicauth\Module;
use luya\basicauth\models\BasicAuthForm;
use yii\filters\HttpCache;

/**
 * Basic Auth Controller.
 * 
 * Handling model input, write session and redirect.
 * 
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class DefaultController extends Controller
{
    public $layout = 'basicauth';

    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return [
            'httpCache' => [
                'class' => HttpCache::class,
                'cacheControlHeader' => 'no-store, no-cache',
                'lastModified' => function ($action, $params) {
                    return time();
                },
            ],
        ];
    }

    /**
     * Handle form input.
     *
     * @return string|
     */
    public function actionIndex()
    {
        $model = new BasicAuthForm();
        $model->password = $this->module->password;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->set(Module::BASIC_AUTH_SESSION_NAME, true);
            return $this->goHome();
        }
        
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
