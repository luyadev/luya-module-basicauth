<?php

namespace luya\basicauth\tests;

use luya\basicauth\controllers\DefaultController;
use luya\basicauth\Module;
use luya\testsuite\cases\WebApplicationTestCase;

class DefaultControllerTest extends WebApplicationTestCase
{
    public function getConfigArray()
    {
        return [
            'id' => 'basicauth',
            'basePath' => dirname(__DIR__),
            'modules' => [
                'basicauth' => [
                    'class' => Module::class,
                    'password' => 'test',
                ]
            ]
        ];
    }

    public function testController()
    {
        $this->assertEmpty($this->app->getModule('basicauth')->bootstrap($this->app));
    }
}