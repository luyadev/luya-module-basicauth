<?php

namespace basicauth;

use Yii;
use yii\base\BootstrapInterface;
use yii\base\Application;
use luya\Exception;

class Module extends \luya\base\Module implements BootstrapInterface
{
    public $password = null;
    
    public function init()
    {
        parent::init();
        
        if (empty($this->password)) {
            throw new Exception("The basicauth module password can not be empty, please add a password to the module config for basicauth.");
        }
    }
    
    public function bootstrap($app)
    {
        $app->on(Application::EVENT_BEFORE_ACTION, function($event) {
            if (!$event->sender->request->isConsoleRequest) {
                if (
                    $event->sender->controller->module instanceof \luya\base\Module && 
                    $event->sender->controller->module->isAdmin === false &&
                    $event->sender->controller->module->id !== $this->id) {
                        if (!$event->sender->session->get('basicAuthSuccess', false)) {
                            $event->isValid = false;
                            return $event->sender->response->redirect(['/basicauth/default/index']);
                        } else {
                            Yii::info('User has been authentifacted trough luya module basic app', __METHOD__);
                        }
                }
            }
        });
    }
}