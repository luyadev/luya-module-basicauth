<?php

namespace luya\basicauth;

use Yii;
use yii\base\BootstrapInterface;
use yii\base\Application;
use luya\Exception;
use luya\base\AdminModuleInterface;

/**
 * LUYA Basic Auth Module.
 * 
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class Module extends \luya\base\Module implements BootstrapInterface
{
    const BASIC_AUTH_SESSION_NAME = 'basicAuthSuccess';

    /**
     * {@inheritDoc}
     */
    public $useAppLayoutPath = false;
    
    /**
     * @var string The password which should be valid for accessing the website.
     */
    public $password;
    
    /**
     * {@inheritDoc}
     */
    public function init()
    {
        parent::init();
        
        if (empty($this->password)) {
            throw new Exception("The basicauth module password can not be empty, please add a password to the module config for basicauth.");
        }
    }
    
    /**
     * {@inheritDoc}
     */
    public static function onLoad()
    {
        self::registerTranslation('basicauth', static::staticBasePath() . '/messages', [
            'basicauth' => 'basicauth.php',
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public static function t($message, array $params = [])
    {
        return parent::baseT('basicauth', $message, $params);
    }
    
    /**
     * {@inheritDoc}
     */
    public function bootstrap($app)
    {
        $app->on(Application::EVENT_BEFORE_ACTION, function ($event) {
            if (!$event->sender->request->isConsoleRequest) {
                $module = $event->sender->controller->module;
                if (!$module instanceof AdminModuleInterface && $module->id !== $this->id) {
                    if (!$event->sender->session->get(self::BASIC_AUTH_SESSION_NAME, false)) {
                        $event->isValid = false;
                        return $event->sender->response->redirect(['/basicauth/default/index']);
                    } else {
                        Yii::debug('User is authorized trough LUYA basic auth module.', __METHOD__);
                    }
                }
            }
        });
    }
}
