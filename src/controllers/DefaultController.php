<?php

namespace luya\basicauth\controllers;

use Yii;
use luya\web\Controller;

class DefaultController extends Controller
{
    public $enableCsrfValidation = false;
    
    public function actionIndex()
    {
        $authPassword = Yii::$app->request->post('authPassword', false);
        $error = false;
        if (!empty($authPassword)) {
            if ($authPassword === $this->module->password) {
                Yii::$app->session->set('basicAuthSuccess', true);
                return $this->goHome();
            } else {
                $error = true;
            }
        }
        return $this->renderPartial('_login', ['error' => $error]);
    }
}
